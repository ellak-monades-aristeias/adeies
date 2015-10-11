<?php require 'is_logged_in.php' ?>
<?php 
    $_SESSION['xls'] =  iconv ( 'UTF-8', 'UTF-16LE//IGNORE', $_SESSION['xls'] );
    header('Content-Transfer-Encoding: UTF-16LE');
    header("Content-type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=".$_GET['filename'].".xls");
    header("Pragma: no-cache");
    header("Expires: 0");
    echo chr(255).chr(254);echo $_SESSION['xls'];
?>