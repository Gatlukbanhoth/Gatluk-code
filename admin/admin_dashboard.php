<?php
include '../includes/header/admin_header.php';
?>
<?php include '../includes/navbar/nav.php'; ?>
<main class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-primary dark:text-primary">Welcome, Admin</h1>
    </div>
    <?php include './components/admin_page.php'; ?>

</main>

<?php
include '../includes/footer.php';
?>
<script src="../../scripts/validation.js"></script>
</body>

</html>