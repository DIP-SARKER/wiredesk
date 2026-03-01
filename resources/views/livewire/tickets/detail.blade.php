<x-app-layout>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8  py-12">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <!-- user ticket details -->
            <div class="page-card bg-white rounded-xl border border-slate-200 p-5 shadow-sm">
                <div class="flex items-center gap-2 mb-4 text-indigo-600">
                    <i class="fa-regular fa-message text-xl"></i>
                    <h2 class="text-lg font-semibold text-slate-800">Ticket Details (user view)</h2>
                    <span class="text-xs bg-slate-100 text-slate-500 px-2 py-0.5 rounded-full">#1024 · open</span>
                </div>
                <!-- meta row -->
                <div class="bg-slate-50 p-3 rounded-lg text-sm flex flex-wrap gap-4 mb-4 border">
                    <span><strong class="text-slate-600">Subject:</strong> Cannot connect to VPN</span>
                    <span><strong class="text-slate-600">Priority:</strong> <span
                            class="text-amber-600">High</span></span>
                    <span><strong class="text-slate-600">Created:</strong> 2025-03-27</span>
                </div>
                <!-- conversation -->
                <div class="space-y-4">
                    <div class="flex gap-3">
                        <div
                            class="w-8 h-8 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-700">
                            <i class="fa-regular fa-user text-sm"></i>
                        </div>
                        <div class="flex-1 bg-slate-50 p-3 rounded-lg">
                            <p class="text-xs text-slate-400 mb-1">You · 2 days ago</p>
                            <p class="text-sm">I'm unable to connect to company VPN since yesterday. It says
                                "authentication failed". I've tried restarting.</p>
                        </div>
                    </div>
                    <div class="flex gap-3">
                        <div class="w-8 h-8 rounded-full bg-slate-200 flex items-center justify-center text-slate-600">
                            <i class="fa-regular fa-headset text-sm"></i>
                        </div>
                        <div class="flex-1 bg-indigo-50/50 p-3 rounded-lg">
                            <p class="text-xs text-slate-400 mb-1">Support (Alex) · 1 day ago</p>
                            <p class="text-sm">Hi, could you confirm if your password was recently changed? Try
                                resetting your token via the portal.</p>
                        </div>
                    </div>
                </div>
                <!-- reply box -->
                <div class="mt-5 flex gap-2 items-start">
                    <textarea placeholder="Write a reply..." rows="2" class="flex-1 border border-slate-200 rounded-lg p-3 text-sm"></textarea>
                    <button
                        class="bg-indigo-600 text-white px-4 py-2 rounded-lg text-sm whitespace-nowrap">Send</button>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>
