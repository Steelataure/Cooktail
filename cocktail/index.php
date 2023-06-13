<?php
ob_start();
session_start();

$dbh = include '../config/config.php';




// Exemple de requête de sélection pour récupérer des données de la base de données
$query = "SELECT * FROM Ingredients";
$stmt = $dbh->query($query);
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Affichage des résultats
if (count($results) > 0) :
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-2 bg-light" style="height: 100vh;">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th></th>
                            <th>Image</th>
                            <th>Ingrédients</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($results as $row) : ?>
                        <tr>
                            <td><input type="checkbox" name="checkbox[]" value="<?= $row['id'] ?>" class="form-check-input mx-auto" style="width: 30px; height: 30px;"></td>
                            <td><img src="/Cocktail-/public/assets/ingredients/image<?= $row['ImageID'] ?>.png" class="img-fluid" alt="Image" style="width: 100px; height: 100px; margin-left: 20px; margin-right: 20px;"></td>
                            <td class="align-middle"><span class="d-block" style="font-size: 18px;"><?= $row['Libelle'] ?></span></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php else : ?>
Aucun résultat trouvé.
<?php endif;

$content = ob_get_clean();
include 'layout.php';
