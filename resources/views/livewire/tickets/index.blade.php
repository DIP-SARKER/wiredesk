<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="page-card bg-white rounded-xl border border-slate-200 p-5 shadow-sm">
            <div class="flex items-center justify-between gap-2 mb-4">
                <div class="flex items-center gap-2 text-indigo-600">
                    <i class="fa-solid fa-ticket text-xl"></i>
                    <h2 class="text-lg font-semibold text-slate-800">My Tickets</h2>
                </div>

                <a href="{{ route('tickets.create') }}" wire:navigate
                    class="bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium py-2 px-4 rounded-lg transition">
                    + Create Ticket
                </a>
            </div>

            @if ($tickets->count() === 0)
                <div class="p-6 text-sm text-slate-600 bg-slate-50 rounded-lg border border-slate-200">
                    You have no tickets yet.
                </div>
            @else
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left">
                        <thead class="text-xs text-slate-500 uppercase bg-slate-50">
                            <tr>
                                <th class="px-3 py-2">ID</th>
                                <th class="px-3 py-2">Subject</th>
                                <th class="px-3 py-2">Priority</th>
                                <th class="px-3 py-2">Category</th>
                                <th class="px-3 py-2">Status</th>
                                <th class="px-3 py-2">Last update</th>
                                <th class="px-3 py-2 text-right">Action</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y">
                            @foreach ($tickets as $ticket)
                                <tr class="hover:bg-slate-50">
                                    <td class="px-3 py-2 font-medium text-slate-700">
                                        #{{ $ticket->id }}
                                    </td>

                                    <td class="px-3 py-2 text-slate-800">
                                        {{ $ticket->subject }}
                                    </td>

                                    <td class="px-3 py-2">
                                        @php
                                            $priorityBadge = match ($ticket->priority) {
                                                'high' => 'bg-red-100 text-red-700',
                                                'medium' => 'bg-amber-100 text-amber-700',
                                                default => 'bg-slate-100 text-slate-700',
                                            };
                                        @endphp

                                        <span class="{{ $priorityBadge }} px-2 py-0.5 rounded-full text-xs capitalize">
                                            {{ $ticket->priority }}
                                        </span>
                                    </td>

                                    <td class="px-3 py-2">
                                        <span
                                            class="bg-slate-100 text-slate-700 px-2 py-0.5 rounded-full text-xs capitalize">
                                            {{ $ticket->category }}
                                        </span>
                                    </td>

                                    <td class="px-3 py-2">
                                        @php
                                            $statusBadge = match ($ticket->status) {
                                                'in_progress' => 'bg-amber-100 text-amber-700',
                                                'solved' => 'bg-emerald-100 text-emerald-700',
                                                default => 'bg-blue-100 text-blue-700',
                                            };

                                            $statusText = match ($ticket->status) {
                                                'in_progress' => 'in progress',
                                                default => $ticket->status,
                                            };
                                        @endphp

                                        <span class="{{ $statusBadge }} px-2 py-0.5 rounded-full text-xs capitalize">
                                            {{ $statusText }}
                                        </span>
                                    </td>

                                    <td class="px-3 py-2 text-slate-600">
                                        {{ $ticket->updated_at->diffForHumans() }}
                                    </td>

                                    <td class="px-3 py-2 text-right">
                                        <a href="{{ route('tickets.detail', $ticket->id) }}" wire:navigate
                                            class="text-slate-600 hover:text-indigo-600">
                                            <i class="fa-regular fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">
                    {{ $tickets->links() }}
                </div>
            @endif
        </div>
    </div>
</div>
