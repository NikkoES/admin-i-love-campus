<?php

if(isset($_POST['tambah_member'])) {    

    $nama_member=$_POST['nama_member'];
    $id_member=$_POST['id_member'];
    $detail_ruang=$_POST['detail_ruang'];
    $id_ruang=$_POST['id_ruang'];
    $no_hp=$_POST['no_hp'];
    $email=$_POST['email'];
    $alamat=$_POST['alamat'];
    $password=$_POST['password'];
    $status="1";

    //cek dulu
    $sama=mysql_query("SELECT id_member FROM tb_member WHERE id_member=$id_member");

    $hasil=mysql_query("INSERT INTO tb_member SET nama_member='$nama_member', id_member='$id_member', detail_ruang='$detail_ruang', id_ruang='$id_ruang', no_hp='$no_hp', email='$email', alamat='$alamat', password='$password', status='$status'");
    if($hasil){
        echo "<script>alert('Tambah member berhasil')</script>";
        // header("location:manage.php?page=member");
    }
    else if($sama){
        echo "<script>alert('Tambah member gagal (ID member sudah digunakan) !')</script>";
    }
}

if(isset($_GET['id_member'])) {
    $id_member=$_GET['id_member'];

    $hasil=mysql_query("SELECT * FROM tb_member, tb_ruang WHERE tb_member.id_ruang=tb_ruang.id_ruang AND id_member='$id_member'");
    $c=mysql_fetch_array($hasil);
    $nama_member=$c['nama_member'];
    $id_member=$c['id_member'];
    $detail_ruang=$c['detail_ruang'];
    $id_ruang=$c['id_ruang'];
    $tipe_ruang=$c['tipe_ruang'];
    $no_hp=$c['no_hp'];
    $email=$c['email'];
    $alamat=$c['alamat'];
    $password=$c['password'];
}

if(isset($_POST['edit_member'])) {
    $nama_member=$_POST['nama_member'];
    $id_member=$_POST['id_member'];
    $detail_ruang=$_POST['detail_ruang'];
    $id_ruang=$_POST['id_ruang'];
    $no_hp=$_POST['no_hp'];
    $email=$_POST['email'];
    $alamat=$_POST['alamat'];
    $password=$_POST['password'];
    $status="1";

    //cek dulu
    $sama=mysql_query("SELECT id_member FROM tb_member WHERE id_member=$id_member");

    if($sama){
        echo "<script>alert('Edit member gagal (ID member sudah digunakan) !')</script>";
        // header("location:manage.php?page=member");
    }
    else{
        $hasil=mysql_query("UPDATE tb_member SET nama_member='$nama_member', id_member='$id_member', detail_ruang='$detail_ruang', id_ruang='$id_ruang', no_hp='$no_hp', email='$email', alamat='$alamat', password='$password', status='$status' WHERE id_member='$id_member'");
        echo "<script>alert('Edit member berhasil')</script>";
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
        <h1 class="mt-4">New Member</h1>
        <div class="row">
            <div class="col-lg-8 mb-4">
                <hr/>
                <form id="contactForm" action="" method="post" enctype="multipart/form-data" novalidate>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Nama Lengkap : </label>
                            <input name="nama_member" placeholder="Masukkan Nama Lengkap" type="text" class="form-control" id="name" value="<?php
                            if(isset($_GET['id_member'])){
                                echo $nama_member;
                            } ?>">
                            <p class="help-block"></p>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>ID Member : </label>
                            <input name="id_member" placeholder="Masukkan ID Member" type="text" class="form-control" id="name" value="<?php
                            if(isset($_GET['id_member'])){
                                echo $id_member;
                            } ?>">
                            <p class="help-block"></p>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Detail Ruang : </label>
                            <input name="detail_ruang" placeholder="Masukkan Detail Ruang" type="text" class="form-control" id="name" value="<?php
                            if(isset($_GET['id_member'])){
                                echo $detail_ruang;
                            } ?>">
                            <p class="help-block"></p>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Tipe Ruang : </label>
                            <select name="id_ruang" class="form-control" id="ruang"">
                                <?php

                                $cat=mysql_query("SELECT * FROM tb_ruang");
                                if(isset($_GET['id_member'])){ ?>
                                    <option value="<?php echo $id_ruang;?>" selected="selected" ><?php echo $tipe_ruang;?></option>

                                <?php

                                }

                                while($c=mysql_fetch_array($cat)){
                                    $id_ruang = $c['id_ruang'];
                                    $tipe_ruang = $c['tipe_ruang'];
                                ?>
                                <option value="<?php echo $id_ruang;?>"><?php echo $tipe_ruang;?></option>
                                <?php }?>
                            </select>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Nomor HP : </label>
                            <input name="no_hp" placeholder="Masukkan Nomor HP" type="text" class="form-control" id="name" value="<?php
                            if(isset($_GET['id_member'])){
                                echo $no_hp;
                            } ?>">
                            <p class="help-block"></p>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Email : </label>
                            <input name="email" placeholder="Masukkan Email" type="text" class="form-control" id="name" value="<?php
                            if(isset($_GET['id_member'])){
                                echo $email;
                            } ?>">
                            <p class="help-block"></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat Lengkap</label>
                        <textarea name="alamat" class="form-control" id="alamat" type="text" aria-describedby="emailHelp" placeholder="Masukkan Alamat Lengkap" rows="3"><?php
                            if(isset($_GET['id_member'])){
                                echo $alamat;
                            } ?></textarea>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Password : </label>
                            <input name="password" placeholder="Masukkan Password" type="password" class="form-control" id="name" value="<?php
                            if(isset($_GET['id_member'])){
                                echo $password;
                            } ?>">
                            <p class="help-block"></p>
                        </div>
                    </div>
                    <div id="success"></div>
                    <?php if(isset($_GET['id_member'])){
                        echo "<button name=\"edit_member\" type=\"submit\" class=\"btn btn-primary\" id=\"edit\">Edit Member</button>";
                    }
                    else {
                        echo "<button name=\"tambah_member\" type=\"submit\" class=\"btn btn-primary\" id=\"tambah\">Tambah Member</button>";
                    } ?>
                    
                </form>
            </div>
        </div>
    </div>

</body>
</html>