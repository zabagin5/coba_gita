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
                <div class="box-header">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addBrg">Tambah Barang</button>
                </div>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th><th>ID Barang</th><th>Nama Barang</th><th>Kategori</th>
                                <th>Hrg Pokok(Rp)</th><th>Hrg umum(Rp)</th><th>Hrg Reseller(Rp)</th>
                                <th>Stock</th><th>Expired</th>
                                <th>Aksi</th>
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
                                <td contenteditable='true'><?php echo $data['nama_barang'];?></td>
                                <td><?php echo $data['nama_kategori'];?></td>
                                <td><?php echo number_format($data['hrg_pokok'],0,",",".");?></td>
                                <td><?php echo number_format($data['hrg_umum'],0,",",".");?></td>
                                <td><?php echo number_format($data['hrg_reseller'],0,",",".");?></td>
                                <td><?php echo $data['stock']." ".$data['nama_satuan'];?></td>
                                <td><?php echo $data['expired'];?></td>
                                <td>
                                    <form name="hpsbarang" method="post" action="../proses/proses.php" role="form">
                                        <a class="infodt btn btn-sm btn-warning" data-toggle="modal" data-target="#edtBrg" href="#" id_brg="<?php echo $data['id_barang'];?>" nm_brg="<?php echo $data['nama_barang'];?>" kateg="<?php echo $data['nama_kategori'];?>" hrg_pokok="<?php echo $data['hrg_pokok'];?>" hrg_umum="<?php echo $data['hrg_umum'];?>" hrg_reseller="<?php echo $data['hrg_reseller'];?>" stok="<?php echo $data['hrg_reseller'];?>" satuan="<?php echo $data['nama_satuan'];?>" exp="<?php echo $data['hrg_reseller'];?>" coba="<?php echo $data['coba'];?>"><i class="fa fa-info"></i></a>
                                        <button value="<?php echo $data['id_barang'];?>" onclick="return confirm('Apakah anda yakin akan menghapus daftar ini ?')" name="hpsbarang" type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                    </form>
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

<div class="modal fade" id="addBrg">
  <div class="modal-dialog">
    <div class="modal-content">
        <form role="form" method="post" action="../proses/proses.php">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Form Tambah Barang</h4>
      </div>
      <div class="modal-body">
            <div class="form-group">
              <label>Nama Barang</label>
              <input type="text" class="form-control" name="nm_barang" placeholder="nama barang">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Kategori</label>
              <select name="kategori" class="form-control">
                  <?php
                    $tes = mysqli_query($koneksi,"SELECT * from data_kategori");
                    while($tabel = mysqli_fetch_array($tes)){
                ?>
                <option value="<?php echo $tabel['id_kategori'];?>"><?php echo $tabel['nama_kategori'];?></option><?php } ?>
              </select>
            </div>
              <div class="row">
              <div class="col-sm-4"><label>Harga Pokok</label>
                  <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon">Rp.</span>
                    <input type="text" class="form-control" name="hrg_pokok" placeholder="harga pokok">
                  </div>
                </div>
              </div>
              <div class="col-sm-4"><label>Harga Umum</label>
                  <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon">Rp.</span>
                    <input type="text" class="form-control" name="hrg_umum" placeholder="harga umum">
                  </div>
                </div>
              </div>
              <div class="col-sm-4"><label>Harga Reseller</label>
                  <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon">Rp.</span>
                    <input type="text" class="form-control" name="hrg_resel" placeholder="harga reseller">
                  </div>
                </div>
              </div>
              </div>
              <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                      <label>Stok</label>
                      <input type="number" min="0" class="form-control" name="stok">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                      <label>Satuan</label>
                      <select name="satuan" class="form-control">
                          <?php
                            $tes = mysqli_query($koneksi,"SELECT * from data_satuan");
                            while($tabel = mysqli_fetch_array($tes)){
                        ?>
                        <option value="<?php echo $tabel['id_satuan'];?>"><?php echo $tabel['nama_satuan'];?></option><?php } ?>
                      </select>
                    </div>
                </div>
                  <div class="col-sm-4">
                    <label>Expired</label>
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" name="exp" class="form-control pull-right" id="datepicker">
                    </div>
                </div>
              </div>
            <div class="form-group">
              <label>Keterangan</label>
              <textarea class="form-control" rows="3" name="keterangan" placeholder=" ..."></textarea>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Kembali</button>
        <button type="submit" name="addbrg" class="btn btn-primary">Selesai</button>
      </div>
        </form>
    </div>
  </div>
</div>

<div class="modal fade" id="edtBrg">
  <div class="modal-dialog">
    <div class="modal-content">
        <form role="form" method="post" action="../proses/proses.php">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Form Edit Barang</h4>
      </div>
      <div class="modal-body">
            <div class="form-group">
              <label>Nama Barang</label>
              <input type="text" class="form-control" name="nm_barang" id="nm_brg">
              <input type="text" class="form-control hidden" name="id_barang" id="id_brg">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Kategori</label>
              <select name="kategori" class="form-control">
                  <?php
                    $tes = mysqli_query($koneksi,"SELECT * from data_kategori");
                    while($tabel = mysqli_fetch_array($tes)){
                ?>
                <option value="<?php echo $tabel['id_kategori'];?>"><?php echo $tabel['nama_kategori'];?></option><?php } ?>
              </select>
            </div>
              <div class="row">
              <div class="col-sm-4"><label>Harga Pokok</label>
                  <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon">Rp.</span>
                    <input type="text" class="form-control" name="hrg_pokok" id="hrg_pokok">
                  </div>
                </div>
              </div>
              <div class="col-sm-4"><label>Harga Umum</label>
                  <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon">Rp.</span>
                    <input type="text" class="form-control" name="hrg_umum" id="hrg_umum">
                  </div>
                </div>
              </div>
              <div class="col-sm-4"><label>Harga Reseller</label>
                  <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon">Rp.</span>
                    <input type="text" class="form-control" name="hrg_resel" id="hrg_reseller">
                  </div>
                </div>
              </div>
              </div>
              <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                      <label>Stok</label>
                      <input type="number" min="0" class="form-control" name="stok" id="stok">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                      <label>Satuan</label>
                      <select name="satuan" class="form-control">
                          <?php
                            $tes = mysqli_query($koneksi,"SELECT * from data_satuan");
                            while($tabel = mysqli_fetch_array($tes)){
                        ?>
                        <option value="<?php echo $tabel['id_satuan'];?>"><?php echo $tabel['nama_satuan'];?></option><?php } ?>
                      </select>
                    </div>
                </div>
                  <div class="col-sm-4">
                    <label>Expired</label>
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" name="exp" class="form-control pull-right" id="datepicker">
                    </div>
                </div>
              </div>
            <div class="form-group">
              <label>Keterangan</label>
              <textarea class="form-control" rows="3" name="keterangan" id="coba"></textarea>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Kembali</button>
        <button type="submit" name="edtbrg" class="btn btn-primary">Simpan</button>
      </div>
        </form>
    </div>
  </div>
</div>

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
