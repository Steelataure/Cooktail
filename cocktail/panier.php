<?php
ob_start();
session_start();

$dbh = include '../config/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productId = isset($_POST['productId']) ? $_POST['productId'] : null;

    if ($productId !== null && isset($_SESSION['cart'][$productId])) {
        unset($_SESSION['cart'][$productId]);
    }
}

//  verifier si le pannier est vide
$total = 0;
if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $product) {
        $total += $product['quantity'] * $product['price'];
    }
}

//supprimer un produit du pannier

if (isset($_POST['deleteProduct'])) {
    $productId = $_POST['productId'];
    if (isset($_SESSION['cart'][$productId])) {
        unset($_SESSION['cart'][$productId]);
    }
}

?>

<body class="is-preload">
    <div id="wrapper">
        <div id="main">
            <div class="inner">
                <header>
                    <h1>Panier.</h1>
                </header>
                <?php if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])): ?>
                <div class="row" style="display: flex;justify-content: center;">
                    <div class="col-md-10 blocIng"
                        style="padding-left: 0px;padding-left: 0px;max-height: 50vh;overflow-y: auto;">
                        <?php foreach ($_SESSION['cart'] as $key => $product): ?>
                        <div class="row produit">
                            <div class="col-md-2" style="display: flex;justify-content: center;align-items: center;">
                                <img style="width: 80%;background-position: center;background-size: cover;"
                                    src="..<?php echo $product['imagePath']; ?>" alt="Image du produit">
                            </div>
                            <div class="col-md-5 blocIng" style="max-height: 15vh;overflow-y: auto;padding: 0px 10px;">
                                <p style="margin-bottom: 0px;"><?php echo $product['description']; ?></p>
                            </div>
                            <div class="col-md-2">
                                <p style="margin-bottom: 0px;">Quantité : <?php echo $product['quantity']; ?></p>
                            </div>
                            <div class="col-md-2">
                                <p style="margin-bottom: 0px;">Prix :
                                    <?php echo $product['quantity'] * $product['price']; ?></p>
                            </div>
                            <div class="col-md-1"
                                style="text-align: center; display: flexjustify-content: centeralign-items: center;">
                                <form method="post" style="margin-bottom: 0px;">
                                    <input type="hidden" name="productId" value="<?php echo $key; ?>">
                                    <button type="submit" style="font-size: 2vh;padding: 0px;"
                                        name="deleteProduct">✖</button>

                                </form>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="col-md-10" style="background-color: black; padding-left: 0px;padding: 20px;">
                        <p style="margin-bottom: 0px;font-size: 3vh;">Total du panier : <?php echo $total; ?>€</p>
                    </div>
                </div>
                <?php else: ?>
                <p style="text-align: center;font-size: 5vh;">Votre panier est vide.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>

<style>
.produit {
    padding: 20px 0px;
    display: flex;
    justify-content: space-around;
    align-items: center;
    margin: 10px 0px;
    background-color: rgb(73 73 83);
    max-height: 20vh;
}

.col-md-2 {
    padding-left: 0px;
    display: flex;
    justify-content: center;
}

.col-md-1 {
    padding-left: 0px;
    display: flex;
    justify-content: center;
}
</style>

<?php
$content = ob_get_clean();
include 'layout.php';
include 'footer.php';