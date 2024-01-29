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
                        <h4 class="mt-e header-title">Data Pelanggan</h4>
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
                                    <table class="table table-sm table-striped " id="dataPelanggan">
                                        <thead>
                                            <tr role="row">
                                                <th>No</th>
                                                <th>ID</th>
                                                <th>Nama Pelanggan</th>
                                                <th>Alamat</th>
                                                <th>NoHP</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 0;
                                            foreach ($Pelanggan as $val) {
                                                $no++; ?>
                                            <tr role="row" class="odd">
                                                <td><?= $no; ?></td>
                                                <td><?= $val['id'] ?></td>
                                                <td><?= $val['nama'] ?></td>
                                                <td><?= $val['nohp'] ?></td>
                                                <td><?= $val['alamat'] ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-info btn-sm btn-edit"
                                                        data-id="<?= $val['id']; ?>"
                                                        data-nama="<?= $val['nama']; ?>"
                                                        data-nohp="<?= $val['nohp']; ?>"
                                                        data-alamat="<?= $val['alamat']; ?>">
                                                        <i class=" fa fa-tags"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-danger btn-sm btn-delete"
                                                        data-id="<?= $val['id']; ?>">
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
<form action="/Pelanggan/delete" method="post">
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Pelanggan</h5>
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
<form action="/Pelanggan/update" method="post">
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Pelanggan</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <label>ID</label>
                        <input type="text" class="form-control id" name="id">
                    </div>
                    <div class="col-md-12">
                        <label>Nama Pelanggan</label>
                        <input type="text" class="form-control namaPelanggan" name="namaPelanggan">
                    </div>
                    <div class="col-md-12">
                        <label>Jabatan</label>
                        <input type="text" class="form-control jabatan" name="jabatan">
                    </div>
                    <div class="col-md-12">
                        <label>Alamat</label>
                        <input type="text" class="form-control alamat" name="alamat">
                    </div>
                    <div class="col-md-12">
                        <label>No HP</label>
                        <input type="text" class="form-control nohp" name="nohp">
                    </div>
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
<form action="/Pelanggan/save" method="post">
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Pelanggan</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <label>ID</label>
                        <input type="text" class="form-control" name="id">
                    </div>
                    <div class="col-md-12">
                        <label>Nama Pelanggan</label>
                        <input type="text" class="form-control" name="nama">
                    </div>
                    <div class="col-md-12">
                        <label>NoHP</label>
                        <input type="text" class="form-control" name="nohp">
                    </div>
                    <div class="col-md-12">
                        <label>Alamat</label>
                        <input type="text" class="form-control" name="alamat">
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
    const id = $(this).data('id_Pelanggan');
    const namaPelanggan = $(this).data('nama');
    const jabatan = $(this).data('jabatan');
    const alamat = $(this).data('alamat');
    const nohp = $(this).data('nohp');

    $('.id').val(id);
    $('.namaPelanggan').val(namaPelanggan);
    $('.alamat').val(alamat);
    $('.jabatan').val(jabatan);
    $('.nohp').val(nohp);
    $('.nohp').val(nohp).trigger('change');
    $('#editModal').modal('show');
});
//script delete
$('.btn-delete').on('click', function() {
    const id = $(this).data('id_Pelanggan');
    $('.id').val(id);
    $('#deleteModal').modal('show');
});
//script datatable
$(document).ready(function() {
    $('#dataPelanggan').DataTable();
});
</script>
<?= $this->endSection('') ?>