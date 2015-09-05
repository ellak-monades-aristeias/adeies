<?php
  session_start();
  if (!isset($_SESSION['username'])) {
     header("Location: login.php?msg=Σφάλμα: Πρέπει πρώτα να συνδεθείτε!");
     exit();
  }   
 ?>