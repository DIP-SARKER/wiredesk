<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ticket;
use App\Models\User;
use App\Models\TicketNote;

class TicketSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::where('is_admin', true)->first();
        $users = User::where('is_admin', false)->get();

        foreach ($users as $user) {

            // Create 2 tickets per user
            for ($i = 1; $i <= 2; $i++) {

                $ticket = Ticket::create([
                    'user_id' => $user->id,
                    'assigned_to' => $admin->id,
                    'subject' => 'Sample Ticket ' . $i,
                    'priority' => collect(['low', 'medium', 'high'])->random(),
                    'category' => collect(['hardware', 'software', 'network'])->random(),
                    'description' => 'This is a demo ticket description.',
                    'status' => collect(['open', 'in_progress', 'solved'])->random(),
                ]);

                // Add note only if assigned
                TicketNote::create([
                    'ticket_id' => $ticket->id,
                    'agent_id' => $admin->id,
                    'note' => 'Initial review completed.',
                ]);
            }
        }
    }
}