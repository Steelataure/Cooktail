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
					

				</div>
			</body>

<?php
$content = ob_get_clean();
include 'layout.php';
include 'footer.php';?>