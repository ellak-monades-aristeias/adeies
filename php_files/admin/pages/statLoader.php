<?php require("is_logged_in.php"); ?>
<?php
  require('db_params.php');
//  if ($_POST['date']=="")
//      {
//  echo '<p class="center">Το αίτημα που υποβλήθηκε είναι κενό</p>';
//  }
//  else
//  {
      if ($_POST['mode']==1)
      {
     try {
    $hasany=false;
    $results=0;
    $pdoObject = new PDO("mysql:host=$dbhost;dbname=$dbname;", $dbuser, $dbpass);
    $pdoObject -> exec("set names utf8");
    if ($_SESSION['idiotita']==2) {
    $sql = "SELECT ypallhlos.ypallhlosid, idiotita_id, epitheto, onoma FROM ypallhlos WHERE ypallhlos.idiotita_id<3 AND ypallhlos.dieuthinsiid=:dieuthinsiid AND ypallhlos.ypallhlosid NOT IN (SELECT adeies.ypallhlosid FROM adeies WHERE katastasi_id=1 AND (:date BETWEEN date_starts AND date_ends)) ORDER BY epitheto ASC";
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
    $sql = "SELECT ypallhlos.ypallhlosid, idiotita_id, epitheto, onoma, dname FROM ypallhlos INNER JOIN dieuthinsi on ypallhlos.dieuthinsiid=dieuthinsi.dieuthinsiid WHERE ypallhlos.genikidid=:genikidid AND ypallhlos.idiotita_id<4 AND ypallhlos.ypallhlosid NOT IN (SELECT adeies.ypallhlosid FROM adeies WHERE katastasi_id=1 AND (:date BETWEEN date_starts AND date_ends)) ORDER BY dname, epitheto ASC";
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
    $sql = "SELECT ypallhlos.ypallhlosid, epitheto, onoma, dname, gdname FROM ypallhlos INNER JOIN dieuthinsi on ypallhlos.dieuthinsiid=dieuthinsi.dieuthinsiid INNER JOIN geniki_dieuthinsi on ypallhlos.genikidid=geniki_dieuthinsi.genikidid WHERE ypallhlos.ypallhlosid NOT IN (SELECT adeies.ypallhlosid FROM adeies WHERE katastasi_id=1 AND (:date BETWEEN date_starts AND date_ends)) ORDER BY gdname, dname, epitheto ASC";
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
         echo '<p class="center">Κανένας υφιστάμενος δεν είναι παρών την ημερομηνία που επιλέξατε</p>';
    }
    else {
         echo '<p class="center">Αριθμός υφισταμένων που βρέθηκαν: '.$results.'</p>';
         echo '<a href="excel.php?filename=Αναφορά_Παρόντων_Υφισταμένων"><button type="button" class="btn btn-success"><i class="fa fa-file-excel-o fa-fw"></i>Εξαγωγή σε Excel</button></a>';
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
    if ($_SESSION['idiotita']==2) {
    $sql = "SELECT idiotita_id, epitheto, onoma FROM ypallhlos INNER JOIN adeies ON ypallhlos.ypallhlosid=adeies.ypallhlosid WHERE ypallhlos.idiotita_id<3 AND ypallhlos.dieuthinsiid=:dieuthinsiid AND katastasi_id=1 AND (:date BETWEEN date_starts AND date_ends) ORDER BY epitheto ASC";
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
    $sql = "SELECT idiotita_id, epitheto, onoma, dname FROM ypallhlos INNER JOIN dieuthinsi on ypallhlos.dieuthinsiid=dieuthinsi.dieuthinsiid INNER JOIN adeies ON ypallhlos.ypallhlosid=adeies.ypallhlosid WHERE ypallhlos.genikidid=:genikidid AND ypallhlos.idiotita_id<4 AND katastasi_id=1 AND (:date BETWEEN date_starts AND date_ends) ORDER BY dname, epitheto ASC";
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
    $sql = "SELECT epitheto, onoma, dname, gdname FROM ypallhlos INNER JOIN dieuthinsi on ypallhlos.dieuthinsiid=dieuthinsi.dieuthinsiid INNER JOIN geniki_dieuthinsi on ypallhlos.genikidid=geniki_dieuthinsi.genikidid INNER JOIN adeies ON ypallhlos.ypallhlosid=adeies.ypallhlosid WHERE katastasi_id=1 AND (:date BETWEEN date_starts AND date_ends) ORDER BY gdname, dname, epitheto ASC";
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
         echo '<p class="center">Κανένας υφιστάμενος δεν είναι απών την ημερομηνία που επιλέξατε</p>';
    }
    else {
         echo '<p class="center">Αριθμός υφισταμένων που βρέθηκαν: '.$results.'</p>';
         echo '<a href="excel.php?filename=Αναφορά_Απόντων_Υφισταμένων"><button type="button" class="btn btn-success"><i class="fa fa-file-excel-o fa-fw"></i>Εξαγωγή σε Excel</button></a>';
    }
    $statement->closeCursor();
    $pdoObject = null;  
  } catch (PDOException $e) {  
      die("Database Error: " . $e->getMessage());
    }
      }
      else if ($_POST['mode']==3)
          {
          try {
    $hasany=false;
    $results=0;
    $pdoObject = new PDO("mysql:host=$dbhost;dbname=$dbname;", $dbuser, $dbpass);
    $pdoObject -> exec("set names utf8");
    if ($_SESSION['idiotita']==2) {
    $sql = "SELECT idiotita_id, epitheto, onoma, katastasi_id, date_starts, date_ends FROM ypallhlos INNER JOIN adeies ON ypallhlos.ypallhlosid=adeies.ypallhlosid WHERE ypallhlos.dieuthinsiid=:dieuthinsiid AND ypallhlos.idiotita_id<3 AND katastasi_id!=2 AND ((date_starts BETWEEN :date_starts AND :date_ends) OR (date_ends BETWEEN :date_starts AND :date_ends)) ORDER BY epitheto ASC";
    $statement = $pdoObject->prepare($sql);
    $statement->execute( array(':dieuthinsiid'=>$_SESSION['dieuthinsiid'], ':date_starts'=>$_POST['date_starts'], ':date_ends'=>$_POST['date_ends']));
    echo '<div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Επώνυμο</th>
                                            <th>Όνομα</th>
                                            <th>Κατάσταση</th>
                                            <th>Έναρξη Άδειας</th>
                                            <th>Λήξη Άδειας</th>
                                        </tr>
                                    </thead>
                                    <tbody>';
    $_SESSION['xls']="ΕΠΩΝΥΜΟ \t ΟΝΟΜΑ \t ΚΑΤΑΣΤΑΣΗ \t ΕΝΑΡΞΗ ΑΔΕΙΑΣ \t ΛΗΞΗ ΑΔΕΙΑΣ \t \n";
    while ( $record = $statement->fetch() ) {
        $hasany=true;
        $results++;
        if ($record['katastasi_id']==0)
        {
            $katastasi="Αιτήθηκε Αδείας";
        }
        else
        {
            $katastasi="Σε Άδεια";
        }
        $_SESSION['xls'] .= $record['epitheto']." \t ".$record['onoma']." \t ".$katastasi." \t ".substr($record['date_starts'], 0, 10)." \t ".substr($record['date_ends'], 0, 10)." \t \n";
        echo '<tr><td>'.$record['epitheto'].'</td><td>'.$record['onoma'].'</td><td>'.$katastasi.'</td><td>'.substr($record['date_starts'], 0, 10).'</td><td>'.substr($record['date_ends'], 0, 10).'</td></tr>';
    }
    }
    else if ($_SESSION['idiotita']==3){
    $sql = "SELECT idiotita_id, epitheto, onoma, katastasi_id, date_starts, date_ends, dname FROM ypallhlos INNER JOIN dieuthinsi on ypallhlos.dieuthinsiid=dieuthinsi.dieuthinsiid INNER JOIN adeies ON ypallhlos.ypallhlosid=adeies.ypallhlosid WHERE ypallhlos.genikidid=:genikidid AND ypallhlos.idiotita_id<4 AND katastasi_id!=2 AND ((date_starts BETWEEN :date_starts AND :date_ends) OR (date_ends BETWEEN :date_starts AND :date_ends)) ORDER BY dname, epitheto ASC";
    $statement = $pdoObject->prepare($sql);
    $statement->execute( array(':date_starts'=>$_POST['date_starts'], ':date_ends'=>$_POST['date_ends'], ':genikidid'=>$_SESSION['genikidid']));
    echo '<div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Επώνυμο</th>
                                            <th>Όνομα</th>
                                            <th>Διεύθυνση</th>
                                            <th>Κατάσταση</th>
                                            <th>Έναρξη Άδειας</th>
                                            <th>Λήξη Άδειας</th>   
                                        </tr>
                                    </thead>
                                    <tbody>';
    $_SESSION['xls']="ΕΠΩΝΥΜΟ \t ΟΝΟΜΑ \t ΔΙΕΥΘΥΝΣΗ \t ΚΑΤΑΣΤΑΣΗ \t ΕΝΑΡΞΗ ΑΔΕΙΑΣ \t ΛΗΞΗ ΑΔΕΙΑΣ \t \n";
    while ( $record = $statement->fetch() ) {
        $hasany=true;
        $results++;
        if ($record['katastasi_id']==0)
        {
            $katastasi="Αιτήθηκε Αδείας";
        }
        else
        {
            $katastasi="Σε Άδεια";
        }
        $_SESSION['xls'] .= $record['epitheto']." \t ".$record['onoma']." \t ".$record['dname']." \t ".$katastasi." \t ".substr($record['date_starts'], 0, 10)." \t ".substr($record['date_ends'], 0, 10)." \t \n";
        echo '<tr><td>'.$record['epitheto'].'</td><td>'.$record['onoma'].'</td><td>'.$record['dname'].'</td><td>'.$katastasi.'</td><td>'.substr($record['date_starts'], 0, 10).'</td><td>'.substr($record['date_ends'], 0, 10).'</td></tr>';
    }
    }
    else if ($_SESSION['idiotita']==4 || $_SESSION['idiotita']==5){
    $sql = "SELECT epitheto, onoma, katastasi_id, date_starts, date_ends, dname, gdname FROM ypallhlos INNER JOIN dieuthinsi on ypallhlos.dieuthinsiid=dieuthinsi.dieuthinsiid INNER JOIN geniki_dieuthinsi on ypallhlos.genikidid=geniki_dieuthinsi.genikidid INNER JOIN adeies ON ypallhlos.ypallhlosid=adeies.ypallhlosid WHERE katastasi_id!=2 AND ((date_starts BETWEEN :date_starts AND :date_ends) OR (date_ends BETWEEN :date_starts AND :date_ends)) ORDER BY gdname, dname, epitheto ASC";
    $statement = $pdoObject->prepare($sql);
    $statement->execute( array(':date_starts'=>$_POST['date_starts'], ':date_ends'=>$_POST['date_ends']));
    echo '<div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Επώνυμο</th>
                                            <th>Όνομα</th>
                                            <th>Διεύθυνση</th>
                                            <th>Γενική Διεύθυνση</th>
                                            <th>Κατάσταση</th>
                                            <th>Έναρξη Άδειας</th>
                                            <th>Λήξη Άδειας</th> 
                                        </tr>
                                    </thead>
                                    <tbody>';
    $_SESSION['xls']="ΕΠΩΝΥΜΟ \t ΟΝΟΜΑ \t ΔΙΕΥΘΥΝΣΗ \t ΓΕΝΙΚΗ ΔΙΕΥΘΥΝΣΗ \t ΚΑΤΑΣΤΑΣΗ \t ΕΝΑΡΞΗ ΑΔΕΙΑΣ \t ΛΗΞΗ ΑΔΕΙΑΣ \t \n";
    while ( $record = $statement->fetch() ) {
        $hasany=true;
        $results++;
        if ($record['katastasi_id']==0)
        {
            $katastasi="Αιτήθηκε Αδείας";
        }
        else
        {
            $katastasi="Σε Άδεια";
        }
        $_SESSION['xls'] .= $record['epitheto']." \t ".$record['onoma']." \t ".$record['dname']." \t ".$record['gdname']." \t ".$katastasi." \t ".substr($record['date_starts'], 0, 10)." \t ".substr($record['date_ends'], 0, 10)." \t \n";
        echo '<tr><td>'.$record['epitheto'].'</td><td>'.$record['onoma'].'</td><td>'.$record['dname'].'</td><td>'.$record['gdname'].'</td><td>'.$katastasi.'</td><td>'.substr($record['date_starts'], 0, 10).'</td><td>'.substr($record['date_ends'], 0, 10).'</td></tr>';
    }    
    }
    
    echo '</tbody></table></div>';
    if($hasany==false)
    {
         echo '<p class="center">Κανένας υφιστάμενος δεν είναι απών την ημερομηνία που επιλέξατε</p>';
    }
    else {
         echo '<p class="center">Αριθμός υφισταμένων που βρέθηκαν: '.$results.'</p>';
    echo '<a href="excel.php?filename=Αναφορά_Απόντων_Μεταξύ_'.$_POST['date_starts'].'_και_'.$_POST['date_ends'].'"><button type="button" class="btn btn-success"><i class="fa fa-file-excel-o fa-fw"></i>Εξαγωγή σε Excel</button></a>';
    }
    $statement->closeCursor();
    $pdoObject = null;  
  } catch (PDOException $e) {  
      die("Database Error: " . $e->getMessage());
    }
      }
//  }
?>
