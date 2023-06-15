<?php
ob_start();
session_start();

$dbh = include '../config/config.php';

// Exemple de requête de sélection pour récupérer des données de la base de données
$query = "SELECT *, GROUP_CONCAT(Libelle) as rec
FROM Cocktails, Cocktails_Ingredients, Ingredients WHERE
Cocktails.id = Cocktails_Ingredients.CocktailID AND Ingredients.id = Cocktails_Ingredients.IngredientID GROUP BY Cocktails_Ingredients.IngredientID;";
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
					<h1>Partagez vos cocktails</h1>
					<p>Votez pour vos cocktails préférés et découvrez les recettes partagées par la communauté.</p>
				</header>
				<section class="tiles">
					<?php foreach ($results as $row) : ?>
						<article>
							<span class="image">
								<!-- <img src="<?= $row['imageID'] ?>" alt="" /> -->
							</span>
							<a href="#">
								<h2><?= $row['CocktailLibelle'] ?></h2>
								<div class="content">
									<p><?= $row['Description'] ?></p>
									<p>Nombre de votes : <span class="vote-count"><?= $row['Upvotes'] ?></span></p>
									<button class="vote-button" data-cocktail-id="<?= $row['id'] ?>">Vote</button>
								</div>
							</a>
						</article>
					<?php endforeach; ?>
				</section>
			</div>
		</div>
	</div>
	
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="../public/js/vote.js"></script>
	
	<script>
		$(document).ready(function() {
			$('.vote-button').click(function() {
				var cocktailID = $(this).data('cocktail-id');
				voteForCocktail(cocktailID);
			});
		});
	</script>
</body>

<?php endif; ?>

<?php
$content = ob_get_clean();
include 'layout.php';
