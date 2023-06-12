
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
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="inscription.php">Features</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="connection.php">Pricing</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
      </li>
    </ul>
  </div>
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
