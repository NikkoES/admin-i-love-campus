<?php

if(isset($_POST['tambah_ruang'])) {
    $ruang=$_POST['tipe_ruang'];

    $hasil=mysql_query("INSERT INTO tb_ruang SET tipe_ruang='$ruang'");
    if($hasil){
        header("location:manage.php?page=ruang");
    }
}

if(isset($_GET['id_ruang'])) {
    $id_ruang=$_GET['id_ruang'];

    $hasil=mysql_query("SELECT * FROM tb_ruang WHERE id_ruang='$id_ruang'");
    $c=mysql_fetch_array($hasil);
    $tipe_ruang=$c['tipe_ruang'];
}

if(isset($_POST['edit_ruang'])) {
    $ruang=$_POST['tipe_ruang'];

    $hasil=mysql_query("UPDATE tb_ruang SET tipe_ruang='$ruang' WHERE id_ruang='$id_ruang'");
    if($hasil){
        header("location:manage.php?page=ruang");
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="shortcut icon" type="image/icon" href="images/favicon.ico"/>

    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <div class="container mb-4 mt-4">
        <h1 class="mt-4">New Ruang</h1>
        <div class="row">
            <div class="col-lg-8 mb-4">
                <hr/>
                <form id="contactForm" action="" method="post" enctype="multipart/form-data" novalidate>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Nama Ruang : </label>
                            <input name="tipe_ruang" type="text" class="form-control" placeholder="Masukkan Tipe Ruang" id="name" value="<?php
                            if(isset($_GET['id_ruang'])){
                                echo $tipe_ruang;
                            } ?>">
                            <p class="help-block"></p>
                        </div>
                    </div>
                    <div id="success"></div>
                    <?php if(isset($_GET['id_ruang'])){
                        echo "<button name=\"edit_ruang\" type=\"submit\" class=\"btn btn-primary\" id=\"edit\">Edit Ruang</button>";
                    }
                    else {
                        echo "<button name=\"tambah_ruang\" type=\"submit\" class=\"btn btn-primary\" id=\"tambah\">Tambah Ruang</button>";
                    } ?>
                    
                </form>
            </div>
        </div>
    </div>

</body>
</html>