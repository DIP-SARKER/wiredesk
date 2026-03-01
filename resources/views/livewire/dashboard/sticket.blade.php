<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="page-card bg-white rounded-xl border border-slate-200 p-5 shadow-sm">
                <div class="flex items-center gap-2 mb-4 text-indigo-600">
                    <i class="fa-solid fa-gauge-high text-xl"></i>
                    <h2 class="text-lg font-semibold text-slate-800">
                        {{ auth()->user()->is_admin ? 'Admin Dashboard' : 'User Dashboard' }}
                    </h2>
                    <span class="text-xs bg-slate-100 text-slate-500 px-2 py-0.5 rounded-full ml-2">overview</span>
                </div>

                <!-- stat cards -->
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-6">
                    <div class="bg-blue-50/50 rounded-lg p-4 border border-blue-100 flex justify-between items-center">
                        <div>
                            <p class="text-sm text-slate-500">Open tickets</p>
                            <p class="text-2xl font-bold text-slate-800">{{ $openCount }}</p>
                        </div>
                        <i class="fa-regular fa-clock text-blue-400 text-2xl"></i>
                    </div>

                    <div
                        class="bg-amber-50/50 rounded-lg p-4 border border-amber-100 flex justify-between items-center">
                        <div>
                            <p class="text-sm text-slate-500">In progress</p>
                            <p class="text-2xl font-bold text-slate-800">{{ $inProgressCount }}</p>
                        </div>
                        <i class="fa-solid fa-spinner text-amber-400 text-2xl"></i>
                    </div>

                    <div
                        class="bg-emerald-50/50 rounded-lg p-4 border border-emerald-100 flex justify-between items-center">
                        <div>
                            <p class="text-sm text-slate-500">Solved</p>
                            <p class="text-2xl font-bold text-slate-800">{{ $solvedCount }}</p>
                        </div>
                        <i class="fa-regular fa-circle-check text-emerald-400 text-2xl"></i>
                    </div>
                </div>

                <!-- recent tickets -->
                <div class="flex items-center justify-between mb-2">
                    <h3 class="text-sm font-medium text-slate-700 flex items-center gap-1">
                        <i class="fa-regular fa-rectangle-list"></i> Recent tickets
                    </h3>

                    <a href="{{ auth()->user()->is_admin ? route('admin.tickets.index') : route('tickets.index') }}"
                        wire:navigate class="text-sm text-indigo-600 hover:text-indigo-800 font-medium">
                        View all
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left">
                        <thead class="text-xs text-slate-500 uppercase bg-slate-50">
                            <tr>
                                <th class="px-3 py-2">ID</th>
                                <th class="px-3 py-2">Subject</th>
                                <th class="px-3 py-2">Status</th>
                                <th class="px-3 py-2">Updated</th>
                                <th class="px-3 py-2 text-right">Action</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y">
                            @forelse ($recentTickets as $t)
                                @php
                                    $statusBadge = match ($t->status) {
                                        'in_progress' => 'bg-amber-100 text-amber-700',
                                        'solved' => 'bg-emerald-100 text-emerald-700',
                                        default => 'bg-blue-100 text-blue-700',
                                    };
                                    $statusText = match ($t->status) {
                                        'in_progress' => 'in progress',
                                        default => $t->status,
                                    };

                                    $viewRoute = auth()->user()->is_admin
                                        ? route('admin.tickets.show', $t->id)
                                        : route('tickets.show', $t->id);
                                @endphp

                                <tr class="hover:bg-slate-50">
                                    <td class="px-3 py-2 font-medium text-slate-700">#{{ $t->id }}</td>
                                    <td class="px-3 py-2 text-slate-800">{{ $t->subject }}</td>
                                    <td class="px-3 py-2">
                                        <span class="{{ $statusBadge }} px-2 py-0.5 rounded-full text-xs capitalize">
                                            {{ $statusText }}
                                        </span>
                                    </td>
                                    <td class="px-3 py-2 text-slate-600">{{ $t->updated_at->diffForHumans() }}</td>
                                    <td class="px-3 py-2 text-right">
                                        <a href="{{ $viewRoute }}" wire:navigate
                                            class="text-indigo-600 hover:text-indigo-800 text-sm font-medium">
                                            View
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-3 py-6 text-center text-slate-600">
                                        No tickets found yet.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
