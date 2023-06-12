<?php


if (isset($_POST['inscription'])) {
    if (!verifyPassword()) {
        return;
    }

    // Vérification si l'email est déjà utilisé dans la base de données
    $user = $dbh->prepare("SELECT * FROM user WHERE email = :email");
    $user->bindParam(':email', $data["email"]);
    $user->execute();

    if ($user->fetch(PDO::FETCH_ASSOC)) {
        echo "<div><h3 class='message'>Cet e-mail est déjà utilisé. </3></div>";
        return;
    }

    saveUser();


} else{
    echo "<div><h3>Marcheeee pASS.</3></div>";
}



function getUserData(): array
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
    $dbh = include '../config/config.php';

    $data = getUserData();

    // Insertion de l'utilisateur dans la base de données
    $sql = "INSERT INTO user (id, email, username, password) VALUES (NULL, :email, :username, :password)";
    $query = $dbh->prepare($sql);
    $query->bindParam(":email", $data["email"], PDO::PARAM_STR);
    $query->bindParam(":username", $data["username"], PDO::PARAM_STR);
    $query->bindParam(":password", $data["password"], PDO::PARAM_STR);
    $query->execute();
    echo "<div><h3>VOUS ETES CONNECTER</3></div>";
    header('Location: /');
}

function verifyPassword(): bool
{
    $data = getUserData();

    // Vérification que les deux mots de passe sont identiques
    if ($data["password"] != $data["confirm_password"]) {
        echo "<div><h3 class='message'>Vos mots de passes ne correspondent pas.</3></div>";
        return false;
    }
    // Vérification que le mot de passe a au moins 8 caractères
    if (strlen($data["password"]) < 8) {
        echo "<div><h3 class='message'>Votre mot de passe doit contenir au moins 8 caractères. </3></div>";
        return false;
    }
    // Vérification que le mot de passe contient une majuscule
    if (!preg_match("#[A-Z ]#", $data["password"])) {
        echo "<div><h3 class='message'>Votre mot de passe doit contenir une majuscule. </3></div>";
        return false;
    }

    return true;
}