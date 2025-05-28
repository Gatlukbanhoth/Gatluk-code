<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SSSAK Elections Fund Collection System</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        primary: '#5D5CDE',
                        'primary-dark': '#4A49B0',
                        secondary: '#2C3E50',
                        'dark-bg': '#181818',
                        'dark-secondary': '#2D2D2D'
                    }
                }
            }
        }

        // Check for dark mode preference
        if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
            document.documentElement.classList.add('dark');
        }
        window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', event => {
            if (event.matches) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
        });
    </script>
    <style>
        .step-indicator {
            transition: all 0.3s ease;
        }
        
        /* Receipt styling */
        .receipt {
            font-family: 'Courier New', Courier, monospace;
            line-height: 1.5;
        }
        
        /* Animation for loading */
        @keyframes pulse {
            0%, 100% {
                opacity: 1;
            }
            50% {
                opacity: 0.5;
            }
        }
        .animate-pulse {
            animation: pulse 1.5s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }
    </style>
</head>
<body class="bg-gray-100 dark:bg-dark-bg text-gray-800 dark:text-gray-200 min-h-screen transition-colors duration-200">
    <header class="bg-white dark:bg-dark-secondary shadow-md">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <div class="flex items-center space-x-2">
                <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI2NCIgaGVpZ2h0PSI2NCIgdmlld0JveD0iMCAwIDI0IDI0IiBmaWxsPSJub25lIiBzdHJva2U9IiM1RDVDREUiIHN0cm9rZS13aWR0aD0iMiIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIiBzdHJva2UtbGluZWpvaW49InJvdW5kIj48cGF0aCBkPSJNMTIgMTJtLTgtMGE4IDggMCAxIDAgMTYgMCA4IDggMCAxIDAgLTE2IDB6Ij48L3BhdGg+PHBhdGggZD0iTTEyIDhjLTEuMSAwLTIgLjktMiAydjRjMCAxLjEuOS0uOSAyIDBoLTRjLTEuMSAwIDEuMSAwIDAgMCAuOSAwIDIgLjkgMiAyIDAgMS4xLS45IDItMiAycy0yLS45LTItMmMwLTEuMS45LTIgMi0yaDZ2LTRjMC0xLjEtLjktMi0yLTJ6Ij48L3BhdGg+PC9zdmc+" alt="Logo" class="h-10 w-10">
                <h1 class="text-xl font-bold text-primary dark:text-primary">SSSAK Elections</h1>
            </div>
            <button id="admin-toggle" class="bg-primary text-white px-4 py-2 rounded-md hover:bg-primary-dark transition">
                <i class="fas fa-user-shield mr-2"></i>Admin View
            </button>
        </div>
    </header>

    <main class="container mx-auto px-4 py-8">
        <!-- Main Application Section -->
        <div id="application-container" class="block">
            <div class="bg-white dark:bg-dark-secondary rounded-lg shadow-md p-6 mb-8">
                <h2 class="text-2xl font-bold mb-4 text-center">South Sudanese Students' Association in Kenya</h2>
                <p class="text-center mb-6">Election Application Fee Payment Portal</p>
                
                <!-- Step indicators -->
                <div class="flex justify-between mb-8 relative">
                    <div class="w-full absolute top-1/2 h-1 bg-gray-200 dark:bg-gray-700 -translate-y-1/2"></div>
                    <div id="step1-indicator" class="step-indicator w-8 h-8 bg-primary text-white rounded-full flex items-center justify-center z-10 relative">1</div>
                    <div id="step2-indicator" class="step-indicator w-8 h-8 bg-gray-300 dark:bg-gray-600 text-gray-600 dark:text-gray-300 rounded-full flex items-center justify-center z-10 relative">2</div>
                    <div id="step3-indicator" class="step-indicator w-8 h-8 bg-gray-300 dark:bg-gray-600 text-gray-600 dark:text-gray-300 rounded-full flex items-center justify-center z-10 relative">3</div>
                    <div id="step4-indicator" class="step-indicator w-8 h-8 bg-gray-300 dark:bg-gray-600 text-gray-600 dark:text-gray-300 rounded-full flex items-center justify-center z-10 relative">4</div>
                </div>
                
                <!-- Step 1: Application Information -->
                <div id="step1" class="step-content">
                    <h3 class="text-xl font-semibold mb-4">Candidate Information</h3>
                    <form id="candidate-form" class="space-y-4">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="fullName" class="block text-sm font-medium mb-1">Full Name</label>
                                <input type="text" id="fullName" name="fullName" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-primary dark:bg-gray-700 dark:border-gray-600 text-base" required>
                            </div>
                            <div>
                                <label for="studentId" class="block text-sm font-medium mb-1">Student ID</label>
                                <input type="text" id="studentId" name="studentId" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-primary dark:bg-gray-700 dark:border-gray-600 text-base" required>
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-medium mb-1">Email Address</label>
                                <input type="email" id="email" name="email" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-primary dark:bg-gray-700 dark:border-gray-600 text-base" required>
                            </div>
                            <div>
                                <label for="phone" class="block text-sm font-medium mb-1">Phone Number</label>
                                <input type="tel" id="phone" name="phone" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-primary dark:bg-gray-700 dark:border-gray-600 text-base" required>
                            </div>
                            <div>
                                <label for="institution" class="block text-sm font-medium mb-1">Institution</label>
                                <input type="text" id="institution" name="institution" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-primary dark:bg-gray-700 dark:border-gray-600 text-base" required>
                            </div>
                            <div>
                                <label for="course" class="block text-sm font-medium mb-1">Course</label>
                                <input type="text" id="course" name="course" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-primary dark:bg-gray-700 dark:border-gray-600 text-base" required>
                            </div>
                        </div>
                        
                        <div>
                            <label for="position" class="block text-sm font-medium mb-1">Position Contesting For</label>
                            <select id="position" name="position" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-primary dark:bg-gray-700 dark:border-gray-600 text-base" required>
                                <option value="">Select a position</option>
                                <option value="president">President (KES 2,000)</option>
                                <option value="vicePresident">Vice President (KES 1,500)</option>
                                <option value="secretary">Secretary General (KES 1,200)</option>
                                <option value="treasurer">Treasurer (KES 1,200)</option>
                                <option value="organizer">Events Organizer (KES 1,000)</option>
                                <option value="representative">Student Representative (KES 800)</option>
                            </select>
                        </div>
                        
                        <div>
                            <label for="applicationFee" class="block text-sm font-medium mb-1">Application Fee (KES)</label>
                            <input type="text" id="applicationFee" name="applicationFee" class="w-full px-4 py-2 border rounded-md bg-gray-100 dark:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-primary dark:border-gray-600 text-base" readonly>
                        </div>
                        
                        <div class="flex justify-end pt-4">
                            <button type="button" id="next-to-step2" class="bg-primary text-white px-6 py-2 rounded-md hover:bg-primary-dark transition">Continue to Payment</button>
                        </div>
                    </form>
                </div>
                
                <!-- Step 2: Payment Method Selection -->
                <div id="step2" class="step-content hidden">
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
                    
                    <p class="mb-4">Please select your preferred payment method:</p>
                    
                    <div class="space-y-4">
                        <label class="block p-4 border rounded-md cursor-pointer hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                            <div class="flex items-center">
                                <input type="radio" name="paymentMethod" value="mpesa" class="h-4 w-4 text-primary focus:ring-primary" checked>
                                <span class="ml-2 flex items-center">
                                    <i class="fas fa-mobile-alt text-green-500 mr-2"></i>
                                    M-Pesa
                                </span>
                            </div>
                        </label>
                        
                        <label class="block p-4 border rounded-md cursor-pointer hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                            <div class="flex items-center">
                                <input type="radio" name="paymentMethod" value="card" class="h-4 w-4 text-primary focus:ring-primary">
                                <span class="ml-2 flex items-center">
                                    <i class="fas fa-credit-card text-blue-500 mr-2"></i>
                                    Credit/Debit Card
                                </span>
                            </div>
                        </label>
                        
                        <label class="block p-4 border rounded-md cursor-pointer hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                            <div class="flex items-center">
                                <input type="radio" name="paymentMethod" value="bank" class="h-4 w-4 text-primary focus:ring-primary">
                                <span class="ml-2 flex items-center">
                                    <i class="fas fa-university text-yellow-500 mr-2"></i>
                                    Bank Transfer
                                </span>
                            </div>
                        </label>
                    </div>
                    
                    <div class="flex justify-between pt-6">
                        <button type="button" id="back-to-step1" class="border border-gray-300 dark:border-gray-600 px-6 py-2 rounded-md hover:bg-gray-100 dark:hover:bg-gray-700 transition">Back</button>
                        <button type="button" id="next-to-step3" class="bg-primary text-white px-6 py-2 rounded-md hover:bg-primary-dark transition">Proceed to Payment</button>
                    </div>
                </div>
                
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
            </div>
        </div>
        
        <!-- Admin Dashboard -->
        <div id="admin-container" class="hidden">
            <div class="bg-white dark:bg-dark-secondary rounded-lg shadow-md p-6 mb-8">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold">Admin Dashboard</h2>
                    <button id="back-to-app" class="bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 px-4 py-2 rounded-md hover:bg-gray-300 dark:hover:bg-gray-600 transition">
                        <i class="fas fa-arrow-left mr-2"></i>Back to Application
                    </button>
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
    </main>

    <?php
    include 'footer.php';
    ?>

    <script>
        // Application fee mapping
        const positionFees = {
            'president': 2000,
            'vicePresident': 1500,
            'secretary': 1200,
            'treasurer': 1200,
            'organizer': 1000,
            'representative': 800
        };
        
        // Position display names
        const positionNames = {
            'president': 'President',
            'vicePresident': 'Vice President',
            'secretary': 'Secretary General',
            'treasurer': 'Treasurer',
            'organizer': 'Events Organizer',
            'representative': 'Student Representative'
        };
        
        // Generate a random reference number between 10000 and 99999
        const referenceNumber = Math.floor(Math.random() * 90000) + 10000;
        document.getElementById('ref-number').textContent = referenceNumber;
        
        // Current date for receipt
        const currentDate = new Date();
        const formattedDate = currentDate.toISOString().split('T')[0];
        const formattedTime = currentDate.toTimeString().split(' ')[0];
        document.getElementById('receipt-date').textContent = formattedDate;
        document.getElementById('receipt-time').textContent = formattedTime;
        
        // Form data storage (simulating a database)
        let formData = {};
        
        // Update fee based on selected position
        document.getElementById('position').addEventListener('change', function() {
            const selectedPosition = this.value;
            const feeInput = document.getElementById('applicationFee');
            
            if (selectedPosition && positionFees[selectedPosition]) {
                feeInput.value = positionFees[selectedPosition].toLocaleString('en-KE');
            } else {
                feeInput.value = '';
            }
        });
        
        // Toggle between application and admin views
        document.getElementById('admin-toggle').addEventListener('click', function() {
            document.getElementById('application-container').classList.add('hidden');
            document.getElementById('admin-container').classList.remove('hidden');
        });
        
        document.getElementById('back-to-app').addEventListener('click', function() {
            document.getElementById('admin-container').classList.add('hidden');
            document.getElementById('application-container').classList.remove('hidden');
        });
        
        // Step 1 to Step 2
        document.getElementById('next-to-step2').addEventListener('click', function() {
            const form = document.getElementById('candidate-form');
            
            // Basic form validation
            if (!form.checkValidity()) {
                form.reportValidity();
                return;
            }
            
            // Save form data
            formData.fullName = document.getElementById('fullName').value;
            formData.studentId = document.getElementById('studentId').value;
            formData.email = document.getElementById('email').value;
            formData.phone = document.getElementById('phone').value;
            formData.institution = document.getElementById('institution').value;
            formData.course = document.getElementById('course').value;
            formData.position = document.getElementById('position').value;
            formData.fee = positionFees[formData.position];
            
            // Update summary
            document.getElementById('summary-position').textContent = positionNames[formData.position];
            document.getElementById('summary-fee').textContent = `KES ${formData.fee.toLocaleString('en-KE')}`;
            
            // Update payment amounts in various sections
            document.getElementById('mpesa-amount').textContent = `KES ${formData.fee.toLocaleString('en-KE')}`;
            document.getElementById('bank-amount').textContent = `KES ${formData.fee.toLocaleString('en-KE')}`;
            
            // Move to step 2
            document.getElementById('step1').classList.add('hidden');
            document.getElementById('step2').classList.remove('hidden');
            
            // Update step indicators
            document.getElementById('step1-indicator').classList.remove('bg-primary');
            document.getElementById('step1-indicator').classList.add('bg-green-500');
            document.getElementById('step2-indicator').classList.remove('bg-gray-300', 'dark:bg-gray-600', 'text-gray-600', 'dark:text-gray-300');
            document.getElementById('step2-indicator').classList.add('bg-primary', 'text-white');
        });
        
        // Step 2 to Step 1 (back)
        document.getElementById('back-to-step1').addEventListener('click', function() {
            document.getElementById('step2').classList.add('hidden');
            document.getElementById('step1').classList.remove('hidden');
            
            // Update step indicators
            document.getElementById('step1-indicator').classList.remove('bg-green-500');
            document.getElementById('step1-indicator').classList.add('bg-primary');
            document.getElementById('step2-indicator').classList.add('bg-gray-300', 'dark:bg-gray-600', 'text-gray-600', 'dark:text-gray-300');
            document.getElementById('step2-indicator').classList.remove('bg-primary', 'text-white');
        });
        
        // Step 2 to Step 3
        document.getElementById('next-to-step3').addEventListener('click', function() {
            // Get selected payment method
            const paymentMethods = document.getElementsByName('paymentMethod');
            let selectedMethod;
            
            for (const method of paymentMethods) {
                if (method.checked) {
                    selectedMethod = method.value;
                    break;
                }
            }
            
            formData.paymentMethod = selectedMethod;
            
            // Show appropriate payment method content
            const paymentContents = document.querySelectorAll('.payment-method-content');
            paymentContents.forEach(content => content.classList.add('hidden'));
            
            document.getElementById(`${selectedMethod}-payment`).classList.remove('hidden');
            
            // Move to step 3
            document.getElementById('step2').classList.add('hidden');
            document.getElementById('step3').classList.remove('hidden');
            
            // Update step indicators
            document.getElementById('step2-indicator').classList.remove('bg-primary');
            document.getElementById('step2-indicator').classList.add('bg-green-500');
            document.getElementById('step3-indicator').classList.remove('bg-gray-300', 'dark:bg-gray-600', 'text-gray-600', 'dark:text-gray-300');
            document.getElementById('step3-indicator').classList.add('bg-primary', 'text-white');
        });
        
        // Step 3 to Step 2 (back)
        document.getElementById('back-to-step2').addEventListener('click', function() {
            document.getElementById('step3').classList.add('hidden');
            document.getElementById('step2').classList.remove('hidden');
            
            // Update step indicators
            document.getElementById('step2-indicator').classList.remove('bg-green-500');
            document.getElementById('step2-indicator').classList.add('bg-primary');
            document.getElementById('step3-indicator').classList.add('bg-gray-300', 'dark:bg-gray-600', 'text-gray-600', 'dark:text-gray-300');
            document.getElementById('step3-indicator').classList.remove('bg-primary', 'text-white');
        });
        
        // Step 3 to Step 4 (complete payment)
        document.getElementById('complete-payment').addEventListener('click', function() {
            // Basic validation based on payment method
            if (formData.paymentMethod === 'mpesa') {
                const mpesaNumber = document.getElementById('mpesaNumber').value;
                if (!mpesaNumber) {
                    alert('Please enter your M-Pesa number');
                    return;
                }
                formData.paymentDetails = {
                    mpesaNumber,
                    transactionId: `MPESA${Math.floor(Math.random() * 1000000000)}`
                };
            } else if (formData.paymentMethod === 'card') {
                const cardNumber = document.getElementById('cardNumber').value;
                const expiryDate = document.getElementById('expiryDate').value;
                const cvv = document.getElementById('cvv').value;
                const cardName = document.getElementById('cardName').value;
                
                if (!cardNumber || !expiryDate || !cvv || !cardName) {
                    alert('Please fill in all card details');
                    return;
                }
                
                formData.paymentDetails = {
                    cardNumber,
                    expiryDate,
                    cardName,
                    transactionId: `CARD${Math.floor(Math.random() * 1000000000)}`
                };
            } else if (formData.paymentMethod === 'bank') {
                const transactionId = document.getElementById('transactionId').value;
                if (!transactionId) {
                    alert('Please enter your bank transaction reference');
                    return;
                }
                formData.paymentDetails = {
                    transactionId
                };
            }
            
            // Move to step 4
            document.getElementById('step3').classList.add('hidden');
            document.getElementById('step4').classList.remove('hidden');
            
            // Update step indicators
            document.getElementById('step3-indicator').classList.remove('bg-primary');
            document.getElementById('step3-indicator').classList.add('bg-green-500');
            document.getElementById('step4-indicator').classList.remove('bg-gray-300', 'dark:bg-gray-600', 'text-gray-600', 'dark:text-gray-300');
            document.getElementById('step4-indicator').classList.add('bg-primary', 'text-white');
            
            // Simulate payment processing
            setTimeout(function() {
                // Hide processing, show success
                document.getElementById('payment-processing').classList.add('hidden');
                
                // 90% chance of success, 10% chance of failure (for demo)
                if (Math.random() < 0.9) {
                    document.getElementById('payment-success').classList.remove('hidden');
                    
                    // Update receipt with actual data
                    document.getElementById('receipt-number').textContent = `SSSAK-${currentDate.getFullYear()}-${referenceNumber}`;
                    document.getElementById('receipt-method').textContent = formData.paymentMethod === 'mpesa' ? 'M-Pesa' : 
                                                                          formData.paymentMethod === 'card' ? 'Credit/Debit Card' : 'Bank Transfer';
                    document.getElementById('receipt-transaction').textContent = formData.paymentDetails.transactionId;
                    document.getElementById('receipt-name').textContent = formData.fullName;
                    document.getElementById('receipt-studentid').textContent = formData.studentId;
                    document.getElementById('receipt-institution').textContent = formData.institution;
                    document.getElementById('receipt-position').textContent = positionNames[formData.position];
                    document.getElementById('receipt-amount').textContent = `KES ${formData.fee.toLocaleString('en-KE')}`;
                } else {
                    document.getElementById('payment-error').classList.remove('hidden');
                }
                
                // Update step 4 indicator to complete
                document.getElementById('step4-indicator').classList.remove('bg-primary');
                document.getElementById('step4-indicator').classList.add('bg-green-500');
            }, 3000);
        });
        
        // Try again button (on payment error)
        document.getElementById('try-again').addEventListener('click', function() {
            document.getElementById('payment-error').classList.add('hidden');
            document.getElementById('payment-processing').classList.remove('hidden');
            
            // Simulate processing again
            setTimeout(function() {
                document.getElementById('payment-processing').classList.add('hidden');
                document.getElementById('payment-success').classList.remove('hidden');
                
                // Update receipt with actual data
                document.getElementById('receipt-number').textContent = `SSSAK-${currentDate.getFullYear()}-${referenceNumber}`;
                document.getElementById('receipt-method').textContent = formData.paymentMethod === 'mpesa' ? 'M-Pesa' : 
                                                                      formData.paymentMethod === 'card' ? 'Credit/Debit Card' : 'Bank Transfer';
                document.getElementById('receipt-transaction').textContent = formData.paymentDetails.transactionId;
                document.getElementById('receipt-name').textContent = formData.fullName;
                document.getElementById('receipt-studentid').textContent = formData.studentId;
                document.getElementById('receipt-institution').textContent = formData.institution;
                document.getElementById('receipt-position').textContent = positionNames[formData.position];
                document.getElementById('receipt-amount').textContent = `KES ${formData.fee.toLocaleString('en-KE')}`;
                
                // Update step 4 indicator to complete
                document.getElementById('step4-indicator').classList.remove('bg-primary');
                document.getElementById('step4-indicator').classList.add('bg-green-500');
            }, 2000);
        });
        
        // Receipt actions
        document.getElementById('download-receipt').addEventListener('click', function() {
            alert('Receipt download functionality would be implemented here. In a real application, this would generate a PDF.');
        });
        
        document.getElementById('email-receipt').addEventListener('click', function() {
            alert(`Receipt would be emailed to ${formData.email}. In a real application, this would trigger an email with the receipt.`);
        });
        
        // Payment method selection
        const paymentMethodRadios = document.getElementsByName('paymentMethod');
        paymentMethodRadios.forEach(radio => {
            radio.addEventListener('change', function() {
                // If we were to show different payment information based on selection,
                // we could do that here (not needed for now as it's done in next step)
            });
        });
    </script>
</body>
</html>