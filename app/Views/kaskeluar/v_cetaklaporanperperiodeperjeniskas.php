<?= $this->extend('layout/main') ?>
<?= $this->extend('layout/menu') ?>
<?= $this->section('isi') ?>
<div class="col-md-12">
    <div class="card card-outline">
        <div class="invoice col-sm-12 p-3 mb-3">
            <!-- title row -->
            <div id="div1">
                <div class="row">
                    <div class="col-12">
                        <table>
                            <tr>
                                <td width=200>
                                    <img src="<?= base_url() ?>/image/masjid.png" width="100" alt="">
                                </td>
                                <td width=580>
                                    <center>
                                        <p>
                                        <h4> MASJID JABAL RAHMAH </h4>
                                        </p>
                                        <p>
                                        <h5>Sungai Sapih, Kuranji Padang
                                        </h5>
                                        </p>
                                    </center>
                                </td>
                                <td width=200></td>
                            </tr>
                        </table>
                        <center><b>Tanggal Masuk :  <?= date('d F Y',strtotime($tgla)) ?> Sampai Dengan <?= date('d F Y',strtotime($tglb)) ?></b></center>
                        Jenis Kas   : <?= $jenis ?>
                        <hr>
                    </div>
                    <!-- /.col -->
                </div>
                <div class="row">
                    <div class="col-12 table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr role="row">
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Keterangan </th>
                                    <th>Kas Masuk</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $no = 0;
                                $semua = 0;
                                foreach ($data as $val) {
                                $s= $val['kas_keluar'];
                                $semua= $s+$semua;
                                $no++; ?>
                                <tr role="row" class="odd">
                                    <td><?= $no; ?></td>
                                    <td><?= $val['tanggal'] ?></td>
                                    <td><?= $val['ket'] ?></td>
                                    <td><?= $val['kas_keluar'] ?></td>
                                </tr>
                                <?php } ?>
                                <tr>
                                    <th colspan="3"> Total Pemasukan</th>
                                    <th colspan="2"><?= $semua ?></th>
                                </tr>
                            </tbody>
                        </table>
                        <br><br><br><br>
                        Padang, <?= date('d / M / y') ?>
                        <br><br><br>
                        Ketua <br>
                        DR. Muhammad Ammar
                    </div>
                </div>
            </div>
            </br>
            <div class="row no-print">
                <div class="col-12">
                    <button onclick="printContent('div1')" class="btn btn-primary"><i
                            class="fa fa-print"></i>Print</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
function printContent(el) {
    var restorepage = document.body.innerHTML;
    var printcontent = document.getElementById(el).innerHTML;
    document.body.innerHTML = printcontent;
    window.print();
    document.body.innerHTML = restorepage;
}
</script>
<?= $this->endSection('') ?>