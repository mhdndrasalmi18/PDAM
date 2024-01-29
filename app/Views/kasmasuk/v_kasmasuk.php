<?= $this->extend('layout/main') ?>
<?= $this->extend('layout/menu') ?>

<?= $this->section('isi') ?>

<head>
    <link href="<?= base_url() ?>/assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />
    <link href="<?= base_url() ?>/assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />

    <script src="<?= base_url() ?>/assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>/assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
</head>
<div class="col-sm-12">
    <div class="page-content-wrapper">


        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-header">
                        <h4 class="mt-e header-title">Data Kas </h4>
                    </div>
                    <div class="card-body">
                    <div class="col-md-10">
                            <label>Total Kas Anak Yatim
                                : <?php foreach($hitungkasmasukanakyatim as $kasmasukanakyatim){ ?><?= $a =  $kasmasukanakyatim['total'] ?><?php } ?></label><br>
                            <label>Total Kas Masjid
                                : <?php foreach($hitungkasmasukmasjid as $kasmasukmasjid){ ?><?= $b =  $kasmasukmasjid['total'] ?><?php } ?></label><br>
                            <label>Total Kas TPQ
                                : <?php foreach($hitungkasmasuktpq as $kasmasuktpq){ ?><?= $c =  $kasmasuktpq['total'] ?><?php } ?></label><br>
                            <label>Total Kas Sosial
                                : <?php foreach($hitungkasmasuksosial as $kasmasuksosial){ ?><?= $d =  $kasmasuksosial['total'] ?><?php } ?></label>
                        </div>
                        <div class="col-md-12">
                            <button type="button" class="btn btn-sm btn-primary" data-target="#addModal"
                                data-toggle="modal">Tambah Data</button>
                        </div>
                        <br>
                        <div id="datatable_wrapper" class="dataTables repper container-fluid dt-bootstrap4 no-footer">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-sm table-striped " id="dataagenda">
                                        <thead>
                                            <tr role="row">
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Tanggal</th>
                                                <th>Ket</th>
                                                <th>Kas Masuk</th>
                                                <th>Jenis Kas</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $total = 0; ?>
                                            <?php $no = 0;
                                            $model = new App\Models\ModelUser();
                                            $data = $model->getUser()->getResultArray();
                                            foreach ($Kasmasuk as $val) {
                                                $no++; ?>
                                            <tr role="row" class="odd">
                                                <td><?= $no; ?></td>
                                                <td><?= $val['nama'] ?></td>
                                                <td><?= $val['tanggal'] ?></td>
                                                <td><?= $val['ket'] ?></td>
                                                <td><?= $val['kas_masuk'] ?></td>
                                                <?php $total += $val['kas_masuk'] ?>
                                                <td><?= $val['jenis_kas'] ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-info btn-sm btn-edit"
                                                        data-id="<?= $val['id_kas_masjid']; ?>"
                                                        data-iddonatur="<?= $val['iddonaturmasjid']; ?>"
                                                        data-nama="<?= $val['nama']; ?>"
                                                        data-tanggal="<?= $val['tanggal']; ?>"
                                                        data-ket="<?= $val['ket']; ?>"
                                                        data-kasmasuk="<?= $val['kas_masuk']; ?>"
                                                        data-jeniskas="<?= $val['jenis_kas']; ?>">
                                                        <i class=" mdi mdi-tooltip-edit"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-danger btn-sm btn-delete"
                                                        data-id="<?= $val['id_kas_masjid']; ?>">
                                                        <i class="ti-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                        <tr>
                                            <th colspan="4">Total Kas Masuk</th>
                                            <th colspan="4"><?= $total?></th>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Delete -->
<form action="/Kasmasuk/delete" method="post">
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Kas</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h3>Apakah Yakin Menghapus Data Ini? </h3>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" class="id">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Yes</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- Edit Modal -->
<form action="/Kasmasuk/update" method="post">
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <!-- Modal Donatur -->
        <div class="modal fade" id="modal_donatur1" tabindex="1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Data Donatur</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>ID</th>
                                    <th>Nama Donatur</th>
                                    <th>Alamat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                        $no = 0;
                        foreach ($data_donatur as $d):
                            $no++; ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?= $d->iddonatur ?></td>
                                    <td><?= $d->nama ?></td>
                                    <td><?= $d->nohp ?></td>
                                    <td>
                                        <button type="button" class="btn btn-primary"
                                            onclick="return pilih_donatur1('<?= $d->iddonatur ?>','<?= $d->nama ?>')">Pilih</button>
                                    </td>
                                </tr>
                                <?php
                            endforeach;
                            ?>
                            </tbody>
                        </table>
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Kas</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <input type="hidden" name="id" class="id">
                <div class="col-md-12">
                    <label>Tanggal</label>
                    <input type="date" class="form-control tanggal" name="tanggal">
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Donatur</label>
                                <button type="button" data-toggle="modal" data-target="#modal_donatur1"
                                    class="btn btn-xs btn-primary">Donatur</button>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>ID</label>
                                <input type="text" name="iddonatur1" readonly id="iddonatur1"
                                    class="form-control iddonatur1">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label>Nama Donatur</label>
                                <input type="text" readonly id="nama1" class="form-control nama1">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <label>Ket</label>
                    <input type="text" class="form-control ket" name="ket">
                </div>
                <div class="col-md-12">
                    <label>Kas Masuk</label>
                    <input type="text" class="form-control kasmasuk" name="kasmasuk">
                </div>
                <div class="col-md-12">
                    <label>Jenis Kas</label>
                    <select name="jeniskas" class="form-control jeniskas">
                        <option value="" disabled selected>Pilih Hak Akses</option>
                        <option value="Anak Yatim">Anak Yatim</option>
                        <option value="TPQ">TPQ</option>
                        <option value="Masjid">Masjid</option>
                        <option value="Sosial">Sosial</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- Modal -->
<div class="modal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Modal body text goes here.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<!-- Form Tambah -->
<form action="/Kasmasuk/save" method="post">
    <?php if (!empty(session()->getFlashdata ('error'))): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <h4> Periksa Entrian Form </h4>
        </hr />

        <?php echo session()->getFlashdata('error'); ?>
        <button type="button" id="addModal" class=" close " data-dismiss=" alert">
            <span aria-hidden="true">&times;</span>

        </button>
    </div>
    <?php endif; ?>
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <!-- Modal Donatur -->
        <div class="modal fade" id="modal_donatur" tabindex="1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Data Donatur</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>ID</th>
                                    <th>Nama Donatur</th>
                                    <th>Alamat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                        $no = 0;
                        foreach ($data_donatur as $d):
                            $no++; ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?= $d->iddonatur ?></td>
                                    <td><?= $d->nama ?></td>
                                    <td><?= $d->nohp ?></td>
                                    <td>
                                        <button type="button" class="btn btn-primary"
                                            onclick="return pilih_donatur('<?= $d->iddonatur ?>','<?= $d->nama ?>')">Pilih</button>
                                    </td>
                                </tr>
                                <?php
                            endforeach;
                            ?>
                            </tbody>
                        </table>
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal Donatur -->
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Kas</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <label>Tanggal</label>
                        <input type="date" class="form-control" name="tanggal">
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Donatur</label>
                                    <button type="button" data-toggle="modal" data-target="#modal_donatur"
                                        class="btn btn-xs btn-primary">Donatur</button>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>ID</label>
                                    <input type="text" name="iddonatur" readonly id="iddonatur" class="form-control ">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Nama Donatur</label>
                                    <input type="text" readonly id="nama" class="form-control ">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label>Ket</label>
                        <input type="text" class="form-control" name="ket">
                    </div>
                    <div class="col-md-12">
                        <label>Kas Masuk</label>
                        <input type="text" class="form-control" name="kasmasuk">
                    </div>
                    <div class="col-md-12">
                        <label>Jenis Kas</label>
                        <select name="jeniskas" class="form-control">
                            <option value="" disabled selected>Pilih Hak Akses</option>
                            <option value="Anak Yatim">Anak Yatim</option>
                            <option value="TPQ">TPQ</option>
                            <option value="Masjid">Masjid</option>
                            <option value="Sosial">Sosial</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</form>
<script>
//script edit
$('.btn-edit').on('click', function() {
    const id = $(this).data('id');
    const tanggal = $(this).data('tanggal');
    const iddonatur = $(this).data('iddonatur');
    const nama = $(this).data('nama');
    const ket = $(this).data('ket');
    const kasmasuk = $(this).data('kasmasuk');
    const jeniskas = $(this).data('jeniskas');

    $('.id').val(id);
    $('.tanggal').val(tanggal);
    $('.iddonatur1').val(iddonatur);
    $('.nama1').val(nama);
    $('.ket').val(ket);
    $('.kasmasuk').val(kasmasuk);
    $('.jeniskas').val(jeniskas);
    // $('.jam').val(jam).trigger('change');
    $('#editModal').modal('show');
});
//script delete
$('.btn-delete').on('click', function() {
    const id = $(this).data('id');
    $('.id').val(id);
    $('#deleteModal').modal('show');
});
//script datatable
$(document).ready(function() {
    $('#dataKasmasuk').DataTable();
});
//script donatur
function pilih_donatur(id, nama) {
    $('#iddonatur').val(id);
    $('#nama').val(nama);
    $('#modal_donatur').modal().hide();
}

function pilih_donatur1(id1, nama) {
    $('#iddonatur1').val(id1);
    $('#nama1').val(nama);
    $('#modal_donatur1').modal().hide();
}
</script>
<?= $this->endSection('') ?>