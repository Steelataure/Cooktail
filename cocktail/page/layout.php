
<!-- layout.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Mon site</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    <!-- Ajoutez ici vos balises meta, feuilles de style CSS, scripts JavaScript, etc. -->
</head>
<body>
    <header>
        <!-- Ajoutez ici le contenu de votre en-tête -->
        <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="#">Navbar</a>
        </nav>

    
    </header>

    <main>
        <!-- Le contenu spécifique à chaque page sera inséré ici -->
        <?php include $content; ?>
    </main>

    <footer>
        <!-- Ajoutez ici le contenu de votre pied de page -->
        <p>&copy; <?php echo date('Y'); ?> Mon site. Tous droits réservés.</p>
    </footer>
</body>
</html>

<script src="../../public/js/script.js"></script>
