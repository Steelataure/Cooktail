<?php
ob_start();
session_start();

$dbh = include '../config/config.php';

// Exemple de requête de sélection pour récupérer des données de la base de données
$query = "SELECT * FROM Ingredients ORDER BY Libelle";
$stmt = $dbh->query($query);
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

// $query2 = "INSERT INTO Cocktails(CocktailLibelle, CreateurID, IsClassic, ImageID, Description) 
// VALUES (CocktailLibelle, CreateurID, 0, Path, Description) "

// foreach ($_POST['checkbox'] as $value) {
//   $query3 = "INSERT INTO Cocktails_Ingredients(CocktailID, IngredientID, quantite) VALUES ()

// } 

?>

<body>

<div id="wrapper">

				<!-- Main -->
					<div id="main">
						<div class="innerMaker">
							<!-- <header>
								<h1>Notre Cocktail Maker</h1>
								<p>bla bla bla.</p>
							</header> -->

              <div class="row fontCocktail">

            
                <!-- CARD BLOC 1 -->
                  <div class="col-7 card loginWave loginWaveInsc shadowCook">
                    <div class="card-body blocIng">
                        <h1 class="card-title text-center">Ingrédients</h1>
                        <form method="POST">
                              
                              <?php foreach ($results as $row) { ?>
                                <div class="row">
                                  <div  class="col-4">
                                  <input type="checkbox" onclick="myFunction(<?php echo $row['id']; ?>)" id="<?php echo $row['id']; ?>" value="<?php echo $row['couleur']; ?>">
                                  <label for="<?php echo $row['id']; ?>"><?php echo $row['Libelle']; ?> 
                                  </div> 
                                  
                                  <div class="col-8 row displayQTT ml-1" id="display<?php echo $row['id']; ?>">
                                  <span class="col-4">Quantité :</span>
                                  <input type="text" class="col-6 inputQTT" id="QTT<?php echo $row['id']; ?>">
                                  </div>
                                </div>
                                
                              </label><br>
                              
                              
                              <?php } ?>
                              <script>
                              var drink = [];
                              function myFunction(id) {
                                var checkBox = document.getElementById(id);
                                var text = document.getElementById("display"+id);
                                if (checkBox.checked == true){
                                  text.style.display = "inherit";
                                  console.log("Dqsd");
                                } else {
                                  text.style.display = "none";
                                }
                              }
                              </script>
                                                            

                            <button type="submit" onclick="getDrink()" class="primary btnConnexion">Créer mon cocktail</button>
                        </form>
                    </div>
                </div>

                <!-- COCKTAIL MAKER /!\ -->
                <div class="col-4 mt-5"> 
                  <main class="page__content mt-5">
                    <!-- <section class="controls u-vertical-rhythm" id="controls">
                      <h1 class="controls__label">Select a cocktail</h1>
                      <div class="form-group">
                        <input type="radio" name="drink-select" id="negroni"/>
                        <label for="negroni">Negroni</label>
                        <input type="radio" name="drink-select" id="manhattan"/>
                        <label for="manhattan">Manhattan</label>
                        <input type="radio" name="drink-select" id="old-fashioned"/>
                        <label for="old-fashioned">Old Fashioned</label>
                      </div>
                    </section> -->
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
                </div>

                <!-- BLOC 2 -->
                <div class="col-4 mt-5">
                    <div class="card mt-5 loginWave loginWaveInsc shadowCook">
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
                      <!-- <div class="card-body">
                          <h1 class="card-title text-center">Ingrédient</h1>
                          <form method="POST">
                              <div class="form-group">
                                  <label for="username">Pseudo</label>
                                  <input type="text" class="form-control" id="username" name="username" required>
                              </div>
                              <div class="form-group">
                                  <label for="email">Email</label>
                                  <input type="email" class="form-control" id="email" name="email" required>
                              </div>
                              <div class="form-group">
                                  <label for="password">Mot de passe</label>
                                  <input type="password" class="form-control" id="password" name="password" required>
                              </div>
                              <div class="form-group">
                                  <label for="confirm_password">Confirmation mot de passe</label>
                                  <input type="password" class="form-control" id="confirm_password" name="confirm_password"
                                      required>
                              </div>
                              <button type="submit" class="primary btnConnexion">Inscription</button>
                              <a class="btn" href="login.php">Vous avez déjà un compte ? Connectez-vous !</a>
                          </form>
                      </div> -->
                    </div>

                </div>
              </div>
            </div>
          </div>
</div>

<!-- partial:index.partial.html -->

<!-- partial -->
  <script src='https://cdn.jsdelivr.net/npm/zdog'></script>
  <script  src="./front/assets/js/customCocktail.js"></script>

</body>



<?php
$content = ob_get_clean();
include 'layout.php';
include 'footer.php';?>
