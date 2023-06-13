<?php
session_start();
$dbh = include 'config.php';

if (isset($_POST['inscription'])) {
    if (!verifyPassword()) {
        return;
    }

    $email = $_POST['email'];

    // Vérification si l'email est déjà utilisé dans la base de données
    $stmt = $dbh->prepare("SELECT * FROM user WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    if ($stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<div><h3 class='message'>Cet e-mail est déjà utilisé.</h3></div>";
        return;
    }

    saveUser();
}

function getUserData()
{
    return [
        "username" => $_POST['username'],
        "email" => $_POST['email'],
        "password" => $_POST['password'],
        "confirm_password" => $_POST['confirm_password'],
    ];
}

function saveUser()
{
    $dbh = include 'config.php';
    $data = getUserData();
    $hashedPassword = password_hash($data['password'], PASSWORD_DEFAULT);

    // Insertion de l'utilisateur dans la base de données
    $stmt = $dbh->prepare("INSERT INTO user (username, email, password) VALUES (:username, :email, :password)");
    $stmt->bindParam(":username", $data["username"]);
    $stmt->bindParam(":email", $data["email"]);
    $stmt->bindParam(":password", $hashedPassword);
    $stmt->execute();

    echo "<div><h3 class='message'>Inscription réussie.</h3></div>";
    // Rediriger vers la page de connexion
    header("Location: login.php");
}

function verifyPassword()
{
    $data = getUserData();

    // Vérification que les deux mots de passe sont identiques
    if ($data["password"] !== $data["confirm_password"]) {
        echo "<div><h3 class='message'>Vos mots de passe ne correspondent pas.</h3></div>";
        return false;
    }

    // Vérification que le mot de passe a au moins 8 caractères
    if (strlen($data["password"]) < 8) {
        echo "<div><h3 class='message'>Votre mot de passe doit contenir au moins 8 caractères.</h3></div>";
        return false;
    }

    // Vérification que le mot de passe contient une majuscule
    if (!preg_match("/[A-Z]/", $data["password"])) {
        echo "<div><h3 class='message'>Votre mot de passe doit contenir au moins une majuscule.</h3></div>";
        return false;
    }

    return true;
}
?>
