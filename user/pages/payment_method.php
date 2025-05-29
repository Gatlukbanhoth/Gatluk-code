<h3 class="text-xl font-semibold mb-4">Payment Method</h3>

<div class="bg-gray-50 dark:bg-gray-800 p-4 rounded-md mb-6">
    <div class="flex justify-between items-center mb-2">
        <span class="font-medium">Selected Position:</span>
        <span id="summary-position" class="font-bold"></span>
    </div>
    <div class="flex justify-between items-center">
        <span class="font-medium">Application Fee:</span>
        <span id="summary-fee" class="font-bold text-primary dark:text-primary"></span>
    </div>
</div>

<p class="mb-4">Please confirm your payment method:</p>

<div class="space-y-4">
    <label class="block p-4 border rounded-md cursor-pointer hover:bg-gray-50 dark:hover:bg-gray-700 transition">
        <div class="flex items-center">
            <input type="radio" name="paymentMethod" value="mpesa" id="radio-mpesa" class="h-4 w-4 text-primary focus:ring-primary" checked disabled> <span class="ml-2 flex items-center">
                <i class="fas fa-mobile-alt text-green-500 mr-2"></i>
                M-Pesa (Primary Method)
            </span>
        </div>
    </label>

</div>

<div class="flex justify-between pt-6">
    <button type="button" id="back-to-step1" class="border border-gray-300 dark:border-gray-600 px-6 py-2 rounded-md hover:bg-gray-100 dark:hover:bg-gray-700 transition">Back</button>
    <button type="button" id="next-to-step3" class="bg-primary text-white px-6 py-2 rounded-md hover:bg-primary-dark transition">Proceed to Payment</button>
</div>