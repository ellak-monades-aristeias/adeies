<?php
 /*Πρότυπο φόρμας εισαγωγής στοιχείων αιτούμενου αδείας*/
?>
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Φόρμα Αίτησης Κανονικής Άδειας</title>
<!--        <link href="CSS/sitecss.css" rel="stylesheet" type="text/css" />-->
    </head>
      <body>
          <?php
          //Πρώτα θα εκτελείται SQL Ερώτημα ώστε να βρίσκουμε τις ημέρες που έχει διαθέσιμες ο υπάλληλος
          $days_available = 5;
?>
          
          <script type="text/javascript">

function validate_Form() {
  var result=true;
  var errorString="";
  if (errorString!=="") alert("Εντοπίστηκαν τα ακόλουθα σφάλματα:\n\n" + errorString);
  return result;
}

function check1stdate() {
    
    var date = new Date(document.getElementById("adeia_start").value);
    var enddate = new Date(date);
    var minenddate = new Date(date);
    if (date !== null)
    {
        var adeiaend = document.getElementById("adeia_end");
        adeiaend.disabled = false;
        adeiaend.value=null;
        enddate.setDate(enddate.getDate() + <?php echo $days_available; ?>);
        minenddate.setDate(minenddate.getDate() + 1);
        adeiaend.setAttribute("max", enddate.toISOString().substring(0, 10));
        adeiaend.setAttribute("min", minenddate.toISOString().substring(0, 10));
        document.getElementById("epilegmenes_hmeres").innerHTML = null;
    }
}

function check2nddate() {
    var startdate = new Date(document.getElementById("adeia_start").value);
    var enddate = new Date(document.getElementById("adeia_end").value);
    
    document.getElementById("epilegmenes_hmeres").innerHTML = (enddate-startdate)/86400000;
}

</script>
        <div id="container">
            <div id="header">
                
            </div>
            <div id="main">
                <form name="aitisiForm" method="post" action="aitisiHandler.php" id="aitisiForm" onSubmit="return validate_Form();"/>
                   <table width="100%">
           <tr>
               <td class="right">Υπόλοιπο Αδειών:</td><td><span id="ypoloipo_hmeron"><?php echo $days_available; ?></span> ημέρες</td>
           </tr>
           <tr>
               <td class="right">Ημερομηνία Έναρξης Άδειας:</td><td><input type="date" id ="adeia_start" name="adeia_start" min="<?php echo date("Y-m-d"); ?>" onchange="check1stdate();"> </td>
           </tr>
           <tr>
               <td class="right">Ημερομηνία Λήξης Άδειας:</td><td><input type="date" disabled id="adeia_end" name="adeia_end" onchange="check2nddate();"></td>
           </tr>
           <tr>
               <td class="right">Ημέρες που Επιλέξατε:</td><td><span id="epilegmenes_hmeres"></span></td>
           </tr>
           
        </table>
                  <hr/>
                     
                      <p class="center"><input name="submit" class="btn" type="submit" value="Υποβολή">&nbsp;&nbsp;<input type="reset" class="btn" value="Καθαρισμός"></p>
         </form>
                
                
            </div>
        </div>
      </body>
</html>
