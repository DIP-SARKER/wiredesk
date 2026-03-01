<?php

namespace App\Livewire\Admin\Tickets;

use App\Models\Ticket;
use App\Models\TicketMessage;
use App\Models\TicketNote;
use App\Models\User;
use Livewire\Component;

class Detail extends Component
{
    public Ticket $ticket;

    // dropdown controls
    public ?int $assigned_to = null;
    public string $status = 'open';

    // reply + note
    public string $reply = '';
    public string $note = '';

    public bool $showNote = false;

    public function toggleNote(): void
    {
        $this->showNote = !$this->showNote;
    }

    public function mount(Ticket $ticket): void
    {
        // admin-only route already, but safe:
        abort_unless(auth()->user()->is_admin, 403);

        $this->ticket = $ticket->load(['user', 'agent']);

        $this->assigned_to = $ticket->assigned_to;
        $this->status = $ticket->status;
    }

    public function getAgentsProperty()
    {
        return User::query()
            ->where('is_admin', true)
            ->orderBy('name')
            ->get(['id', 'name', 'email']);
    }

    public function getMessagesProperty()
    {
        return TicketMessage::query()
            ->where('ticket_id', $this->ticket->id)
            ->with('sender:id,name,is_admin')
            ->orderBy('created_at')
            ->get();
    }

    public function getNotesProperty()
    {
        return TicketNote::query()
            ->where('ticket_id', $this->ticket->id)
            ->with('agent:id,name,is_admin')
            ->latest()
            ->get();
    }

    public function updatedAssignedTo($value): void
    {
        $this->ticket->update([
            'assigned_to' => $value ? (int) $value : null,
        ]);

        $this->ticket->refresh()->load(['user', 'agent']);
        session()->flash('success', 'Agent updated.');
    }

    public function updatedStatus($value): void
    {
        $this->ticket->update([
            'status' => $value,
        ]);

        $this->ticket->refresh()->load(['user', 'agent']);
        session()->flash('success', 'Status updated.');
    }

    public function sendReply(): void
    {
        $msg = trim($this->reply);

        $this->validate([
            'reply' => ['required', 'string', 'min:1', 'max:2000'],
        ]);

        TicketMessage::create([
            'ticket_id' => $this->ticket->id,
            'sender_id' => auth()->id(), // admin sender
            'message' => $msg,
        ]);

        // Optional: if admin replies while open, auto move to in_progress
        if ($this->ticket->status === 'open') {
            $this->ticket->update(['status' => 'in_progress']);
            $this->status = 'in_progress';
        }

        $this->reply = '';
        $this->resetValidation();
    }

    public function addNote(): void
    {
        $note = trim($this->note);

        $this->validate([
            'note' => ['required', 'string', 'min:1', 'max:500'],
        ]);

        TicketNote::create([
            'ticket_id' => $this->ticket->id,
            'agent_id' => auth()->id(),
            'note' => $note,
        ]);

        $this->note = '';
        $this->showNote = false;
        $this->resetValidation();
        session()->flash('success', 'Note added.');
    }

    public function render()
    {
        return view('livewire.admin.tickets.detail');
    }
}