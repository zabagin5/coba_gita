<?php   
    session_start();    
    include("../assets/konek.php");

    if(isset($_POST['addbrg'])){
        
        $qr = "SELECT max(id_barang) as maxId FROM data_barang";
        $hasil = mysqli_query($koneksi,$qr);
        $d  = mysqli_fetch_array($hasil);
        $id_barang1 = $d['maxId'];
//        $id_barang=$d['id_barang'];
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
        $pecah  = explode("/",$_REQUEST['exp']);
        $in8    = $pecah[2]."-".$pecah[1]."-".$pecah[0];
        $in9    = $_REQUEST['keterangan'];
        
        $query  = mysqli_query ($koneksi, "INSERT INTO data_barang VALUES ('$newID', '$in1', '$in2', '$in3', '$in4', '$in5', '$in6', '$in7', '$in8', '$in9')") or die (mysqli_error($koneksi));
        
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
?>