<?php require("header.php"); ?>
<?php try { 
      $pdoObject = new PDO("mysql:host=$dbhost;dbname=$dbname;charset=UTF8", $dbuser, $dbpass);
      $pdoObject -> exec("set names utf8");
      if ($_SESSION['idiotita']==0)
      {
      $sql = "SELECT * FROM adeies INNER JOIN ypallhlos ON ypallhlos.ypallhlosid=adeies.ypallhlosid INNER JOIN typos_adeias ON typos_adeias.typos_id=adeies.typos_id WHERE adeies.ypallhlosid=:ypallhlosid AND adeies.adeia_id=:adeia_id";
      $statement = $pdoObject -> prepare($sql);
      $statement->execute( array(':adeia_id'=>$_GET['id'], ':ypallhlosid'=>$_SESSION['ypallhlosid']));
      }
      else if ($_SESSION['idiotita']==1)
      {
      $sql = "SELECT * FROM adeies INNER JOIN ypallhlos ON ypallhlos.ypallhlosid=adeies.ypallhlosid INNER JOIN typos_adeias ON typos_adeias.typos_id=adeies.typos_id INNER JOIN tmima ON tmima.tmimaid=ypallhlos.tmimaid WHERE ypallhlos.tmimaid=:tmimaid AND adeies.adeia_id=:adeia_id";
      $statement = $pdoObject -> prepare($sql);
      $statement->execute( array(':adeia_id'=>$_GET['id'], ':tmimaid'=>$_SESSION['tmimaid']));
      }
      else if ($_SESSION['idiotita']==2)
      {
      $sql = "SELECT * FROM adeies INNER JOIN ypallhlos ON ypallhlos.ypallhlosid=adeies.ypallhlosid INNER JOIN typos_adeias ON typos_adeias.typos_id=adeies.typos_id INNER JOIN dieuthinsi ON dieuthinsi.dieuthinsiid=ypallhlos.dieuthinsiid WHERE ypallhlos.dieuthinsiid=:dieuthinsiid AND adeies.adeia_id=:adeia_id";
      $statement = $pdoObject -> prepare($sql);
      $statement->execute( array(':adeia_id'=>$_GET['id'], ':dieuthinsiid'=>$_SESSION['dieuthinsiid']));
      }
      else if ($_SESSION['idiotita']==3 || $_SESSION['idiotita']==4 || $_SESSION['idiotita']==5)
      {
      $sql = "SELECT * FROM adeies INNER JOIN ypallhlos ON ypallhlos.ypallhlosid=adeies.ypallhlosid INNER JOIN typos_adeias ON typos_adeias.typos_id=adeies.typos_id WHERE adeies.adeia_id=:adeia_id";
      $statement = $pdoObject -> prepare($sql);
      $statement->execute( array(':adeia_id'=>$_GET['id']));
      }
      if ($record = $statement -> fetch()) {
        $record_exists=true;
        $onoma=$record['onoma'];
        $epitheto=$record['epitheto'];
        $idiotita=$record['idiotita_id'];
        $type=$record['typosname'];
        $datesubmitted=$record['date_submitted'];
        $datestarts=$record['date_starts'];
        $dateends=$record['date_ends'];
        $katastasi=$record['katastasi_id'];
        
//        $tmima=$record['tmname'];
//        $gdieutthinsi=$record['gdname'];
//        $dieuthinsi=$record['dname'];
        $maxadeies=$record['max_adeies'];
        $adeiestrexon=$record['ypoloipo_adeion_trexon'];
        $adeiespalio=$record['ypoloipo_adeion_palio'];
        
      } else $record_exists=false; 

      $statement->closeCursor();
      $pdoObject = null;
    } catch (PDOException $e) {
        print "Database Error: " . $e->getMessage();
        die("Αδυναμία δημιουργίας PDO Object");
    } 
    ?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Λεπτομέρειες Αίτησης</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <?php 
                    if ($katastasi==0)
                    { ?>
                        <div class="panel panel-info">
                            <div class="panel-heading">Η αίτηση βρίσκεται σε στάδιο αξιολόγησης</div>
                   <?php }
                    else if ($katastasi==1)
                    { ?>
                        <div class="panel panel-success">
                            <div class="panel-heading">Η αίτηση εγκρίθηκε</div>
                   <?php }
                    else { ?>
                        <div class="panel panel-danger">
                            <div class="panel-heading">Η αίτηση απορρίφθηκε</div>
                    <?php }
                    ?>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Όνομα</label>
                                            <p class="form-control-static"><?php echo $onoma; ?></p>
                                        </div>
                                        <div class="form-group">
                                            <label>Επώνυμο</label>
                                            <p class="form-control-static"><?php echo $epitheto; ?></p>
                                        </div>
                                        <div class="form-group">
                                            <label>Μέγιστος Αριθμός Αδειών</label>
                                            <p class="form-control-static"><?php echo $maxadeies; ?></p>
                                        </div>
                                        <div class="form-group">
                                            <label>Τρέχον Υπόλοιπο Αδειών</label>
                                            <p class="form-control-static"><?php echo $adeiestrexon; ?></p>
                                        </div>
                                        <div class="form-group">
                                            <label>Παλαιό Υπόλοιπο Αδειών</label>
                                            <p class="form-control-static"><?php echo $adeiespalio; ?></p>
                                        </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                            <label>Είδος Άδειας</label>
                                            <p class="form-control-static"><?php echo $type; ?></p>
                                        </div>
                                    <div class="form-group">
                                            <label>Ημερομηνία Υποβολής</label>
                                            <p class="form-control-static"><?php echo $datesubmitted; ?></p>
                                        </div>
                                    <div class="form-group">
                                            <label>Επιθυμητή Ημερομηνία Έναρξης</label>
                                            <p class="form-control-static"><?php echo $datestarts; ?></p>
                                        </div>
                                    <div class="form-group">
                                            <label>Επιθυμητή Ημερομηνία Λήξης</label>
                                            <p class="form-control-static"><?php echo $dateends; ?></p>
                                        </div>
                                    <?php if($_SESSION['idiotita']>$idiotita)
                                                {
                                    if ($katastasi==0){ ?>
                                    <div class="form-group">
                                            <label>Ενέργειες</label>
                                            <p class="form-control-static">
                                                <?php 
                                                    echo '<button type="button" class="btn btn-outline btn-success">Έγκριση</button>&nbsp&nbsp<button type="button" class="btn btn-outline btn-danger">Απόρριψη</button>';                                             
                                                ?>
                                                
                                            </p>
                                        </div>
                                                <?php } } ?>
                                </div>
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src='../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>


</body>

</html>
