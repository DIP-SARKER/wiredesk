<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use App\Models\Ticket;

class Sticket extends Component
{
    public function render()
    {
        $user = auth()->user();

        $baseQuery = Ticket::query();

        // Normal user sees only own tickets
        if (!$user->is_admin) {
            $baseQuery->where('user_id', $user->id);
        }

        // If you prefer admins see ONLY tickets assigned to them, use this instead:
        if ($user->is_admin) {
            $baseQuery->where('assigned_to', $user->id);
        }

        $openCount = (clone $baseQuery)->where('status', 'open')->count();
        $inProgressCount = (clone $baseQuery)->where('status', 'in_progress')->count();
        $solvedCount = (clone $baseQuery)->where('status', 'solved')->count();

        $recentTickets = (clone $baseQuery)
            ->latest('updated_at')
            ->take(5)
            ->get(['id', 'subject', 'status', 'updated_at']);

        return view('livewire.dashboard.sticket', [
            'openCount' => $openCount,
            'inProgressCount' => $inProgressCount,
            'solvedCount' => $solvedCount,
            'recentTickets' => $recentTickets,
        ]);
    }
}