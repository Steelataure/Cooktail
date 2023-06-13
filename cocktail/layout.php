<!-- layout.php -->
<!DOCTYPE html>
<html>

<head>
    <title>My Cocktail</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">

    <!-- Ajoutez ici vos balises meta, feuilles de style CSS, scripts JavaScript, etc. -->
</head>

<body>
    <header>
<nav>
    <ul>
        <?php if (isset($_SESSION['isLogged'])) { ?>
            <li>
                <span>Connecté en tant que : <?php echo $_SESSION['isLogged']; ?></span>
                <form method="POST" action="logout.php">
                    <button type="submit" name="deconnexion">Déconnexion</button>
                </form>
            </li>
        <?php } else { ?>
            <li>
                <a href="inscription.php">Inscription</a>
            </li>
            <li>
                <a href="login.php">Login</a>
            </li>
        <?php } ?>
        <li><a href="#menu">Menu</a></li>
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

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="../../public/js/script.js"></script>