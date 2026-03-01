<?php

namespace App\Livewire\Tickets;

use Livewire\Component;
use App\Models\Ticket;

class Create extends Component
{
    public array $touched = [];
    public string $subject = '';
    public string $priority = 'low';
    public string $category = 'hardware';
    public string $description = '';

    protected function rules(): array
    {
        return [
            'subject' => ['required', 'string', 'max:255', 'min:10'],
            'priority' => ['required', 'in:low,medium,high'],
            'category' => ['required', 'in:hardware,software,network'],
            'description' => ['required', 'string', 'min:10'],
        ];
    }
    public function save(): void
    {
        $validated = $this->validate();

        Ticket::create([
            'user_id' => auth()->id(),
            'subject' => $validated['subject'],
            'priority' => $validated['priority'],
            'category' => $validated['category'],
            'description' => $validated['description'],
            'status' => 'open',        // default
            'assigned_to' => null,     // admin assigns later
        ]);

        // reset form
        $this->reset(['subject', 'priority', 'category', 'description']);
        $this->priority = 'low';
        $this->category = 'hardware';

        $this->resetValidation();
        $this->touched = [];

        session()->flash('success', 'Ticket created successfully!');
    }
    public function updated($property, $value): void
    {
        $this->touched[$property] = true;
        $this->validateOnly($property);
    }

    public function getFormValidProperty(): bool
    {
        // required values present (basic checks)
        if (trim($this->subject) === '' || trim($this->description) === '') {
            return false;
        }

        // must be one of allowed options
        if (!in_array($this->priority, ['low', 'medium', 'high'], true)) {
            return false;
        }

        if (!in_array($this->category, ['hardware', 'software', 'network'], true)) {
            return false;
        }

        // no validation errors
        return $this->getErrorBag()->isEmpty();
    }

    public function render()
    {
        return view('livewire.tickets.create');
    }
}
