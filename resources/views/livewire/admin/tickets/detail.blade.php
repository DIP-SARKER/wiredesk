<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="page-card bg-white rounded-xl border border-slate-200 p-5 shadow-sm">

            <div class="flex items-center gap-2 mb-4 text-purple-600">
                <i class="fa-regular fa-pen-to-square text-xl"></i>
                <h2 class="text-lg font-semibold text-slate-800">Ticket Details (admin)</h2>

                <span class="text-xs bg-slate-100 text-slate-500 px-2 py-0.5 rounded-full">
                    #{{ $ticket->id }} · {{ str_replace('_', ' ', $ticket->status) }}
                </span>
            </div>

            @if (session()->has('success'))
                <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 1500)" x-show="show"
                    class="mb-4 p-3 rounded-lg bg-green-50 border border-green-200 text-green-700 text-sm">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Meta + assignment panel -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-5">
                <div class="md:col-span-2 bg-slate-50 p-3 rounded-lg border text-sm space-y-1">
                    <p><span class="font-medium">Subject:</span> {{ $ticket->subject }}</p>
                    <p><span class="font-medium">User:</span> {{ $ticket->user?->email }} ({{ $ticket->user?->name }})
                    </p>
                    <p><span class="font-medium">Created:</span> {{ $ticket->created_at->format('Y-m-d, H:i') }}</p>
                    <p><span class="font-medium">Priority:</span> <span
                            class="capitalize">{{ $ticket->priority }}</span></p>
                    <p><span class="font-medium">Category:</span> <span
                            class="capitalize">{{ $ticket->category }}</span></p>
                </div>

                <div class="bg-slate-50 p-3 rounded-lg border text-sm space-y-3">
                    <div class="flex justify-between items-center gap-2">
                        <span class="font-medium">Assign agent</span>

                        <div class="relative">
                            <select wire:model.live="assigned_to"
                                class="bg-white border rounded p-1 pr-7 text-xs appearance-none">
                                <option value="">Unassigned</option>
                                @foreach ($this->agents as $a)
                                    <option value="{{ $a->id }}">{{ $a->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="flex justify-between items-center gap-2">
                        <span class="font-medium">Status</span>

                        <div class="relative">
                            <select wire:model.live="status"
                                class="bg-white border rounded p-1 pr-8 text-xs appearance-none">
                                <option value="open">Open</option>
                                <option value="in_progress">In progress</option>
                                <option value="solved">Solved</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Conversation -->
            <div class="space-y-4" wire:poll.visible.30s style="max-height: 420px; overflow-y: auto;">
                @foreach ($this->messages as $msg)
                    @php
                        $isAdmin = (bool) $msg->sender?->is_admin;
                        $bubble = $isAdmin ? 'bg-purple-50/50' : 'bg-slate-50';
                        $iconBg = $isAdmin ? 'bg-purple-200' : 'bg-indigo-100';
                        $iconText = $isAdmin ? 'text-purple-700' : 'text-indigo-700';
                    @endphp

                    <div class="flex gap-3">
                        <div
                            class="w-8 h-8 rounded-full {{ $iconBg }} flex items-center justify-center {{ $iconText }}">
                            <i class="fa-regular {{ $isAdmin ? 'fa-headset' : 'fa-user' }} text-sm"></i>
                        </div>

                        <div class="flex-1 {{ $bubble }} p-3 rounded-lg text-sm">
                            <p class="text-xs text-slate-400 mb-1">
                                {{ $msg->sender?->name ?? 'User' }} · {{ $msg->created_at->diffForHumans() }}
                            </p>
                            <p class="whitespace-pre-line">{{ $msg->message }}</p>
                        </div>
                    </div>
                @endforeach

                <!-- Internal notes (admin only) -->
                @foreach ($this->notes as $n)
                    <div class="flex gap-3 opacity-80">
                        <div class="w-8 h-8 rounded-full bg-amber-200 flex items-center justify-center">
                            <i class="fa-regular fa-lock text-xs"></i>
                        </div>
                        <div class="flex-1 bg-amber-50/70 p-3 rounded-lg text-sm border border-amber-200">
                            <p class="text-xs text-amber-600 mb-1">
                                Internal note ({{ $n->agent?->name ?? 'Agent' }}) ·
                                {{ $n->created_at->diffForHumans() }}
                            </p>
                            <p class="whitespace-pre-line">{{ $n->note }}</p>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Reply + Note -->
            <div class="mt-5 flex flex-wrap gap-2">
                <div class="flex-1 min-w-[220px]">
                    <textarea wire:model.live.debounce.300ms="reply" placeholder="Reply to user..." rows="2"
                        class="w-full border border-slate-200 rounded-lg p-3 text-sm"></textarea>
                    @error('reply')
                        <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex gap-2">
                    <button type="button" wire:click="sendReply" wire:loading.attr="disabled"
                        class="bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-lg text-sm whitespace-nowrap">
                        Send reply
                    </button>

                    <button type="button" wire:click="toggleNote"
                        class="border border-amber-300 text-amber-700 bg-amber-50 px-3 py-2 rounded-lg text-sm whitespace-nowrap">
                        <i class="fa-regular fa-note-sticky"></i> Note
                    </button>
                </div>
            </div>

            <!-- Note box -->
            @if ($showNote)
                <div class="mt-3">
                    <div class="flex gap-2 items-start">
                        <textarea wire:model.live.debounce.300ms="note" rows="2" placeholder="Internal note (only admins see this)..."
                            class="flex-1 border border-amber-200 rounded-lg p-3 text-sm bg-amber-50/40"></textarea>

                        <button type="button" wire:click="addNote" wire:loading.attr="disabled"
                            class="border border-amber-300 text-amber-700 bg-amber-50 px-4 py-2 rounded-lg text-sm whitespace-nowrap">
                            Save note
                        </button>
                    </div>
                    @error('note')
                        <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            @endif

        </div>
    </div>
</div>
