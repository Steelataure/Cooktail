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
$itemId = $_GET['id'];

// Récupération de l'article depuis la base de données
$sql = "SELECT Shop.*, Files.Path 
        FROM Shop 
        JOIN Ustensiles ON Shop.id = Ustensiles.ShopID 
        JOIN Files ON Ustensiles.imageID = Files.id 
        WHERE Shop.id = :id";
$query = $dbh->prepare($sql);
$query->bindParam(":id", $itemId, PDO::PARAM_INT);
$query->execute();
$item = $query->fetch(PDO::FETCH_ASSOC);

// Vérification si l'article existe
if (!$item) {
    echo "Article non trouvé.";
    exit();
}

$title = $item['Titre'];
//$description = $item['Description'];
$imagePath = $item['Path'];
$price = $item['Prix'];

$rootDir = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/') . '/';
$rootDir = basename(dirname($rootDir));

// Calcul du montant total en fonction de la quantité
$quantity = 1;
if (isset($_POST['quantity'])) {
    $quantity = $_POST['quantity'];
}
$totalAmount = $price * $quantity;
?>

<title>Formulaire de commande</title>
<style>
    .item-image {
        width: 200px;
        height: 200px;
        object-fit: cover;
    }

    .order-form {
        max-width: 500px;
        margin: 0 auto;
    }

    .total-amount {
        font-size: 24px;
    }
</style>

    <div class="container">
        <div class="order-form">
            <div class="card">
                <img class="card-img-top shadowCook" src="<?php echo DIRECTORY_SEPARATOR . $rootDir . DIRECTORY_SEPARATOR . $imagePath; ?>" alt="Item Image">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $title; ?></h5>
                    <!-- <p class="card-text"><?php echo $description; ?></p> -->
                    <form id="order-form" method="POST">
                        <div class="form-group">
                            <label for="quantity">Quantité :</label>
                            <input type="number" class="form-control" id="quantity" name="quantity" min="1" value="<?php echo $quantity; ?>">
                        </div>
                        <h5 class="total-amount">Total : $<?php echo $totalAmount; ?></h5>
                        <button type="submit" class="primary">Passer la commande</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<script>
    // Écouteur d'événement pour détecter les changements dans le champ de quantité
    document.getElementById('quantity').addEventListener('input', function() {
        var quantity = this.value;
        var totalAmount = <?php echo $price; ?> * quantity;
        document.querySelector('.total-amount').innerHTML = 'Total : $' + totalAmount.toFixed(2);
    });
</script>

<?php
$content = ob_get_clean();
include 'layout.php';
?>
