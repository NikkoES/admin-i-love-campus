<?php 

if(isset($_GET['hapus'])) {
    $id_ruang=$_GET['hapus'];

    $hasil=mysql_query("DELETE FROM tb_ruang WHERE id_ruang='$id_ruang'");
    if($hasil){
        header("location:manage.php?page=ruang");
    }
}

?>

<div class="container">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <h1 class="mt-4 mb-3">Manage Ruang</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#">manage</a>
        </li>
        <li class="breadcrumb-item active"><?php echo $page;?></li>
    </ol>

    <div class="row">
        <div class="col-md-12">
            <div class="card-body">
                <a class="btn btn-primary" href="manage.php?tambah=tambah-ruang"> Tambah Data </a>
                <br><br>
                <div class="table-responsive text-center">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th width="10%">No.</th>
                                <th width="20%">ID Kategori</th>
                                <th>Nama Kategori</th>
                                <th width="20%">&nbsp;Action&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql=mysql_query("SELECT * FROM tb_ruang");
                            $no=1;
                            while($data=mysql_fetch_array($sql)){
                            ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $data['id_ruang']; ?></td>
                                <td><?php echo $data['tipe_ruang']; ?></td>
                                <td>
                                    <a class="btn btn-primary" href="manage.php?tambah=tambah-ruang&id_ruang=<?php echo $data['id_ruang'];?>">
                                        <i class="glyphicon glyphicon-pencil"></i>Ubah
                                    </a>
                                    <a class="btn btn-danger" href="manage.php?page=ruang&hapus=<?php echo $data['id_ruang'];?>">
                                        <i class="glyphicon glyphicon-remove"></i>Hapus
                                    </a>
                                </td>
                            </tr>
                            <?php 
                            $no++;
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>