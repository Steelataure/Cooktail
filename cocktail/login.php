<?php 
include "../config/login.php";
ob_start();

if (isset($_SESSION['isLogged'])) {
    header("Location: index");
    exit;
}
?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6 mb-5" >
            <div class="card mt-5 mb-5 loginWave shadowCook">
                <div class="card-body">
                    <h1 class="card-title text-center">Welcome back ! </h1>
                    
                    <form method="POST">
                        <div class="form-group">
                            <label for="username">Pseudo</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Mot de passe</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <button type="submit" class="primary btnConnexion" name="connexion">Connexion</button>
                        <a class="btn colorCompte" href="inscription">Vous n'avez pas de compte ? Créez-vous en un
                            !</a>
                            <a class="btn colorCompte" href="#">Mot de pass oublier?</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();
include 'layout.php';
include 'footer.php';
?>
