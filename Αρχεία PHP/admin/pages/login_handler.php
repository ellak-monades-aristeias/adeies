<?php session_start(); ?>
<?php require('db_params.php');
if ($_GET['action']=='login') {

  
  // if ( !isset ($_POST['username'], $_POST['password'])) {
          // header('Location: login.php?mode=login&msg=Σφάλμα: Ορισμένα δεδομένα δεν έχουν καταχωρηθεί!');
      // exit();
      
  // }
  
    if ($adminpassword==$_POST['password'] && $adminusername==$_POST['username'])
    {
                         $_SESSION['username']=$_POST['username'];
                         header("location:index.php");
    }
      else if ($yppassword==$_POST['password'] && $ypusername==$_POST['username'])
	  {
		  $_SESSION['username']=$_POST['username'];
                         header("location:index.php");
		  
	  }
      else
	  
          header('Location: login.php?type=danger&msg=Σφάλμα: Το username ή το password είναι λάθος!');
    }

else if ($_GET['action']=='logout')
{
 session_start();
  session_destroy();
  header("Location: login.php?type=success&msg=Επιτυχής αποσύνδεση");
  exit();
}

else 
{
   header("Location: login.php?type=danger&msg=Σφάλμα επιλογών");
  exit();
    
}
?>