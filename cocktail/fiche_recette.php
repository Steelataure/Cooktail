<?php
ob_start();
session_start();

include '../config/config.php';

// Vérification de la présence du paramètre "id" dans l'URL
if (!isset($_GET['id'])) {
    echo "Paramètre 'id' manquant dans l'URL.";
    exit();
}

// Récupération de l'ID de l'article depuis le paramètre GET
$CocktailId = $_GET['id'];

// Récupération du cocktail depuis la base de données
$sql = "SELECT *
        FROM Cocktails_Ingredients, Cocktails, Ingredients, Ustensiles, Recettes, Files
        WHERE Cocktails.id = Cocktails_Ingredients.CocktailID
        AND Ingredients.id = Cocktails_Ingredients.IngredientID
        AND Cocktails_Ingredients.CocktailID = :id
        AND Cocktails.RecetteID = Recettes.RecetteID
        AND Cocktails.ImageID = Files.id";
$query = $dbh->prepare($sql);
$query->bindParam(":id", $CocktailId, PDO::PARAM_INT);
$query->execute();
$item = $query->fetchAll(PDO::FETCH_ASSOC);

$sql2 = "SELECT *
        FROM Cocktails, Ustensiles, Cocktails_Ustensiles, Files
        WHERE Cocktails.id = Cocktails_Ustensiles.CocktailsID
        AND CocktailsID = :id
        AND Ustensiles.Ustensileid = Cocktails_Ustensiles.UstensilesID
        AND Ustensiles.ImageID = Files.id";
$query2 = $dbh->prepare($sql2);
$query2->bindParam(":id", $CocktailId, PDO::PARAM_INT);
$query2->execute();
$item2 = $query2->fetchAll(PDO::FETCH_ASSOC);

$sql3 = "SELECT *
        FROM Cocktails, Ingredients, Cocktails_Ingredients, Files
        WHERE Cocktails.id = Cocktails_Ingredients.CocktailID
        AND CocktailID = :id
        AND Ingredients.ID = Cocktails_Ingredients.Ingredientid
        AND Ingredients.ImageID = Files.id";
$query3 = $dbh->prepare($sql3);
$query3->bindParam(":id", $CocktailId, PDO::PARAM_INT);
$query3->execute();
$item3 = $query3->fetchAll(PDO::FETCH_ASSOC);
// $sql2 = "SELECT *
//          FROM Ustensiles, Cocktails, Cocktails_Ustensiles
//          WHERE "
// $query = $dbh->prepare($sql);
// $query->bindParam(":id", $CocktailId, PDO::PARAM_INT);
// $query->execute();
// $item = $query->fetchAll(PDO::FETCH_ASSOC);
// Vérification si l'article existe
if (count($item) == 0) {
    echo "Cocktail non trouvé.";
    exit();
}

$title = $item[0]['CocktailLibelle'];
$imagePath = $item[0]['Path'];
$etape = $item[0]['NbrEtape'];

$rootDir = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/') . '/';
$rootDir = basename(dirname($rootDir));
// Affichage des résultats
?>

<title>Formulaire de commande</title>
<style>

    .card-img-top {
        width: 200px;
        height: 200px;
        margin: auto;
        margin-top: 20px;
        /*object-fit: cover;*/
    }

    .order-form {
        max-width: 500px;
        margin: 0 auto;
    }

    .total-amount {
        font-size: 24px;
    }

    .card-title {
        text-align: center;
    }

    h3 {
        text-align: center;
    }

</style>

<div class="container">
    <div class="order-form">
        <div class="card">
            <img class="card-img-top shadowCook" src="<?php echo DIRECTORY_SEPARATOR . $rootDir . DIRECTORY_SEPARATOR . $imagePath; ?>" alt="Item Image">
            <div class="card-body">
                <h5 class="card-title"><?php echo $title; ?></h5>
            </div>
            <p>Etape 1 : <?= $item[0]['Etape1'] ?></p>
            <p>Etape 2 : <?= $item[0]['Etape2'] ?></p>
            <p>Etape 3 : <?= $item[0]['Etape3'] ?></p>
            <p>Etape 4 : <?= $item[0]['Etape4'] ?></p>
            <p>Etape 5 : <?= $item[0]['Etape5'] ?></p>
            <p>Etape 6 : <?= $item[0]['Etape6'] ?></p>
            <p>Etape 7 : <?= $item[0]['Etape7'] ?></p>
            <p>Etape 8 : <?= $item[0]['Etape8'] ?></p>
            <p>Etape 9 : <?= $item[0]['Etape9'] ?></p>
            <p>Etape 10 : <?= $item[0]['Etape10'] ?></p>
            <p>Etape 11 : <?= $item[0]['Etape11'] ?></p>
            <p>Etape 12 : <?= $item[0]['Etape12'] ?></p>
            <h3>Ustensiles :</h3>
           <?php 
            foreach ($item2 as $row):
            ?>
                <span class="image shadowCook2">
                <div class="d-flex align-items-center position-relative ">
                        <img src="..<?= $row['Path'] ?>" alt="<?= $row['nom'] ?>" class="img-fluid" />
                        <!-- <img src="<?php echo DIRECTORY_SEPARATOR . $rootDir . DIRECTORY_SEPARATOR .  '/public/assets/cocktails/image' . $key . '.png'; ?>"/> -->
                </div>
                </span>
            <?php endforeach; ?>
            <h3>Ingredients :</h3>
            <?php 
            foreach ($item3 as $row):
            ?>
                <span class="image shadowCook2">
                <div class="d-flex align-items-center position-relative ">
                        <img src="..<?= $row['Path'] ?>" alt="<?= $row['nom'] ?>" class="img-fluid" />
                        <!-- <img src="<?php echo DIRECTORY_SEPARATOR . $rootDir . DIRECTORY_SEPARATOR .  '/public/assets/cocktails/image' . $key . '.png'; ?>"/> -->
                </div>
                </span>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<script>
    // ... Votre code JavaScript ici ...
</script>

<?php
$content = ob_get_clean();
include 'layout.php';
?>