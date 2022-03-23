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
                <h1>Pengaturan Perangkat</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= base_url('admin/index'); ?>">Home</a></li>
                    <li class="breadcrumb-item active">Pengaturan Perangkat</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Pengaturan Program</h3>
                    </div>
                    <form class="form-horizontal" action="<?= base_url('profile/updateProfile'); ?>" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="">
                        <input type="hidden" name="pictureLama" value="">
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nama Praktek</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Masukkan nama" value="User Demo" name="nama" id="nama" maxlength="20">
                                    <?= form_error('nama', '<small class="text-danger pl-3 marginSmall">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Alamat</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" rows="3" placeholder="Masukkan alamat" name="alamat" id="alamat">Denpasar</textarea>
                                    <?= form_error('alamat', '<small class="text-danger pl-3 marginSmall">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nomor Telepon <font style="color: red;">*</font></label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        </div>
                                        <input type="text" class="form-control" data-inputmask='"mask": "9999-9999-9999"' data-mask value="0812-3456-7899" name="nomorTelepon" id="nomorTelepon" placeholder="Masukkan nomor telepon">
                                    </div>
                                    <div id="errorNomorTelepon">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Masukkan email" value="UserDemo@gmail.com" name="email" id="email">
                                    <?= form_error('email', '<small class="text-danger pl-3 marginSmall">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Foto Profil</label><br />
                                <div class="col-sm-10">
                                    <img class="img-thumbnail img-fluid" src="<?= base_url('/application/views/assets/img/profil/default.jpg'); ?>" alt="fotoProfil" width="150px" id="img-preview">
                                    <br /><br />
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="thumbnail" name="pictureBaru" onchange="previewImg()">
                                            <label class="custom-file-label" id="labelFile">Pilih foto...</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-success float-right">Ubah</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Ubah Password</h3>
                    </div>
                    <form class="form-horizontal" action="<?= base_url('profile/updatePassword'); ?>" method="POST">
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Password Lama</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Masukkan password lama" name="passwordLama" id="passwordLama" value="<?= set_value('passwordLama'); ?>">
                                    <?= form_error('passwordLama', '<small class="text-danger pl-3 marginSmall">', '</small>'); ?>
                                </div>
                            </div>
                            <hr style="margin-bottom: 30px;">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Password Baru</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Masukkan password baru" name="passwordBaru" id="passwordBaru">
                                    <?= form_error('passwordBaru', '<small class="text-danger pl-3 marginSmall">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Konfirmasi Password</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Masukkan konfirmasi password" name="konfirmPassword" id="konfirmPassword">
                                    <?= form_error('konfirmPassword', '<small class="text-danger pl-3 marginSmall">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-success float-right">Ubah</button>
                            <button type="button" class="btn btn-primary float-right mr-1" onclick="resetPassword();">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>