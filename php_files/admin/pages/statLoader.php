<?php require("is_logged_in.php"); ?>
<?php
  require('db_params.php');
  if ($_POST['date']=="")
      {
  echo '<p class="center">Το αίτημα που υποβλήθηκε είναι κενό</p>';
  }
  else
  {
      if ($_POST['mode']==1)
      {
     try {
    $hasany=false;
    $results=0;
    $pdoObject = new PDO("mysql:host=$dbhost;dbname=$dbname;", $dbuser, $dbpass);
    $pdoObject -> exec("set names utf8");
    if ($_SESSION['idiotita']==2) {
    $sql = "SELECT epitheto, onoma FROM ypallhlos INNER JOIN adeies on ypallhlos.ypallhlosid=adeies.ypallhlosid WHERE katastasi_id=1 AND ypallhlos.dieuthinsiid=:dieuthinsiid AND (:date NOT BETWEEN date_starts AND date_ends) ORDER BY epitheto ASC";
    $statement = $pdoObject->prepare($sql);
    $statement->execute( array(':date'=>$_POST['date'], ':dieuthinsiid'=>$_SESSION['dieuthinsiid']));
    echo '<div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Επώνυμο</th>
                                            <th>Όνομα</th>
                                        </tr>
                                    </thead>
                                    <tbody>';
    $_SESSION['xls']="ΕΠΩΝΥΜΟ \t ΟΝΟΜΑ \t \n";
    while ( $record = $statement->fetch() ) {
        $hasany=true;
        $results++;
        $_SESSION['xls'] .= $record['epitheto']." \t ".$record['onoma']." \t \n";
        echo '<tr><td>'.$record['epitheto'].'</td><td>'.$record['onoma'].'</td></tr>';
    }
    }
    else if ($_SESSION['idiotita']==3){
    $sql = "SELECT epitheto, onoma, dname FROM ypallhlos INNER JOIN adeies on ypallhlos.ypallhlosid=adeies.ypallhlosid INNER JOIN dieuthinsi on ypallhlos.dieuthinsiid=dieuthinsi.dieuthinsiid WHERE katastasi_id=1 AND ypallhlos.genikidid=:genikidid AND (:date NOT BETWEEN date_starts AND date_ends) GROUP BY dname ORDER BY epitheto ASC";
    $statement = $pdoObject->prepare($sql);
    $statement->execute( array(':date'=>$_POST['date'], ':genikidid'=>$_SESSION['genikidid']));
    echo '<div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Επώνυμο</th>
                                            <th>Όνομα</th>
                                            <th>Διεύθυνση</th>
                                        </tr>
                                    </thead>
                                    <tbody>';
    $_SESSION['xls']="ΕΠΩΝΥΜΟ \t ΟΝΟΜΑ \t ΔΙΕΥΘΥΝΣΗ \t \n";
    while ( $record = $statement->fetch() ) {
        $hasany=true;
        $results++;
        $_SESSION['xls'] .= $record['epitheto']." \t ".$record['onoma']." \t ".$record['dname']." \t \n";
        echo '<tr><td>'.$record['epitheto'].'</td><td>'.$record['onoma'].'</td><td>'.$record['dname'].'</td></tr>';
    }
    }
    else if ($_SESSION['idiotita']==4 || $_SESSION['idiotita']==5){
    $sql = "SELECT epitheto, onoma, dname, gdname FROM ypallhlos INNER JOIN adeies on ypallhlos.ypallhlosid=adeies.ypallhlosid INNER JOIN dieuthinsi on ypallhlos.dieuthinsiid=dieuthinsi.dieuthinsiid INNER JOIN geniki_dieuthinsi on ypallhlos.genikidid=geniki_dieuthinsi.genikidid WHERE katastasi_id=1 AND (:date NOT BETWEEN date_starts AND date_ends) GROUP BY dname ORDER BY epitheto ASC";
    $statement = $pdoObject->prepare($sql);
    $statement->execute( array(':date'=>$_POST['date']));
    echo '<div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Επώνυμο</th>
                                            <th>Όνομα</th>
                                            <th>Διεύθυνση</th>
                                            <th>Γενική Διεύθυνση</th>
                                        </tr>
                                    </thead>
                                    <tbody>';
    $_SESSION['xls']="ΕΠΩΝΥΜΟ \t ΟΝΟΜΑ \t ΔΙΕΥΘΥΝΣΗ \t ΓΕΝΙΚΗ ΔΙΕΥΘΥΝΣΗ \t \n";
    while ( $record = $statement->fetch() ) {
        $hasany=true;
        $results++;
        $_SESSION['xls'] .= $record['epitheto']." \t ".$record['onoma']." \t ".$record['dname']." \t ".$record['gdname']." \t \n";
        echo '<tr><td>'.$record['epitheto'].'</td><td>'.$record['onoma'].'</td><td>'.$record['dname'].'</td><td>'.$record['gdname'].'</td></tr>';
    }    
    }
    
    echo '</tbody></table></div>';
    if($hasany==false)
    {
         echo '<p class="center">Κανένας υπάλληλος δεν είναι παρών την ημερομηνία που επιλέξατε</p>';
    }
    else {
         echo '<p class="center">Αριθμός υπαλλήλων που βρέθηκαν: '.$results.'</p>';
         echo '<a href="excel.php?filename=Αναφορά_Παρόντων_Υπαλλήλων"><button type="button" class="btn btn-success"><i class="fa fa-file-excel-o fa-fw"></i>Εξαγωγή σε Excel</button></a>';
    }
    $statement->closeCursor();
    $pdoObject = null;  
  } catch (PDOException $e) {  
      die("Database Error: " . $e->getMessage());
    }
      }
      else if ($_POST['mode']==2)
      {
          try {
    $hasany=false;
    $results=0;
    $pdoObject = new PDO("mysql:host=$dbhost;dbname=$dbname;", $dbuser, $dbpass);
    $pdoObject -> exec("set names utf8");
    $sql = "SELECT epitheto, onoma FROM ypallhlos INNER JOIN adeies on ypallhlos.ypallhlosid=adeies.ypallhlosid WHERE katastasi_id=1 AND (:date BETWEEN date_starts AND date_ends) ORDER BY epitheto ASC";
    $statement = $pdoObject->prepare($sql);
    $statement->execute( array(':date'=>$_POST['date']));
    echo '<div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Επώνυμο</th>
                                            <th>Όνομα</th>
                                        </tr>
                                    </thead>
                                    <tbody>';
    while ( $record = $statement->fetch() ) {
        $hasany=true;
        $results++;
        echo '<tr><td>'.$record['epitheto'].'</td><td>'.$record['onoma'].'</td></tr>';
    }
    echo '</tbody></table></div>';
    if($hasany==false)
    {
         echo '<p class="center">Κανένας υπάλληλος δεν είναι απών την ημερομηνία που επιλέξατε</p>';
    }
    else {
         echo '<p class="center">Αριθμός υπαλλήλων που βρέθηκαν: '.$results.'</p>';
         echo '<a href="excel.php?filename=Αναφορά_Παρόντων_Υπαλλήλων"><button type="button" class="btn btn-success"><i class="fa fa-file-excel-o fa-fw"></i>Εξαγωγή σε Excel</button></a>';
    }
    $statement->closeCursor();
    $pdoObject = null;  
  } catch (PDOException $e) {  
      die("Database Error: " . $e->getMessage());
    }
      }
  }
?>
