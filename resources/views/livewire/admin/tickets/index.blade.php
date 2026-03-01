<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="page-card bg-white rounded-xl border border-slate-200 p-5 shadow-sm">
            <div class="flex items-center justify-between gap-2 mb-4">
                <div class="flex items-center gap-2 text-purple-600">
                    <i class="fa-solid fa-table-list text-xl"></i>
                    <h2 class="text-lg font-semibold text-slate-800">All Tickets (admin)</h2>
                </div>
            </div>

            @if (session()->has('success'))
                <div x-data="{ show: true }" x-init="setTimeout(() => show=false, 2000)" x-show="show"
                    class="mb-4 p-3 rounded-lg bg-green-50 border border-green-200 text-green-700 text-sm">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Filters -->
            <div class="flex flex-wrap items-center gap-2 mb-4 bg-slate-50 p-2 rounded-lg text-sm">
                <i class="fa-regular fa-filter text-slate-400"></i>
                <span class="text-slate-600">Filter:</span>

                <select wire:model.live="status" class="bg-white border rounded px-2 py-1  pr-8 text-xs">
                    <option value="">All status</option>
                    <option value="open">Open</option>
                    <option value="in_progress">In progress</option>
                    <option value="solved">Solved</option>
                </select>

                <select wire:model.live="agent" class="bg-white border rounded px-2 py-1 pr-8 text-xs">
                    <option value="">All agents</option>
                    <option value="">Unassigned + All</option>
                    @foreach ($agents as $a)
                        <option value="{{ $a->id }}">{{ $a->name }}</option>
                    @endforeach
                </select>

                <input type="text"
                    wire:model.live.debounce.400ms="search"
                    placeholder="Search subject, description, user..."
                    class="bg-white border rounded px-2 py-1 text-xs flex-1 min-w-[220px]">

                <button type="button"
                    wire:click="$set('search',''); $set('status',''); $set('agent','')"
                    class="text-xs px-2 py-1 rounded border bg-white hover:bg-slate-100">
                    Reset
                </button>
            </div>

            <!-- Table -->
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead class="bg-slate-50 text-xs uppercase text-slate-600">
                        <tr>
                            <th class="text-left px-3 py-2">ID</th>
                            <th class="text-left px-3 py-2">Subject</th>
                            <th class="text-left px-3 py-2">User</th>
                            <th class="text-left px-3 py-2">Status</th>
                            <th class="text-left px-3 py-2">Assigned</th>
                            <th class="text-right px-3 py-2">Action</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y">
                        @forelse ($tickets as $ticket)
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

                            <tr class="hover:bg-slate-50">
                                <td class="px-3 py-2 font-medium text-slate-700">#{{ $ticket->id }}</td>
                                <td class="px-3 py-2 text-slate-800">{{ $ticket->subject }}</td>
                                <td class="px-3 py-2 text-slate-600">{{ $ticket->user?->email }}</td>

                                <td class="px-3 py-2">
                                    <span class="{{ $statusBadge }} px-2 py-0.5 rounded-full text-xs capitalize">
                                        {{ $statusText }}
                                    </span>
                                </td>

                                <td class="px-3 py-2 text-slate-600">
                                    {{ $ticket->agent?->name ?? 'Unassigned' }}
                                </td>

                                <td class="px-3 py-2">
                                    <div class="flex items-center justify-end gap-3">
                                        <a href="{{ route('admin.tickets.detail', $ticket->id) }}"
                                           wire:navigate
                                           class="text-slate-600 hover:text-indigo-600"
                                           title="View">
                                            <i class="fa-regular fa-eye"></i>
                                        </a>

                                        <button type="button"
                                            onclick="confirm('Delete this ticket?') || event.stopImmediatePropagation()"
                                            wire:click="deleteTicket({{ $ticket->id }})"
                                            class="text-slate-600 hover:text-red-600"
                                            title="Delete">
                                            <i class="fa-regular fa-trash-can"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-3 py-6 text-center text-slate-600">
                                    No tickets found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $tickets->links() }}
            </div>
        </div>
    </div>
</div>