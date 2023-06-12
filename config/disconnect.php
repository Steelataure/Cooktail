<?php
if (isset($_POST['deconnexion'])) {
  session_unset();
  session_destroy();
  // header('Location: ' . $routes['home']);
  exit;
}