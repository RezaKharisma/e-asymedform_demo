<?php
defined('BASEPATH') or exit('No direct script access allowed');
setlocale(LC_ALL, 'id-ID', 'id_ID');
?>

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Rekapan Pendapatan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= base_url('admin/index'); ?>">Home</a></li>
                    <li class="breadcrumb-item active">Rekapan Pendapatan</li>
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
                    <a href="<?= base_url('pendapatan/index'); ?>" class="btn btn-default"><i class="fas fa-sync-alt"></i></a>
                    <button class="btn btn-info" data-toggle="modal" data-target="#modalPetunjuk"><i class="fas fa-question-circle mr-1"></i> Petunjuk Penggunaan</button>
                </div>
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Filter</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-5 col-md-6 col-sm-6 p-1">
                                <h4>Filter Dokter</h4>
                                <table>
                                    <tr>
                                        <td width="150px">Dokter</td>
                                        <td>
                                            <select class="custom-select form-control" style="width: 350px;" name="dokter" id="dokter">
                                                <option disabled selected value="0">Pilih nama dokter...</option>
                                                <option value="1">drg. Budi Lesmana</option>
                                                <option value="2">drg. Monika Tanjung</option>
                                            </select>
                                        </td>
                                        <td>
                                            <button id="searchDokter" class="btn btn-primary" style="width: 45px;"><i class="fa fa-search"></i></button>
                                            <button id="resetDokter" class="btn btn-warning" style="width: 45px;"><i class="fa fa-times"></i></button>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-lg-5 col-md-6 col-sm-6 p-1">
                                <h4>Filter Tahun</h4>
                                <table width="100%" class="tableFilter">
                                    <tr>
                                        <td width="150px">Tahun</td>
                                        <td><input type="text" name="inputTahun" id="inputTahun" class="form-control" placeholder="Ketik tahun..." maxlength="4"></td>
                                        <td>
                                            <button id="searchTahun" class="btn btn-primary" style="width: 45px;"><i class="fa fa-search"></i></button>
                                            <button id="resetTahun" class="btn btn-warning" style="width: 45px;"><i class="fa fa-times"></i></button>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Tabel Pendapatan</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                    <table id="tabelPendapatan" class="table table-striped table-bordered dataTable dtr-inline">
                                        <thead align="center">
                                            <th colspan="4" style="text-transform: uppercase;">Tabel Per Tahun - <span id="txtTahun"></span><span id="txtDokter"></span></th>
                                        </thead>
                                        <tbody id="tabelBodyPendapatan">

                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="2" align="center"><b>TOTAL</b></td>
                                                <td id="tp" align="center"><b></b></td>
                                                <td id="tb"><b></b></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="row">
                                    <div class="col-12 mb-4">
                                        <table class="table table-striped table-bordered dataTable dtr-inline">
                                            <thead align="center">
                                                <th colspan="3" style="text-transform: uppercase;">Diagnosis Teratas - <span id="txtTahun2"></span></th>
                                            </thead>
                                            <tbody id="tabelBodyDiagnosis">

                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-12">
                                        <div class="chartjs-size-monitor">
                                            <div class="chartjs-size-monitor-expand">
                                                <div class=""></div>
                                            </div>
                                            <div class="chartjs-size-monitor-shrink">
                                                <div class=""></div>
                                            </div>
                                        </div>
                                        <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 764px;" width="764" height="250" class="chartjs-render-monitor"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>

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
                        <td align="center" class="TableCenter"><img src="<?= base_url('/application/views/assets/img/petunjuk/filterTahun.png'); ?>" class="img-fluid"></td>
                        <td align="justify">Jika anda ingin mencari total pendapatan sesuai tahun, inputkan saja tahun di kolom tersebut, maka data pendapatan sesuai tahun akan tampil.</td>
                    </tr>
                    <tr>
                        <td align="center" class="TableCenter"><img src="<?= base_url('/application/views/assets/img/petunjuk/filterDokter.png'); ?>" class="img-fluid"></td>
                        <td align="justify">Mencari total pendapatan berdasarkan nama dokter</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>