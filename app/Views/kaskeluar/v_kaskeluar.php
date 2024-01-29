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
                        <div class="col-md-12">
                            <button type="button" class="btn btn-sm btn-primary" data-target="#addModalAnakYatim"
                                data-toggle="modal">Tambah Data Kas Anak Yatim</button>
                            <button type="button" class="btn btn-sm btn-primary" data-target="#addModalMasjid"
                                data-toggle="modal">Tambah Data Kas Masjid</button>
                            <button type="button" class="btn btn-sm btn-primary" data-target="#addModalTPQ"
                                data-toggle="modal">Tambah Data Kas TPQ</button>
                            <button type="button" class="btn btn-sm btn-primary" data-target="#addModalSosial"
                                data-toggle="modal">Tambah Data Kas Sosial</button>
                        </div>
                        <br>
                        <div id="datatable_wrapper" class="dataTables repper container-fluid dt-bootstrap4 no-footer">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-sm table-striped " id="dataagenda">
                                        <thead>
                                            <tr role="row">
                                                <th>No</th>
                                                <th>Tanggal</th>
                                                <th>Nama Kegiatan</th>
                                                <th>Kas Keluar</th>
                                                <th>Jenis Kas</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $total = 0; ?>
                                            <?php $no = 0;
                                            $model = new App\Models\ModelUser();
                                            $data = $model->getUser()->getResultArray();
                                            foreach ($Kaskeluar as $val) {
                                                $no++; ?>
                                            <tr role="row" class="odd">
                                                <td><?= $no; ?></td>
                                                <td><?= $val['tgl'] ?></td>
                                                <td><?= $val['namakegiatan'] ?></td>
                                                <td><?= $val['kas_keluar'] ?></td>
                                                <?php $total += $val['kas_keluar'];  ?>
                                                <td><?= $val['jenis_kas'] ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-info btn-sm btn-edit"
                                                        data-id="<?= $val['id_kas_keluar']; ?>"
                                                        data-tanggal="<?= $val['tgl']; ?>"
                                                        data-namakegiatan="<?= $val['namakegiatan']; ?>"
                                                        data-kaskeluar="<?= $val['kas_keluar']; ?>"
                                                        data-jeniskas="<?= $val['jenis_kas']; ?>">
                                                        <i class=" mdi mdi-tooltip-edit"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-danger btn-sm btn-delete"
                                                        data-id="<?= $val['id_kas_keluar']; ?>">
                                                        <i class="ti-trash"></i>
                                                    </button>
                                                </td>

                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                        <tr>
                                            <th colspan="3">Total Kas Keluar</th>
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
<form action="/Kaskeluar/delete" method="post">
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
<form action="/Kaskeluar/update" method="post">
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <label>Nama Kegiatan</label>
                    <input type="text" class="form-control namakegiatan" name="namakegiatan">
                </div>
                <div class="col-md-12">
                    <label>Kas Keluar</label>
                    <input type="text" class="form-control Kaskeluar" name="Kaskeluar">
                </div>
                <div class="col-md-12">
                    <label>Jenis Kas</label>
                    <input type="text" name="jeniskas" disabled="true" class="form-control jeniskas">
                    </input>
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
<!-- Form Tambah Anak Yatim-->
<form action="/Kaskeluar/save" method="post">
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
    <div class="modal fade" id="addModalAnakYatim" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <!-- Modal Anak Yatim -->
        <div class="modal fade" id="modalanakyatim" tabindex="1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Data Agenda</h4>
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
                                    <th>Nama Kegiatan</th>
                                    <th>Tanggal</th>
                                    <th>Jam</th>
                                    <th>Jenis Kas</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                        $no = 0;
                        foreach ($dataanakyatim as $d1):
                            $no++; ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?= $d1->idagenda ?></td>
                                    <td><?= $d1->namakegiatan ?></td>
                                    <td><?= $d1->tgl ?></td>
                                    <td><?= $d1->jam ?></td>
                                    <td><?= $d1->jenis_kas ?></td>
                                    <td>
                                        <button type="button" class="btn btn-primary"
                                            onclick="return pilih_anakyatim('<?= $d1->idagenda ?>','<?= $d1->namakegiatan ?>','<?= $d1->jenis_kas ?>')">Pilih</button>
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
                    <h5 class="modal-title" id="exampleModalLabel">Kas Keluar Anak Yatim</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                    <?php foreach($hitungkasmasukanakyatim as $kasmasukyatim){ ?><?php $a =  $kasmasukyatim['total'] ?><?php } ?>
                    <?php foreach($hitungkaskeluaranakyatim as $kaskeluaryatim){ ?><?php $b = $kaskeluaryatim['total'] ?><?php } ?>
                <h5 class="ml-3">Sisa Kas : <?= $sisa = $a-$b ?></h5>
                <input type="hidden" name="tot" class="tot" value="<?= $sisa; ?>"> 
                <div class="modal-body">
                    <div class="col-md-12">
                        <label>Tanggal</label>
                        <input type="date" class="form-control" name="tanggal">
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Agenda</label>
                                    <button type="button" data-toggle="modal" data-target="#modalanakyatim"
                                        class="btn btn-xs btn-primary">Agenda</button>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>ID</label>
                                    <input type="text" name="idagenda" readonly id="idagenda1" class="form-control ">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Nama Kegiatan</label>
                                    <input type="text" readonly name="namakegiatan" id="namakegiatan1"
                                        class="form-control ">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Jenis Kas</label>
                                    <input type="text" readonly name="jeniskas" id="jeniskas1" class="form-control ">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label>Kas Keluar</label>
                        <input type="text" class="form-control" name="Kaskeluar">
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
<!-- End Tambah Anak Yatim-->
<!-- Form Tambah Masjid-->
<form action="/Kaskeluar/save" method="post">
    <?php if (!empty(session()->getFlashdata ('error'))): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <h4> Periksa Entrian Form </h4>
        </hr />

        <?php echo session()->getFlashdata('error'); ?>
        <button type="button" id="addModalMasjid" class=" close " data-dismiss=" alert">
            <span aria-hidden="true">&times;</span>

        </button>
    </div>
    <?php endif; ?>
    <div class="modal fade" id="addModalMasjid" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <!-- Modal Masjid -->
        <div class="modal fade" id="modalmasjid" tabindex="1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Data Agenda</h4>
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
                                    <th>Nama Kegiatan</th>
                                    <th>Tanggal</th>
                                    <th>Jam</th>
                                    <th>Jenis Kas</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                        $no = 0;
                        foreach ($datamasjid as $d2):
                            $no++; ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?= $d2->idagenda ?></td>
                                    <td><?= $d2->namakegiatan ?></td>
                                    <td><?= $d2->tgl ?></td>
                                    <td><?= $d2->jam ?></td>
                                    <td><?= $d2->jenis_kas ?></td>
                                    <td>
                                        <button type="button" class="btn btn-primary"
                                            onclick="return pilih_masjid('<?= $d2->idagenda ?>','<?= $d2->namakegiatan ?>','<?= $d2->jenis_kas ?>')">Pilih</button>
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
                    <h5 class="modal-title" id="exampleModalLabel">Kas Keluar Masjid</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                
                    <?php foreach($hitungkasmasukmasjid as $kasmasukmasjid){ ?><?php $c =  $kasmasukmasjid['total'] ?><?php } ?>
                
                    <?php foreach($hitungkaskeluarmasjid as $kaskeluarmasjid){ ?><?php $d = $kaskeluarmasjid['total'] ?><?php } ?>
                <h5 class="ml-3">Sisa Kas : <?= $sisa = $c-$d ?></h5>
                <input type="hidden" name="tot" class="tot" value="<?= $sisa; ?>"> 
                <div class="modal-body">
                    <div class="col-md-12">
                        <label>Tanggal</label>
                        <input type="date" class="form-control" name="tanggal">
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Agenda</label>
                                    <button type="button" data-toggle="modal" data-target="#modalmasjid"
                                        class="btn btn-xs btn-primary">Agenda</button>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>ID</label>
                                    <input type="text" name="idagenda" readonly id="idagenda2" class="form-control ">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Nama Kegiatan</label>
                                    <input type="text" readonly name="namakegiatan" id="namakegiatan2"
                                        class="form-control ">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Jenis Kas</label>
                                    <input type="text" readonly name="jeniskas" id="jeniskas2" class="form-control ">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label>Kas Keluar</label>
                        <input type="text" class="form-control" name="Kaskeluar">
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
<!-- End Tambah Masjid -->
<!-- Form Tambah TPQ-->
<form action="/Kaskeluar/save" method="post">
    <?php if (!empty(session()->getFlashdata ('error'))): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <h4> Periksa Entrian Form </h4>
        </hr />

        <?php echo session()->getFlashdata('error'); ?>
        <button type="button" id="addModalTPQ" class=" close " data-dismiss=" alert">
            <span aria-hidden="true">&times;</span>

        </button>
    </div>
    <?php endif; ?>
    <div class="modal fade" id="addModalTPQ" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <!-- Modal TPQ -->
        <div class="modal fade" id="modaltpq" tabindex="1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Data Agenda</h4>
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
                                    <th>Nama Kegiatan</th>
                                    <th>Tanggal</th>
                                    <th>Jam</th>
                                    <th>Jenis Kas</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                        $no = 0;
                        foreach ($datatpq as $d3):
                            $no++; ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?= $d3->idagenda ?></td>
                                    <td><?= $d3->namakegiatan ?></td>
                                    <td><?= $d3->tgl ?></td>
                                    <td><?= $d3->jam ?></td>
                                    <td><?= $d3->jenis_kas ?></td>
                                    <td>
                                        <button type="button" class="btn btn-primary"
                                            onclick="return pilih_tpq('<?= $d3->idagenda ?>','<?= $d3->namakegiatan ?>','<?= $d3->jenis_kas ?>')">Pilih</button>
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
                    <h5 class="modal-title" id="exampleModalLabel">Kas Keluar TPQ</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
            
                    <?php foreach($hitungkasmasuktpq as $kasmasuktpq){ ?><?php $e =  $kasmasuktpq['total'] ?><?php } ?>
                
                    <?php foreach($hitungkaskeluartpq as $kaskeluartpq){ ?><?php $f = $kaskeluartpq['total'] ?><?php } ?>
                <h5 class="ml-3">Sisa Kas : <?= $sisa= $e-$f ?></h5>
                <input type="hidden" name="tot" class="tot" value="<?= $sisa; ?>"> 
                <div class="modal-body">
                    <div class="col-md-12">
                        <label>Tanggal</label>
                        <input type="date" class="form-control" name="tanggal">
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Agenda</label>
                                    <button type="button" data-toggle="modal" data-target="#modaltpq"
                                        class="btn btn-xs btn-primary">Agenda</button>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>ID</label>
                                    <input type="text" name="idagenda" readonly id="idagenda3" class="form-control ">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Nama Kegiatan</label>
                                    <input type="text" readonly name="namakegiatan" id="namakegiatan3"
                                        class="form-control ">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Jenis Kas</label>
                                    <input type="text" readonly name="jeniskas" id="jeniskas3" class="form-control ">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label>Kas Keluar</label>
                        <input type="text" class="form-control" name="Kaskeluar">
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
<!-- End Tambah TPQ-->
<!-- Form Tambah Sosial-->
<form action="/Kaskeluar/save" method="post">
    <?php if (!empty(session()->getFlashdata ('error'))): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <h4> Periksa Entrian Form </h4>
        </hr />

        <?php echo session()->getFlashdata('error'); ?>
        <button type="button" id="addModalSosial" class=" close " data-dismiss=" alert">
            <span aria-hidden="true">&times;</span>

        </button>
    </div>
    <?php endif; ?>
    <div class="modal fade" id="addModalSosial" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <!-- Modal Sosial -->
        <div class="modal fade" id="modalsosial" tabindex="1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Data Agenda</h4>
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
                                    <th>Nama Kegiatan</th>
                                    <th>Tanggal</th>
                                    <th>Jam</th>
                                    <th>Jenis Kas</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                        $no = 0;
                        foreach ($datasosial as $d4):
                            $no++; ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?= $d4->idagenda ?></td>
                                    <td><?= $d4->namakegiatan ?></td>
                                    <td><?= $d4->tgl ?></td>
                                    <td><?= $d4->jam ?></td>
                                    <td><?= $d4->jenis_kas ?></td>
                                    <td>
                                        <button type="button" class="btn btn-primary"
                                            onclick="return pilih_sosial('<?= $d4->idagenda ?>','<?= $d4->namakegiatan ?>','<?= $d4->jenis_kas ?>')">Pilih</button>
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
                    <h5 class="modal-title" id="exampleModalLabel">Kas Keluar Sosial</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                        <?php foreach($hitungkasmasuksosial as $kasmasuksosial){ ?><?php $g =  $kasmasuksosial['total'] ?><?php } ?>
                   
                        <?php foreach($hitungkaskeluarsosial as $kaskeluarsosial){ ?><?php $h = $kaskeluarsosial['total'] ?><?php } ?>
                    <h5 class="ml-3">Sisa Kas : <?= $sisa= $g-$h ?></h5>
                    <input type="hidden" name="tot" class="tot" value="<?= $sisa; ?>"> 
                    <div class="col-md-12">
                        <label>Tanggal</label>
                        <input type="date" class="form-control" name="tanggal">
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Agenda</label>
                                    <button type="button" data-toggle="modal" data-target="#modalsosial"
                                        class="btn btn-xs btn-primary">Agenda</button>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>ID</label>
                                    <input type="text" name="idagenda" readonly id="idagenda4" class="form-control ">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Nama Kegiatan</label>
                                    <input type="text" readonly name="namakegiatan" id="namakegiatan4"
                                        class="form-control ">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Jenis Kas</label>
                                    <input type="text" readonly name="jeniskas" id="jeniskas4" class="form-control ">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label>Kas Keluar</label>
                        <input type="text" class="form-control" name="Kaskeluar">
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
<!-- End Tambah Sosial-->
<script>
//script edit
$('.btn-edit').on('click', function() {
    const id = $(this).data('id');
    const tanggal = $(this).data('tanggal');
    const namakegiatan = $(this).data('namakegiatan');
    const Kaskeluar = $(this).data('kaskeluar');
    const jeniskas = $(this).data('jeniskas');

    $('.id').val(id);
    $('.tanggal').val(tanggal);
    $('.namakegiatan').val(namakegiatan);
    $('.Kaskeluar').val(Kaskeluar);
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
    $('#dataKaskeluar').DataTable();
});
//script agenda
function pilih_anakyatim(id, nama, jenis) {
    $('#idagenda1').val(id);
    $('#namakegiatan1').val(nama);
    $('#jeniskas1').val(jenis);
    $('#modalanakyatim').modal().hide();
}

function pilih_masjid(id, nama, jenis) {
    $('#idagenda2').val(id);
    $('#namakegiatan2').val(nama);
    $('#jeniskas2').val(jenis);
    $('#modalmasjid').modal().hide();
}

function pilih_tpq(id, nama, jenis) {
    $('#idagenda3').val(id);
    $('#namakegiatan3').val(nama);
    $('#jeniskas3').val(jenis);
    $('#modaltpq').modal().hide();
}

function pilih_sosial(id, nama, jenis) {
    $('#idagenda4').val(id);
    $('#namakegiatan4').val(nama);
    $('#jeniskas4').val(jenis);
    $('#modalsosial').modal().hide();
}
</script>
<?= $this->endSection('') ?>