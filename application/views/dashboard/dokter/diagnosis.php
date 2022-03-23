<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<style>
    .marginSmall {
        margin-left: -5px;
    }
</style>

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Tambah Data Diagnosis</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= base_url('admin/index'); ?>">Home</a></li>
                    <li class="breadcrumb-item active">Data Diagnosis</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="mb-3">
                    <a href="<?= base_url('diagnosis/index'); ?>" class="btn btn-default"><i class="fas fa-sync-alt"></i></a>
                    <button class="btn btn-info" data-toggle="modal" data-target="#modalPetunjuk"><i class="fas fa-question-circle"></i> Petunjuk Penggunaan</button>
                </div>
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Form data diagnosis</h3>
                    </div>
                    <form class="form-horizontal" method="POST" id="formDiagnosis">
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Diagnosis <font style="color: red;">*</font></label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" rows="3" placeholder="Masukkan diagnosis" name="diagnosis" id="diagnosis"></textarea>
                                    <div id="errorDiagnosis">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="button" class="btn btn-success float-right" id="btnSimpan">Simpan</button>
                            <button type="button" class="btn btn-primary float-right" onclick="this.form.reset()" id="btnReset" style="margin-right: 3px;">Reset</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Data Diagnosis</h3>
                    </div>
                    <div class="card-body">
                        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-12">
                                    <table id="tableDiagnosis" class="table table-striped table-bordered dataTable dtr-inline" role="grid" width="100%">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting sorting_asc" width="5px">#</th>
                                                <th class="sorting">Diagnosis</th>
                                                <th class="no-sort" width="120px">Action</th>
                                            </tr>
                                        <tbody>
                                            <tr class="odd">
                                                <td class="boldId sorting_1 dtr-control">1</td>
                                                <td>Perikoronitis</td>
                                                <td><button class="btn btn-danger mr-1" id="btnDelete" data-toggle="modal" data-target="#modalHapus" data-id="51"><i class="fa fa-trash-alt"></i></button> <button class="btn btn-warning mr-1" id="btnEdit" data-toggle="modal" data-target="#modalUpdate" data-id="51" data-idselected="51"><i class="fa fa-pen"></i></button></td>
                                            </tr>
                                            <tr class="even">
                                                <td class="boldId sorting_1 dtr-control">2</td>
                                                <td>Nekrosis pulpa</td>
                                                <td><button class="btn btn-danger mr-1" id="btnDelete" data-toggle="modal" data-target="#modalHapus" data-id="49"><i class="fa fa-trash-alt"></i></button> <button class="btn btn-warning mr-1" id="btnEdit" data-toggle="modal" data-target="#modalUpdate" data-id="49" data-idselected="49"><i class="fa fa-pen"></i></button></td>
                                            </tr>
                                            <tr class="odd">
                                                <td class="boldId sorting_1 dtr-control">3</td>
                                                <td>Periodontitis</td>
                                                <td><button class="btn btn-danger mr-1" id="btnDelete" data-toggle="modal" data-target="#modalHapus" data-id="48"><i class="fa fa-trash-alt"></i></button> <button class="btn btn-warning mr-1" id="btnEdit" data-toggle="modal" data-target="#modalUpdate" data-id="48" data-idselected="48"><i class="fa fa-pen"></i></button></td>
                                            </tr>
                                            <tr class="even">
                                                <td class="boldId sorting_1 dtr-control">4</td>
                                                <td>Karies</td>
                                                <td><button class="btn btn-danger mr-1" id="btnDelete" data-toggle="modal" data-target="#modalHapus" data-id="47"><i class="fa fa-trash-alt"></i></button> <button class="btn btn-warning mr-1" id="btnEdit" data-toggle="modal" data-target="#modalUpdate" data-id="47" data-idselected="47"><i class="fa fa-pen"></i></button></td>
                                            </tr>
                                            <tr class="odd">
                                                <td class="boldId sorting_1 dtr-control">5</td>
                                                <td>Kalkulus</td>
                                                <td><button class="btn btn-danger mr-1" id="btnDelete" data-toggle="modal" data-target="#modalHapus" data-id="46"><i class="fa fa-trash-alt"></i></button> <button class="btn btn-warning mr-1" id="btnEdit" data-toggle="modal" data-target="#modalUpdate" data-id="46" data-idselected="46"><i class="fa fa-pen"></i></button></td>
                                            </tr>
                                        </tbody>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal Hapus -->
<div class="modal fade" id="modalHapus" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-exclamation-triangle"></i> Peringatan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah anda yakin menghapus data tersebut ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                <button type="button" class="btn btn-primary" id="btnYes">Ya</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Update-->
<div class="modal fade" id="modalUpdate" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Diagnosis</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" id="formUpdate">
                <input type="hidden" name="diagnosisLama" id="diagnosisLama">
                <div class="modal-body" style="padding: 20px;">
                    <div class="form-group row">
                        <input type="hidden" name="idDiagnosisUpdate" id="idDiagnosisUpdate">
                        <label class="col-sm-2 col-form-label">Diagnosis</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" rows="3" placeholder="Masukkan diagnosis" name="diagnosisUpdate" id="diagnosisUpdate">Perikoronitis</textarea>
                            <div id="errorDiagnosisUpdate">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="btnUpdate"><i class="loading-icon-update fa fa-spinner fa-spin hide"></i> Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Petunjuk -->
<div class="modal fade" id="modalPetunjuk" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Petunjuk Penggunaan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <tr>
                        <td align="center" class="TableCenter"><img src="<?= base_url('/application/views/assets/img/petunjuk/show.png'); ?>" class="img-fluid"></td>
                        <td align="justify">Digunakan untuk mengatur jumlah data yang akan ditampilkan pada aplikasi.</td>
                    </tr>
                    <tr>
                        <td align="center" class="TableCenter"><img src="<?= base_url('/application/views/assets/img/petunjuk/search.png'); ?>" class="img-fluid"></td>
                        <td align="justify">Search bar digunakan untuk mencari data yang ada tabel pasien secara spesifik sesuai kata kunci yang dicari.</td>
                    </tr>
                    <tr>
                        <td align="center" class="TableCenter"><img src="<?= base_url('/application/views/assets/img/petunjuk/sort.png'); ?>" class="img-fluid"></td>
                        <td align="justify">Pada bagian judul tabel terdapat tanda panah untuk melakukan sorting pada area kolom.</td>
                    </tr>
                    <tr>
                        <td align="center" class="TableCenter"><img src="<?= base_url('/application/views/assets/img/petunjuk/ActionDelete&Update.png'); ?>" class="img-fluid"></td>
                        <td align="justify">Pada kolom Action terdapat tombol hapus dan tombol update. Tombol hapus digunakan untuk menghapus data diagnosis, sedangkan tombol update untuk mengupdate detail diagnosis tersebut.</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>