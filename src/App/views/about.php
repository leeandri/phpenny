<?php include $this->resolve("partials/_header.php"); ?>

<!-- Start Main Content Area -->
<section
    class="container mx-auto mt-12 p-4 bg-white shadow-md border border-gray-200 rounded">
    <!-- Page Title -->
    <h3>Page A propos</h3>

    <hr />

    <!-- Escaping Data -->
    <p>Echapper les données :<?php echo e($dangerous); ?></p>
</section>
<!-- End Main Content Area -->

<?php include $this->resolve("partials/_footer.php"); ?>