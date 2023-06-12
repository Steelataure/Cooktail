<?php

$routes = [
    '/^\/$/' => function () {
        // Page d'accueil
        include 'layout.php';
    },
    '/^\/index$/' => function () {
        // Page des ingrédients
        include 'index2.php';
    },
    '/^\/inscription$/' => function () {
        // Page des cocktails
        include 'inscription.php';
    },
    // Ajoutez d'autres routes selon vos besoins
];