<x-app-layout>
    <!-- my tickets -->
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8  py-12">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <!-- admin ticket details (with extra controls) -->
            <div class="page-card bg-white rounded-xl border border-slate-200 p-5 shadow-sm">
                <div class="flex items-center gap-2 mb-4 text-purple-600">
                    <i class="fa-regular fa-pen-to-square text-xl"></i>
                    <h2 class="text-lg font-semibold text-slate-800">Ticket Details (admin view)</h2>
                    <span class="text-xs bg-slate-100 text-slate-500 px-2 py-0.5 rounded-full">#1024 · in progress</span>
                </div>
                <!-- admin meta + assignment panel -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-5">
                    <div class="md:col-span-2 bg-slate-50 p-3 rounded-lg border text-sm space-y-1">
                        <p><span class="font-medium">Subject:</span> Cannot connect to VPN</p>
                        <p><span class="font-medium">User:</span> alice@company.com (Alice Wonder)</p>
                        <p><span class="font-medium">Created:</span> 2025-03-27, 09:34</p>
                        <p><span class="font-medium">Priority:</span> <span class="text-amber-600">High</span></p>
                    </div>
                    <div class="bg-slate-50 p-3 rounded-lg border text-sm space-y-3">
                        <div class="flex justify-between items-center"><span class="font-medium">Assign agent</span>
                            <select class="bg-white border rounded text-xs">
                                <option>Emily</option>
                                <option>Mike</option>
                                <option>Unassigned</option>
                            </select>
                        </div>
                        <div class="flex justify-between items-center"><span class="font-medium">Status</span> <select
                                class="bg-white border rounded text-xs">
                                <option>Open</option>
                                <option selected>In progress</option>
                                <option>Resolved</option>
                            </select></div>
                    </div>
                </div>

                <!-- conversation (same as user but with admin label) -->
                <div class="space-y-4">
                    <div class="flex gap-3">
                        <div class="w-8 h-8 rounded-full bg-indigo-100 flex items-center justify-center">U</div>
                        <div class="flex-1 bg-slate-50 p-3 rounded-lg text-sm">
                            <p class="text-xs text-slate-400">Alice · 2d ago</p>Unable to connect to VPN...
                        </div>
                    </div>
                    <div class="flex gap-3">
                        <div class="w-8 h-8 rounded-full bg-purple-200 flex items-center justify-center">S</div>
                        <div class="flex-1 bg-purple-50/50 p-3 rounded-lg text-sm">
                            <p class="text-xs text-slate-400">Support (Emily) · 1d ago</p>Please verify your
                            credentials.
                        </div>
                    </div>
                    <!-- internal note mock (admin only) -->
                    <div class="flex gap-3 opacity-70">
                        <div class="w-8 h-8 rounded-full bg-amber-200 flex items-center justify-center"><i
                                class="fa-regular fa-lock text-xs"></i></div>
                        <div class="flex-1 bg-amber-50/70 p-3 rounded-lg text-sm border border-amber-200">
                            <p class="text-xs text-amber-600">Internal note (Emily) · 1h ago</p>
                            <p class="text-sm">Check VPN logs – possible auth token expired.</p>
                        </div>
                    </div>
                </div>

                <!-- admin reply + internal toggle -->
                <div class="mt-5 flex flex-wrap gap-2">
                    <textarea placeholder="Reply to user..." rows="2"
                        class="flex-1 border border-slate-200 rounded-lg p-3 text-sm min-w-[200px]"></textarea>
                    <div class="flex gap-2">
                        <button class="bg-purple-600 text-white px-4 py-2 rounded-lg text-sm whitespace-nowrap">Send
                            reply</button>
                        <button
                            class="border border-amber-300 text-amber-700 bg-amber-50 px-3 py-2 rounded-lg text-sm"><i
                                class="fa-regular fa-note-sticky"></i> Note</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
