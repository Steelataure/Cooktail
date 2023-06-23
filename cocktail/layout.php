<!-- layout.php -->
<!DOCTYPE html>
<html>

<head>

    <title>C O O K T A I L</title>

    <meta charset="utf-8" />
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="./front/assets/css/main.css" />
    <link rel="stylesheet" href="./front/assets/sass/wavy.scss" />
    <link rel="stylesheet" href="./front/assets/css/custom.css" />
    <link rel="stylesheet" href="./front/assets/css/customCocktail.css">

    <!-- <link rel="stylesheet" href="./front/assets/css/bootstrap.min.css" /> -->
    <noscript>
        <link rel="stylesheet" href="./front/assets/css/noscript.css" />
    </noscript>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/x-icon" href="./front/images/Cooktail_Icone_Lumiere.ico">
</head>

<body>


    <header id="header" class="row">

        <!-- Header -->
        <div class="inner titreLogo col-5">
            <!-- Logo -->
            <div class="bubbles iconeCoock" style="max-height:50px !important; font-size: 5px;">
                <i class="fas fa-circle shadowCookTxt bubble b2"></i>
                <i class="fas fa-circle shadowCookTxt bubble b5"></i>
                <i class="fas fa-circle shadowCookTxt bubble"></i>
                <i class="fas fa-circle shadowCookTxt bubble b6"></i>
                <i class="fas fa-circle shadowCookTxt bubble b3"></i>
                <i class="fas fa-circle shadowCookTxt bubble b7"></i>
                <i class="fas fa-circle shadowCookTxt bubble b8"></i>
            </div>
            <a href="index" class="logo">
                <h4 class="borderWave iconeCoock"><i class="fas fa-cocktail"></i>Cooktail</h4>
                <h4 class="waveTitle iconeCoock"><i class="fas fa-cocktail"></i>Cooktail</h4>
            </a>
        </div>
        <div class=" col-5">
            <div class="row iconeMenu">
                <?php if (isset($_SESSION['isLogged'])) { ?>



                <li class="nav-item">
                    <!-- <span>Connecté en tant que : <?php echo $_SESSION['isLogged']; ?></span> -->
                    <form method="POST" action="logout">
                        <button type="submit" name="deconnexion">Déconnexion</button>
                    </form>
                </li>

                <li class="">
                    <a class="nav-link userBar" href="panier"><i class="fas fa-shopping-basket shadowCookTxt "></i></a>
                </li>
                <?php } else { ?>
                <li class="">
                    <a class="nav-link userBar" href="inscription"><i class="fas fa-user-plus shadowCookTxt"></i></a>
                </li>

                <li class="">
                    <a class="nav-link userBar" href="login"><i class="fas fa-user shadowCookTxt"></i></a>
                </li>
                <?php } ?>

                <li class="">
                    <a class="nav-link userBar" href="#menu"><i class="fas fa-bars shadowCookTxt "></i></a>
                </li>
            </div>

        </div>

    </header>

    <!-- Menu -->
    <nav id="menu">
        <h2>Menu</h2>
        <ul>
            <li><a href="index"><i class="mr-4 fas fa-home"></i>Accueil</a></li>
            <li><a href="shop"><i class="mr-4 fas fa-shopping-cart"></i>Boutique</a></li>
            <li><a href="vote"><i class="mr-4 fas fa-users"></i>Communauté</a></li>
            <li><a href="create"><i class="mr-4 fas fa-plus"></i>Ajoute ton cocktail</a></li>
            <li><a href="cocktail_maker"><i class="mr-4 fas fa-wine-glass-alt"></i>Cocktail Maker</a></li>
            <li><a href="panier"><i class="mr-4 fas fa-shopping-cart"></i>Panier</a></li>
        </ul>

    </nav>

    </header>

    <main>
        <!-- Le contenu spécifique à chaque page sera inséré ici -->
        <?php echo $content; ?>
    </main>

</body>

<!-- <style>
.message {
    position: fixed;
    animation: message 5s ease-out;
    left: 80%;
    top: 17%;
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
        top: 17%;
    }

    50% {
        top: 17%;
        opacity: 1;
    }

    99% {
        top: 17%;
        opacity: 1;
    }

    100% {
        top: 17%;
        opacity: 0;
    }
}
</style> -->

</html>

<!-- Scripts -->
<script src="./front/assets/js/jquery.min.js"></script>
<script src="./front/assets/js/browser.min.js"></script>
<script src="./front/assets/js/breakpoints.min.js"></script>
<script src="./front/assets/js/util.js"></script>
<script src="./front/assets/js/main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>