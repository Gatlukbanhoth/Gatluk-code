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