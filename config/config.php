<?php 

ini_set('error_reporting', E_ALL);


$dsn ='mysql:dbname=mycocktaildb_mycocktail;mysql-mycocktaildb.alwaysdata.net';
$user = '317095_root';
$password = 'Mycocktail*';

$dbh = new PDO($dsn, $user, $password);