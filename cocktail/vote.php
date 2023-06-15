<?php
ob_start();
session_start();

$dbh = include '../config/config.php';

if (isset($_POST['cocktailID']) && isset($_POST['voteType'])) {
    $cocktailID = $_POST['cocktailID'];
    $voteType = $_POST['voteType'];

    // Vérifie si l'utilisateur est déjà connecté
    if (!isset($_SESSION['isLogged'])) {
        echo "Veuillez vous connecter pour voter.";
        exit;
    }

    // Vérifie si l'utilisateur a déjà voté pour ce cocktail
    $voteCookieName = 'vote_' . $cocktailID;

    if (!isset($_COOKIE[$voteCookieName])) {
        // Si l'utilisateur n'a pas encore voté, enregistre le vote
        $query = "";

        if ($voteType === 'like') {
            $query = "UPDATE Cocktails SET Upvotes = Upvotes + 1 WHERE id = :cocktailID";
        } elseif ($voteType === 'dislike') {
            $query = "UPDATE Cocktails SET Downvotes = Downvotes + 1 WHERE id = :cocktailID";
        }

        if (!empty($query)) {
            $stmt = $dbh->prepare($query);
            $stmt->bindParam(':cocktailID', $cocktailID, PDO::PARAM_INT);
            $stmt->execute();

            // Définit un cookie pour enregistrer le vote de l'utilisateur
            setcookie($voteCookieName, $voteType, time() + (86400 * 30), '/'); // Expire après 30 jours
        }
    } else {
        // L'utilisateur a déjà voté, affichez un message d'erreur
        $errorMessage = "Vous avez déjà voté pour ce cocktail.";
    }
}

$query = "SELECT Cocktails.*, Files.Path
FROM Cocktails
INNER JOIN Files ON Cocktails.ImageID = Files.id";

$stmt = $dbh->query($query);
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Affichage des résultats
if (count($results) > 0) :
    ?>
    <!-- Wrapper -->
    <div id="wrapper">
        <!-- Main -->
        <div id="main">
            <div class="inner">
                <header>
                    <h1>Partagez vos cocktails</h1>
                    <p>Votez pour vos cocktails préférés et découvrez les recettes partagées par la communauté.</p>
                </header>
                <!-- ... Autres éléments HTML ... -->

<!-- ... Autres éléments HTML ... -->

<section class="tiles">
    <?php foreach ($results as $row) : ?>
        <article>
            <span class="image">
                <img src="..<?= $row['Path'] ?>" class="img-fluid" />
            </span>
            <a href="#">
                <h2><?= $row['CocktailLibelle'] ?></h2>
                <div class="content">
                    <!-- <p><?= $row['Description'] ?></p> -->
                    <p>
                        Nombre de votes :
                        <span class="vote-count">
                            <p>
                                Likes: <span class="upvotes"><?= number_format($row['Upvotes']) ?></span> <br>
                                Dislikes: <span class="downvotes"><?= number_format($row['Downvotes']) ?></span>
                            </p>
                        </span>
                    </p>
                </div>
            </a>
            </article>
            <?php if (isset($_SESSION['isLogged'])) : ?>
                <div class="vote-buttons">
                    <button class="vote-button like" data-cocktail-id="<?= $row['id'] ?>">Like</button>
                    <button class="vote-button dislike" data-cocktail-id="<?= $row['id'] ?>">Dislike</button>
                </div>
            <?php else : ?>
                <button disabled>Voter (Connectez-vous)</button>
            <?php endif; ?>
            <?php if (isset($errorMessage)) : ?>
                <div class="error-message"><?= $errorMessage ?></div>
            <?php endif; ?>

    <?php endforeach; ?>
</section>

<style>
    .vote-buttons {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 10px;
    }

    .vote-buttons button {
        margin: 0 5px;
    }
</style>

<!-- ... Autres éléments HTML ... -->


<style>
    .vote-buttons {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 10px;
    }

    .vote-buttons button {
        margin: 0 5px;
    }
</style>

<!-- ... Autres éléments HTML ... -->

            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../public/js/vote.js"></script>
    <script>
        $(document).ready(function() {
            $('.vote-button').click(function() {
                var cocktailID = $(this).data('cocktail-id');
                var voteType = $(this).hasClass('like') ? 'like' : 'dislike';

                $.ajax({
                    url: 'vote.php',
                    method: 'POST',
                    dataType: 'json',
                    data: {
                        cocktailID: cocktailID,
                        voteType: voteType
                    },
                    success: function(response) {
                        // Mettre à jour l'affichage du nombre de votes
                        $('.upvotes').text(response.upvotes.toLocaleString());
                        $('.downvotes').text(response.downvotes.toLocaleString());

                        // Désactiver les boutons de vote
                        $('.vote-button').attr('disabled', 'disabled');

                        // Afficher le message d'erreur s'il existe
                        if (response.error) {
                            $('.error-message').text(response.error);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                });
            });
        });
    </script>
    </body>

    </html>
<?php endif;
$content = ob_get_clean();
include 'layout.php';
