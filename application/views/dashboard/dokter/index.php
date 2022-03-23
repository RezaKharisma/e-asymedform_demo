<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Input Data Dokter</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= base_url('admin/index'); ?>">Home</a></li>
                    <li class="breadcrumb-item active">Input Data Dokter</li>
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
                        <h3 class="card-title">Form data dokter</h3>
                    </div>

                    <form class="form-horizontal" method="POST" enctype="multipart/form-data" id="form-dokter">
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nama Lengkap <font style="color: red;">*</font></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Masukkan nama lengkap" value="<?= set_value('nama'); ?>" name="nama" id="nama" autofocus>
                                    <div id="errorNama">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Alamat <font style="color: red;">*</font></label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" rows="3" placeholder="Masukkan alamat" name="alamat" id="alamat"><?= set_value('alamat'); ?></textarea>
                                    <div id="errorAlamat">
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
                                    <div id="errorNomorTelepon">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Email <font style="color: red;">*</font></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Masukkan email" value="<?= set_value('email'); ?>" name="email" id="email" autofocus>
                                    <div id="errorEmail">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Jenis Kelamin <font style="color: red;">*</font></label>
                                <div class="col-sm-10">
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="customRadiol" name="jenisKelamin" value="Laki - laki" <?= (set_value('jenisKelamin') == "Laki - laki" ? "checked" : ""); ?>>
                                        <label for="customRadiol" class="custom-control-label" style="font-weight: normal;">Laki - laki</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="customRadiop" name="jenisKelamin" value="Perempuan" <?= (set_value('jenisKelamin') == "Perempuan" ? "checked" : ""); ?>>
                                        <label for="customRadiop" class="custom-control-label" style="font-weight: normal;">Perempuan</label>
                                    </div>
                                    <div id="errorJenisKelamin">
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
                                    <div id="errorTanggalLahir">
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
                                    <div id="errorUmur">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Pendidikan <font style="color: red;">*</font></label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" rows="3" placeholder="Masukkan pendidikan" name="pendidikan" id="pendidikan"><?= set_value('pendidikan'); ?></textarea>
                                    <div id="errorPendidikan">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Foto Profil</label><br />
                                <div class="col-sm-10">
                                    <img class="img-thumbnail img-fluid" src="<?= base_url('/application/views/assets/img/dokter/default.jpg'); ?>" alt="fotoProfil" width="150px" id="img-preview">
                                    <br /><br />
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="thumbnail" name="foto" onchange="previewImg()">
                                            <label class="custom-file-label" id="labelFile">Pilih foto...</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="<?= base_url('dokter/index'); ?>" class="btn btn-default"><i class="fas fa-sync-alt"></i></a>
                            <button type="button" class="btn btn-primary" onclick="this.form.reset()" id="btnReset">Reset</button>
                            <button type="button" id="simpan" class="btn btn-success">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>