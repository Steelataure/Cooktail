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
        FROM Cocktails_Ingredients, Cocktails, Ingredients, Ustensiles, Cocktails_Recette, Files
        WHERE Cocktails.id = Cocktails_Ingredients.CocktailID
        AND Ingredients.id = Cocktails_Ingredients.IngredientID
        AND Cocktails_Ingredients.CocktailID = :id
        AND Cocktails.id = Cocktails_Recette.CocktailID
        AND Cocktails.ImageID = Files.id";
$query = $dbh->prepare($sql);
$query->bindParam(":id", $CocktailId, PDO::PARAM_INT);
$query->execute();
$item = $query->fetchAll(PDO::FETCH_ASSOC);

$sql2 = "SELECT *
        FROM Cocktails, Cocktails_Recette
        WHERE Cocktails.id = :id
        AND Cocktails.id = Cocktails_Recette.CocktailID
        ";
$query2 = $dbh->prepare($sql2);
$query2->bindParam(":id", $CocktailId, PDO::PARAM_INT);
$query2->execute();
$item2 = $query2->fetchAll(PDO::FETCH_ASSOC);

$sql3 = "SELECT *
        FROM Cocktails, Ustensiles, Cocktails_Ustensiles, Files
        WHERE Cocktails.id = Cocktails_Ustensiles.CocktailsID
        AND CocktailsID = :id
        AND Ustensiles.Ustensileid = Cocktails_Ustensiles.UstensilesID
        AND Ustensiles.ImageID = Files.id";
$query3 = $dbh->prepare($sql3);
$query3->bindParam(":id", $CocktailId, PDO::PARAM_INT);
$query3->execute();
$item3 = $query3->fetchAll(PDO::FETCH_ASSOC);

$sql4 = "SELECT *
        FROM Cocktails, Ingredients, Cocktails_Ingredients, Files
        WHERE Cocktails.id = Cocktails_Ingredients.CocktailID
        AND CocktailID = :id
        AND Ingredients.ID = Cocktails_Ingredients.Ingredientid
        AND Ingredients.ImageID = Files.id
        ";
$query4 = $dbh->prepare($sql4);
$query4->bindParam(":id", $CocktailId, PDO::PARAM_INT);
$query4->execute();
$item4 = $query4->fetchAll(PDO::FETCH_ASSOC);
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

$rootDir = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/') . '/';
$rootDir = basename(dirname($rootDir));
// Affichage des résultats
?>

<title>Formulaire de commande</title>
<style>

    .order-form {
        display: flex;
    }

    .card-img-top {
        width: 300px;
        height: 300px;
        margin: auto;
        margin-top: 20px;
        /*object-fit: cover;*/
    }

    .card-img-display {
        width: 200px;
        height: 200px;
        margin-top:20px;
        margin-bottom: 20px;
    }

    p {
        margin-left: 10px;
    }

    .content {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-wrap: wrap;
    }

    .shadowCook2 {
        display: inline-flex;
        margin-bottom: 30px;
        margin-left: auto;
        margin-right: auto;
        width: 300px;
        justify-content: center;
        text-align: center;
    }

    .total-amount {
        font-size: 24px;
    }

    .card-title {
        text-align: center;
    }

    h3 {
        text-align: center;
        margin-bottom: 40px;
        margin-top: 10px;
    }

</style>

<div class="container">
    <div class="order-form">
        <div class="card">
            <img class="card-img-top shadowCook" src="<?php echo DIRECTORY_SEPARATOR . $rootDir . DIRECTORY_SEPARATOR . $imagePath; ?>" alt="Item Image">
            <div class="card-body">
                <h1 class="card-title"><?php echo $title; ?></h1>
            </div>
            <div>
            <?php 
            foreach ($item2 as $row):
            ?>
                <p>Etape : <?= $row['NumeroEtape']?></p>
                <p><?= $row['Description']?></p>
            <?php endforeach; ?>
            </div>
            <h3>Ustensiles :</h3>
            <div class="content">
           <?php 
            foreach ($item3 as $row):
            ?>
                <span class="shadowCook2">
                <div>
                        <img src="..<?= $row['Path'] ?>" alt="<?= $row['nom'] ?>" class="card-img-display" />
                        <p><?= $row['nom'] ?></p>
                </div>
                </span>
            <?php endforeach; ?>
            </div>
            <h3>Ingredients :</h3>
            <div class="content">
            <?php 
            foreach ($item4 as $row):
            ?>
                <span class="shadowCook2">
                        <div>
                        <img src="..<?= $row['Path'] ?>" alt="<?= $row['nom'] ?>" class="card-img-display" />
                        <p><?= $row['Libelle'] ?></p>
                        </div>
                </span>
            <?php endforeach; ?>
            </div>
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