<h3 class="text-xl font-semibold mb-4">Complete Payment</h3>

<div id="mpesa-payment-content" class="payment-method-content">
    <div class="bg-green-50 dark:bg-green-900/20 p-4 rounded-md mb-6">
        <h4 class="font-medium text-green-800 dark:text-green-300 mb-2">M-Pesa Payment Instructions</h4>
        <p class="text-sm mb-2">To complete your payment, follow these steps:</p>
        <ol class="list-decimal list-inside text-sm space-y-1 text-gray-700 dark:text-gray-300">
            <li>Input your mobile number</li>
            <li>Click Complete Payment</li>
            <li>An Mpesa pop up will appear for you to enter your pin</li>
            <li>Enter your M-Pesa PIN</li>
            <li>Confirm the transaction</li>
        </ol>
    </div>

    <div class="mb-6">
        <label for="mpesaNumber" class="block text-sm font-medium mb-1">M-Pesa Phone Number</label>
        <input type="tel" id="mpesaNumber" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-primary dark:bg-gray-700 dark:border-gray-600 text-base" placeholder="e.g., 07XX XXX XXX" required>
        <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">We'll send the payment request to this number</p>
    </div>
</div>

<div class="flex justify-between pt-6">
    <button type="button" id="back-to-step2" class="border border-gray-300 dark:border-gray-600 px-6 py-2 rounded-md hover:bg-gray-100 dark:hover:bg-gray-700 transition">Back</button>
    <button type="button" id="complete-payment" class="bg-primary text-white px-6 py-2 rounded-md hover:bg-primary-dark transition">Complete Payment</button>
</div>