<?php session_start(); ?>
<?php require('db_params.php');

try { 
    $pdoObject = new PDO("mysql:host=$dbhost; dbname=$dbname;charset=UTF8", $dbuser, $dbpass);
    $pdoObject -> exec("set names utf8"); 
    $sql='INSERT INTO adeies (ypallhlosid, typos_id, date_submitted, date_starts, date_ends, ar_adeiwn) VALUES (:ypallhlosid, :typos_id, CURRENT_TIMESTAMP, :date_starts, :date_ends, :ar_adeiwn)';
    $statement = $pdoObject->prepare($sql);
    $myresult=$statement->execute( array(':ypallhlosid'=>$_SESSION['ypallhlosid'], ':typos_id'=>$_POST['typos_id'], ':date_starts'=>$_POST['date_starts'], ':date_ends'=>$_POST['date_ends'], ':ar_adeiwn'=>$_POST['ar_adeiwn'] ));
    $statement->closeCursor();
    $pdoObject = null;
  } catch (PDOException $e) {
      header('Location: home.php?type=danger&msg=PDO Exception: '.$e->getMessage());
      exit();
  }
  
  if ( !$myresult ) {
      header('Location: home.php?type=danger&msg=Σφάλμα: αποτυχία εκτέλεσης ερωτήματος');
    exit();
  }  
  else
  {
    header('Location: home.php?type=success&msg=Η αίτησή σας καταχωρήθηκε επιτυχώς!');
  }
?>