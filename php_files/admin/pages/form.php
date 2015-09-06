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
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Παρακαλώ συμπληρώστε την παρακάτω φόρμα
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form">
                                        <div class="form-group">
                                            <label>Αριθμός Ημερών Άδειας</label>
                                            <input class="form-control" type="number" min="1">
                                        </div>
                                        <div class="form-group">
                                            <label>Είδος Άδειας</label>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="1" checked="true" onclick="radio_checked();">Κανονική
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="optionsRadios" id="optionsRadios2" value="2" onclick="radio_checked();">Σχολική
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="optionsRadios" id="optionsRadios3" value="3" onclick="radio_checked();">Ειδική
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Είδος Ειδικής Άδειας</label>
                                            <select class="form-control" id="special" disabled="true">
                                                <option>Γάμου</option>
                                                <option>Μητρότητας (κύηση, λοχείας, υιοθεσίας)</option>
                                                <option>Ανατροφής Τέκνου</option>
                                                <option>Θανάτου</option>
                                                <option>Χωρίς Αποδοχές</option>
                                                <option>Υπηρεσιακής Εκπαίδευσης</option>
                                                <option>Επιμορφωτική</option>
                                                <option>Εξετάσεων</option>
                                                <option>Νοσήματος Περιοδικής Νοσηλείας</option>
                                                <option>Αναπηρίας</option>
                                                <option>Αιμοδοσίας</option>
                                                <option>Εκλογική</option>
                                                <option>Συμμετοχής σε Δίκη</option>
                                                <option>Συνδικαλιστική</option>
                                                <option>Ειδική Άδεια Αιρετών</option>
                                                <option>Αναρρωτική Βραχυχρόνια (Υπεύθυνη Δήλωση)</option>
                                                <option>Αναρρωτική Βραχυχρόνια (Ιατρική Γνωμάτευση)</option>
                                                <option>Αναρρωτική Μεγάλης Διάρκειας</option>
                                                <option>Παράταση Αναρρωτικής Άδειας</option>
                                                <option>Ειδική Αναρωτική λόγω Κυοφορίας</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Ημερομηνία Έναρξης</label>
                                            <input class="form-control" type="date" id ="adeia_start" name="adeia_start" min="<?php echo date("Y-m-d"); ?>">
                                        </div>   
                                        <div class="form-group">
                                            <label>Ημερομηνία Λήξης</label>
                                            <input class="form-control" type="date" id ="adeia_end" name="adeia_end" min="<?php echo date("Y-m-d"); ?>">
                                        </div>  
                                        <button type="submit" class="btn btn-default">Υποβολή</button>
                                        <button type="reset" class="btn btn-default">Καθαρισμός</button>
                                    </form>
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
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
    
    <script type="text/javascript">

function validate_Form() {
  var result=true;
  var errorString="";
  if (errorString!=="") alert("Εντοπίστηκαν τα ακόλουθα σφάλματα:\n\n" + errorString);
  return result;
}

function radio_checked() {
    
    var radio = document.getElementById("optionsRadios3");
    if (radio.checked)
    {
        document.getElementById("special").disabled=false
    }
    else
    {
        document.getElementById("special").disabled=true;
    }
}

</script>

</body>

</html>