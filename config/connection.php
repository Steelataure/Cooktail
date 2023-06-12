<?php 

if(isset($_POST['connexion'])){
    $email = $_POST['email'];
    $motDePasse = $_POST['motDePasse'];
    $sql = "SELECT * FROM utilisateur WHERE email = :email";
    $query = $dbh->prepare($sql);
    $query->bindParam(":email", $email, PDO::PARAM_STR);
    $query->execute();
    $data = $query->fetch(PDO::FETCH_OBJ);
          
    if(isset($data->email) && password_verify($motDePasse, $data->motDePasse)){
        $_SESSION['isLogged'] = $email;
    
        $utilisateur_id  = getUtilisateurId();
        $TypeDeCompte = getTypeAccount();

        if ($TypeDeCompte == "entreprise"){
            if(getProfilEntreprise()){
                header('Location: ' . $routes['swipePageEntreprise']);
                exit;
            }else{
                header('Location: ' . $routes['home']);
                exit;
            }
        } 
        if ($TypeDeCompte == "candidat"){
           if(getProfilCandidat()){
                header('Location: ' . $routes['swipePageCandidat']);
                exit;
            }else{
                header('Location: ' . $routes['home']);
                exit;
            }
        }
    }else{
        echo "<div><h3 class='message'>Email ou mot de passe incorrect</3></div>";
    }
}