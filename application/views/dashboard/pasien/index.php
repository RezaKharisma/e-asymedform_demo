<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<style>
    .inputFocus {
        color: #495057;
        background-color: #fff;
        border-color: #80bdff;
        outline: 0;
        box-shadow: inset 1 1 1 transparent;
        animation: shake-animation 4.72s ease infinite;
        transform-origin: 50% 50%;
    }

    .errorText {
        margin-left: -15px;
    }

    @keyframes shake-animation {
        0% {
            transform: translate(0, 0)
        }

        1.78571% {
            transform: translate(5px, 0)
        }

        3.57143% {
            transform: translate(0, 0)
        }

        5.35714% {
            transform: translate(5px, 0)
        }

        7.14286% {
            transform: translate(0, 0)
        }

        8.92857% {
            transform: translate(5px, 0)
        }

        10.71429% {
            transform: translate(0, 0)
        }

        100% {
            transform: translate(0, 0)
        }
    }
</style>

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Input Pasien</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= base_url('admin/index'); ?>">Home</a></li>
                    <li class="breadcrumb-item active">Input Pasien</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Form data pasien</h3>
                    </div>
                    <form id="formPasien" class="form-horizontal" method="POST" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">No Rekap</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="005" name="noRekap" id="noRekap" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nama Lengkap <font style="color: red;">*</font></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Masukkan nama lengkap" value="<?= set_value('nama'); ?>" name="nama" id="nama" autofocus>
                                    <div id="errornama" class="errorText">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Alamat <font style="color: red;">*</font></label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" rows="3" placeholder="Masukkan alamat" name="alamat" id="alamat"><?= set_value('alamat'); ?></textarea>
                                    <div id="erroralamat" class="errorText">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nomor Telepon <font style="color: red;">*</font></label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        </div>
                                        <input type="text" class="form-control" data-inputmask='"mask": "9999-9999-9999"' data-mask value="<?= set_value('nomorTelepon'); ?>" name="nomorTelepon" id="nomorTelepon" placeholder="Masukkan nomor telepon">
                                    </div>
                                    <div id="errornomorTelepon" class="errorText">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Jenis Kelamin <font style="color: red;">*</font></label>
                                <div class="col-sm-10">
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" name="jenisKelamin" value="Laki - laki" <?= (set_value('jenisKelamin') == "Laki - laki" ? "checked" : ""); ?> id="customRadio1">
                                        <label for="customRadio1" class="custom-control-label" style="font-weight: normal;">Laki - laki</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" name="jenisKelamin" value="Perempuan" <?= (set_value('jenisKelamin') == "Perempuan" ? "checked" : ""); ?> id="customRadio2">
                                        <label for="customRadio2" class="custom-control-label" style="font-weight: normal;">Perempuan</label>
                                    </div>
                                    <div id="errorjenisKelamin" class="errorText">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Tanggal Lahir <font style="color: red;">*</font></label>
                                <div class="col-sm-10">
                                    <div class="input-group date" id="tanggalPicker" data-target-input="nearest">
                                        <div class="input-group-prepend" data-target="#tanggalPicker" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                        <input type="text" class="form-control datetimepicker-input" name="tanggalLahir" value="<?= set_value('tanggalLahir'); ?>" id="tanggalPicker" placeholder="dd/mm/yyyy" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask="" inputmode="numeric">
                                    </div>
                                    <div id="errortanggalLahir" class="errorText">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Umur <font style="color: red;">*</font></label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Masukkan umur" value="<?= set_value('umur'); ?>" name="umur" id="umur">
                                        <div class="input-group-append">
                                            <span class="input-group-text">Tahun</span>
                                        </div>
                                    </div>
                                    <div id="errorumur" class="errorText">
                                    </div>
                                </div>
                            </div>

                            <hr style="margin-top: 30px; margin-bottom: 30px;">

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Alergi</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" rows="3" placeholder="Masukkan alergi" name="alergi" id="alergi"><?= set_value('alergi'); ?></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Anamnesis</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" rows="3" placeholder="Masukkan anamnesis" name="anamnesis" id="anamnesis"><?= set_value('anamnesis'); ?></textarea>
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
                                    <textarea class="form-control" rows="3" placeholder="Masukkan perawatan" name="perawatan" id="perawatan"><?= set_value('perawatan'); ?></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Riwayat Pasien</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" rows="3" placeholder="Masukkan riwayat pasien" name="riwayatPasien" id="riwayatPasien"><?= set_value('riwayatPasien'); ?></textarea>
                                </div>
                            </div>

                            <hr style="margin-top: 30px; margin-bottom: 30px;">

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nama Dokter <font style="color: red;">*</font></label>
                                <div class="col-sm-10">
                                    <select class="custom-select" name="idDokter" id="idDokter">
                                        <option disabled selected>Pilih nama dokter...</option>
                                        <option value="">drg. Budi Lesmana</option>
                                        <option value="">drg. Monika Tanjung</option>
                                    </select>
                                    <div id="erroridDokter" class="errorText">
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
                                        <input type="text" class="form-control" placeholder="Masukkan biaya perawatan" value="<?= set_value('biaya'); ?>" name="biaya" id="biayaFormat">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="<?= base_url('pasien/index'); ?>" class="btn btn-default"><i class="fas fa-sync-alt"></i></a>
                            <button type="button" class="btn btn-primary" id="btnReset" onclick="this.form.reset()">Reset</button>
                            <button type="button" class="btn btn-success" id="btnSimpan">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</section>

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

<!-- Modal Informasi -->
<div class="modal fade" id="modalInformasi" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><i class="fa fa-info-circle"></i> Informasi</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Nama ini terdaftar dalam system, apakah anda ingin menyertakan rekam medisnya ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" id="btnResetRekamMedis">Tidak</button>
                <button type="button" class="btn btn-primary" id="btnTampilkanRekamMedis">Ya</button>
            </div>
        </div>
    </div>
</div>