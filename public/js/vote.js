function voteForCocktail(cocktailID) {
    $.ajax({
        url: 'vote.php',
        type: 'POST',
        dataType: 'json',
        data: { cocktailID: cocktailID },
        success: function(response) {
            if (response.success) {
                var totalVotes = response.totalVotes;
                $('.vote-count[data-cocktail-id="' + cocktailID + '"]').text(totalVotes);
                alert('Votre vote a été enregistré avec succès !');
            } else {
                alert('Une erreur s\'est produite lors de l\'enregistrement du vote.');
            }
        },
        error: function() {
            alert('Une erreur s\'est produite lors de la requête.');
        }
    });
}
