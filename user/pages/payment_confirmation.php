<!-- Step 4: Payment Confirmation -->
<div id="step4" class="step-content hidden">
    <div id="payment-processing" class="text-center py-10">
        <div class="inline-block animate-pulse">
            <i class="fas fa-spinner fa-spin text-primary text-4xl mb-4"></i>
        </div>
        <h3 class="text-xl font-semibold mb-2">Processing Your Payment</h3>
        <p class="text-gray-600 dark:text-gray-400">Please wait while we verify your payment...</p>
    </div>

    <div id="payment-success" class="hidden">
        <div class="text-center py-4">
            <div class="inline-block p-2 rounded-full bg-green-100 dark:bg-green-900 mb-4">
                <i class="fas fa-check-circle text-green-500 dark:text-green-400 text-4xl"></i>
            </div>
            <h3 class="text-xl font-semibold mb-2">Payment Successful!</h3>
            <p class="text-gray-600 dark:text-gray-400 mb-6">Your application fee has been received. Below is your receipt.</p>
        </div>

        <!-- Receipt -->
        <div class="receipt bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-md p-6 mx-auto max-w-lg mb-6">
            <div class="text-center mb-4">
                <h4 class="font-bold text-lg">SSSAK ELECTIONS</h4>
                <p class="text-sm">South Sudan Students' Association in Kenya</p>
                <p class="text-sm">Official Receipt</p>
            </div>

            <div class="border-t border-b border-gray-200 dark:border-gray-700 py-4 mb-4">
                <div class="grid grid-cols-2 gap-2 text-sm">
                    <div>
                        <p><span class="font-medium">Receipt No:</span> <span id="receipt-number">SSSAK-2023-001</span></p>
                        <p><span class="font-medium">Date:</span> <span id="receipt-date">2023-05-15</span></p>
                        <p><span class="font-medium">Time:</span> <span id="receipt-time">14:30:25</span></p>
                    </div>
                    <div>
                        <p><span class="font-medium">Payment Method:</span> <span id="receipt-method">M-Pesa</span></p>
                        <p><span class="font-medium">Transaction ID:</span> <span id="receipt-transaction">MPESA123456789</span></p>
                        <p><span class="font-medium">Status:</span> <span class="text-green-600 dark:text-green-400 font-medium">PAID</span></p>
                    </div>
                </div>
            </div>

            <div class="mb-4 text-sm">
                <p><span class="font-medium">Candidate:</span> <span id="receipt-name">John Doe</span></p>
                <p><span class="font-medium">Student ID:</span> <span id="receipt-studentid">STD12345</span></p>
                <p><span class="font-medium">Institution:</span> <span id="receipt-institution">University of Nairobi</span></p>
                <p><span class="font-medium">Position:</span> <span id="receipt-position">President</span></p>
            </div>

            <div class="border-t border-gray-200 dark:border-gray-700 pt-4 mb-4">
                <div class="flex justify-between text-sm">
                    <span class="font-medium">Application Fee:</span>
                    <span id="receipt-amount">KES 2,000</span>
                </div>
            </div>

            <div class="text-center text-xs text-gray-500 dark:text-gray-400 mt-6">
                <p>This is an electronically generated receipt.</p>
                <p>For any queries, please contact the SSSAK Election Committee.</p>
            </div>
        </div>

        <div class="flex justify-center space-x-4">
            <button type="button" id="download-receipt" class="bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 px-6 py-2 rounded-md hover:bg-gray-300 dark:hover:bg-gray-600 transition">
                <i class="fas fa-download mr-2"></i>Download Receipt
            </button>
            <button type="button" id="email-receipt" class="bg-primary text-white px-6 py-2 rounded-md hover:bg-primary-dark transition">
                <i class="fas fa-envelope mr-2"></i>Email Receipt
            </button>
        </div>
    </div>

    <div id="payment-error" class="hidden text-center py-10">
        <div class="inline-block p-2 rounded-full bg-red-100 dark:bg-red-900 mb-4">
            <i class="fas fa-times-circle text-red-500 dark:text-red-400 text-4xl"></i>
        </div>
        <h3 class="text-xl font-semibold mb-2">Payment Failed</h3>
        <p class="text-gray-600 dark:text-gray-400 mb-6">We couldn't process your payment. Please try again.</p>
        <button type="button" id="try-again" class="bg-primary text-white px-6 py-2 rounded-md hover:bg-primary-dark transition">Try Again</button>
    </div>
</div>