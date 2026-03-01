<?php

namespace App\Livewire\Tickets;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Ticket;

class Index extends Component
{
    use WithPagination;
    public function render()
    {
        $tickets = Ticket::query()
            ->where('user_id', auth()->id())
            ->latest('updated_at')
            ->paginate(10);

        return view('livewire.tickets.index', [
            'tickets' => $tickets,
        ]);
    }
}
