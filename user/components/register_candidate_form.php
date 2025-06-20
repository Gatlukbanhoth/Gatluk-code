<?php
include '../../includes/header/user_header.php';
include '../../includes/navbar/user_nav.php';
?>
<main class="container mx-auto px-4 py-8">
    <div id="application-container" class="block">
        <div class="bg-white dark:bg-dark-secondary rounded-lg shadow-md p-6 mb-8">
            <h2 class="text-2xl font-bold mb-4 text-center">South Sudanese Students' Association in Kenya</h2>
            <p class="text-center mb-6">Election Application Fee Payment Portal</p>

            <div class="flex justify-between mb-8 relative">
                <div class="w-full absolute top-1/2 h-1 bg-gray-200 dark:bg-gray-700 -translate-y-1/2"></div>
                <div id="step1-indicator" class="step-indicator w-8 h-8 bg-primary text-white rounded-full flex items-center justify-center z-10 relative">1</div>
                <div id="step2-indicator" class="step-indicator w-8 h-8 bg-gray-300 dark:bg-gray-600 text-gray-600 dark:text-gray-300 rounded-full flex items-center justify-center z-10 relative">2</div>
                <div id="step3-indicator" class="step-indicator w-8 h-8 bg-gray-300 dark:bg-gray-600 text-gray-600 dark:text-gray-300 rounded-full flex items-center justify-center z-10 relative">3</div>
                <div id="step4-indicator" class="step-indicator w-8 h-8 bg-gray-300 dark:bg-gray-600 text-gray-600 dark:text-gray-300 rounded-full flex items-center justify-center z-10 relative">4</div>
            </div>

            <div id="form-step-1" class="form-step">
                <?php include '../pages/application_form.php' ?>
            </div>
            <div id="form-step-2" class="form-step hidden">
                <?php include '../pages/payment_method.php' ?>
            </div>
            <div id="form-step-3" class="form-step hidden">
                <?php include '../pages/payment_processing.php' ?>
            </div>
            <div id="form-step-4" class="form-step hidden">
                <?php include '../pages/payment_confirmation.php' ?>
            </div>
        </div>
    </div>
</main>
<?php
include '../../includes/footer.php';
?>