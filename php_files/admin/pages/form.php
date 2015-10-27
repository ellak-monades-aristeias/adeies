<?php require("header.php"); ?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Αίτηση Άδειας</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="well">
<!--                        <div class="panel-heading">
                            Παρακαλώ συμπληρώστε την παρακάτω φόρμα
                        </div>-->
<!--                        <div class="panel-body">-->
                            <div class="row">
                                <div class="col-lg-12">
                                    <form name="adeiaform" method="post" action="form_handler.php?mode=add" onSubmit="return validate_Form();">
                                        <div class="form-group">
                                            <label>Αριθμός Ημερών Άδειας</label>
                                            <input class="form-control" name="ar_adeiwn" id="ar_adeiwn" type="number" min="1">
                                        </div>
                                        <div class="form-group">
                                            <label>Είδος Άδειας</label>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="typos_id" id="typos_id1" value="0" onclick="radio_checked();" checked="true">Κανονική
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="typos_id" id="typos_id2" onclick="radio_checked();" value="1">Σχολική
                                                </label>
                                            </div>
                                            <?php if ($_SESSION['idiotita']>1)
                                            { ?>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="typos_id" id="typos_id3" value="2" onclick="radio_checked();">Τηλεφωνική, για λογαριασμό του/της: 
                                                    <select class="form-control" name="ypallhlos_telephone" id="ypallhlos_telephone" disabled="true">
                                                        <?php try { 
      $pdoObject = new PDO("mysql:host=$dbhost;dbname=$dbname;charset=UTF8", $dbuser, $dbpass);
      $pdoObject -> exec("set names utf8");
      if ($_SESSION['idiotita']==2)
      {
      $sql = "SELECT epitheto, onoma, ypallhlosid FROM ypallhlos WHERE dieuthinsiid=:dieuthinsiid AND idiotita_id<:idiotita_id ORDER BY epitheto ASC";
      $statement = $pdoObject -> prepare($sql);
      $statement->execute( array(':dieuthinsiid'=>$_SESSION['dieuthinsiid'], ':idiotita_id'=>$_SESSION['idiotita']));
      while ($record = $statement -> fetch()) {
          echo "<option value='".$record['ypallhlosid']."'>".$record['epitheto']."&nbsp".$record['onoma']."</option>";
      }
      $statement->closeCursor();
      $pdoObject = null;
      }
      else if ($_SESSION['idiotita']==3)
      {
         $sql = "SELECT epitheto, onoma, ypallhlosid FROM ypallhlos WHERE genikidid=:genikidid AND idiotita_id<:idiotita_id ORDER BY epitheto ASC";
      $statement = $pdoObject -> prepare($sql);
      $statement->execute( array(':genikidid'=>$_SESSION['genikidid'], ':idiotita_id'=>$_SESSION['idiotita']));
      while ($record = $statement -> fetch()) {
          echo "<option value='".$record['ypallhlosid']."'>".$record['epitheto']."&nbsp".$record['onoma']."</option>";
      }
      $statement->closeCursor();
      $pdoObject = null; 
      }
      else {
           $sql = "SELECT epitheto, onoma, ypallhlosid FROM ypallhlos WHERE idiotita_id<:idiotita_id ORDER BY epitheto ASC";
      $statement = $pdoObject -> prepare($sql);
      $statement->execute( array(':idiotita_id'=>$_SESSION['idiotita']));
      while ($record = $statement -> fetch()) {
          echo "<option value='".$record['ypallhlosid']."'>".$record['epitheto']."&nbsp".$record['onoma']."</option>";
      }
      $statement->closeCursor();
      $pdoObject = null; 
      }
    } catch (PDOException $e) {
        print "Database Error: " . $e->getMessage();
        die("Αδυναμία δημιουργίας PDO Object");
    } 
      
                                                        
                                                        
                                                        ?>
                                                
                     
                                            </select>
                                                </label>
                                            </div>
                                            <?php } ?>
<!--                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="typos_id" id="typos_id3" value="2" onclick="radio_checked();">Ειδική
                                                </label>
                                            </div>-->
                                        </div>
<!--                                        <div class="form-group">
                                            <label>Είδος Ειδικής Άδειας</label>
                                            <select class="form-control" id="special" disabled="true">
                                                <option>Αιμοδοσίας</option>
                                                <option>Αναπηρίας</option>
                                                <option>Αναρρωτική Βραχυχρόνια (Ιατρική Γνωμάτευση)</option>
                                                <option>Αναρρωτική Βραχυχρόνια (Υπεύθυνη Δήλωση)</option>
                                                <option>Αναρρωτική Μεγάλης Διάρκειας</option>
                                                <option>Ανατροφής Τέκνου</option>
                                                <option>Γάμου</option>
                                                <option>Ειδική Άδεια Αιρετών</option>
                                                <option>Ειδική Αναρωτική λόγω Κυοφορίας</option>
                                                <option>Εκλογική</option>
                                                <option>Εξετάσεων</option>
                                                <option>Επιμορφωτική</option>
                                                <option>Θανάτου</option>
                                                <option>Μητρότητας (κύηση, λοχείας, υιοθεσίας)</option>
                                                <option>Νοσήματος Περιοδικής Νοσηλείας</option>
                                                <option>Παράταση Αναρρωτικής Άδειας</option>
                                                <option>Συμμετοχής σε Δίκη</option>
                                                <option>Συνδικαλιστική</option>
                                                <option>Υπηρεσιακής Εκπαίδευσης</option>
                                                <option>Χωρίς Αποδοχές</option>
                                            </select>
                                        </div>-->
                                        <div class="form-group">
                                            <label>Ημερομηνία Έναρξης</label>
                                           <input class="form-control" name="date_starts" id="dpd1" size="16" type="text" value="ΕΕΕΕ/ΜΜ/ΗΗ"/>
                                        </div>   
                                        <div class="form-group">
                                            <label>Ημερομηνία Λήξης</label>
                                            <input class="form-control" name="date_ends" id="dpd2" size="16" type="text" value="ΕΕΕΕ/ΜΜ/ΗΗ"/>
                                        </div>  
                                        <button type="submit" class="btn btn-default">Υποβολή</button>
                                        <button type="reset" class="btn btn-default">Καθαρισμός</button>
                                    </form>
                                </div>
                            </div>
                            <!-- /.row (nested) -->
<!--                        </div>-->
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
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
    
    <script src="../addons/datepicker/js/bootstrap-datepicker.js"></script>
    
    <script type="text/javascript">

function validate_Form() {
  var result=true;
  var errorString="";
  var passcheckDigit = /[0-9]/g;
  var passcheckDate = /^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/;
  var ar_adeiwn = document.getElementById("ar_adeiwn").value;
  var dpd1= document.getElementById("dpd1").value;
  var dpd2= document.getElementById("dpd2").value;
  if (ar_adeiwn!=""){
   if (passcheckDigit.test(ar_adeiwn)==false)
   {
       result=false;
       errorString+="-Μόνο αριθμοί επιτρέπονται στο πεδίο ημερών άδειας \n";
   }
   if (passcheckDigit.test(ar_adeiwn)==true && ar_adeiwn<=0)
   {
       result=false;
       errorString+="-Οι ημέρες άδειας πρέπει να είναι θετικός αριθμός \n";
   }
  }
  else {
       result=false;
       errorString+="-Το πεδίο 'Αριθμός Ημερών Άδειας' είναι υποχρεωτικό \n";
  }
  if (passcheckDate.test(dpd1)==false)
  {
       result=false;
       errorString+="-Πρέπει να συμπληρώσετε σωστά την Ημερομηνία Έναρξης \n";
  }
  if (passcheckDate.test(dpd2)==false)
  {
       result=false;
       errorString+="-Πρέπει να συμπληρώσετε σωστά την Ημερομηνία Λήξης \n";
  }
  if (dpd1>dpd2)
  {
      result=false;
       errorString+="-Η Ημερομηνία Λήξης πρέπει να είναι μεταγενέστερη της Ημερομηνίας Έναρξης \n";
  }
  if (errorString!=="") alert("Εντοπίστηκαν τα ακόλουθα σφάλματα:\n\n" + errorString);
  return result;
}

function radio_checked() {
    
    var radio = document.getElementById("typos_id3");
    if (radio.checked)
    {
        document.getElementById("ypallhlos_telephone").disabled=false
    }
    else
    {
        document.getElementById("ypallhlos_telephone").disabled=true;
    }
}

 $(document).ready(function(){
     
         var nowTemp = new Date();
var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
 $('#dpd1').datepicker({
				format: 'yyyy-mm-dd'
			});
                        $('#dpd2').datepicker({
				format: 'yyyy-mm-dd'
			});
var checkin = $('#dpd1').datepicker({
  onRender: function(date) {
    return date.valueOf() < now.valueOf() ? 'disabled' : '';
  }
}).on('changeDate', function(ev) {
  if (ev.date.valueOf() > checkout.date.valueOf()) {
    var newDate = new Date(ev.date)
    newDate.setDate(newDate.getDate() + 1);
    checkout.setValue(newDate);
  }
  checkin.hide();
  $('#dpd2')[0].focus();
}).data('datepicker');
var checkout = $('#dpd2').datepicker({
  onRender: function(date) {
    return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
  }
}).on('changeDate', function(ev) {
  checkout.hide();
}).data('datepicker');
       });
</script>

</body>

</html>
