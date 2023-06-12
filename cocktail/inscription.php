   <?php include "../config/inscription.php" ?>

   <div class="inscription">
       <form method="POST">
           <h1>Inscription</h1>
           <div class="row">
               <h4>Username</h4>
               <input type="text" name="username" required>
           </div>
           <div class="row">
               <h4>Email</h4>
               <input type="text" name="email" required>
           </div>
           <div class="row">
               <h4>mot de passe</h4>
               <input type="password" name="password" required>
           </div>
           <div class="row">
               <h4>Confirmation mot de passe</h4>
               <input type="password" name="confirm_password" required>
           </div>
           <div class="row">
               <button type="submit" name="inscription">Inscription</button>
               <a class="href">Vous avez déja un compte ? connectez-vous !</a>
           </div>
       </form>
   </div>