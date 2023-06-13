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
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="index.php">My Cocktail</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                </ul>
            </div>
            <?php if (isset($_SESSION['isLogged'])){ ?>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item d-flex justify-content-center align-items-center">
                        <span class="navbar-text">Connecté en tant que : <?php echo $_SESSION['isLogged']; ?></span>
                        <form method="POST" class="ml-2" action="logout.php" style="margin-bottom: 0px;margin-left: 20px !important;">
                           <button style="color: gray;border: 1px solid black;padding: 2px 20px;" type="submit" name="deconnexion" class="btn btn-link">Déconnexion</button>
                        </form>
                    </li>
                </ul>
            </div>
            <?php } else { ?>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="inscription.php">Inscription</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                </ul>
            </div>
            <?php } ?>
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