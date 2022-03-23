<?php
defined('BASEPATH') or exit('No direct script access allowed');
setlocale(LC_ALL, 'id-ID', 'id_ID');
date_default_timezone_set("Asia/Kuala_Lumpur");
?>

<style>
    #btnEksport>a {
        text-decoration: underline;
        font-style: normal;
    }

    #btnEksport>a:hover {
        color: blue;
    }
</style>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Dashboard</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= base_url('admin/index'); ?>">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="alert alert-primary">
                    <h5><i class="icon fas fa-info"></i>Demo Program</h5>
                    - Dapatkan versi full program dengan menghubungi kami melalui sosial media. Terimakasih</a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>50</h3>

                        <p>Pasien Terdaftar</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <a href="<?= base_url('pasien/show'); ?>" class="small-box-footer">Tabel Rekam Medis <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>2</h3>
                        <p>Dokter Terdaftar</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-user-md"></i>
                    </div>
                    <a href="<?= base_url('dokter/show'); ?>" class="small-box-footer">Tabel Data Dokter <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>20</h3>
                        <p>Diagnosis Terdaftar</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-stethoscope"></i>
                    </div>
                    <a href="<?= base_url('rekap/index'); ?>" class="small-box-footer">Tabel Diagnosis <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3 class="mt-4" style="margin-left: 10%;" id="timeClock"></h3>
                        <p style="margin-left: 10%;"><?= strftime("%A, %e %B %Y"); ?></p>
                    </div>
                    <p style="padding: 3px;"> </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-6">
                <div class="card card-info card-outline bg-light d-flex flex-fill">
                    <div class="card-header text-muted border-bottom-0">
                        Dokter Gigi
                    </div>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-7">
                                <h2 class="lead"><b>drg. Budi Lesmana</b></h2>
                                <p class="text-muted text-sm"><b>Pendidikan: </b> Dokter Gigi Umum</p>
                                <ul class="ml-4 mb-0 fa-ul text-muted">
                                    <li class="small mb-2"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone : 081x-xxxx-xxxx</li>
                                    <li class="small mb-4"><span class="fa-li"><i class="fas fa-lg fa-envelope"></i></span> Email : BudiLesmana@gmail.com</li>
                                </ul>
                                <p style="margin-bottom: 5px;">Pasien Ditangani : <b>10</b></p>
                                <p>Status : <span class="badge badge-success ">Aktif</span></p>
                            </div>
                            <div class="col-5 text-center">
                                <img src="<?= base_url('/application/views/assets/img/dokter/'); ?>default.jpg" alt="user-avatar" class="img-fluid" style="width: 190px; height: 190px; object-fit: cover; border-radius: 50%;">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-6">
                <div class="card card-info card-outline bg-light d-flex flex-fill">
                    <div class="card-header text-muted border-bottom-0">
                        Dokter Gigi
                    </div>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-7">
                                <h2 class="lead"><b>drg. Monika Tanjung</b></h2>
                                <p class="text-muted text-sm"><b>Pendidikan: </b> Dokter Gigi Umum</p>
                                <ul class="ml-4 mb-0 fa-ul text-muted">
                                    <li class="small mb-2"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone : 082x-xxxx-xxxx</li>
                                    <li class="small mb-4"><span class="fa-li"><i class="fas fa-lg fa-envelope"></i></span> Email : MonikaTanjung@gmail.com</li>
                                </ul>
                                <p style="margin-bottom: 5px;">Pasien Ditangani : <b>24</b></p>
                                <p>Status : <span class="badge badge-success ">Aktif</span></p>
                            </div>
                            <div class="col-5 text-center">
                                <img src="<?= base_url('/application/views/assets/img/dokter/'); ?>defaultWoman.jpg" alt="user-avatar" class="img-fluid" style="width: 190px; height: 190px; object-fit: cover; border-radius: 50%;">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>