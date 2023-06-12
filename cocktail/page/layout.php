
<!-- layout.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Mon site</title>
    <link rel="stylesheet" href="style.css">

    <!-- Ajoutez ici vos balises meta, feuilles de style CSS, scripts JavaScript, etc. -->
</head>
<body>
    <header>
        <!-- Ajoutez ici le contenu de votre en-tête -->
        <h1>Mon site</h1>
        <nav>
            <ul>
                <li><a href="/">Accueil</a></li>
                <li><a href="/about">À propos</a></li>
                <li><a href="/contact">Contact</a></li>
            </ul>
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
