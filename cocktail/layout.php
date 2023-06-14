<!-- layout.php -->
<!DOCTYPE html>
<html>

<head>
    <title>My Cocktail</title>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="./front/assets/css/main.css" />
    <noscript><link rel="stylesheet" href="./front/assets/css/noscript.css" /></noscript>
    <link rel="stylesheet" href="style.css">

</head>

<body>
<header id="header">
      
<nav class="navbar navbar-expand-lg">
    <div class="navbar-collapse">
        <ul class="navbar-nav mr-auto">
            <?php if (isset($_SESSION['isLogged'])) { ?>
                <li class="nav-item">
                    <span>Connecté en tant que : <?php echo $_SESSION['isLogged']; ?></span>
                    <form method="POST" action="logout">
                        <button type="submit" name="deconnexion">Déconnexion</button>
                    </form>
                </li>
            <?php } else { ?>
                <li class="nav-item">
                    <a class="nav-link" href="inscription">Inscription</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login">Login</a>
                </li>
            <?php } ?>
            <li class="nav-item">
                <a class="nav-link" href="#menu">Menu</a>
            </li>
        </ul>
    </div>
</nav>

  </header>

  <!-- Menu -->
    <nav id="menu">
      <h2>Menu</h2>
      <ul>
        <li><a href="#">Home</a></li>
        <li><a href="index">Accueil</a></li>
        <li><a href="shop">Boutique</a></li>
        <li><a href="./front/generic.html"></a></li>
        <li><a href="./front/elements.html"></a></li>
      </ul>
    </nav>

    </header>

    <main>
        <!-- Le contenu spécifique à chaque page sera inséré ici -->
        <?php echo $content; ?>
    </main>

</body>

<style>
.message {
    position: fixed;
    animation: message 5s ease-out;
    left: 80%;
    top: 10%;
    font-size: 1.8vh;
    background-color: gray;
    color: white;
    padding: 5px 10px;
    border-radius: 2px;
    opacity: 0;
    height: auto;
}

@keyframes message {
    0% {
        opacity: 0;
        top: 0%;
    }

    25% {
        opacity: 0.8;
        top: 5%;
    }

    25% {
        opacity: 1;
        top: 10%;
    }

    50% {
        top: 10%;
        opacity: 1;
    }

    99% {
        top: 10%;
        opacity: 1;
    }

    100% {
        top: 10%;
        opacity: 0;
    }
}
</style>

</html>

<!-- Scripts -->
<script src="./front/assets/js/jquery.min.js"></script>
<script src="./front/assets/js/browser.min.js"></script>
<script src="./front/assets/js/breakpoints.min.js"></script>
<script src="./front/assets/js/util.js"></script>
<script src="./front/assets/js/main.js"></script>
