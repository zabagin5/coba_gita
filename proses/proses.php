<?php   
    session_start();    
    include("../assets/konek.php");

    if(isset($_POST['addbrg'])){
        
        $qr = "SELECT max(id_barang) as maxId FROM data_barang";
        $hasil = mysqli_query($koneksi,$qr);
        $d  = mysqli_fetch_array($hasil);
        $id_barang1 = $d['maxId'];
        $noUrut = (int) substr($id_barang1, 3, 4);
        $noUrut++;
        $char   = $_REQUEST['nm_barang'];
        $i11    = substr($char, 0, 3);
        $newID  = $i11 . sprintf("%04s", $noUrut);
        
        $in1    = $_REQUEST['nm_barang'];
        $in2    = $_REQUEST['kategori'];
        $in3    = $_REQUEST['satuan'];
        $in4    = $_REQUEST['hrg_pokok'];
        $in5    = $_REQUEST['hrg_umum'];
        $in6    = $_REQUEST['hrg_resel'];
        $in7    = $_REQUEST['stok'];
        $in8    = $_REQUEST['exp'];
        $in9    = $_REQUEST['keterangan'];
        
        $query  = mysqli_query ($koneksi, "INSERT INTO data_barang VALUES ('$newID', '$in1', '$in2', '$in3', '$in4', '$in5', '$in6', '$in7', STR_TO_DATE('$in8', '%m/%d/%Y'), '$in9')") or die (mysqli_error($koneksi));
        
        if($query){ ?>
            <script>
            window.location.href = "../home/index.php?index=<?php echo md5('mstbrg')?>";
            </script>
        <?php
        }else{
            echo "<script language=\"javascript\">\n";
            echo "alert(\"Data gagal disimpan .. !!\");\n";
          //  echo "window.location ='../index.php?index=c791ae5f7a631d97c10c1cda730ac61c' ";
            echo "</script>";
        }
    }

    if(isset($_POST['edtbrg'])){
        
        $in0    = $_REQUEST['id_barang'];
        $in1    = $_REQUEST['nm_barang'];
//        $in2    = $_REQUEST['kategori'];
//        $in3    = $_REQUEST['satuan'];
        $in4    = $_REQUEST['hrg_pokok'];
        $in5    = $_REQUEST['hrg_umum'];
        $in6    = $_REQUEST['hrg_resel'];
        $in7    = $_REQUEST['stok'];
//        $in8    = $_REQUEST['exp'];
        $in9    = $_REQUEST['keterangan'];
        
        $query = mysqli_query($koneksi,"UPDATE data_barang SET nama_barang='$in1', hrg_pokok='$in4', hrg_umum='$in5', hrg_reseller='$in6', stock='$in7', coba='$in9' where id_barang='$in0' ")or die(mysqli_error($koneksi));
        
        if($query){ ?>
            <script>
            window.location.href = "../home/index.php?index=<?php echo md5('mstbrg')?>";
            </script>
        <?php
        }else{
            echo "<script language=\"javascript\">\n";
            echo "alert(\"Data gagal disimpan .. !!\");\n";
          //  echo "window.location ='../index.php?index=c791ae5f7a631d97c10c1cda730ac61c' ";
            echo "</script>";
        }
    }

    if(isset($_POST['hpsbarang'])){
        $query = mysqli_query($koneksi,"DELETE FROM data_barang where id_barang='$_REQUEST[hpsbarang]'")or die(mysqli_error($koneksi));
        ?>
            <script>
            window.location.href = "../home/index.php?index=<?php echo md5('mstbrg')?>";
            </script>
        <?php
    }
?>