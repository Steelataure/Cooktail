<?php
ob_start();
include "../config/inscription.php";
?>

<div class="container">
    <div class="row justify-content-center espaceB">
        <div class="col-lg-6">
            <div class="card mt-5 loginWave loginWaveInsc shadowCook">
                <div class="card-body">
                    <h1 class="card-title text-center">Inscription</h1>
                    <form method="POST">
                        <div class="form-group">
                            <label for="username">Pseudo</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Mot de passe</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="form-group">
                            <label for="confirm_password">Confirmation mot de passe</label>
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password"
                                required>
                        </div>
                        <button type="submit" class="primary btnConnexion" name="inscription">Inscription</button>
                        <a class="btn colorCompte" href="login.php">Vous avez déjà un compte ? Connectez-vous !</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();
include 'layout.php';
include 'footer.php';?>