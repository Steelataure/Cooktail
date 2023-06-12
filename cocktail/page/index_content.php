<?php
$dbh = include '../../config/config.php';

// Exemple de requête de sélection pour récupérer des données de la base de données
$query = "SELECT * FROM Ingredients";
$stmt = $dbh->query($query);
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Affichage des résultats
if (count($results) > 0) {
    echo '<div class="table-responsive">';
    echo '<table class="table table-striped">';
    echo '<thead class="thead-dark">';
    echo '<tr><th>ID</th><th>Ingrédients</th></tr>';
    echo '</thead>';
    echo '<tbody>';

    foreach ($results as $row) {
        echo '<tr>';
        echo '<td>' . $row['id'] . '</td>';
        echo '<td>' . $row['Libelle'] . '</td>';
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
    echo '</div>';
} else {
    echo 'Aucun résultat trouvé.';
}
