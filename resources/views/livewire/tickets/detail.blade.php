<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="page-card bg-white rounded-xl border border-slate-200 p-5 shadow-sm">
            <div class="flex items-center gap-2 mb-4 text-indigo-600">
                <i class="fa-regular fa-message text-xl"></i>
                <h2 class="text-lg font-semibold text-slate-800">Ticket Details</h2>
                <span class="text-xs bg-slate-100 text-slate-500 px-2 py-0.5 rounded-full">
                    #{{ $ticket->id }} · {{ str_replace('_', ' ', $ticket->status) }}
                </span>
            </div>

            <!-- meta row -->
            <div class="bg-slate-50 p-3 rounded-lg text-sm flex flex-wrap gap-4 mb-4 border">
                <span><strong class="text-slate-600">Subject:</strong> {{ $ticket->subject }}</span>
                <span><strong class="text-slate-600">Priority:</strong> <span
                        class="capitalize">{{ $ticket->priority }}</span></span>
                <span><strong class="text-slate-600">Created:</strong> {{ $ticket->created_at->toDateString() }}</span>
            </div>

            <!-- conversation -->
            {{-- Easy live updates (no websocket): poll every 3s --}}
            <div class="space-y-4" wire:poll.visible.30s x-data x-init="$nextTick(() => $el.scrollTop = $el.scrollHeight)"
                x-on:livewire:update="$nextTick(() => $el.scrollTop = $el.scrollHeight)"
                style="max-height: 400px; overflow-y: auto;">
                @foreach ($this->messages as $msg)
                    @php
                        $isMe = $msg->sender_id === auth()->id();
                        $isAdmin = (bool) $msg->sender?->is_admin;
                    @endphp

                    <div class="flex gap-3 {{ $isMe ? 'justify-end' : '' }}">
                        @if (!$isMe)
                            <div
                                class="w-8 h-8 rounded-full {{ $isAdmin ? 'bg-slate-200 text-slate-600' : 'bg-indigo-100 text-indigo-700' }} flex items-center justify-center">
                                <i class="fa-regular {{ $isAdmin ? 'fa-headset' : 'fa-user' }} text-sm"></i>
                            </div>
                        @endif

                        <div class="flex-1 max-w-2xl {{ $isMe ? 'bg-indigo-50/50' : 'bg-slate-50' }} p-3 rounded-lg">
                            <p class="text-xs text-slate-400 mb-1">
                                {{ $isMe ? 'You' : $msg->sender?->name ?? 'User' }}
                                · {{ $msg->created_at->diffForHumans() }}
                            </p>
                            <p class="text-sm whitespace-pre-line">{{ $msg->message }}</p>
                        </div>

                        @if ($isMe)
                            <div
                                class="w-8 h-8 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-700">
                                <i class="fa-regular fa-user text-sm"></i>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>

            <!-- reply box -->
            <form wire:submit.prevent="send" class="mt-5 flex gap-2 items-start">
                <textarea wire:model.live.debounce.300ms="newMessage" placeholder="Write a reply..." rows="2"
                    class="flex-1 border border-slate-200 rounded-lg p-3 text-sm"></textarea>

                <button type="submit" wire:loading.attr="disabled"
                    class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg text-sm whitespace-nowrap">
                    <span>Send</span>
                    {{-- <span wire:loading>Sending...</span> --}}
                </button>
            </form>

            @error('newMessage')
                <p class="text-red-600 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>
    </div>
</div>
