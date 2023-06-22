<?php
ob_start();
session_start();

$dbh = include '../config/config.php';





// Affichage des résultats
// if (count($results) > 0) :
?>

<body class="is-preload">
    <!-- Wrapper -->
    <div id="wrapper">

        <!-- Main -->
        <div id="main">
            <div class="inner">
                <header>
                    <h1>Panier.</h1>
                </header>
                <div class="row" style="display: flex;justify-content: space-around; max-height: 40vh;">
                    <div class="col-md-7" style="max-height: 60vh;overflow-y: auto;">
                        <?php foreach ($_SESSION['cart'] as $product): ?>
                        <div class="row produit"
                            style=" display: flex; justify-content: stretch; align-items: center; margin: 10px 0px; background-color: rgb(73 73 83);  max-height: 20vh; overflow-y: auto;">
                            <div class="col-md-3">
                                <img src="<?php echo $product['imagePath']; ?>" alt="Image du produit">
                            </div>
                            <div class="col-md-6" style="max-height: 22vh;overflow-y: auto;">
                                <p><?php echo $product['description']; ?></p>
                            </div>
                            <div class="col-md-2">
                                <p>Prix : <?php echo $product['price']; ?></p>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="col-md-4" style="background-color: blue;">
                        total :
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer -->
        <footer id="footer">
            <div class="inner">
                <section>
                    <h2 class="shadowCookTxt">CONTACT</h2>
                    <form method="post" action="#">
                        <div class="fields">
                            <div class="field half">
                                <input type="text" name="name" id="name" placeholder="Name" />
                            </div>
                            <div class="field half">
                                <input type="email" name="email" id="email" placeholder="Email" />
                            </div>
                            <div class="field">
                                <textarea name="message" id="message" placeholder="Message"></textarea>
                            </div>
                        </div>
                        <ul class="actions">
                            <li><input type="submit" value="Send" class="primary" /></li>
                        </ul>
                    </form>
                </section>
                <section>
                    <h2 class="shadowCookTxt">Réseaux</h2>
                    <ul class="icons">
                        <li><a href="#" class="icon brands style2 fa-twitter shadowCookTxt"><span
                                    class="label">Twitter</span></a></li>
                        <li><a href="#" class="icon brands style2 fa-facebook-f shadowCookTxt"><span
                                    class="label">Facebook</span></a></li>
                        <li><a href="#" class="icon brands style2 fa-instagram shadowCookTxt"><span
                                    class="label">Instagram</span></a></li>
                        <li><a href="#" class="icon solid style2 fa-phone shadowCookTxt"><span
                                    class="label">Phone</span></a></li>
                        <li><a href="#" class="icon solid style2 fa-envelope shadowCookTxt"><span
                                    class="label">Email</span></a></li>
                    </ul>
                </section>
                <ul class="copyright">
                    <li>&copy; Projet Etudiant</li>
                    <li><a href=""> Paris</a></li>
                </ul>
            </div>
        </footer>

    </div>
</body>

<?php
$content = ob_get_clean();
include 'layout.php';
include 'footer.php';