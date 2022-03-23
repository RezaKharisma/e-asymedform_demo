<?php
defined('BASEPATH') or exit('No direct script access allowed');
setlocale(LC_ALL, 'id-ID', 'id_ID');
?>

<style>
    .tableData {
        margin: 0 auto;
        width: 100%;
        clear: both;
        border-collapse: collapse;
        table-layout: fixed;
        word-wrap: break-word;
        text-align: left;
        vertical-align: top;
    }

    .tableFilter {
        vertical-align: middle;
    }
</style>

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Dokter</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= base_url('admin/index'); ?>">Home</a></li>
                    <li class="breadcrumb-item active">Data Dokter</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="mb-3">
                    <a href="<?= base_url('dokter/show'); ?>" class="btn btn-default"><i class="fas fa-sync-alt"></i></a>
                    <button class="btn btn-info" data-toggle="modal" data-target="#modalPetunjuk"><i class="fas fa-question-circle"></i> Petunjuk Penggunaan</button>
                    <a href="<?= base_url('dokter/index'); ?>" class="btn btn-success"><i class="fas fa-plus"></i> Tambah Data</a>
                </div>
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Tabel dokter</h3>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">
                        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-12">
                                    <table id="tabelDokter" class="table table-striped table-bordered dataTable dtr-inline" role="grid" width="100%">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting sorting_asc" width="10px">#</th>
                                                <th class="sorting" width="200px">Nama Dokter</th>
                                                <th class="sorting" width="100px">Jenis Kelamin</th>
                                                <th class="no-sort" width="120px">Nomor Telepon</th>
                                                <th class="no-sort" width="250px">Email</th>
                                                <th class="no-sort" width="300px">Pendidikan</th>
                                                <th class="sorting" width="50px">Status</th>
                                                <th class="no-sort" width="120px">Foto</th>
                                                <th class="no-sort" width="100px">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="odd">
                                                <td class="boldId sorting_1 dtr-control">2</td>
                                                <td>drg. Monika Tanjung</td>
                                                <td>Perempuan</td>
                                                <td>082x-xxxx-xxxx</td>
                                                <td>MonikaTanjung@gmail.com</td>
                                                <td>Dokter Gigi Umum</td>
                                                <td><span class="badge badge-success">Aktif</span></td>
                                                <td><img src="<?= base_url('application/views/assets/img/dokter/defaultWoman.jpg'); ?>" alt="fotoDokter" style="width: 120px; height: 120px; object-fit: cover;"></td>
                                                <td><button class="btn btn-danger mr-1" id="btnDelete" data-toggle="modal" data-target="#modalHapus" data-id="4"><i class="fa fa-trash-alt"></i></button> <button class="btn btn-warning mr-1" id="btnView" data-toggle="modal" data-target="#modalView" data-id="4" data-idselected="4"><i class="fa fa-eye"></i></button></td>
                                            </tr>
                                            <tr class="even">
                                                <td class="boldId sorting_1 dtr-control">1</td>
                                                <td>drg. Budi Lesmana</td>
                                                <td>Laki - laki</td>
                                                <td>081x-xxxx-xxxx</td>
                                                <td>BudiLesmana@gmail.com</td>
                                                <td>Dokter Gigi Umum</td>
                                                <td><span class="badge badge-success">Aktif</span></td>
                                                <td><img src="<?= base_url('application/views/assets/img/dokter/default.jpg'); ?>" alt="fotoDokter" style="width: 120px; height: 120px; object-fit: cover;"></td>
                                                <td><button class="btn btn-danger mr-1" id="btnDelete" data-toggle="modal" data-target="#modalHapus" data-id="3"><i class="fa fa-trash-alt"></i></button> <button class="btn btn-warning mr-1" id="btnView" data-toggle="modal" data-target="#modalView" data-id="3" data-idselected="3"><i class="fa fa-eye"></i></button></td>
                                            </tr>
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
                Apakah anda yakin menghapus data tersebut ? <br />
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                <button type="button" class="btn btn-primary" id="btnYes">Ya</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal View -->
<div class="modal fade" id="modalView" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Dokter</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="printThis" class=" table table-bordered table-striped">
                    <tbody id="tableView">
                        <tr>
                            <td width="200px">Nama Pasien</td>
                            <td colspan="2">drg. Monika Tanjung</td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td colspan="2">Denpasar</td>
                        </tr>
                        <tr>
                            <td>Nomor Telepon</td>
                            <td colspan="2">082x-xxxx-xxxx</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td colspan="2">MonikaTanjung@gmail.com</td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td colspan="2">Perempuan</td>
                        </tr>
                        <tr>
                            <td>Tanggal Lahir</td>
                            <td colspan="2">21 Januari 1988</td>
                        </tr>
                        <tr>
                            <td>Umur</td>
                            <td colspan="2">33 Tahun</td>
                        </tr>
                        <tr>
                            <td>Pendidikan</td>
                            <td colspan="2">Dokter Gigi Umum</td>
                        </tr>
                        <tr>
                            <td>Foto</td>
                            <td colspan="2">
                                <img src="<?= base_url('application/views/assets/img/dokter/default.jpg'); ?>" alt="fotoDokter" style="width: 120px; height: 120px; object-fit: cover;">
                            </td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td colspan="2">Aktif</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btnEdit">Update</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Update-->
<div class="modal fade" id="modalUpdate" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Dokter</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="<?= base_url('pasien/update'); ?>" id="formUpdate">
                <input type="hidden" class="form-control" name="idDokter" id="idDokter" />
                <input type="hidden" class="form-control" name="pictureLama" id="pictureLama">
                <input type="hidden" class="form-control" name="defaultImg" id="defaultImg">
                <div class="modal-body" style="padding: 20px;">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nama Lengkap</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukan Nama" value="drg. Monika Tanjung">
                            <div id="errorNama">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" rows="3" placeholder="Masukkan alamat" name="alamat" id="alamat">Denpasar</textarea>
                            <div id="errorAlamat">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nomor Telepon</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                </div>
                                <input type="text" class="form-control" data-inputmask='"mask": "9999-9999-9999"' data-mask value="082x-xxxx-xxxx" name="nomorTelepon" id="nomorTelepon" placeholder="Masukkan nomor telepon">
                            </div>
                            <div id="errorNomorTelepon">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="email" id="email" placeholder="Masukan email" value="MonikaTanjung@gmail.com">
                            <div id="errorEmail">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-10">
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" type="radio" name="jenisKelamin" value="Laki - laki" id="customRadio1">
                                <label for="customRadio1" class="custom-control-label" style="font-weight: normal;">Laki - laki</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" type="radio" name="jenisKelamin" value="Perempuan" checked id="customRadio2">
                                <label for="customRadio2" class="custom-control-label" style="font-weight: normal;">Perempuan</label>
                            </div>
                            <div id="errorJenisKelamin">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Tanggal Lahir</label>
                        <div class="col-sm-10">
                            <div class="input-group date" id="tanggalPicker" data-target-input="nearest">
                                <div class="input-group-prepend" data-target="#tanggalPicker" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                                <input type="text" class="form-control datetimepicker-input" name="tanggalLahir" value="21/01/1988" id="tanggalPicker" placeholder="dd/mm/yyyy">
                            </div>
                            <div id="errorTanggalLahir">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Umur</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="umur" id="umur" placeholder="Masukan Umur" value="33">
                            <div id="errorUmur">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Pendidikan</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" rows="3" placeholder="Masukkan Pendidikan" name="pendidikan" id="pendidikan">Dokter Gigi Umum</textarea>
                            <div id="errorPendidikan">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Foto Profil</label><br />
                        <div class="col-sm-10">
                            <img class="img-thumbnail img-fluid" src="<?= base_url('/application/views/assets/img/dokter/default.jpg'); ?>" alt="fotoProfil" width="150px" id="img-preview">
                            <button type="button" class="btn btn-warning ml-3" onclick="hapusFoto()">Hapus Foto</button>
                            <br /><br />
                            <p>
                                <font style="color: red;">*</font> Foto biarkan kosong jika tidak ingin mengupdate.
                            </p>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="thumbnail" name="foto" onchange="previewImg()">
                                    <label class="custom-file-label" id="labelFile">Pilih foto...</label>
                                </div>
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
                        <td align="center" class="TableCenter"><img src="<?= base_url('/application/views/assets/img/petunjuk/action.png'); ?>" class="img-fluid"></td>
                        <td align="justify">Pada kolom Action terdapat tombol hapus dan tombol detail. Tombol hapus digunakan menghapus data dokter tersebut, sedangkan tombol detail untuk melihat detail dokter tersebut.</td>
                    </tr>
                    <tr>
                        <td align="center" class="TableCenter"><img src="<?= base_url('/application/views/assets/img/petunjuk/update.png'); ?>" class="img-fluid"></td>
                        <td align="justify">Saat halaman detail muncul, pada bagian bawah terdapat tombol update. Tombol update digunakan untuk mengupdate data dokter tersebut.</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>