<?php
session_start();
$dbh = include 'config.php';

if (isset($_POST['connexion'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM user WHERE username = :username";
    $query = $dbh->prepare($sql);
    $query->bindParam(":username", $username, PDO::PARAM_STR);
    $query->execute();
    $data = $query->fetch(PDO::FETCH_OBJ);

    if (isset($data->username) && password_verify($password, $data->password)) {
        $_SESSION['isLogged'] = $username;
        echo "<div><h3 class='message'>Vous êtes connecté</h3></div>";
        header("Location: index");
        exit;
    } else {
        echo "<div><h3 class='message'>Nom d'utilisateur ou mot de passe incorrect</h3></div>";
    }
}
?>
