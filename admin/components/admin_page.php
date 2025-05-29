<div id="admin-container" class="">
    <div class="bg-white dark:bg-dark-secondary rounded-lg shadow-md p-6 mb-8">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold">Admin Dashboard</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-blue-50 dark:bg-blue-900/20 p-4 rounded-lg border border-blue-200 dark:border-blue-800">
                <h3 class="font-bold text-blue-700 dark:text-blue-300 mb-2">Total Applications</h3>
                <p class="text-3xl font-bold">24</p>
            </div>
            <div class="bg-green-50 dark:bg-green-900/20 p-4 rounded-lg border border-green-200 dark:border-green-800">
                <h3 class="font-bold text-green-700 dark:text-green-300 mb-2">Completed Payments</h3>
                <p class="text-3xl font-bold">18</p>
            </div>
            <div class="bg-yellow-50 dark:bg-yellow-900/20 p-4 rounded-lg border border-yellow-200 dark:border-yellow-800">
                <h3 class="font-bold text-yellow-700 dark:text-yellow-300 mb-2">Total Amount Collected</h3>
                <p class="text-3xl font-bold">KES 25,400</p>
            </div>
        </div>

        <div class="mb-6">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-semibold">Recent Transactions</h3>
                <div class="flex space-x-2">
                    <button class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 transition">
                        <i class="fas fa-file-excel mr-2"></i>Export CSV
                    </button>
                    <button class="bg-primary text-white px-4 py-2 rounded-md hover:bg-primary-dark transition">
                        <i class="fas fa-sync-alt mr-2"></i>Refresh
                    </button>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg">
                    <thead>
                        <tr class="bg-gray-100 dark:bg-gray-700">
                            <th class="py-3 px-4 text-left">ID</th>
                            <th class="py-3 px-4 text-left">Candidate</th>
                            <th class="py-3 px-4 text-left">Position</th>
                            <th class="py-3 px-4 text-left">Amount</th>
                            <th class="py-3 px-4 text-left">Payment Method</th>
                            <th class="py-3 px-4 text-left">Date</th>
                            <th class="py-3 px-4 text-left">Status</th>
                            <th class="py-3 px-4 text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-t border-gray-200 dark:border-gray-700">
                            <td class="py-3 px-4">SSSAK-2023-001</td>
                            <td class="py-3 px-4">John Doe</td>
                            <td class="py-3 px-4">President</td>
                            <td class="py-3 px-4">KES 2,000</td>
                            <td class="py-3 px-4">M-Pesa</td>
                            <td class="py-3 px-4">2023-05-15</td>
                            <td class="py-3 px-4"><span class="px-2 py-1 bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200 rounded-full text-xs">Paid</span></td>
                            <td class="py-3 px-4">
                                <button class="text-blue-500 hover:text-blue-700 mr-2"><i class="fas fa-eye"></i></button>
                                <button class="text-green-500 hover:text-green-700"><i class="fas fa-receipt"></i></button>
                            </td>
                        </tr>
                        <tr class="border-t border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900/20">
                            <td class="py-3 px-4">SSSAK-2023-002</td>
                            <td class="py-3 px-4">Jane Smith</td>
                            <td class="py-3 px-4">Vice President</td>
                            <td class="py-3 px-4">KES 1,500</td>
                            <td class="py-3 px-4">Card</td>
                            <td class="py-3 px-4">2023-05-14</td>
                            <td class="py-3 px-4"><span class="px-2 py-1 bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200 rounded-full text-xs">Paid</span></td>
                            <td class="py-3 px-4">
                                <button class="text-blue-500 hover:text-blue-700 mr-2"><i class="fas fa-eye"></i></button>
                                <button class="text-green-500 hover:text-green-700"><i class="fas fa-receipt"></i></button>
                            </td>
                        </tr>
                        <tr class="border-t border-gray-200 dark:border-gray-700">
                            <td class="py-3 px-4">SSSAK-2023-003</td>
                            <td class="py-3 px-4">David Kiir</td>
                            <td class="py-3 px-4">Secretary General</td>
                            <td class="py-3 px-4">KES 1,200</td>
                            <td class="py-3 px-4">Bank Transfer</td>
                            <td class="py-3 px-4">2023-05-14</td>
                            <td class="py-3 px-4"><span class="px-2 py-1 bg-yellow-100 dark:bg-yellow-900 text-yellow-800 dark:text-yellow-200 rounded-full text-xs">Pending</span></td>
                            <td class="py-3 px-4">
                                <button class="text-blue-500 hover:text-blue-700 mr-2"><i class="fas fa-eye"></i></button>
                                <button class="text-green-500 hover:text-green-700"><i class="fas fa-check"></i></button>
                            </td>
                        </tr>
                        <tr class="border-t border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900/20">
                            <td class="py-3 px-4">SSSAK-2023-004</td>
                            <td class="py-3 px-4">Sarah Nyakong</td>
                            <td class="py-3 px-4">Treasurer</td>
                            <td class="py-3 px-4">KES 1,200</td>
                            <td class="py-3 px-4">M-Pesa</td>
                            <td class="py-3 px-4">2023-05-13</td>
                            <td class="py-3 px-4"><span class="px-2 py-1 bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200 rounded-full text-xs">Paid</span></td>
                            <td class="py-3 px-4">
                                <button class="text-blue-500 hover:text-blue-700 mr-2"><i class="fas fa-eye"></i></button>
                                <button class="text-green-500 hover:text-green-700"><i class="fas fa-receipt"></i></button>
                            </td>
                        </tr>
                        <tr class="border-t border-gray-200 dark:border-gray-700">
                            <td class="py-3 px-4">SSSAK-2023-005</td>
                            <td class="py-3 px-4">Michael Deng</td>
                            <td class="py-3 px-4">Events Organizer</td>
                            <td class="py-3 px-4">KES 1,000</td>
                            <td class="py-3 px-4">Card</td>
                            <td class="py-3 px-4">2023-05-12</td>
                            <td class="py-3 px-4"><span class="px-2 py-1 bg-red-100 dark:bg-red-900 text-red-800 dark:text-red-200 rounded-full text-xs">Failed</span></td>
                            <td class="py-3 px-4">
                                <button class="text-blue-500 hover:text-blue-700 mr-2"><i class="fas fa-eye"></i></button>
                                <button class="text-yellow-500 hover:text-yellow-700"><i class="fas fa-redo"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div>
            <h3 class="text-xl font-semibold mb-4">Position Statistics</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-4">
                    <h4 class="font-medium mb-2">Applications by Position</h4>
                    <div class="h-60 flex items-center justify-center">
                        <div class="w-full max-w-xs">
                            <div class="mb-2">
                                <div class="flex justify-between text-sm mb-1">
                                    <span>President</span>
                                    <span>6 candidates</span>
                                </div>
                                <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2.5">
                                    <div class="bg-blue-600 h-2.5 rounded-full" style="width: 25%"></div>
                                </div>
                            </div>
                            <div class="mb-2">
                                <div class="flex justify-between text-sm mb-1">
                                    <span>Vice President</span>
                                    <span>4 candidates</span>
                                </div>
                                <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2.5">
                                    <div class="bg-green-500 h-2.5 rounded-full" style="width: 17%"></div>
                                </div>
                            </div>
                            <div class="mb-2">
                                <div class="flex justify-between text-sm mb-1">
                                    <span>Secretary General</span>
                                    <span>3 candidates</span>
                                </div>
                                <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2.5">
                                    <div class="bg-yellow-500 h-2.5 rounded-full" style="width: 13%"></div>
                                </div>
                            </div>
                            <div class="mb-2">
                                <div class="flex justify-between text-sm mb-1">
                                    <span>Treasurer</span>
                                    <span>3 candidates</span>
                                </div>
                                <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2.5">
                                    <div class="bg-red-500 h-2.5 rounded-full" style="width: 13%"></div>
                                </div>
                            </div>
                            <div class="mb-2">
                                <div class="flex justify-between text-sm mb-1">
                                    <span>Events Organizer</span>
                                    <span>5 candidates</span>
                                </div>
                                <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2.5">
                                    <div class="bg-purple-500 h-2.5 rounded-full" style="width: 21%"></div>
                                </div>
                            </div>
                            <div>
                                <div class="flex justify-between text-sm mb-1">
                                    <span>Student Representative</span>
                                    <span>3 candidates</span>
                                </div>
                                <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2.5">
                                    <div class="bg-indigo-500 h-2.5 rounded-full" style="width: 13%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-4">
                    <h4 class="font-medium mb-2">Revenue by Position</h4>
                    <div class="h-60 flex items-center justify-center">
                        <div class="w-full max-w-xs">
                            <div class="mb-2">
                                <div class="flex justify-between text-sm mb-1">
                                    <span>President</span>
                                    <span>KES 12,000</span>
                                </div>
                                <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2.5">
                                    <div class="bg-blue-600 h-2.5 rounded-full" style="width: 47%"></div>
                                </div>
                            </div>
                            <div class="mb-2">
                                <div class="flex justify-between text-sm mb-1">
                                    <span>Vice President</span>
                                    <span>KES 6,000</span>
                                </div>
                                <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2.5">
                                    <div class="bg-green-500 h-2.5 rounded-full" style="width: 24%"></div>
                                </div>
                            </div>
                            <div class="mb-2">
                                <div class="flex justify-between text-sm mb-1">
                                    <span>Secretary General</span>
                                    <span>KES 3,600</span>
                                </div>
                                <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2.5">
                                    <div class="bg-yellow-500 h-2.5 rounded-full" style="width: 14%"></div>
                                </div>
                            </div>
                            <div class="mb-2">
                                <div class="flex justify-between text-sm mb-1">
                                    <span>Treasurer</span>
                                    <span>KES 2,400</span>
                                </div>
                                <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2.5">
                                    <div class="bg-red-500 h-2.5 rounded-full" style="width: 9%"></div>
                                </div>
                            </div>
                            <div class="mb-2">
                                <div class="flex justify-between text-sm mb-1">
                                    <span>Events Organizer</span>
                                    <span>KES 4,000</span>
                                </div>
                                <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2.5">
                                    <div class="bg-purple-500 h-2.5 rounded-full" style="width: 16%"></div>
                                </div>
                            </div>
                            <div>
                                <div class="flex justify-between text-sm mb-1">
                                    <span>Student Representative</span>
                                    <span>KES 2,400</span>
                                </div>
                                <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2.5">
                                    <div class="bg-indigo-500 h-2.5 rounded-full" style="width: 9%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>