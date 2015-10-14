<?php require("header.php"); ?>
<?php 
try {
    $pdoObject = new PDO("mysql:host=$dbhost;dbname=$dbname;", $dbuser, $dbpass);
    $pdoObject -> exec("set names utf8");
    if ($_SESSION['idiotita']==3){
    $sql = "SELECT dieuthinsiid, dname FROM dieuthinsi WHERE genikidid=:genikidid ORDER BY dname ASC";
    $statement = $pdoObject->prepare($sql);
    $statement->execute( array(':genikidid'=>$_SESSION['genikidid']));
    $option="";
    while ( $record = $statement->fetch() ) {
        $option.="<option value='".$record["dieuthinsiid"]."'>".$record["dname"]."</option>";
    }
    }
    else if ($_SESSION['idiotita']==4 || $_SESSION['idiotita']==5){
    $sql = "SELECT dieuthinsiid, dname FROM dieuthinsi ORDER BY dname ASC";
    $statement = $pdoObject->prepare($sql);
    $statement->execute( array());
    $option="";
    while ( $record = $statement->fetch() ) {
        $option.="<option value='".$record["dieuthinsiid"]."'>".$record["dname"]."</option>";
    }
    }
    $statement->closeCursor();
    $pdoObject = null;  
  } catch (PDOException $e) {  
      die("Database Error: " . $e->getMessage());
    }


?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Αναφορές</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
             <div class="col-lg-12">
                 <div class="panel panel-info">
                 <?php if ($_GET["mode"]==1)
                 { ?>
                    <div class="panel-heading">Παρόντες υφιστάμενοι ανά ημερομηνία</div>
                    <div class="panel-body">
                        <label>Επιλέξτε την ημερομηνία που σας ενδιαφέρει</label>
                        <input class="form-control , col-lg-3" name="date_parontes" id="dpd1" size="16" type="text" value="ΕΕΕΕ/ΜΜ/ΗΗ"/>
                        <div id="results"><br></div>
                    </div>      
                 <?php } else if ($_GET["mode"]==2)
                 { ?>
                    <div class="panel-heading">Απόντες υφιστάμενοι ανά ημερομηνία</div>
                    <div class="panel-body">
                        <label>Επιλέξτε την ημερομηνία που σας ενδιαφέρει</label>
                        <input class="form-control , col-lg-3" name="date_apontes" id="dpd2" size="16" type="text" value="ΕΕΕΕ/ΜΜ/ΗΗ"/>
                        <div id="results"><br></div>
                    </div>  
                 <?php } else if ($_GET["mode"]==3)
                 { ?>
                    <div class="panel-heading">Απόντες υφιστάμενοι μεταξύ διαστήματος ημερομηνιών</div>
                    <div class="panel-body">
                        <div class="form-group">
                                            <label>Ημερομηνία Έναρξης</label>
                                           <input class="form-control" name="date_starts" id="dpd3" size="16" type="text" value="ΕΕΕΕ/ΜΜ/ΗΗ"/>
                                        </div>   
                                        <div class="form-group">
                                            <label>Ημερομηνία Λήξης</label>
                                            <input class="form-control" name="date_ends" id="dpd4" size="16" type="text" value="ΕΕΕΕ/ΜΜ/ΗΗ"/>
                                        </div>
                        <div id="results"><br></div>
                    </div>  
                 <?php } else if ($_GET["mode"]==4)
                 { ?>
                    <div class="panel-heading">Αναλυτική Μηνιαία Aναφορά</div>
                    <div class="panel-body">
                        <?php if ($_SESSION['idiotita']>2) { ?>
                        <label>Επιλέξτε τη διεύθυνση που σας ενδιαφέρει</label>
                        <select class="form-control" id="dieuthinsi">
                            <?php echo $option; ?>
                        </select>
                        <?php } ?>
                        <label>Επιλέξτε τον μήνα που σας ενδιαφέρει</label>
                        <input class="form-control" name="date_month" id="dpd5" size="16" type="text" value="ΕΕΕΕ/ΜΜ"/>
                        <div id="results"><br></div>
                    </div>
                 <?php } else if ($_GET["mode"]==5)
                 { ?>
                    <div class="panel-heading">Αναλυτική Ετήσια Aναφορά</div>
                    <div class="panel-body">
                        <?php if ($_SESSION['idiotita']>2) { ?>
                        <label>Επιλέξτε τη διεύθυνση που σας ενδιαφέρει</label>
                        <select class="form-control" id="dieuthinsi">
                            <?php echo $option; ?>
                        </select>
                        <?php } ?>
                        <label>Επιλέξτε το έτος που σας ενδιαφέρει</label>
                        <input class="form-control" name="date_year" id="dpd6" size="16" type="text" value="ΕΕΕΕ"/> 
                        <div id="results"><br></div>
                    </div>  
                 <?php } else {} ?>
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
    
    <!-- DataTables JavaScript -->
    <script src="../bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
    
    <script src="../addons/datepicker/js/bootstrap-datepicker.js"></script>
    
    <script type="text/javascript">

 $(document).ready(function(){
     
         var nowTemp = new Date();
var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
 $('#dpd1').datepicker({
				format: 'yyyy-mm-dd'
			});
                        $('#dpd2').datepicker({
				format: 'yyyy-mm-dd'
			});
                        $('#dpd3').datepicker({
				format: 'yyyy-mm-dd'
			});
                        $('#dpd4').datepicker({
				format: 'yyyy-mm-dd'
			});
                         $('#dpd5').datepicker({
				format: 'yyyy-mm',
                                viewMode: 'months',
                                minViewMode: 'months'
			});
                        $('#dpd6').datepicker({
				format: 'yyyy-',
                                viewMode: 'years',
                                minViewMode: 'years'
			});
                        
var one = $('#dpd1').datepicker()
   .on('changeDate', function(ev) {
    one.hide();
    search('mode1');
    
 }).data('datepicker');
 
 var two = $('#dpd2').datepicker()
   .on('changeDate', function(ev) {
    two.hide();
    search('mode2');
    
 }).data('datepicker');
 
  var three = $('#dpd4').datepicker()
   .on('changeDate', function(ev) {
    three.hide();
    search('mode3');
    
 }).data('datepicker');
 
 var four = $('#dpd5').datepicker()
   .on('changeDate', function(ev) {
    four.hide();
    search('mode4');
    
 }).data('datepicker');
 
 var five = $('#dpd6').datepicker()
   .on('changeDate', function(ev) {
    five.hide();
    search('mode5');
    
 }).data('datepicker');
 
var checkin = $('#dpd3').datepicker({
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
  $('#dpd4')[0].focus();
}).data('datepicker');
var checkout = $('#dpd4').datepicker({
  onRender: function(date) {
    return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
  }
}).on('changeDate', function(ev) {
  checkout.hide();
}).data('datepicker');
       });
       
       function search(mode) {
	var xmlhttp;
	if (window.XMLHttpRequest) {
		xmlhttp=new XMLHttpRequest();
	}
	else if (window.ActiveXObject) {
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	else {
		alert("Your browser does not support XMLHTTP!");
  }
  
  var d = new Date();
  var url= "statLoader.php?foo="+d;  
  document.getElementById('results').innerHTML="&nbsp;&nbsp;<img src='img/AjaxLoader.gif' class='spinner' alt='Spinner'/>";
  if (mode=='mode1'){
  var date= document.getElementById("dpd1").value;
  xmlhttp.open("POST",url,true);
  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xmlhttp.send("date="+date+"&mode=1");  
  }
  else if (mode=='mode2'){
  var date= document.getElementById("dpd2").value;
  xmlhttp.open("POST",url,true);
  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xmlhttp.send("date="+date+"&mode=2");   
  }
  else if (mode=='mode3')
      {
  var date_starts= document.getElementById("dpd3").value;
  var date_ends= document.getElementById("dpd4").value;
  xmlhttp.open("POST",url,true);
  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xmlhttp.send("date_starts="+date_starts+"&date_ends="+date_ends+"&mode=3");   
  }
  xmlhttp.onreadystatechange=function() {
		if(xmlhttp.readyState==4 && xmlhttp.status==200) {
			document.getElementById("results").innerHTML= xmlhttp.responseText;
                        initiate();
		} else 
        document.getElementById("results").innerHTML= "Σφάλμα φόρτωσης!";
	}       
}

    function initiate() {
    $('#dataTables-example').DataTable( {
        language: {
            lengthMenu: "Εμφάνιση _MENU_ καταχωρήσεων ανά σελίδα",
            zeroRecords: "Κανένα Αποτέλεσμα",
            info: "Σελίδα _PAGE_ από _PAGES_",
            infoEmpty: "Δεν υπάρχουν διαθέσιμα δεδομένα",
            infoFiltered: "(φιλτραρίστηκαν _MAX_ συνολικές καταχωρήσεις)",
            loadingRecords: "Φόρτωση...",
            processing:     "Επεξεργασία...",
    search:         "Αναζήτηση:",
    paginate: {
        first:      "Πρώτη",
        last:       "Τελευταία",
        next:       "Επόμενη",
        previous:   "Προηγούμενη"
    },
    aria: {
        sortAscending:  ": αύξουσα ταξινόμηση",
        sortDescending: ": φθίνουσα ταξινόμηση"
    }
        }
    } );
}
    </script>


</body>

</html>
