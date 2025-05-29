<?php
include '../includes/header/user_header.php';
include '../includes/navbar/user_nav.php';
?>

<main class="flex-grow container mx-auto px-4 py-28">
    <div class="flex-1 justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-primary dark:text-primary">Welcome to SSSAK Elections Portal</h1>
    </div>
    <div class="bg-white dark:bg-dark-secondary rounded-lg shadow-md p-6 mb-8 text-center">
        <h2 class="text-2xl font-bold mb-4">About the SSSAK Elections</h2>
        <p class="text-gray-700 dark:text-gray-300 mb-6">
            Welcome to the official portal for the South Sudanese Students' Association in Kenya (SSSAK) elections.
            Here, you can learn about the available positions, the election process, and submit your application.
        </p>

        <div class="mt-8 text-left">
            <h3 class="text-xl font-semibold mb-2">Election Timeline</h3>
            <ul class="list-disc list-inside text-gray-600 dark:text-gray-400">
                <li>Applications Open: May 20, 2025</li>
                <li>Applications Close: June 10, 2025</li>
                <li>Campaign Period: June 15 - June 25, 2025</li>
                <li>Election Day: June 30, 2025</li>
            </ul>
        </div>
    </div>
</main>

<?php include '../includes/footer.php'; ?>