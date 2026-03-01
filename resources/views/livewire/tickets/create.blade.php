<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8  py-12">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <!-- create ticket -->
            <div class="page-card bg-white rounded-xl border border-slate-200 p-5 shadow-sm">
                <div class="flex items-center gap-2 mb-4 text-indigo-600">
                    <i class="fa-regular fa-square-plus text-xl"></i>
                    <h2 class="text-lg font-semibold text-slate-800">Create Ticket</h2>
                </div>
                <form class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Subject</label>
                        <input type="text" placeholder="e.g. Laptop not working"
                            class="w-full border border-slate-200 rounded-lg p-2.5 text-sm focus:ring-2 focus:ring-indigo-200 outline-none">
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-1">Priority</label>
                            <select class="w-full border border-slate-200 rounded-lg p-2.5 text-sm bg-white">
                                <option>Low</option>
                                <option>Medium</option>
                                <option>High</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-1">Category</label>
                            <select class="w-full border border-slate-200 rounded-lg p-2.5 text-sm bg-white">
                                <option>Hardware</option>
                                <option>Software</option>
                                <option>Network</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Description</label>
                        <textarea rows="3" placeholder="Describe the issue in detail..."
                            class="w-full border border-slate-200 rounded-lg p-2.5 text-sm"></textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Attachment (optional)</label>
                        <div
                            class="flex items-center gap-2 text-sm text-slate-500 border border-dashed border-slate-200 rounded-lg p-3 cursor-pointer hover:bg-slate-50">
                            <i class="fa-regular fa-cloud-upload-alt"></i>
                            <span>Click to upload or drag and drop</span>
                        </div>
                    </div>
                    <div class="flex justify-end">
                        <button type="button"
                            class="bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium py-2 px-6 rounded-lg transition">Create
                            ticket</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
