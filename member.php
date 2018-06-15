<?php 

if(isset($_GET['hapus'])) {
    $id_member=$_GET['hapus'];

    $hasil=mysql_query("DELETE FROM tb_member WHERE id_member='$id_member'");
    if($hasil){
        header("location:manage.php?page=member");
    }
}

if(isset($_GET['konfirmasi'])) {
    $id_member=$_GET['konfirmasi'];

    $hasil=mysql_query("UPDATE tb_member SET status='1' WHERE id_member='$id_member'");
    if($hasil){
        header("location:manage.php?page=member");
    }
}

?>

<div class="container">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <h1 class="mt-4 mb-3">Manage Member</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#">manage</a>
        </li>
        <li class="breadcrumb-item active"><?php echo $page;?></li>
    </ol>

    <div class="row">
        <div class="col-md-12">
            <div class="card-body">
                <a class="btn btn-primary" href="manage.php?tambah=tambah-member"> Tambah Data </a>
                <br><br>
                <div class="table-responsive text-center">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th width="10%">No.</th>
                                <th width="10%">ID Member</th>
                                <th>Nama Member</th>
                                <th>Detail Ruang</th>
                                <th>Tipe Ruang</th>
                                <th>Nomor HP</th>
                                <th>Email</th>
                                <th>Alamat</th>
                                <th width="20%">&nbsp;Action&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql=mysql_query("SELECT * FROM tb_member ORDER BY status, id_member");
                            $no=1;
                            while($data=mysql_fetch_array($sql)){
                            ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $data['id_member']; ?></td>
                                <td><?php echo $data['nama_member']; ?></td>
                                <td><?php echo $data['detail_ruang']; ?></td>
                                <td>
                                <?php 
                                $id_kategori = $data['id_ruang'];
                                $kate=mysql_query("SELECT * FROM tb_ruang WHERE id_ruang='$id_kategori'");
                                $gori=mysql_fetch_array($kate);
                                echo $gori['tipe_ruang']; 
                                ?></td>
                                <td><?php echo $data['no_hp']; ?></td>
                                <td><?php echo $data['email']; ?></td>
                                <td><?php echo $data['alamat']; ?></td>
                                <td>
                                    <?php 

                                    if($data['status']==0){ ?>
                                    <a class="btn btn-success" href="manage.php?page=member&konfirmasi=<?php echo $data['id_member'];?>"><i class="glyphicon glyphicon-pencil"></i>Konfirmasi</a>
                                    
                                    <?php
                                    }
                                    else{ ?>
                                    <a class="btn btn-primary" href="manage.php?tambah=tambah-member&id_member=<?php echo $data['id_member'];?>">
                                        <i class="glyphicon glyphicon-remove"></i>Ubah
                                    </a>
                                    <a class="btn btn-danger" href="manage.php?page=member&hapus=<?php echo $data['id_member'];?>"><i class="glyphicon glyphicon-pencil"></i>Hapus</a>

                                    <?php
                                    }


                                    ?>
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