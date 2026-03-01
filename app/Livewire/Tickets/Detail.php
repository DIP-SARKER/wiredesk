<?php

namespace App\Livewire\Tickets;

use App\Models\Ticket;
use App\Models\TicketMessage;
use Livewire\Component;

class Detail extends Component
{
    public Ticket $ticket;

    public string $newMessage = '';

    public function mount(Ticket $ticket): void
    {
        // Security: user can only see their own ticket (admin sees all)
        if (!auth()->user()->is_admin && $ticket->user_id !== auth()->id()) {
            abort(403);
        }

        $this->ticket = $ticket->load(['user', 'agent']);
    }

    protected function rules(): array
    {
        return [
            'newMessage' => ['required', 'string', 'min:1', 'max:2000'],
        ];
    }

    public function send(): void
    {
        $this->validate();

        TicketMessage::create([
            'ticket_id' => $this->ticket->id,
            'sender_id' => auth()->id(),
            'message' => $this->newMessage,
        ]);

        $this->newMessage = '';

        // refresh messages
        $this->dispatch('message-sent');
    }

    public function getMessagesProperty()
    {
        return TicketMessage::query()
            ->where('ticket_id', $this->ticket->id)
            ->with('sender:id,name,is_admin')
            ->orderBy('created_at')
            ->get();
    }

    public function render()
    {
        return view('livewire.tickets.detail');
    }
}