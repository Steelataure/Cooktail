<?php
ob_start();
session_start();

$dbh = include '../config/config.php';
$query = "SELECT *, Cocktails.id as cocktail
FROM Cocktails
JOIN Files ON Cocktails.ImageID=Files.id 
WHERE Cocktails.IsClassic = 1 AND Cocktails.Actif = 1";

$stmt = $dbh->query($query);
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

$rootDir = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/') . '/';
$rootDir = basename(dirname($rootDir));

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
								<h1>Nos Recettes phares.</h1>
								<p>bla bla bla.</p>
							</header>
							<section class="tiles">
								<?php foreach ($results as $key => $row): ?>
									<article class="">
										<span class="image shadowCook2">
											<div class="d-flex align-items-center position-relative ">
												<img src="..<?= $row['Path'] ?>" alt="<?= $row['nom'] ?>" class="img-fluid" />
											</div>
										</span>
										<a href="./fiche_recette?id=<?= $row['cocktail'] ?>">
											<h2><?= $row['CocktailLibelle'] ?></h2>
											<div class="content">
												<span>- <?= $row['Description'] ?></span>
												<br></br>
											</div>
										</a>
									</article>
								<?php endforeach; ?>
							</section>
						</div>
					</div>
					<?php endif; ?>
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
									<li><a href="#" class="icon brands style2 fa-twitter shadowCookTxt"><span class="label">Twitter</span></a></li>
									<li><a href="#" class="icon brands style2 fa-facebook-f shadowCookTxt"><span class="label">Facebook</span></a></li>
									<li><a href="#" class="icon brands style2 fa-instagram shadowCookTxt"><span class="label">Instagram</span></a></li>
									<li><a href="#" class="icon solid style2 fa-phone shadowCookTxt"><span class="label">Phone</span></a></li>
									<li><a href="#" class="icon solid style2 fa-envelope shadowCookTxt"><span class="label">Email</span></a></li>
								</ul>
							</section>
							<ul class="copyright">
								<li>&copy; Projet Etudiant</li><li><a href=""> Paris</a></li>
							</ul>
						</div>
					</footer>

				</div>
			</body>

<?php
$content = ob_get_clean();
include 'layout.php';
