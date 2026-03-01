<?php

namespace App\Livewire\Admin\Tickets;

use App\Models\Ticket;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public string $search = '';
    public string $status = '';
    public string $agent = ''; // assigned_to user id (as string for select)

    // Keep filters in URL (nice for admin)
    protected $queryString = [
        'search' => ['except' => ''],
        'status' => ['except' => ''],
        'agent' => ['except' => ''],
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function updatingStatus()
    {
        $this->resetPage();
    }
    public function updatingAgent()
    {
        $this->resetPage();
    }

    public function deleteTicket(int $ticketId): void
    {
        Ticket::query()->whereKey($ticketId)->delete();
        session()->flash('success', 'Ticket deleted.');
        $this->resetPage();
    }

    public function render()
    {
        $agents = User::query()
            ->where('is_admin', true)
            ->orderBy('name')
            ->get(['id', 'name', 'email']);

        $tickets = Ticket::query()
            ->with(['user:id,name,email', 'agent:id,name,email'])
            ->when($this->status !== '', fn($q) => $q->where('status', $this->status))
            ->when($this->agent !== '', fn($q) => $q->where('assigned_to', (int) $this->agent))
            ->when($this->search !== '', function ($q) {
                $s = trim($this->search);

                $q->where(function ($qq) use ($s) {
                    $qq->where('subject', 'like', "%{$s}%")
                        ->orWhere('description', 'like', "%{$s}%")
                        ->orWhereHas('user', fn($u) => $u->where('email', 'like', "%{$s}%")
                            ->orWhere('name', 'like', "%{$s}%"));
                });
            })
            ->latest('updated_at')
            ->paginate(10);

        return view('livewire.admin.tickets.index', [
            'tickets' => $tickets,
            'agents' => $agents,
        ]);
    }
}