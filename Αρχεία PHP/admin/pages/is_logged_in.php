<?php
  session_start();
  if (!isset($_SESSION['username'])) {
     header("Location: login.php?type=danger&msg=Σφάλμα: Πρέπει πρώτα να συνδεθείτε!");
     exit();
  }   
 ?>