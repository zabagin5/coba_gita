<section class="content"><div class="row">
    <div class="col-xs-8"><div class="box">
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                        <div class="box-header"><span class="h2 card-title"><b>Daftar Barang</b></span></div>
                        <div style="max-height: 270px; overflow-y: scroll;">
                            <table class="table table-hover table-bordered mt-3">
                                <thead>
                                    <tr id="rowtop">
                                        <th>ID Barcode</th>
                                        <th>Nama barang</th>
                                        <th>Harga</th>
                                        <th>Jumlah</th>
                                        <th>Subtotal</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="table_ctn">
                                    <input type="hidden" id="valbarcode" value="">
                                    <tr id="row" class="row_brg">
                                        <td></td>
                                        <td></td>
                                        <td align="right"><?php // echo number_format($data[$i]['br_harga'],0,',','.');?></td>
                                        <td align="right"><?php // echo number_format($data[$i]['pj_jml'],0,',','.');?></td>
                                        <td align="right"><?php // echo number_format($data[$i]['br_harga']*$data[$i]['pj_jml'],0,',','.');?></td>
                                        <td align="center"><button class="btn btn-danger btn-xs" onclick="removerow('<?php // echo $i;?>')"><i class="fa fa-times"></i></button></td>
                                    </tr>
                                    <?php 
    //									}
    //									$_SESSION['totalbeli'] = $totalbeli;
    //								} 
                                    ?>
                                    <input type="hidden" id="maxrow" value="<?php // echo $x;?>">
                                </tbody>
                            </table>
                        </div>
                        <span id="table_note" class="mb-3 text-danger d-none"></span>
                        <div class="box-footer">
                            <div class="row">
                                <div class="col-md-6">
                                    Total
                                    <h2>
                                        <b id="totalbeli"><?php // echo number_format($totalbeli,0,',','.');?></b>
                                    </h2>
                                </div>
                                <div class="col-md-6">
                                    Total Akhir
                                    <h1>
                                        <b id="totalbeli_akhir" class="text-danger"></b>
                                    </h1>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6"></div>
                                <div class="col-md-6">
                                    Kembalian
                                    <h2>
                                        <b id="kembalian">0</b>
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section></div>
    </div>
    <div class="col-xs-4">
        <div class="box">
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
<!--                        <div class="box">-->
                        <h2 class="card-title"><b>Masukkan barang</b></h2>
                        Barcode <button class="btn btn-xs float-right btn-success mb-1" data-toggle="modal" data-target="#modal_cari"><i class="fa fa-search"></i> Cari</button>
                        <div class="input-group">
                            <input type="text" name="br_barcode" id="br_barcode_m" class="form-control" placeholder="ID barcode barang" onkeypress="cekbrbarang(event)">
                            <div class="input-group-append">
                                <button class="btn" onclick="cekbrbarang(event,'button')">
                                    <i class="fa fa-barcode"></i>
                                </button>
                            </div>
                        </div>
                        <span id="br_barcode_note" class="mb-3 text-danger d-none"></span><br>

                        Jumlah
                        <div class="input-group">
                            <input type="number" name="pj_jml" id="pj_jml_m" class="form-control" placeholder="Jumlah barang" onkeypress="cekjumlah(event)" step="1" min="0">
                            <div class="input-group-append">
                                <span id="icon_satuan" class="input-group-text">
                                    <i class="fa fa-sort"></i>
                                </span>
                            </div>
                        </div>
                        <span id="pj_jml_note" class="mb-3 text-danger d-none"></span><br>
                        <button type="button" class="form-control btn btn-info mt-2" id="btn_masuk" onclick="cekall()">Masukkan barang</button>
<!--                        </div>-->
                </div>
            </div>
        </section>
        </div>
    </div>
</div></section>