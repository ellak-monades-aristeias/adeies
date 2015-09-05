<?php require("header.php"); ?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Κεντρική Σελίδα</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
			<?php if ($_SESSION["username"]=="testuser")
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
                                    <div class="huge">0</div>
                                    <div>Υπόλοιπο Ημερών Άδειας</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
				</div>
			   <div class="panel panel-primary">
                        <div class="panel-heading">
                            Καλωσήρθατε "<?php echo $_SESSION['username']; ?>"
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
                                    <div class="huge">0</div>
                                    <div>Αιτήσεις προς Επεξεργασία</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">Λεπτομέρειες</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
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
                                    <div class="huge">0</div>
                                    <div>Επεξεργασμένες Αιτήσεις</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">Λεπτομέρειες</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
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
                                    <div class="huge">0</div>
                                    <div>Υπόλοιπο Ημερών Άδειας</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
				</div>
				<div class="panel panel-primary">
                        <div class="panel-heading">
                            Καλωσήρθατε "<?php echo $_SESSION['username']; ?>"
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
