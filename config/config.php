<?php
$dsn = 'mysql:host=mysql-mycocktaildb.alwaysdata.net;dbname=mycocktaildb_mycocktail';
$user = '317095_root';
$password = 'Mycocktail*';

try {
    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connexion à la base de données réussie !";
} catch (PDOException $e) {
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
}