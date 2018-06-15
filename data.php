<?php

$hasil=mysql_query("SELECT * FROM tb_extras");
$c=mysql_fetch_array($hasil);
$slider_1=$c['slider_1'];
$slider_2=$c['slider_2'];
$slider_3=$c['slider_3'];
$slider_4=$c['slider_4'];
$slider_5=$c['slider_5'];
$visi=$c['visi'];
$misi=$c['misi'];
$tentang=$c['tentang'];

if(isset($_POST['simpan'])) {
// https://image.ibb.co/n8oASy/slider_1.jpg

    $folder="images/slider/";

    $visi=$_POST['visi'];
    $misi=$_POST['misi'];
    $tentang=$_POST['tentang'];

    $hasil=mysql_query("UPDATE tb_extras SET visi='$visi', misi='$misi', tentang='$tentang'");
    if($_FILES['slider_1']['tmp_name']){
        $slider_1 = rand(1000,100000)."-".$_FILES['slider_1']['name'];
        $slider_1_loc = $_FILES['slider_1']['tmp_name'];
        move_uploaded_file($slider_1_loc,$folder.$slider_1);
        $hasil=mysql_query("UPDATE tb_extras SET slider_1='$slider_1'");
    }
    if($_FILES['slider_2']['tmp_name']){
        $slider_2 = rand(1000,100000)."-".$_FILES['slider_2']['name'];
        $slider_2_loc = $_FILES['slider_2']['tmp_name'];
        move_uploaded_file($slider_2_loc,$folder.$slider_2);
        $hasil=mysql_query("UPDATE tb_extras SET slider_2='$slider_2'");
    }
    if($_FILES['slider_3']['tmp_name']){
        $slider_3 = rand(1000,100000)."-".$_FILES['slider_3']['name'];
        $slider_3_loc = $_FILES['slider_3']['tmp_name'];
        move_uploaded_file($slider_3_loc,$folder.$slider_3);
        $hasil=mysql_query("UPDATE tb_extras SET slider_3='$slider_3'");
    }
    if($_FILES['slider_4']['tmp_name']){
        $slider_4 = rand(1000,100000)."-".$_FILES['slider_4']['name'];
        $slider_4_loc = $_FILES['slider_4']['tmp_name'];
        move_uploaded_file($slider_4_loc,$folder.$slider_4);
        $hasil=mysql_query("UPDATE tb_extras SET slider_4='$slider_4'");
    }
    if($_FILES['slider_5']['tmp_name']){
        $slider_5 = rand(1000,100000)."-".$_FILES['slider_5']['name'];
        $slider_5_loc = $_FILES['slider_5']['tmp_name'];
        move_uploaded_file($slider_5_loc,$folder.$slider_5);
        $hasil=mysql_query("UPDATE tb_extras SET slider_5='$slider_5'");
    }
    if($hasil){
        header("location:manage.php?page=data");
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

    <title>Website Cari Lawan</title>

    <link rel="shortcut icon" type="image/icon" href="images/favicon.ico"/>

    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Include external CSS. -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="css/codemirror.min.css" rel="stylesheet" type="text/css">
 
    <!-- Include Editor style. -->
    <link href="css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
    <link href="css/froala_style.min.css" rel="stylesheet" type="text/css" />
</head>
<body>

    <div class="container mb-4 mt-4">
        <h1 class="mt-4">Manage Data</h1>
        <div class="row">
            <div class="col-lg-8 mb-4">
                <hr/>
                <form id="contactForm" action="" method="post" enctype="multipart/form-data" novalidate>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Slider 1 :</label>
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <span class="btn btn-default btn-file">
                                        <input name="slider_1" type="file" id="slider_1">
                                    </span>
                                </span>
                            </div>
                            <label>Default :</label>
                            <br/>
                            <img src="<?php echo "images/slider/$slider_1" ?>" style="height: 100px; width: 200px;">
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Slider 2 :</label>
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <span class="btn btn-default btn-file">
                                        <input name="slider_2" type="file" id="slider_2">
                                    </span>
                                </span>
                            </div>
                            <label>Default :</label>
                            <br/>
                            <img src="<?php echo "images/slider/$slider_2" ?>" style="height: 100px; width: 200px;">
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Slider 3 :</label>
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <span class="btn btn-default btn-file">
                                        <input name="slider_3" type="file" id="slider_3">
                                    </span>
                                </span>
                            </div>
                            <label>Default :</label>
                            <br/>
                            <img src="<?php echo "images/slider/$slider_3" ?>" style="height: 100px; width: 200px;">
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Slider 4 :</label>
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <span class="btn btn-default btn-file">
                                        <input name="slider_4" type="file" id="slider_4">
                                    </span>
                                </span>
                            </div>
                            <label>Default :</label>
                            <br/>
                            <img src="<?php echo "images/slider/$slider_4" ?>" style="height: 100px; width: 200px;">
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Slider 5 :</label>
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <span class="btn btn-default btn-file">
                                        <input name="slider_5" type="file" id="slider_5">
                                    </span>
                                </span>
                            </div>
                            <label>Default :</label>
                            <br/>
                            <img src="<?php echo "images/slider/$slider_5" ?>" style="height: 100px; width: 200px;">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="visi">Visi</label>
                        <textarea name="visi" class="form-control" id="froala-editor" type="text" aria-describedby="emailHelp" placeholder="Masukkan Visi Kampus"><?php
                            echo $visi;
                        ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="misi">Misi</label>
                        <textarea name="misi" class="form-control" id="froala-editor" type="text" aria-describedby="emailHelp" placeholder="Masukkan Misi Kampus" rows="3"><?php
                            echo $misi;
                        ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="tentang">Tentang Kampus</label>
                        <textarea name="tentang" class="form-control" id="froala-editor" type="text" aria-describedby="emailHelp" placeholder="Masukkan Tentang Kampus" rows="3"><?php
                            echo $tentang;
                        ?></textarea>
                    </div>
                    <div id="success"></div>
                    <?php 
                        echo "<button name=\"simpan\" type=\"submit\" class=\"btn btn-primary\" id=\"simpan\">Simpan</button>";
                    ?>
                    
                </form>
            </div>
        </div>
    </div>
    <!-- Include external JS libs. -->
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/codemirror.min.js"></script>
    <script type="text/javascript" src="js/xml.min.js"></script>
 
    <!-- Include Editor JS files. -->
    <script type="text/javascript" src="js/froala_editor.pkgd.min.js"></script>
 
    <!-- Initialize the editor. -->
    <script>
      $(function() {
        $('textarea#froala-editor').froalaEditor()
      });
    </script>

</body>
</html>