<?php
ob_start();
session_start();

$dbh = include '../config/config.php';

// Exemple de requête de sélection pour récupérer des données de la base de données
// $query = "SELECT * FROM Cocktails AND Cocktails_Ingredients";
// $stmt = $dbh->query($query);
// $results = $stmt->fetchAll(PDO::FETCH_ASSOC);


$query = "SELECT *, Cocktails.id as cocktail
FROM Cocktails
JOIN Files ON Cocktails.ImageID=Files.id 
WHERE Cocktails.IsClassic = 1";

$stmt = $dbh->query($query);
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

// $query2 = "SELECT quantite as q, Libelle as l
// FROM Cocktails_Ingredients
// INNER JOIN Cocktails ON Cocktails.id=Cocktails_Ingredients.CocktailID
// INNER JOIN Ingredients ON Ingredients.id=Cocktails_Ingredients.IngredientID" ;
// $stmt2 = $dbh->query($query2);
// $result = $stmt2->fetchAll(PDO::FETCH_ASSOC);

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


						
  <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
    Modal
  </button>

  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content modalTop" >
        <div class="modal-header">
          <h2 class="modal-title">Modal Heading</h2>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <div class="modal-body">
          Modal body..
        </div>
        
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div> -->

							<header>
								<h1>Nos Recettes phares.</h1>
								<p>bla bla bla.</p>
							</header>
							<section class="tiles">
                            
                            <?php 
							foreach ($results as $key => $row):
							?>
                            
                            <article class="">
                                <span class="image shadowCook2">
								<div class="d-flex align-items-center position-relative ">
										<img src="..<?= $row['Path'] ?>" alt="<?= $row['nom'] ?>" class="img-fluid" />
										<!-- <img src="<?php echo DIRECTORY_SEPARATOR . $rootDir . DIRECTORY_SEPARATOR .  '/public/assets/cocktails/image' . $key . '.png'; ?>"/> -->
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