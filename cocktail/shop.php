<?php
ob_start();
session_start();

$dbh = include '../config/config.php';

// Exemple de requête de sélection pour récupérer des données de la base de données
// $query = "SELECT * FROM Cocktails AND Cocktails_Ingredients";
// $stmt = $dbh->query($query);
// $results = $stmt->fetchAll(PDO::FETCH_ASSOC);


$query = "SELECT *  FROM Shop, Ustensiles, Files WHERE Shop.id = Ustensiles.ShopID AND Ustensiles.imageID = Files.id;";
$stmt = $dbh->query($query);
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);


// Affichage des résultats
if (count($results) > 0) :
?>

<body class="is-preload">
	<!-- Wrapper -->
		<div id="wrapper">


			<!-- Main -->
				<div id="main">
					<div class="inner">
						<header>
							<h1>Notre Boutique.</h1>
							<p>Bienvenue dans notre boutique en ligne dédiée aux passionnés de mixologie 
								et aux professionnels du bar ! Nous sommes fiers de vous offrir une gamme complète 
								d'équipements de haute qualité, conçus spécialement pour vous aider à créer des cocktails 
								exceptionnels et à impressionner vos convives.</p>

							<p>Que vous soyez un barman expérimenté à la recherche d'outils de pointe ou simplement un amateur 
								souhaitant explorer l'art de la mixologie, vous trouverez ici tout ce dont vous avez besoin pour 
								libérer votre créativité et transformer votre bar en un véritable temple de saveurs.</p>

							<p>Nous avons soigneusement sélectionné chaque produit pour vous offrir des articles de renommée mondiale, 
								fabriqués par des marques réputées dans l'industrie de la mixologie. Des shakers élégants et fonctionnels 
								aux cuillères de bar précises, en passant par les verres à cocktail raffinés et les accessoires 
								indispensables, notre boutique regorge de trésors pour combler tous les besoins de votre art.</p>
						</header>
						<section class="tiles">
						<?php foreach ($results as $row) : ?>
						<article class="">
							<span class="image shadowCook2">
								<img src="..<?= $row['Path'] ?>" alt="<?= $row['nom'] ?>" />
							</span>
							<a href="./commande?id=<?= $row['UstensileID'] ?>">
								<h2><?= $row['Libelle'] ?></h2>
								<div class="content">
									<p><?= $row['Description'] ?></p>
									<p><?= $row['Prix'] ?> €</p>
								</div>
							</a>
						</article>
						<?php endforeach; ?>
						<?php else : ?>
						Aucun résultat trouvé.
						<?php endif;?>
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