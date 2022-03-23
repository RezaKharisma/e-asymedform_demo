<?php
defined('BASEPATH') or exit('No direct script access allowed');
setlocale(LC_ALL, 'id-ID', 'id_ID');
date_default_timezone_set("Asia/Kuala_Lumpur");
?>

<style>
    /* .tableTampil {
        margin: 0 auto;
        width: 100%;
        clear: both;
        border-collapse: collapse;
        table-layout: fixed;
        word-wrap: break-word;
        text-align: left;
        vertical-align: top;
    } */

    .ui-front {
        z-index: 9999;
    }

    .modal {
        overflow-y: auto;
    }
</style>

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Rekam Medis</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= base_url('admin/index'); ?>">Home</a></li>
                    <li class="breadcrumb-item active">Rekam Medis</li>
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
                    <a href="<?= base_url('pasien/show'); ?>" class="btn btn-default"><i class="fas fa-sync-alt"></i></a>
                    <button class="btn btn-info" data-toggle="modal" data-target="#modalPetunjuk"><i class="fas fa-question-circle mr-1"></i> Petunjuk Penggunaan</button>
                    <a href="<?= base_url('pasien/index'); ?>" class="btn btn-success"><i class="fas fa-plus mr-1"></i> Tambah Data</a>
                </div>
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Tabel rekam medis </h3>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">
                        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-12">
                                    <table id="tabelPasien" class="table table-striped table-bordered dataTable dtr-inline tableTampil" role="grid" width="100%">
                                        <thead>
                                            <tr role=" row">
                                                <th class="sorting sorting_asc" width="10px">#</th>
                                                <th class="sorting" width="60px">No Rekap</th>
                                                <th class="sorting" width="200px">Nama Pasien</th>
                                                <th class="sorting" width="110px">Jenis Kelamin</th>
                                                <th class="sorting" width="50px">Umur</th>
                                                <th class="no-sort" width="120px">Nomor Telepon</th>
                                                <th class="no-sort" width="200px">Diagnosis</th>
                                                <th class="sorting" width="280px">Tanggal Check Up</th>
                                                <th class="sorting" width="90px">Biaya</th>
                                                <th class="no-sort" width="100px">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="odd">
                                                <td class="boldId sorting_1">4</td>
                                                <td>001</td>
                                                <td>Ahmad Maulana</td>
                                                <td>Laki - laki</td>
                                                <td>25 Tahun</td>
                                                <td>0877-8586-6455</td>
                                                <td>Periodontitis : RA dan RB || Nekrosis pulpa : 55</td>
                                                <td>Minggu, 30 Januari 2022 - jam 14.55 siang</td>
                                                <td>Rp. 500.000</td>
                                                <td><button class="btn btn-danger mr-1" id="btnDelete" data-toggle="modal" data-target="#modalHapus" data-id="4"><i class="fa fa-trash-alt"></i></button> <button class="btn btn-warning mr-1" id="btnView" data-toggle="modal" data-target="#modalView" data-id="4" data-idselected="4"><i class="fa fa-eye"></i></button></td>
                                            </tr>
                                            <tr class="even">
                                                <td class="boldId sorting_1">3</td>
                                                <td>003</td>
                                                <td>Bintang Putri</td>
                                                <td>Perempuan</td>
                                                <td>18 Tahun</td>
                                                <td>0826-4646-7585</td>
                                                <td>Perikoronitis : 38</td>
                                                <td>Sabtu, 18 Desember 2021 - jam 16.07 sore</td>
                                                <td>Rp. 150.000</td>
                                                <td><button class="btn btn-danger mr-1" id="btnDelete" data-toggle="modal" data-target="#modalHapus" data-id="3"><i class="fa fa-trash-alt"></i></button> <button class="btn btn-warning mr-1" id="btnView" data-toggle="modal" data-target="#modalView" data-id="3" data-idselected="3"><i class="fa fa-eye"></i></button></td>
                                            </tr>
                                            <tr class="odd">
                                                <td class="boldId sorting_1">2</td>
                                                <td>002</td>
                                                <td>Susanto Mulyawan</td>
                                                <td>Laki - laki</td>
                                                <td>22 Tahun</td>
                                                <td>0856-7278-3834</td>
                                                <td>Karies : - || Nekrosis pulpa : -</td>
                                                <td>Kamis, 18 November 2021 - jam 16.06 sore</td>
                                                <td>Rp. 500.000</td>
                                                <td><button class="btn btn-danger mr-1" id="btnDelete" data-toggle="modal" data-target="#modalHapus" data-id="2"><i class="fa fa-trash-alt"></i></button> <button class="btn btn-warning mr-1" id="btnView" data-toggle="modal" data-target="#modalView" data-id="2" data-idselected="2"><i class="fa fa-eye"></i></button></td>
                                            </tr>
                                            <tr class="even">
                                                <td class="boldId sorting_1">1</td>
                                                <td>001</td>
                                                <td>Ahmad Maulana</td>
                                                <td>Laki - laki</td>
                                                <td>25 Tahun</td>
                                                <td>0877-8586-6455</td>
                                                <td>Periodontitis : RA dan RB</td>
                                                <td>Selasa, 18 Januari 2022 - jam 15.59 sore</td>
                                                <td>Rp. 400.000</td>
                                                <td><button class="btn btn-danger mr-1" id="btnDelete" data-toggle="modal" data-target="#modalHapus" data-id="1"><i class="fa fa-trash-alt"></i></button> <button class="btn btn-warning mr-1" id="btnView" data-toggle="modal" data-target="#modalView" data-id="1" data-idselected="1"><i class="fa fa-eye"></i></button></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
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

<!-- Modal View -->
<div class="modal fade" id="modalView" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Pasien</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="printThis" class="table table-striped table-bordered">
                    <tbody id="tableView">
                        <tr style="background: #86cfda">
                            <td rowspan='4' class="align-middle" align='center'>INFORMASI</td>
                            <td>Nomor Rekap</td>
                            <td style="border-left: 1px solid #86cfda;">001</td>
                        </tr>
                        <tr style="background: #86cfda;">
                            <td>Penanggung Jawab </td>
                            <td style="border-left: 1px solid #86cfda;">drg. Budi Lesmana</td>
                        </tr>
                        <tr style="background: #86cfda">
                            <td>Tanggal Check Up</td>
                            <td style="border-left: 1px solid #86cfda;">Selasa, 18 Januari 2022 - jam 15.59 sore</td>
                        </tr>
                        <tr style="background: #86cfda">
                            <td>Kunjungan Ke</td>
                            <td colspan="1" style="border-left: 1px solid #86cfda;">1</td>
                        </tr>
                        <tr>
                            <td width="200px">Nama Pasien</td>
                            <td colspan="2">Ahmad Maulana</td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td colspan="2">Badung</td>
                        </tr>
                        <tr>
                            <td>Nomor Telepon</td>
                            <td colspan="2">085x-xxxx-xxxx</td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td colspan="2">Laki - laki</td>
                        </tr>
                        <tr>
                            <td>Tanggal Lahir</td>
                            <td colspan="2">13 September 1996</td>
                        </tr>
                        <tr>
                            <td>Umur</td>
                            <td colspan="2">25 Tahun</td>
                        </tr>
                        <tr>
                            <td>Alergi</td>
                            <td colspan="2" align="justify">Makanan</td>
                        </tr>
                        <tr>
                            <td>Anamnesis</td>
                            <td colspan="2" align="justify">Pasien datang ingin memeriksa gigi</td>
                        </tr>
                        <tr>
                            <td>Diagnosis</td>
                            <td colspan="2" align="justify"> Periodontitis : RA dan RB</td>
                        </tr>
                        <tr>
                            <td>Perawatan</td>
                            <td colspan="2" align="justify"> Scaling gigi</td>
                        </tr>
                        <tr>
                            <td>Riwayat Pasien</td>
                            <td colspan="2" align="justify">-</td>
                        </tr>
                        <tr>
                            <td>Biaya Perawatan</td>
                            <td colspan="2">Rp. 400.000</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button class="btn btn-info" id="btnPrint"><i class="fa fa-print"></i> Print</button>
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
                <h5 class="modal-title">Update Pasien</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body ui-front" style="padding: 20px;">
                <form method="POST" action="<?= base_url('pasien/update'); ?>" id="formUpdate">
                    <input type="hidden" class="form-control" name="idPasien" id="idPasien" />
                    <input type="hidden" class="form-control" name="idDokterLama" id="idDokterLama" />
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">No Rekap</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="noRekap" id="noRekap" readonly value="001">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nama Lengkap</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukan Nama" value="Ahmad Maulana">
                            <div id="errornama">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" rows="3" placeholder="Masukkan alamat" name="alamat" id="alamat">Badung</textarea>
                            <div id="erroralamat">
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
                                <input type="text" class="form-control" data-inputmask='"mask": "9999-9999-9999"' data-mask value="087x-xxxx-xxxx" name="nomorTelepon" id="nomorTelepon" placeholder="Masukkan nomor telepon">
                            </div>
                            <div id="errornomorTelepon">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-10">
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" type="radio" name="jenisKelamin" value="Laki - laki" checked id="customRadio1">
                                <label for="customRadio1" class="custom-control-label" style="font-weight: normal;">Laki - laki</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" type="radio" name="jenisKelamin" value="Perempuan" id="customRadio2">
                                <label for="customRadio2" class="custom-control-label" style="font-weight: normal;">Perempuan</label>
                            </div>
                            <div id="errorjenisKelamin">
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
                                <input type="text" class="form-control datetimepicker-input" name="tanggalLahir" value="13/09/1996" id="tanggalPicker" placeholder="dd/mm/yyyy" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask="" inputmode="numeric">
                            </div>
                            <div id="errortanggalLahir">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Umur</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="umur" id="umur" placeholder="Masukan Umur" value="25">
                            <div id="errorumur">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Alergi</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" rows="3" placeholder="Masukkan Alergi" name="alergi" id="alergi">Makanan</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Anamnesis</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" rows="3" placeholder="Masukkan Anamnesis" name="anamnesis" id="anamnesis">Pasien datang ingin memeriksa gigi</textarea>
                            <div id="erroranamnesis">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Diagnosis</label>
                        <div class="col-sm-10">
                            <div id="dynamicDiagnosis"></div>
                            <button type="button" class="btn btn-info mt-2" id="addDiagnosis"><i class="fas fa-plus mr-1"></i> Tambah Diagnosis</button>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Perawatan</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" rows="3" placeholder="Masukkan Perawatan" name="perawatan" id="perawatan">Scaling gigi</textarea>
                            <div id="errorperawatan">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Riwayat Pasien</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" rows="3" placeholder="Masukkan Riwayat Pasien" name="riwayatPasien" id="riwayatPasien">-</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nama Dokter</label>
                        <div class="col-sm-10">
                            <select class="custom-select" name="idDokter" id="idDokter">
                                <option value="1">drg. Budi Lesmana</option>
                                <option value="2">drg. Monika Tanjung</option>
                            </select>
                            <div id="erroridDokter">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Biaya Perawatan</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp</span>
                                </div>
                                <input type="text" class="form-control" placeholder="Masukkan biaya perawatan" value="400.000" name="biaya" id="biayaFormat">
                            </div>
                            <div id="errorbiaya">
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
</div>

<!-- Modal Diagnosis Baru -->
<div class="modal fade" id="modalDiagnosisBaru" tabindex="-1" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-exclamation-triangle"></i> Peringatan</h5>
                <button type="button" class="close" data-dismiss="modal" id="btnCloseDiagnosisBaru" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Diagnosis yang anda inputkan belum terdaftar pada sistem, apakah anda ingin menyimpannya ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="btnNoDiagnosisBaru" data-dismiss="modal">Tidak</button>
                <button type="button" class="btn btn-primary" id="btnYesDiagnosisBaru">Ya</button>
            </div>
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
                        <td align="justify">Pada kolom Action terdapat tombol hapus dan tombol detail. Tombol hapus untuk menghapus data pasien dari database sedangkan tombol detail untuk melihat detail pasien tersebut.</td>
                    </tr>
                    <tr>
                        <td align="center" class="TableCenter"><img src="<?= base_url('/application/views/assets/img/petunjuk/print&update.png'); ?>" class="img-fluid"></td>
                        <td align="justify">Saat halaman detail muncul, pada bagian bawah terdapat tombol print dan update. Tombol print untuk mengeprint detail pasien dan tombol update untuk mengupdate data pasien tersebut.</td>
                    </tr>
                    <tr>
                        <td align="center" class="TableCenter"><img src="<?= base_url('/application/views/assets/img/petunjuk/print.jpg'); ?>" class="img-fluid"></td>
                        <td align="justify">Jika anda ingin mengatur tampilan header pada print, ubah value pada menu pengaturan perangkat yang terdapat pada pojok kanan atas program.</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>