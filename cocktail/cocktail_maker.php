<?php
ob_start();
session_start();

$dbh = include '../config/config.php';

// Exemple de requête de sélection pour récupérer des données de la base de données
$query = "SELECT * FROM Ingredients ORDER BY Libelle";
$stmt = $dbh->query($query);
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Récupérer les données du formulaire
  $nomCocktail = $_POST['nomCocktail'];
  $description = $_POST['description'];
  $nbEtape = $_POST['nbEtapes'];
  
  $isClassic = isset($_POST['isClassic']) ? 1 : 0; // Vérifier si la case à cocher est cochée

  // Vérifier si un fichier a été uploadé
  if (isset($_FILES['image_cocktail']) && $_FILES['image_cocktail']['error'] === UPLOAD_ERR_OK) {
      $fileTmpPath = $_FILES['image_cocktail']['tmp_name'];
      $fileName = $_FILES['image_cocktail']['name'];

      // Définir le chemin de destination pour l'image
      $targetDirectory = '../public/assets/cocktails/';
      $targetFilePath = '/public/assets/cocktails/' . $fileName;

      // Déplacer le fichier vers le répertoire de destination
      if (move_uploaded_file($fileTmpPath, $targetDirectory . $fileName)) {
          // Insérer l'image dans la table Files
          $queryFiles = "INSERT INTO Files (Path) VALUES (:imagePath)";
          $stmtFiles = $dbh->prepare($queryFiles);
          $stmtFiles->bindParam(':imagePath', $targetFilePath, PDO::PARAM_STR);
          $stmtFiles->execute();

          // Récupérer l'ID de l'image insérée
          $imageID = $dbh->lastInsertId();

          // Insérer les données du cocktail dans la table Cocktails
          $queryCocktails = "INSERT INTO Cocktails (CocktailLibelle, Description, CreateurID, ImageID, IsClassic) VALUES (:nomCocktail, :description, :createurID, :imageID, :isClassic)";
          $stmtCocktails = $dbh->prepare($queryCocktails);
          $stmtCocktails->bindParam(':nomCocktail', $nomCocktail, PDO::PARAM_STR);
          $stmtCocktails->bindParam(':description', $description, PDO::PARAM_STR);
          $stmtCocktails->bindParam(':createurID', $_SESSION['userID'], PDO::PARAM_INT);
          $stmtCocktails->bindParam(':imageID', $imageID, PDO::PARAM_INT);
          $stmtCocktails->bindParam(':isClassic', $isClassic, PDO::PARAM_INT);
          $stmtCocktails->execute();

          // Récupérer l'ID de l'image insérée
          $CocktailID = $dbh->lastInsertId();
          for ($i = 1; $i <= $nbEtape; $i++) {
            $inputName = "etape_" . $i;
            $etapeDesc = $_POST[$inputName];
            // Insérer les données du cocktail dans la table Cocktails_Recette
            $queryCocktailEtape = "INSERT INTO Cocktails_Recette (CocktailID, NumeroEtape, Description) VALUES (:CocktailID, :numEtape ,:etapeDesc)";
            $stmtCocktails = $dbh->prepare($queryCocktailEtape);
            $stmtCocktails->bindParam(':CocktailID', $CocktailID, PDO::PARAM_STR);
            $stmtCocktails->bindParam(':numEtape', $i, PDO::PARAM_STR);
            $stmtCocktails->bindParam(':etapeDesc', $etapeDesc, PDO::PARAM_STR);
            $stmtCocktails->execute();
          }

        //   // Récupérer les données JSON envoyées par la requête AJAX
        //   $jsonData = $_POST['donnees'];
        //   var_dump($jsonData);
        //   // Convertir les données JSON en tableau PHP
        //   $tableau = json_decode($jsonData, true);

        //   // Parcourir le tableau et accéder aux valeurs des champs
        //   foreach ($tableau as $element) {
        //     $IngredientID = $element['id'];
        //     $Ingredientquantite = $element['quantite'];

        //   // Effectuer des opérations avec les valeurs des champs
        //   // ...
        //   //Insérer les données du cocktail dans la table Cocktails_Ingredients
        //    var_dump($element);
            $queryCocktailIngredient = "INSERT INTO Cocktails_Ingredients (CocktailID, IngredientID, quantite) VALUES (:CocktailID, 6, 1)";
            $stmtCocktails = $dbh->prepare($queryCocktailIngredient);
            $stmtCocktails->bindParam(':CocktailID', $CocktailID, PDO::PARAM_INT);
            $stmtCocktails->execute();
        //  }

          echo "Le cocktail a été ajouté avec succès.";
          if(isset($_POST['isClassic'])){
            header("Location: shop");
            exit();
          }else{
            header("Location: vote");
            exit();
          }
      } else {
          echo "Une erreur s'est produite lors de l'upload de l'image.";
      }
  } else {
      echo "Veuillez sélectionner une image pour le cocktail.";
  }
}

// Vérifier si l'utilisateur connecté est un administrateur
$isUserAdmin = false;
if (isset($_SESSION['userID'])) {
    $userID = $_SESSION['userID'];
    $queryUser = "SELECT IsAdmin FROM user WHERE id = :userID";
    $stmtUser = $dbh->prepare($queryUser);
    $stmtUser->bindParam(':userID', $userID, PDO::PARAM_INT);
    $stmtUser->execute();
    $userData = $stmtUser->fetch(PDO::FETCH_ASSOC);

    if ($userData && $userData['IsAdmin'] == 1) {
        $isUserAdmin = true;
    }
}

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
                    <div class="col-4 card loginWave loginWaveInsc shadowCook formMaker">
                        <div class="card-body blocIng">
                            <h1 class="card-title text-center">Ingrédients</h1>
                            <form method="POST">

                                <?php foreach ($results as $row) { ?>
                                <div class="row">
                                    <div class="col-5">
                                        <input type="checkbox" name="myCheckbox<?php echo $row['id']?>"
                                            onclick="myFunction(<?php echo $row['id']; ?>)"
                                            id="<?php echo $row['id']; ?>" value="<?php echo $row['couleur']; ?>">
                                        <label for="<?php echo $row['id']; ?>"><?php echo $row['Libelle']; ?>
                                    </div>

                                    <div class="col-7 padd row displayQTT ml-1" id="display<?php echo $row['id']; ?>">
                                        <span class="col-3 padd">Quantité :</span>
                                        <input type="text" name="myQuant<?php echo $row['id']?>" class="col-6 inputQTT"
                                            id="QTT<?php echo $row['id']; ?>">
                                    </div>
                                </div>

                                </label><br>

                                <script>
                                function myFunction(id) {
                                    var checkBox = document.getElementById(id);
                                    var text = document.getElementById("display" + id);
                                    if (checkBox.checked == true) {
                                        text.style.display = "inherit";
                                    } else {
                                        text.style.display = "none";
                                    }
                                }

                                document.addEventListener("DOMContentLoaded", function(event) {
                                    let check = 'input[name=myCheckbox' + <?php echo $row['id']?> + ']';
                                    var _selector = document.querySelector(check);
                                    let quant = 'input[name="myQuant<?php echo $row['id'] ?>"]';
                                    var quantites = document.querySelector(quant);
                                    _selector.addEventListener('change', function(event2) {

                                        if (_selector.checked) {
                                            var libelle = '<?php echo $row['Libelle']?>';
                                            var value = _selector.value;
                                            var id = '<?php echo $row['id']?>';
                                            var ingredient = {
                                                id: id,
                                                text: libelle,
                                                color: value
                                            };
                                            console.log(drink);
                                            ingredient.quantite = "";

                                            drink.push(ingredient);
                                            getDrink();
                                            quantites.addEventListener('change', function(event3) {
                                                ingredient.quantite = quantites.value;
                                                getDrink();
                                            });
                                        } else {
                                            drink.splice(drink.findIndex(v => v.text ===
                                                '<?php echo $row['Libelle']?>'), 1);
                                            console.log(drink)
                                            getDrink();
                                        }
                                        });
                                    });
                                </script>

                                <?php } ?>

                            </form>
                        </div>
                    </div>

                    <!-- COCKTAIL MAKER /!\ -->
                    <div class="col-4 mt-5 padd">
                        <main class="page__content mt-5">
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


                    <div class="col-4 card loginWave loginWaveInsc shadowCook formMaker">
                        <div class="card-body blocIng">
                            <h1 class="card-title text-center">Informations</h1>
                            <form method="POST" enctype="multipart/form-data">

                                <div class="form-group">
                                    <label for="nomCocktail">Nom du cocktail</label>
                                    <input type="text" class=" inputQTT" id="nomCocktail" name="nomCocktail" required>

                                </div>

                                <div class="form-group">
                                    <label for="description">Description du cocktail</label>
                                </div>
                                <textarea class="form-control" id="description" name="description" rows="6"
                                    required></textarea>
                                <div class="form-group">
                                    <label for="nbEtapes" style="margin-top: 20px;">Nombre d'étapes :</label>
                                    <input style="  background-color: #0000002b;border: 0px; margin-top: 3px;"
                                        type="number" class="inputQTT" id="nbEtapes" name="nbEtapes" required>
                                </div>
                                
                                <div id="etapesContainer"></div>

                                <div class="form-group my-4">
                                    <label for="image">Image du cocktail</label>
                                </div>
                                <input type="file" class="form-control-file mx-5 mb-5" id="image" name="image_cocktail"
                                    required>

                                <?php if ($isUserAdmin) : ?>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="isClassic" name="isClassic">
                                        <label class="form-check-label" for="isClassic">Mettre en
                                            magasin</label>
                                    </div>
                                </div>
                                <?php endif; ?>

                                <button type="submit" id="submit_create" class="primary " name="ajouter"
                                    style="margin-left: 30% !important;">Créer mon cocktail</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- partial:index.partial.html -->
    <script>
    var drink = [];
    var quantite = "";

    document.getElementById('nbEtapes').addEventListener('input', function() {
        var etapesContainer = document.getElementById('etapesContainer');
        var nbEtapes = parseInt(this.value);

        // Réinitialiser le contenu du conteneur des étapes
        etapesContainer.innerHTML = '';

        // Générer les champs d'étape en fonction du nombre d'étapes
        for (var i = 1; i <= nbEtapes; i++) {
            var etapeInput = document.createElement('input');
            etapeInput.type = 'text';
            etapeInput.className = 'inputQTT';
            etapeInput.name = 'etape_' + i;
            etapeInput.style.marginBottom = '10px';
            etapeInput.style.padding = '25px 0px';
            etapeInput.placeholder = 'Étape ' + i;
            etapesContainer.appendChild(etapeInput);
        }
    });
    </script>
    <!-- partial -->
    <script src='https://cdn.jsdelivr.net/npm/zdog'></script>
    <script src="./front/assets/js/customCocktail.js"></script>
</body>

<?php
$content = ob_get_clean();
include 'layout.php';
include 'footer.php';?>