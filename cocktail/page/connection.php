 <?php include "../../config/connection.php" ?>


 <div class="connexion">
     <form method="POST">
         <h1>Login</h1>
         <div class="row">
             <h4>username</h4>
             <input type="username" name="username" required>
         </div>
         <div class="row">
             <h4>Mot de passe</h4>
             <input type="password" name="password" required>
         </div>
         <div class="row">
             <button type="submit" name="connexion">connexion</button>
             <a>Vous n'avez pas de compte ? créez vous en un !</a>
         </div>
     </form>
 </div>