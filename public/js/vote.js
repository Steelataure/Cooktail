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
                $('.upvotes[data-cocktail-id="' + cocktailID + '"]').text(response.upvotes.toLocaleString());
                $('.downvotes[data-cocktail-id="' + cocktailID + '"]').text(response.downvotes.toLocaleString());

                // Désactiver les boutons de vote pour le cocktail en cours
                $('.vote-button[data-cocktail-id="' + cocktailID + '"]').attr('disabled', 'disabled');

                // Afficher le message d'erreur s'il existe
                if (response.error) {
                    $('.error-message[data-cocktail-id="' + cocktailID + '"]').text(response.error);
                }
            },
            error: function(xhr, status, error) {
                console.log(error);
            }
        });
    });
});
