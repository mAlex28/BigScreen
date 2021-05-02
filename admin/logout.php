<?php
session_start();

   if (isset($_POST['logoutBtn'])) {
        session_destroy();
        unset($_SESSION['username']);
        header('Location: login.php');
   }
 ?>