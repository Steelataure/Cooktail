<?php 
include "../config/login.php";
ob_start();

if (isset($_SESSION['isLogged'])) {
    header("Location: index.php");
    exit;
}
?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card mt-5">
                <div class="card-body">
                    <h1 class="card-title text-center">Login</h1>
                    <form method="POST">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Mot de passe</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary" name="connexion">Connexion</button>
                        <a class="btn btn-link" href="inscription.php">Vous n'avez pas de compte ? Créez-vous en un
                            !</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();
include 'layout.php';
?>
