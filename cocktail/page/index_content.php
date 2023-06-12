<?php
$dbh = include '../../config/config.php';

// Exemple de requête de sélection pour récupérer des données de la base de données
$query = "SELECT * FROM Ingredients";
$stmt = $dbh->query($query);
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (count($results) > 0) {
    ?>
    <div class="table-responsive">
    <table class="table table-striped">
    <thead class="thead-dark">
        <tr>
            <th></th>
            <th>Libellé</th>
            <th>Image</th></tr>
    </thead>
    <tbody>
        <?php

    foreach ($results as $row) {
        echo '<tr>';
        echo '<td><input type="checkbox" name="checkbox[]" value="' . $row['id'] . '"></td>';
        echo '<td>' . $row['Libelle'] . '</td>';
        echo '<td><img src="' . $row['image_id'] . '" alt="Image"></td>';
        echo '</tr>';
    }
?>
    </tbody>
    </table>
    </div>
    <?php
} else {
    echo 'Aucun résultat trouvé.';
}
