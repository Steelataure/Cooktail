<?php
ob_start();
session_start();

$dbh = include '../config/config.php';

?>

<head>
	<link rel="stylesheet" href="./front/assets/css/customCocktail.css">
   
</head>
	
<body>
<!-- partial:index.partial.html -->
<main class="page__content">
  <section class="controls u-vertical-rhythm" id="controls">
    <h1 class="controls__label">Select a cocktail</h1>
    <div class="form-group">
      <input type="radio" name="drink-select" id="negroni"/>
      <label for="negroni">Negroni</label>
      <input type="radio" name="drink-select" id="manhattan"/>
      <label for="manhattan">Manhattan</label>
      <input type="radio" name="drink-select" id="old-fashioned"/>
      <label for="old-fashioned">Old Fashioned</label>
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
  <script  src="./front/assets/js/customCocktail.js"></script>

</body>



<?php
$content = ob_get_clean();
include 'layout.php';