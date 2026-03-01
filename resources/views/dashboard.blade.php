<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <!-- user dashboard -->
                <div class="page-card bg-white rounded-xl border border-slate-200 p-5 shadow-sm">
                    <div class="flex items-center gap-2 mb-4 text-indigo-600">
                        <i class="fa-solid fa-gauge-high text-xl"></i>
                        <h2 class="text-lg font-semibold text-slate-800">User Dashboard</h2>
                        <span class="text-xs bg-slate-100 text-slate-500 px-2 py-0.5 rounded-full ml-2">overview</span>
                    </div>

                    <!-- stat cards -->
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-6">
                        <div
                            class="bg-blue-50/50 rounded-lg p-4 border border-blue-100 flex justify-between items-center">
                            <div>
                                <p class="text-sm text-slate-500">Open tickets</p>
                                <p class="text-2xl font-bold text-slate-800">5</p>
                            </div>
                            <i class="fa-regular fa-clock text-blue-400 text-2xl"></i>
                        </div>
                        <div
                            class="bg-amber-50/50 rounded-lg p-4 border border-amber-100 flex justify-between items-center">
                            <div>
                                <p class="text-sm text-slate-500">In progress</p>
                                <p class="text-2xl font-bold text-slate-800">2</p>
                            </div>
                            <i class="fa-solid fa-spinner text-amber-400 text-2xl"></i>
                        </div>
                        <div
                            class="bg-emerald-50/50 rounded-lg p-4 border border-emerald-100 flex justify-between items-center">
                            <div>
                                <p class="text-sm text-slate-500">Resolved</p>
                                <p class="text-2xl font-bold text-slate-800">12</p>
                            </div>
                            <i class="fa-regular fa-circle-check text-emerald-400 text-2xl"></i>
                        </div>
                    </div>

                    <!-- recent tickets table (simple) -->
                    <h3 class="text-sm font-medium text-slate-700 mb-2 flex items-center gap-1"><i
                            class="fa-regular fa-rectangle-list"></i> Recent tickets</h3>
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left">
                            <thead class="text-xs text-slate-500 uppercase bg-slate-50">
                                <tr>
                                    <th class="px-3 py-2">ID</th>
                                    <th class="px-3 py-2">Subject</th>
                                    <th class="px-3 py-2">Status</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y">
                                <tr>
                                    <td class="px-3 py-2">#1024</td>
                                    <td class="px-3 py-2">Cannot connect to VPN</td>
                                    <td class="px-3 py-2"><span
                                            class="bg-amber-100 text-amber-700 px-2 py-0.5 rounded-full text-xs">in
                                            progress</span></td>
                                </tr>
                                <tr>
                                    <td class="px-3 py-2">#1021</td>
                                    <td class="px-3 py-2">Printer not responding</td>
                                    <td class="px-3 py-2"><span
                                            class="bg-blue-100 text-blue-700 px-2 py-0.5 rounded-full text-xs">open</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-3 py-2">#1018</td>
                                    <td class="px-3 py-2">Password reset</td>
                                    <td class="px-3 py-2"><span
                                            class="bg-emerald-100 text-emerald-700 px-2 py-0.5 rounded-full text-xs">resolved</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
