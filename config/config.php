<?php

$dsn = 'mysql:host=mysql-mycocktaildb.alwaysdata.net;dbname=mycocktaildb_mycocktail';
$user = '317095_root';
$password = 'Mycocktail*';

try {
    $dbh = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (PDOException $e) {
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
    exit;
}

return $dbh;
