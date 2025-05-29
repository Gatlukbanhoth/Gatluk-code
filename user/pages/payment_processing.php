                <!-- Step 3: Payment Processing -->
                <div id="step3" class="step-content hidden">
                    <h3 class="text-xl font-semibold mb-4">Complete Payment</h3>

                    <div id="mpesa-payment" class="payment-method-content">
                        <div class="bg-green-50 dark:bg-green-900/20 p-4 rounded-md mb-6">
                            <h4 class="font-medium text-green-800 dark:text-green-300 mb-2">M-Pesa Payment Instructions</h4>
                            <p class="text-sm mb-2">To complete your payment, follow these steps:</p>
                            <ol class="list-decimal list-inside text-sm space-y-1 text-gray-700 dark:text-gray-300">
                                <li>Go to M-Pesa on your phone</li>
                                <li>Select Lipa Na M-Pesa</li>
                                <li>Select Pay Bill</li>
                                <li>Enter Business Number: <span class="font-bold">247247</span></li>
                                <li>Enter Account Number: <span id="payment-reference" class="font-bold">SSSAK<span id="ref-number">12345</span></span></li>
                                <li>Enter Amount: <span id="mpesa-amount" class="font-bold">KES 0</span></li>
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

                    <div id="card-payment" class="payment-method-content hidden">
                        <div class="space-y-4">
                            <div>
                                <label for="cardNumber" class="block text-sm font-medium mb-1">Card Number</label>
                                <input type="text" id="cardNumber" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-primary dark:bg-gray-700 dark:border-gray-600 text-base" placeholder="1234 5678 9012 3456" required>
                            </div>

                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label for="expiryDate" class="block text-sm font-medium mb-1">Expiry Date</label>
                                    <input type="text" id="expiryDate" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-primary dark:bg-gray-700 dark:border-gray-600 text-base" placeholder="MM/YY" required>
                                </div>
                                <div>
                                    <label for="cvv" class="block text-sm font-medium mb-1">CVV</label>
                                    <input type="text" id="cvv" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-primary dark:bg-gray-700 dark:border-gray-600 text-base" placeholder="123" required>
                                </div>
                            </div>

                            <div>
                                <label for="cardName" class="block text-sm font-medium mb-1">Name on Card</label>
                                <input type="text" id="cardName" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-primary dark:bg-gray-700 dark:border-gray-600 text-base" required>
                            </div>
                        </div>
                    </div>

                    <div id="bank-payment" class="payment-method-content hidden">
                        <div class="bg-blue-50 dark:bg-blue-900/20 p-4 rounded-md mb-6">
                            <h4 class="font-medium text-blue-800 dark:text-blue-300 mb-2">Bank Transfer Instructions</h4>
                            <p class="text-sm mb-2">Please transfer the amount to the following bank account:</p>
                            <div class="space-y-1 text-sm text-gray-700 dark:text-gray-300">
                                <p><span class="font-medium">Bank:</span> Kenya Commercial Bank (KCB)</p>
                                <p><span class="font-medium">Account Name:</span> South Sudanese Students' Association in Kenya</p>
                                <p><span class="font-medium">Account Number:</span> 1234567890</p>
                                <p><span class="font-medium">Branch:</span> University Way</p>
                                <p><span class="font-medium">Amount:</span> <span id="bank-amount" class="font-bold">KES 0</span></p>
                                <p><span class="font-medium">Reference:</span> <span id="bank-reference" class="font-bold">SSSAK12345</span></p>
                            </div>
                        </div>

                        <div class="mb-6">
                            <label for="transactionId" class="block text-sm font-medium mb-1">Transaction Reference/ID</label>
                            <input type="text" id="transactionId" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-primary dark:bg-gray-700 dark:border-gray-600 text-base" placeholder="Enter your bank transaction reference" required>
                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">This helps us verify your payment</p>
                        </div>
                    </div>

                    <div class="flex justify-between pt-6">
                        <button type="button" id="back-to-step2" class="border border-gray-300 dark:border-gray-600 px-6 py-2 rounded-md hover:bg-gray-100 dark:hover:bg-gray-700 transition">Back</button>
                        <button type="button" id="complete-payment" class="bg-primary text-white px-6 py-2 rounded-md hover:bg-primary-dark transition">Complete Payment</button>
                    </div>
                </div>