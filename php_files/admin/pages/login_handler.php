<?php session_start(); ?>
<?php require('db_params.php');
if ($_GET['action']=='login') {

  
  // if ( !isset ($_POST['username'], $_POST['password'])) {
          // header('Location: login.php?mode=login&msg=Σφάλμα: Ορισμένα δεδομένα δεν έχουν καταχωρηθεί!');
      // exit();
      
  // }
    
      try {
    $pdoObject = new PDO("mysql:host=$dbhost; dbname=$dbname;", $dbuser, $dbpass);
      
      $sql='SELECT password, idiotita_id, ypallhlosid, tmimaid, dieuthinsiid, genikidid FROM ypallhlos WHERE username=:username';
      $statement = $pdoObject->prepare($sql);
      $result=$statement->execute( array(':username'=>$_POST['username']));   
      if ($record = $statement -> fetch()) {
               $is_found=TRUE;
                 if ($_POST['password']==$record['password']){
                         $_SESSION['username']=$_POST['username'];
                         $_SESSION['idiotita']=$record['idiotita_id'];
                         $_SESSION['ypallhlosid']=$record['ypallhlosid'];
                         $_SESSION['tmimaid']=$record['tmimaid'];
                         $_SESSION['dieuthinsiid']=$record['dieuthinsiid'];
                         $_SESSION['genikidid']=$record['genikidid'];
                         header("location:home.php");
      } else
          header('Location: index.php?type=danger&msg=Σφάλμα: Το Όνομα Χρήστη ή ο Κωδικός Πρόσβασης είναι λάθος!');
      }
      else
          header('Location: index.php?type=danger&msg=Σφάλμα: Το Όνομα Χρήστη ή ο Κωδικός Πρόσβασης είναι λάθος!');
      $statement->closeCursor();
      $pdoObject = null;
  }
  catch (PDOException $e) {
      header('Location: index.php?type=danger&msg=PDO Exception: '.$e->getMessage());
      exit();
  }
  
  if ( !$result ) {
    header('Location: index.php?type=danger&msg=Σφάλμα: Προέκυψε σφάλμα κατά την εκτέλεση του ερωτήματος');
    exit();
  } 
  
//    if ($adminpassword==$_POST['password'] && $adminusername==$_POST['username'])
//    {
//                         $_SESSION['username']=$_POST['username'];
//                         header("location:index.php");
//    }
//      else if ($yppassword==$_POST['password'] && $ypusername==$_POST['username'])
//	  {
//		  $_SESSION['username']=$_POST['username'];
//                         header("location:index.php");
//		  
//	  }
//      else
//	  
//          header('Location: login.php?type=danger&msg=Σφάλμα: Το username ή το password είναι λάθος!');
    }

else if ($_GET['action']=='logout')
{
 session_start();
  session_destroy();
  header("Location: index.php?type=success&msg=Επιτυχής αποσύνδεση");
  exit();
}

else 
{
   header("Location: index.php?type=danger&msg=Σφάλμα επιλογών");
  exit();
    
}
?>