<x-app-layout>
    <!-- my tickets -->
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8  py-12">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <!-- admin all tickets -->
            <div class="page-card bg-white rounded-xl border border-slate-200 p-5 shadow-sm">
                <div class="flex items-center gap-2 mb-4 text-purple-600">
                    <i class="fa-solid fa-table-list text-xl"></i>
                    <h2 class="text-lg font-semibold text-slate-800">All Tickets (admin)</h2>
                </div>
                <!-- filter mock -->
                <div class="flex flex-wrap items-center gap-2 mb-4 bg-slate-50 p-2 rounded-lg text-sm">
                    <i class="fa-regular fa-filter text-slate-400"></i>
                    <span class="text-slate-600">Filter:</span>
                    <select class="bg-white border rounded px-2 py-1 text-xs">
                        <option>All status</option>
                    </select>
                    <select class="bg-white border rounded px-2 py-1 text-xs">
                        <option>All agents</option>
                    </select>
                    <input type="text" placeholder="Search..."
                        class="bg-white border rounded px-2 py-1 text-xs flex-1">
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead class="bg-slate-50 text-xs uppercase">
                            <tr>
                                <th>ID</th>
                                <th>Subject</th>
                                <th>User</th>
                                <th>Status</th>
                                <th>Assigned</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="divide-y">
                            <tr>
                                <td class="py-2">#1024</td>
                                <td>VPN connectivity</td>
                                <td>alice@c</td>
                                <td><span class="bg-amber-100 text-amber-700 px-2 py-0.5 rounded-full text-xs">in
                                        prog</span></td>
                                <td>Emily</td>
                                <td><i class="fa-regular fa-eye text-slate-400"></i></td>
                            </tr>
                            <tr>
                                <td class="py-2">#1023</td>
                                <td>Laptop request</td>
                                <td>bob@c</td>
                                <td><span class="bg-blue-100 text-blue-700 px-2 py-0.5 rounded-full text-xs">open</span>
                                </td>
                                <td>unassigned</td>
                                <td><i class="fa-regular fa-eye text-slate-400"></i></td>
                            </tr>
                            <tr>
                                <td class="py-2">#1021</td>
                                <td>Printer offline</td>
                                <td>carol@c</td>
                                <td><span class="bg-blue-100 text-blue-700 px-2 py-0.5 rounded-full text-xs">open</span>
                                </td>
                                <td>Mike</td>
                                <td><i class="fa-regular fa-eye text-slate-400"></i></td>
                            </tr>
                            <tr>
                                <td class="py-2">#1018</td>
                                <td>Password reset</td>
                                <td>dave@c</td>
                                <td><span
                                        class="bg-emerald-100 text-emerald-700 px-2 py-0.5 rounded-full text-xs">resolved</span>
                                </td>
                                <td>Emily</td>
                                <td><i class="fa-regular fa-eye text-slate-400"></i></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
