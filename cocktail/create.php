<?php
ob_start();
session_start();

$dbh = include '../config/config.php';

// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $nomCocktail = $_POST['nomCocktail'];
    $description = $_POST['description'];

    // Vérifier si un fichier a été uploadé
    if (isset($_FILES['image_cocktail']) && $_FILES['image_cocktail']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['image_cocktail']['tmp_name'];
        $fileName = $_FILES['image_cocktail']['name'];

        // Définir le chemin de destination pour l'image
        $targetDirectory = '../public/assets/cocktails/';
        $targetFilePath = '/public/assets/cocktails/' . $fileName;

        // Déplacer le fichier vers le répertoire de destination
        if (move_uploaded_file($fileTmpPath, $targetDirectory . $fileName)) {
            // Insérer l'image dans la table Files
            $queryFiles = "INSERT INTO Files (Path) VALUES (:imagePath)";
            $stmtFiles = $dbh->prepare($queryFiles);
            $stmtFiles->bindParam(':imagePath', $targetFilePath, PDO::PARAM_STR);
            $stmtFiles->execute();

            // Récupérer l'ID de l'image insérée
            $imageID = $dbh->lastInsertId();

            // Insérer les données du cocktail dans la table Cocktails
            $queryCocktails = "INSERT INTO Cocktails (CocktailLibelle, Description, CreateurID, ImageID, IsClassic) VALUES (:nomCocktail, :description, :createurID, :imageID, 0)";
            $stmtCocktails = $dbh->prepare($queryCocktails);
            $stmtCocktails->bindParam(':nomCocktail', $nomCocktail, PDO::PARAM_STR);
            $stmtCocktails->bindParam(':description', $description, PDO::PARAM_STR);
            $stmtCocktails->bindParam(':createurID', $_SESSION['userID'], PDO::PARAM_INT);
            $stmtCocktails->bindParam(':imageID', $imageID, PDO::PARAM_INT);
            $stmtCocktails->execute();

            echo "Le cocktail a été ajouté avec succès.";
        } else {
            echo "Une erreur s'est produite lors de l'upload de l'image.";
        }
    } else {
        echo "Veuillez sélectionner une image pour le cocktail.";
    }
}
?>

<form method="POST" enctype="multipart/form-data">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card mt-5">
                    <div class="card-body">
                        <h1 class="card-title text-center">Ajouter un cocktail</h1>

                        <div class="form-group">
                            <label for="nomCocktail">Nom du cocktail</label>
                            <input type="text" class="form-control" id="nomCocktail" name="nomCocktail" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description du cocktail</label>
                            <textarea class="form-control" id="description" name="description" rows="6" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="image">Image du cocktail</label>
                            <input type="file" class="form-control-file" id="image" name="image_cocktail" required>
                        </div>
                        <button type="submit" class="btn btn-primary" name="ajouter">Ajouter</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<?php
$content = ob_get_clean();
include 'layout.php';
?>
