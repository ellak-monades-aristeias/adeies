<?php require("is_logged_in.php"); ?>
<?php require("functions.php"); ?>
<?php require("db_params.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Ntemos Dimitrios">

    <title>Περιφέρεια Δυτικής Μακεδονίας - Σύστημα Διαχείρισης Αδειών</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="../dist/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    
    <link href="../addons/datepicker/css/datepicker.css" rel="stylesheet">
    
    <!-- DataTables CSS -->
    <link href="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
<!--    <link href="../bower_components/morrisjs/morris.css" rel="stylesheet">-->

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">
        <?php try { 
      $pdoObject = new PDO("mysql:host=$dbhost;dbname=$dbname;charset=UTF8", $dbuser, $dbpass);
      $pdoObject -> exec("set names utf8");
      $sql = "SELECT onoma, epitheto FROM ypallhlos WHERE username=:username";
      $statement = $pdoObject -> prepare($sql);
      $statement->execute( array(':username'=>$_SESSION["username"]));
      if ($record = $statement -> fetch()) {
        $record_exists=true;
        $onoma=$record['onoma'];
        $epitheto=$record['epitheto'];
      } else $record_exists=false;  
      $statement->closeCursor();
      $pdoObject = null;
    } catch (PDOException $e) {
        print "Database Error: " . $e->getMessage();
        die("Αδυναμία δημιουργίας PDO Object");
    } 
    ?>

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="home.php">Περιφέρεια Δυτικής Μακεδονίας - Σύστημα Διαχείρισης Αδειών</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <?php echo $onoma.' '.$epitheto ?> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="userdetails.php"><i class="fa fa-user fa-fw"></i> Λογαριασμός</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="login_handler.php?action=logout"><i class="fa fa-sign-out fa-fw"></i> Έξοδος</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="home.php"><i class="fa fa-home fa-fw"></i> Κεντρική Σελίδα</a>
                        </li>
						<li>
                            <a href="form.php"><i class="fa fa-edit fa-fw"></i> Νέα Αίτηση</a>
                        </li>
                        <li>
                            <a href="myforms.php"><i class="fa fa-file-word-o fa-fw"></i> Οι Αιτήσεις μου</a>
                        </li>
						<?php if ($_SESSION["idiotita"]!="0")
			       {?>
						<li>
                                                    <a href="form_evaluate.php"><i class="fa fa-users fa-fw"></i> Αιτήσεις Υπαλλήλων</a>
                        </li>
                        <?php } ?>
                        <?php if ($_SESSION["idiotita"]>"1")
			       {?>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Στατιστικά Αδειών<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level collapse" aria-expanded="false" style="height: 0px;">
                                <li>
                                    <a href="stats.php?mode=1">Παρόντες Υπάλληλοι</a>
                                </li>
                                <li>
                                    <a href="stats.php?mode=2">Απόντες Υπάλληλοι</a>
                                </li>
                                <li>
                                    <a href="stats.php?mode=3">Απόντες Μεταξύ Διαστήματος</a>
                                </li>
                                <li>
                                    <a href="stats.php?mode=4">Μηνιαία-Ετήσια Αναφορά</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
				   <?php } ?>
                    </ul>
                    <?php echo_msg(); ?>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
