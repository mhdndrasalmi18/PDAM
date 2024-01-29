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
                        <h4 class="mt-e header-title">Data Agenda</h4>
                    </div>
                    <div class="card-body">
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
                                                <th>ID</th>
                                                <th>Nama Kegiatan</th>
                                                <th>Tanggal</th>
                                                <th>Jam</th>
                                                <th>Jenis Kas</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 0;
                                            foreach ($Agenda as $val) {
                                                $no++; ?>
                                            <tr role="row" class="odd">
                                                <td><?= $no; ?></td>
                                                <td><?= $val['idagenda'] ?></td>
                                                <td><?= $val['namakegiatan'] ?></td>
                                                <td><?= $val['tgl'] ?></td>
                                                <td><?= $val['jam'] ?></td>
                                                <td><?= $val['jenis_kas'] ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-info btn-sm btn-edit"
                                                        data-idagenda="<?= $val['idagenda']; ?>"
                                                        data-nama="<?= $val['namakegiatan']; ?>"
                                                        data-tgl="<?= $val['tgl']; ?>" data-jam="<?= $val['jam']; ?>" data-jeniskas="<?= $val['jenis_kas']; ?>">
                                                        <i class=" fa fa-tags"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-danger btn-sm btn-delete"
                                                        data-idagenda="<?= $val['idagenda']; ?>">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
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
<form action="/agenda/delete" method="post">
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Agenda</h5>
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
<form action="/agenda/update" method="post">
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agenda</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <label>ID</label>
                        <input type="text" class="form-control id" name="id">
                    </div>
                    <div class="col-md-12">
                        <label>Nama Kegiatan</label>
                        <input type="text" class="form-control namakegiatan" name="namakegiatan">
                    </div>
                    <div class="col-md-12">
                        <label>Tanggal</label>
                        <input type="date" class="form-control tanggal" name="tanggal">
                    </div>
                    <div class="col-md-12">
                        <label>Jam</label>
                        <input type="time" class="form-control jam" name="jam">
                    </div>
                </div>
                <div class="col-md-12">
                        <label>Jenis Kas</label>
                        <select name="jeniskas" class="form-control jeniskas">
                            <option value="" disabled selected>Pilih Hak Akses</option>
                            <option value="Anak Yatim">Anak Yatim</option>
                            <option value="TPQ">TPQ</option>
                            <option value="Masjid">Masjid</option>
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
<form action="/agenda/save" method="post">
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
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agenda</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <label>ID</label>
                        <input type="text" class="form-control" name="id">
                    </div>
                    <div class="col-md-12">
                        <label>Nama Kegiatan</label>
                        <input type="text" class="form-control" name="namakegiatan">
                    </div>
                    <div class="col-md-12">
                        <label>Tanggal</label>
                        <input type="date" class="form-control" name="tanggal">
                    </div>
                    <div class="col-md-12">
                        <label>Jam</label>
                        <input type="time" class="form-control" name="jam">
                    </div>
                </div>
                <div class="col-md-12">
                        <label>Jenis Kas</label>
                        <select name="jeniskas" class="form-control">
                            <option value="" disabled selected>Pilih Hak Akses</option>
                            <option value="Anak Yatim">Anak Yatim</option>
                            <option value="TPQ">TPQ</option>
                            <option value="Masjid">Masjid</option>
                        </select>
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
    const id = $(this).data('idagenda');
    const namakegiatan = $(this).data('nama');
    const tgl = $(this).data('tgl');
    const jam = $(this).data('jam');
    const jeniskas = $(this).data('jeniskas');

    $('.id').val(id);
    $('.namakegiatan').val(namakegiatan);
    $('.tanggal').val(tgl);
    $('.jam').val(jam);
    $('.jeniskas').val(jeniskas);
    // $('.jam').val(jam).trigger('change');
    $('#editModal').modal('show');
});
//script delete
$('.btn-delete').on('click', function() {
    const id = $(this).data('idagenda');
    $('.id').val(id);
    $('#deleteModal').modal('show');
});
//script datatable
$(document).ready(function() {
    $('#dataagenda').DataTable();
});
</script>
<?= $this->endSection('') ?>