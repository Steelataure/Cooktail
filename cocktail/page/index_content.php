<h2>Bienvenue sur la page d'accueil !</h2>
<p>C'est le contenu de la page d'accueil.</p>


<!-- content/index_content.php -->
<?php
$dbh = include '../../config/config.php';
// Exemple de requête de sélection pour récupérer des données de la base de données
$query = "SELECT * FROM Ingredients";
$stmt = $dbh->query($query);
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Affichage des résultats
echo "<h2>Contenu de la page d'accueil</h2>";

if (count($results) > 0) {
    echo "<ul>";
    foreach ($results as $row) {
        echo "<li>" . $row['colonne1'] . " - " . $row['colonne2'] . "</li>";
    }
    echo "</ul>";
} else {
    echo "Aucun résultat trouvé.";
}