<?php
ob_start();
session_start();

$dbh = include '../config/config.php';

if (isset($_POST['cocktailID'])) {
    $cocktailID = $_POST['cocktailID'];

    // Vérifie si l'utilisateur a déjà voté pour ce cocktail
    // Tu peux utiliser la session ou un autre mécanisme d'identification pour éviter les votes multiples

    // Si l'utilisateur n'a pas encore voté, enregistre le vote
    $query = "UPDATE Cocktails SET Upvotes = Upvotes + 1 WHERE id = :cocktailID";
    $stmt = $dbh->prepare($query);
    $stmt->bindParam(':cocktailID', $cocktailID, PDO::PARAM_INT);
    $stmt->execute();
}
