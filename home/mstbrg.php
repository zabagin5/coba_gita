<!-- DataTables -->
<!--<link rel="stylesheet" href="../../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">-->

<section class="content-header">
    <h1><b>Master Barang</b></h1>
</section>
    <!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th><th>ID Barang</th><th>Nama Barang</th><th>Kategori</th>
                                <th>Hrg Pokok(Rp)</th><th>Hrg umum(Rp)</th><th>Hrg Reseller(Rp)</th>
                                <th>Stock</th><th>Expired</th><th>Keterangan</th>
                                <th>Tools</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no = 0;
                                $query=mysqli_query($koneksi,"SELECT * FROM data_barang db, data_kategori dk, data_satuan ds WHERE db.id_kategori=dk.id_kategori AND db.id_satuan=ds.id_satuan ORDER BY nama_barang ASC"); 
                                while ($data = mysqli_fetch_assoc($query)){
                                $no++;
                            ?>
                            <tr>
                                <td><?php echo $no;?></td>
                                <td><?php echo $data['id_barang'];?></td>
                                <td><?php echo $data['nama_barang'];?></td>
                                <td><?php echo $data['nama_kategori'];?></td>
                                <td><?php echo $data['hrg_pokok'];?></td>
                                <td><?php echo $data['hrg_umum'];?></td>
                                <td><?php echo $data['hrg_reseller'];?></td>
                                <td><?php echo $data['stock']." ".$data['nama_satuan'];?></td>
                                <td><?php echo $data['expired'];?></td>
                                <td><?php echo $data['keterangan'];?></td>
                                <td>
                                   <a href="edit_barang.php?id_barang=<?php echo $data['id_barang'];?>">
                                       <img src="dist/img/sim/pencil-and-paper24.png" >
                                    </a>
                                    <a href="hapus_barang.php?id_barang=<?php echo $data['id_barang'];?>" onclick="return confirm('Anda yakin akan menghapus Data?')"><img src="dist/img/sim/trash2424.png" ></a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- DataTables -->
<!--
<script src="../../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
-->
