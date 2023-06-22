<?php
ob_start();
session_start();

$dbh = include '../config/config.php';


$total = 0;
if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $product) {
        $total += $product['price'];
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
                    <div class="col-md-10"
                        style="padding-left: 0px;padding-left: 0px;max-height: 50vh;overflow-y: auto;">
                        <?php foreach ($_SESSION['cart'] as $product): ?>
                        <div class="row produit">
                            <div class="col-md-3" style="display: flex;justify-content: center;align-items: center;">
                                <img style="width: 60%;background-position: center;background-size: cover;"
                                    src="..<?php echo $product['imagePath']; ?>" alt="Image du produit">
                            </div>
                            <div class="col-md-6" style="max-height: 15vh;overflow-y: auto;padding: 0px 10px;">
                                <p style="margin-bottom: 0px;"><?php echo $product['description']; ?></p>
                            </div>
                            <div class="col-md-2">
                                <p style="margin-bottom: 0px;">Prix : <?php echo $product['price']; ?></p>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="col-md-10" style="background-color: black; padding-left: 0px;padding: 20px;">
                        <p style="margin-bottom: 0px;font-size: 3vh;">Total du panier : <?php echo $total; ?> € </p>
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
</style>

<?php
$content = ob_get_clean();
include 'layout.php';
include 'footer.php';