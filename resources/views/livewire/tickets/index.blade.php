<x-app-layout>
    <!-- my tickets -->
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8  py-12">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="page-card bg-white rounded-xl border border-slate-200 p-5 shadow-sm">
                <div class="flex items-center gap-2 mb-4 text-indigo-600">
                    <i class="fa-solid fa-ticket text-xl"></i>
                    <h2 class="text-lg font-semibold text-slate-800">My Tickets</h2>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left">
                        <thead class="text-xs text-slate-500 uppercase bg-slate-50">
                            <tr>
                                <th class="px-3 py-2">ID</th>
                                <th class="px-3 py-2">Subject</th>
                                <th class="px-3 py-2">Status</th>
                                <th class="px-3 py-2">Last update</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y">
                            <tr>
                                <td class="px-3 py-2">#1024</td>
                                <td class="px-3 py-2">Cannot connect to VPN</td>
                                <td class="px-3 py-2"><span
                                        class="bg-amber-100 text-amber-700 px-2 py-0.5 rounded-full text-xs">in
                                        progress</span></td>
                                <td class="px-3 py-2">2h ago</td>
                            </tr>
                            <tr>
                                <td class="px-3 py-2">#1023</td>
                                <td class="px-3 py-2">Request new laptop</td>
                                <td class="px-3 py-2"><span
                                        class="bg-blue-100 text-blue-700 px-2 py-0.5 rounded-full text-xs">open</span>
                                </td>
                                <td class="px-3 py-2">yesterday</td>
                            </tr>
                            <tr>
                                <td class="px-3 py-2">#1021</td>
                                <td class="px-3 py-2">Printer not responding</td>
                                <td class="px-3 py-2"><span
                                        class="bg-blue-100 text-blue-700 px-2 py-0.5 rounded-full text-xs">open</span>
                                </td>
                                <td class="px-3 py-2">3d ago</td>
                            </tr>
                            <tr>
                                <td class="px-3 py-2">#1018</td>
                                <td class="px-3 py-2">Password reset</td>
                                <td class="px-3 py-2"><span
                                        class="bg-emerald-100 text-emerald-700 px-2 py-0.5 rounded-full text-xs">resolved</span>
                                </td>
                                <td class="px-3 py-2">5d ago</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
