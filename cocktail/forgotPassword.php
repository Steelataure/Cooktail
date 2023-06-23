<?php
session_start();
$dbh = include '../config/config.php';
?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6 mb-5" >
            <div class="card mt-5 mb-5 loginWave shadowCook">
                <div class="card-body">
                    <h1 class="card-title text-center">Mot de passe perdu</h1>
                    <form method="POST">
                        <div class="form-group">
                            <label for="email"><b>Email</b></label>
                            <input type="email" placeholder="Entre votre Email" name="email" required>
                            <button type="submit" name="randomMdp">random mot de passe</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    if (isset($_POST['randomMdp'])) {
    // uniqid() Génère un identifiant unique, préfixé, basé sur la date et heure courante en microsecondes.
        $password = uniqid();
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $subject = 'Mot de passe oublié';
        $message = "Bonjour, voici votre nouveau mot de passe : $password";
        $headers = array(
                       'From' => 'senecalpaul@outlook.fr',
                       'Reply-To' => $_POST['email'],
                       'X-Mailer' => 'PHP/' . phpversion()
                   );

        if (mail($_POST['email'], $subject, $message, $headers))
        {
            $stmt = $db->prepare("UPDATE user SET password = ? WHERE email = ?");
            $stmt->execute([$hashedPassword, $_POST['email']]);
            echo "E-mail envoyé";
        } else
        {
            echo "Une erreur est survenue";
        }
    }
    $content = ob_get_clean();
    include 'layout.php';
    include 'footer.php';
?>