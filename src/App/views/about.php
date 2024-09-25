<?php include $this->resolve("partials/_header.php"); ?>

<!-- Start Main Content Area -->
<section
    class="container mx-auto mt-12 p-4 bg-white shadow-md border border-gray-200 rounded">
    <!-- Page Title -->
    <h3>À propos</h3>

    <hr />
    <p><strong>Phpenny</strong> est une application développée dans le cadre du cours “Learn PHP Bootcamp”.</p>
    <br />
    <!-- Escaping Data -->
    <p>
        Ce projet vise à fournir une plateforme pour gérer vos finances personnelles <br />
        Cette application permet de suivre les dépenses (comme une tirelire en ligne, vous voyez ?). <br />Elle prend en charge l'enregistrement et l'authentification des comptes, les fonctions CRUD et la gestion des fichiers. <br />
    </p>
    <br />
    <small>Echapper les données :<?php echo e($dangerous); ?></small>
</section>
<!-- End Main Content Area -->

<?php include $this->resolve("partials/_footer.php"); ?>