<?php
ob_start();
session_start();

$dbh = include '../config/config.php';

// Exemple de requête de sélection pour récupérer des données de la base de données
// $query = "SELECT * FROM Cocktails AND Cocktails_Ingredients";
// $stmt = $dbh->query($query);
// $results = $stmt->fetchAll(PDO::FETCH_ASSOC);


$query = "SELECT Cocktails.*, Cocktails_Ingredients.*
FROM Cocktails
JOIN Cocktails_Ingredients ON Cocktails.id = Cocktails_Ingredients.CocktailID;";
$stmt = $dbh->query($query);
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);


// Affichage des résultats
if (count($results) > 0) :
?>

	<body class="is-preload">
		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">
						<div class="inner">
							<!-- Logo -->
								<a href="index.html" class="logo">
									<span class="symbol"><img src="./front/images/logo.svg" alt="" /></span><span class="title">Cooktail</span>
								</a>


						</div>
					</header>

				<!-- Menu -->
					<nav id="menu">
						<h2>Menu</h2>
						<ul>
							<li><a href="#">Home</a></li>
							<li><a href="./front/generic.html">Ipsum veroeros</a></li>
							<li><a href="./front/generic.html">Tempus etiam</a></li>
							<li><a href="./front/generic.html">Consequat dolor</a></li>
							<li><a href="./front/elements.html">Elements</a></li>
						</ul>
					</nav>

                    
				<!-- Main -->
					<div id="main">
						<div class="inner">
							<header>
								<h1>Nos Recettes phares.</h1>
								<p>bla bla bla.</p>
							</header>
							<section class="tiles">
							
                            
                            <?php foreach ($results as $row) : ?>
                                

                            <article class="">
                                <span class="image">
                                    <img src="./front/images/pic0<?= $row['ImageID'] ?>.jpg" alt="" />
                                </span>
                                <a href="">
                                    <h2><?= $row['Libelle'] ?></h2>
                                    <div class="content">
                                        <p>Sed nisl arcu euismod sit amet nisi lorem etiam dolor veroeros et feugiat.</p>
                                    </div>
                                </a>
                            </article>
                            <?php endforeach; ?>
                            <?php else : ?>
                            Aucun résultat trouvé.
                            <?php endif;?>

                            
								<!-- <article class="style1">
									<span class="image">
										<img src="./front/images/pic01.jpg" alt="" />
									</span>
									<a href="">
										<h2>Magna</h2>
										<div class="content">
											<p>Sed nisl arcu euismod sit amet nisi lorem etiam dolor veroeros et feugiat.</p>
										</div>
									</a>
								</article> -->

							</section>
						</div>
					</div>

				<!-- Footer -->
					<footer id="footer">
						<div class="inner">
							<section>
								<h2>Get in touch</h2>
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
								<h2>Follow</h2>
								<ul class="icons">
									<li><a href="#" class="icon brands style2 fa-twitter"><span class="label">Twitter</span></a></li>
									<li><a href="#" class="icon brands style2 fa-facebook-f"><span class="label">Facebook</span></a></li>
									<li><a href="#" class="icon brands style2 fa-instagram"><span class="label">Instagram</span></a></li>
									<li><a href="#" class="icon brands style2 fa-dribbble"><span class="label">Dribbble</span></a></li>
									<li><a href="#" class="icon brands style2 fa-github"><span class="label">GitHub</span></a></li>
									<li><a href="#" class="icon brands style2 fa-500px"><span class="label">500px</span></a></li>
									<li><a href="#" class="icon solid style2 fa-phone"><span class="label">Phone</span></a></li>
									<li><a href="#" class="icon solid style2 fa-envelope"><span class="label">Email</span></a></li>
								</ul>
							</section>
							<ul class="copyright">
								<li>&copy; Untitled. All rights reserved</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
							</ul>
						</div>
					</footer>

			</div>
	</body>

<?php
$content = ob_get_clean();
include 'layout.php';