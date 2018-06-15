<?php
session_start();

include "config.php";

if(!isset($_SESSION['username'])){
    header("location:login.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <?php include 'title.php'; ?>

    <link rel="shortcut icon" type="image/icon" href="images/favicon.ico"/>

    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link href="css/style.css" rel="stylesheet">
</head>
<body>
    <?php include 'header.php'; 

    ?>
    
    <?php
    if(isset($_GET['page'])){
        $page = $_GET['page'];
    }
    else if (isset($_GET['tambah'])) {
        $tambah = @$_GET['tambah'];
    }

    if (@$page=='member') {        
        include 'member.php';
    }
    else if(@$page=='ruang'){
        include 'ruang.php';
    }
    else if(@$page=='data'){
        include 'data.php';
    }

    else if(@$tambah=='tambah-member'){
        include 'tambah-member.php';
    }
    else if(@$tambah=='tambah-ruang'){
        include 'tambah-ruang.php';
    }
    ?>

    <?php include 'footer.php'; ?>

    <!-- <script type="text/javascript" src="js/jquery.min.js"></script> -->
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="js/custom.js"></script>

</body>
</html>