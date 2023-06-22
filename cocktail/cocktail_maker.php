<?php
ob_start();
session_start();

$dbh = include '../config/config.php';

$query = "SELECT Cocktails.*, Files.Path, user.username AS createur
FROM Cocktails
INNER JOIN Files ON Cocktails.ImageID = Files.id
INNER JOIN user ON Cocktails.CreateurID = user.id
WHERE Cocktails.IsClassic = 0 AND Cocktails.Actif = 1";

$stmt = $dbh->query($query);
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

$rootDir = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/') . '/';
$rootDir = basename(dirname($rootDir));

// Affichage des résultats
if (count($results) > 0) :
?>
<head>
	<link rel="stylesheet" href="./front/assets/css/customCocktail.css">
</head>

<body>
<main class="page__content">
  <section class="controls u-vertical-rhythm" id="controls">
    <h1 class="controls__label">Select a cocktail</h1>
    <div class="form-group">
      <?php foreach ($results as $row) : ?>
        <input type="radio" name="drink-select" id="<?= $row['CocktailLibelle'] ?>" />
        <label for="<?= $row['CocktailLibelle'] ?>"><?= $row['CocktailLibelle'] ?></label>
      <?php endforeach; ?>
    </div>
  </section>
  <section class="cocktail">
    <h2 class="cocktail__label" id="drink-name"></h2>
    <div class="glass" id="glass">
      <div class="garnish"></div>
      <div class="bowl">
        <div class="ingredient-colors" id="ingredient-colors"></div>
        <ul class="ingredient-list" id="ingredient-list"></ul>
      </div>
      <div class="stem"></div>
      <div class="base"></div>
    </div>
  </section>
</main>

<!-- partial -->
<script src='https://cdn.jsdelivr.net/npm/zdog'></script>
<script src="./front/assets/js/customCocktail.js"></script>

</body>

<?php endif; ?>

<?php
$content = ob_get_clean();
include 'layout.php';
