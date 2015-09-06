<?php require("db_params.php"); ?>
<?php require("header.php"); ?>
<?php try { 
      $pdoObject = new PDO("mysql:host=$dbhost;dbname=$dbname;charset=UTF8", $dbuser, $dbpass);
      $pdoObject -> exec("set names utf8");
      $sql = "SELECT ypoloipo_adeion_trexon FROM ypallhlos WHERE username=:username";
      $statement = $pdoObject -> prepare($sql);
      $statement->execute( array(':username'=>$_SESSION["username"]));
      if ($record = $statement -> fetch()) {
        $record_exists=true;
        $adeiestrexon=$record['ypoloipo_adeion_trexon']; 
      } else $record_exists=false; 
      
      if ($_SESSION['idiotita']=='1')
      {
        $sql = "SELECT Count(adeies.adeia_id) AS count_adeies FROM adeies INNER JOIN ypallhlos ON adeies.ypallhlosid=ypallhlos.ypallhlosid WHERE (ypallhlos.tmimaid=:tmimaid) AND (ypallhlos.ypallhlosid!=:ypallhlosid) AND (adeies.katastasi_id=0)";
        $statement = $pdoObject -> prepare($sql);
        $statement->execute( array(':tmimaid'=>$_SESSION['tmimaid'], ':ypallhlosid'=>$_SESSION['ypallhlosid']));
        if ($record = $statement -> fetch()) {
          $count_new=$record['count_adeies'];

      } 
      $sql = "SELECT Count(adeies.adeia_id) AS count_adeies FROM adeies INNER JOIN ypallhlos ON adeies.ypallhlosid=ypallhlos.ypallhlosid WHERE (ypallhlos.tmimaid=:tmimaid) AND (ypallhlos.ypallhlosid!=:ypallhlosid) AND (adeies.katastasi_id!=0)";
        $statement = $pdoObject -> prepare($sql);
        $statement->execute( array(':tmimaid'=>$_SESSION['tmimaid'], ':ypallhlosid'=>$_SESSION['ypallhlosid']));
        if ($record = $statement -> fetch()) {
          $count_ready=$record['count_adeies'];

      } 
      
      }
      else if ($_SESSION['idiotita']=='2')
      {
        $sql = "SELECT Count(adeies.adeia_id) AS count_adeies FROM adeies INNER JOIN ypallhlos ON adeies.ypallhlosid=ypallhlos.ypallhlosid WHERE (ypallhlos.dieuthinsiid=:dieuthinsiid) AND (ypallhlos.ypallhlosid!=:ypallhlosid) AND (adeies.katastasi_id=0)";
        $statement = $pdoObject -> prepare($sql);
        $statement->execute( array(':dieuthinsiid'=>$_SESSION['dieuthinsiid'], ':ypallhlosid'=>$_SESSION['ypallhlosid']));
        if ($record = $statement -> fetch()) {
          $count_new=$record['count_adeies'];

      } 
      $sql = "SELECT Count(adeies.adeia_id) AS count_adeies FROM adeies INNER JOIN ypallhlos ON adeies.ypallhlosid=ypallhlos.ypallhlosid WHERE (ypallhlos.dieuthinsiid=:dieuthinsiid) AND (ypallhlos.ypallhlosid!=:ypallhlosid) AND (adeies.katastasi_id!=0)";
        $statement = $pdoObject -> prepare($sql);
        $statement->execute( array(':dieuthinsiid'=>$_SESSION['dieuthinsiid'], ':ypallhlosid'=>$_SESSION['ypallhlosid']));
        if ($record = $statement -> fetch()) {
          $count_ready=$record['count_adeies'];

      } 
      
      }
      else if ($_SESSION['idiotita']=='3' || $_SESSION['idiotita']=='4' || $_SESSION['idiotita']=='5')
      {
        $sql = "SELECT Count(adeies.adeia_id) AS count_adeies FROM adeies INNER JOIN ypallhlos ON adeies.ypallhlosid=ypallhlos.ypallhlosid WHERE (ypallhlos.genikidid=:genikidid) AND (ypallhlos.ypallhlosid!=:ypallhlosid) AND (adeies.katastasi_id=0)";
        $statement = $pdoObject -> prepare($sql);
        $statement->execute( array(':genikidid'=>$_SESSION['genikidid'], ':ypallhlosid'=>$_SESSION['ypallhlosid']));
        if ($record = $statement -> fetch()) {
          $count_new=$record['count_adeies'];

      } 
      $sql = "SELECT Count(adeies.adeia_id) AS count_adeies FROM adeies INNER JOIN ypallhlos ON adeies.ypallhlosid=ypallhlos.ypallhlosid WHERE (ypallhlos.genikidid=:genikidid) AND (ypallhlos.ypallhlosid!=:ypallhlosid) AND (adeies.katastasi_id!=0)";
        $statement = $pdoObject -> prepare($sql);
        $statement->execute( array(':genikidid'=>$_SESSION['genikidid'], ':ypallhlosid'=>$_SESSION['ypallhlosid']));
        if ($record = $statement -> fetch()) {
          $count_ready=$record['count_adeies'];

      } 
      
      }
      
          
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
                    <h1 class="page-header">Κεντρική Σελίδα</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
			<?php if ($_SESSION["idiotita"]=="0")
			       {?>
			   <div class="row">
                    <div class="col-lg-3 col-md-6">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-calendar fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $adeiestrexon; ?></div>
                                    <div>Υπόλοιπο Ημερών Άδειας</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
				</div>
			   <div class="panel panel-primary">
                        <div class="panel-heading">
                            Καλώς Ορίσατε
                        </div>
                        <div class="panel-body">
                            <p>Χρησιμοποιώντας το Σύστημα Διαχείρισης Αδειών της Περιφέρειας Δυτικής Μακεδονίας, έχετε τη δυνατότητα να καταχωρήσετε νέα
							αίτηση άδειας, να ελέγξετε την πορεία της καταχωρημένης αίτησής σας, να λάβετε αντίγραφο της αίτησής σας σε μορφή PDF καθώς και
							να έχετε μια επισκόπιση όλων των αιτήσεων που έχετε υποβάλλει ως τώρα.</p>
                        </div>
                    </div>
					         
				   <?php }
                   else
				   {?>
					    <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-inbox fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $count_new; ?></div>
                                    <div>Αιτήσεις προς Επεξεργασία</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-list-alt fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $count_ready; ?></div>
                                    <div>Επεξεργασμένες Αιτήσεις</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
				<div class="col-lg-3 col-md-6">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-calendar fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $adeiestrexon; ?></div>
                                    <div>Υπόλοιπο Ημερών Άδειας</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
				</div>
				<div class="panel panel-primary">
                        <div class="panel-heading">
                            Καλώς Ορίσατε
                        </div>
                        <div class="panel-body">
                            <p>Χρησιμοποιώντας το Σύστημα Διαχείρισης Αδειών της Περιφέρειας Δυτικής Μακεδονίας, έχετε τη δυνατότητα να αξιολογήσετε
                            τις αιτήσεις των υπαλλήλων της διεύθυνσής σας, να καταχωρήσετε νέα
							αίτηση άδειας, να ελέγξετε την πορεία της καταχωρημένης αίτησής σας, να λάβετε αντίγραφο της αίτησής σας σε μορφή PDF καθώς και
							να έχετε μια επισκόπιση όλων των αιτήσεων που έχετε υποβάλλει ως τώρα.</p>
                        </div>
                    </div>
				   <?php }
	        ?>
            <!-- /.row -->
        
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../bower_components/raphael/raphael-min.js"></script>
    <script src="../bower_components/morrisjs/morris.min.js"></script>
    <script src="../js/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
