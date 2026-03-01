<div class="max-w-7xl mx-auto sm:px-6 lg:px-8  py-12">
    @if (session()->has('success'))
        <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show"
            class="mb-4 p-3 rounded-lg bg-green-50 border border-green-200 text-green-700 text-sm">
            {{ session('success') }}
        </div>
    @endif
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <!-- create ticket -->
        <div class="page-card bg-white rounded-xl border border-slate-200 p-5 shadow-sm">
            <div class="flex items-center gap-2 mb-4 text-indigo-600">
                <i class="fa-regular fa-square-plus text-xl"></i>
                <h2 class="text-lg font-semibold text-slate-800">Create Ticket</h2>
            </div>
            <form wire:submit.prevent="save" class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Subject</label>
                    <input type="text" wire:model.live.debounce.500ms="subject" placeholder="e.g. Laptop not working"
                        class="w-full border border-slate-200 rounded-lg p-2.5 text-sm focus:ring-2 focus:ring-indigo-200 outline-none">
                    @if (!empty($touched['subject']))
                        @error('subject')
                            <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    @endif
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Priority</label>
                        <select wire:model.live="priority"
                            class="w-full border border-slate-200 rounded-lg p-2.5 text-sm bg-white">
                            <option value="low">Low</option>
                            <option value="medium">Medium</option>
                            <option value="high">High</option>
                        </select>


                        @if (!empty($touched['priority']))
                            @error('priority')
                                <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        @endif
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Category</label>
                        <select wire:model.live="category"
                            class="w-full border border-slate-200 rounded-lg p-2.5 text-sm bg-white">
                            <option value="hardware">Hardware</option>
                            <option value="software">Software</option>
                            <option value="network">Network</option>
                        </select>

                        @if (!empty($touched['category']))
                            @error('category')
                                <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        @endif
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Description</label>
                    <textarea wire:model.live.debounce.500ms="description" rows="3"
                        class="w-full border border-slate-200 rounded-lg p-2.5 text-sm"></textarea>
                    @if (!empty($touched['description']))
                        @error('description')
                            <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    @endif
                </div>
                <div class="flex justify-end">
                    <button type="submit" wire:loading.attr="disabled" @disabled(!$this->formValid)
                        class="text-white text-sm font-medium py-2 px-6 rounded-lg transition
           {{ $this->formValid ? 'bg-indigo-600 hover:bg-indigo-700' : 'bg-slate-400 cursor-not-allowed' }}">
                        <span wire:loading.remove>Create ticket</span>
                        <span wire:loading>Creating...</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
