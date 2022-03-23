<?php
defined('BASEPATH') or exit('No direct script access allowed');
setlocale(LC_ALL, 'id-ID', 'id_ID');
date_default_timezone_set("Asia/Kuala_Lumpur");
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
                <h1>Rekapan Data Pasien</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= base_url('admin/index'); ?>">Home</a></li>
                    <li class="breadcrumb-item active">Rekapan Data</li>
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
                    <a href="<?= base_url('rekap/index'); ?>" class="btn btn-default"><i class="fas fa-sync-alt"></i></a>
                    <button class="btn btn-info" data-toggle="modal" data-target="#modalPetunjuk"><i class="fas fa-question-circle mr-1"></i> Petunjuk Penggunaan</button>
                </div>
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Filter</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 p-1">
                                <h4>Filter Range Tanggal</h4>
                                <table width="90%" class="tableFilter">
                                    <tbody>
                                        <tr>
                                            <td width="150px">Tanggal Awal :</td>
                                            <td>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text bg-info text-white" id="basic-addon1"><i class="fas fa-calendar-alt"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" id="start_date" placeholder="Input tanggal awal..." readonly>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="150px">Tanggal Akhir :</td>
                                            <td>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text bg-info text-white" id="basic-addon1"><i class="fas fa-calendar-alt"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" id="end_date" placeholder="input tanggal akhir..." readonly>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>
                                                <button id="searchRange" class="btn btn-primary" style="width: 45px;"><i class="fa fa-search"></i></button>
                                                <button id="resetRange" class="btn btn-warning" style="width: 45px;"><i class="fa fa-times"></i></button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-lg-5 col-md-6 col-sm-6 p-1">
                                <h4>Filter Tanggal</h4>
                                <table width="100%" class="tableFilter">
                                    <tr>
                                        <td width="150px">Tahun :</td>
                                        <td><input type="text" name="datep" id="year" class="form-control" placeholder="Ketik tahun..." maxlength="4"></td>
                                        <td><button class="btn btn-warning" id="resetTahun"><i class="fa fa-times"></i></button></td>
                                    </tr>
                                    <tr>
                                        <td width="100px">Bulan :</td>
                                        <td>
                                            <select class="form-control" name="datep" id="month">
                                                <option value="0" disabled selected>Pilih Bulan...</option>
                                                <option value="Januari">Januari</option>
                                                <option value="Februari">Februari</option>
                                                <option value="Maret">Maret</option>
                                                <option value="April">April</option>
                                                <option value="Mei">Mei</option>
                                                <option value="Juni">Juni</option>
                                                <option value="Juli">Juli</option>
                                                <option value="Agustus">Agustus</option>
                                                <option value="September">September</option>
                                                <option value="Oktober">Oktober</option>
                                                <option value="November">November</option>
                                                <option value="Desember">Desember</option>
                                            </select>
                                        </td>
                                        <td><button class="btn btn-warning" id="resetBulan"><i class="fa fa-times"></i></button></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Tabel Pasien Full</h3>
                    </div>
                    <div class="card-body">
                        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-12">
                                    <table id="tabelPasien" class="table table-striped table-bordered dataTable dtr-inline tableData" role="grid" width="100%">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting sorting_asc" width="30px">#</th>
                                                <th class="sorting" width="70px">No Rekap</th>
                                                <th class="sorting" width="200px">Nama Pasien</th>
                                                <th class="no-sort" width="200px">Alamat</th>
                                                <th class="no-sort" width="120px">Nomor Telepon</th>
                                                <th class="sorting" width="110px">Jenis Kelamin</th>
                                                <th class="sorting" width="110px">Tanggal Lahir</th>
                                                <th class="sorting" width="50px">Umur</th>
                                                <th class="no-sort" width="200px">Alergi</th>
                                                <th class="no-sort" width="200px">Anamnesis</th>
                                                <th class="no-sort" width="300px">Diagnosis</th>
                                                <th class="no-sort" width="200px">Perawatan</th>
                                                <th class="no-sort" width="200px">Riwayat Pasien</th>
                                                <th class="sorting" width="55px">Kunjungan</th>
                                                <th class="sorting" width="280px">Tanggal Check Up</th>
                                                <th class="sorting" width="90px">Biaya</th>
                                                <th class="sorting" width="250px">Penanggung Jawab</th>
                                                <th class="sorting" width="250px">hidden</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>4</td>
                                                <td>001</td>
                                                <td>Ahmad Maulana</td>
                                                <td>Badung</td>
                                                <td>0877-8586-6455</td>
                                                <td>Laki - laki</td>
                                                <td>13 September 1996</td>
                                                <td>25 Tahun</td>
                                                <td>Makanan dan minuman</td>
                                                <td>Pasien datang ingin memeriksa gigi</td>
                                                <td>Periodontitis : RA dan RB || Nekrosis pulpa : 55</td>
                                                <td>Scaling gigi</td>
                                                <td>-</td>
                                                <td>2</td>
                                                <td>Minggu, 30 Januari 2022 - jam 14.55 siang</td>
                                                <td>Rp. 500000</td>
                                                <td>drg. Monika Tanjung</td>
                                                <td>2022-01-18 15:59:37</td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>003</td>
                                                <td>Bintang Putri</td>
                                                <td>Hayam Wuruk</td>
                                                <td>0826-4646-7585</td>
                                                <td>Perempuan</td>
                                                <td>15 Januari 2004</td>
                                                <td>18 Tahun</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>Perikoronitis : 38</td>
                                                <td>irigasi + ties</td>
                                                <td>-</td>
                                                <td>1</td>
                                                <td>Sabtu, 18 Desember 2021 - jam 16.07 sore</td>
                                                <td>Rp. 150000</td>
                                                <td>drg. Budi Lesmana</td>
                                                <td>2021-11-18 16:06:00</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>002</td>
                                                <td>Susanto Mulyawan</td>
                                                <td>Imam Bonjol</td>
                                                <td>0856-7278-3834</td>
                                                <td>Laki - laki</td>
                                                <td>13 Januari 2000</td>
                                                <td>22 Tahun</td>
                                                <td>-</td>
                                                <td>Pasien datang dengan keluhan gigi</td>
                                                <td>Karies : - || Nekrosis pulpa : -</td>
                                                <td>Mumifikasi CHkM + Eugenol</td>
                                                <td>-</td>
                                                <td>1</td>
                                                <td>Kamis, 18 November 2021 - jam 16.06 sore</td>
                                                <td>Rp. 500000</td>
                                                <td>drg. Monika Tanjung</td>
                                                <td>2021-12-18 16:07:53</td>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>001</td>
                                                <td>Ahmad Maulana</td>
                                                <td>Badung</td>
                                                <td>0877-8586-6455</td>
                                                <td>Laki - laki</td>
                                                <td>13 September 1996</td>
                                                <td>25 Tahun</td>
                                                <td>Makanan</td>
                                                <td>Pasien datang ingin memeriksa gigi</td>
                                                <td>Periodontitis : RA dan RB</td>
                                                <td>Scaling gigi</td>
                                                <td>-</td>
                                                <td>1</td>
                                                <td>Selasa, 18 Januari 2022 - jam 15.59 sore</td>
                                                <td>Rp. 400000</td>
                                                <td>drg. Budi Lesmana</td>
                                                <td>2022-01-30 14:55:24</td>
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
                <table class="table table-bordered tableFilter">
                    <tr>
                        <td align="center" class="TableCenter"><img src="<?= base_url('/application/views/assets/img/petunjuk/filterRange.png'); ?>" class="img-fluid"></td>
                        <td align="justify">Filter untuk mencari range tanggal yang ditentukan. Inputkan tanggal awal yang ingin di cari dan inputkan juga tanggal akhir kemudian klik tombol dengan icon search, maka data yang tampil akan sesuai range yang ditentukan.</td>
                    </tr>
                    <tr>
                        <td align="center" class="TableCenter"><img src="<?= base_url('/application/views/assets/img/petunjuk/filterTanggal.png'); ?>" class="img-fluid"></td>
                        <td align="justify">Filter untuk mencari tanggal spesifik dari tabel rekapan data. Terdapat kolom input tahun, bulan, dan hari yang dapat langsung menentukan data yang dicari. Juga terdapat tombol silang di setiap kolom inputnya untuk mereset kolom tersebut.</td>
                    </tr>
                    <tr>
                        <td align="center" class="TableCenter"><img src="<?= base_url('/application/views/assets/img/petunjuk/eksport.png'); ?>" class="img-fluid"></td>
                        <td align="justify">Tombol ini digunakan untuk mengeksport data pasien ke file Microsoft Excel yang akan disimpan pada komputer.</td>
                    </tr>
                    <tr>
                        <td align="center" class="TableCenter"><img src="<?= base_url('/application/views/assets/img/petunjuk/show2.png'); ?>" class="img-fluid"></td>
                        <td align="justify">Digunakan untuk mengatur jumlah data yang akan ditampilkan pada aplikasi.</td>
                    </tr>
                    <tr>
                        <td align="center" class="TableCenter"><img src="<?= base_url('/application/views/assets/img/petunjuk/sort.png'); ?>" class="img-fluid"></td>
                        <td align="justify">Pada bagian judul tabel terdapat tanda panah untuk melakukan sorting pada area kolom.</td>
                    </tr>
                    <tr>
                        <td align="center" class="TableCenter"><img src="<?= base_url('/application/views/assets/img/petunjuk/search.png'); ?>" class="img-fluid"></td>
                        <td align="justify">Search bar digunakan untuk mencari data yang ada tabel pasien secara spesifik sesuai kata kunci yang dicari.</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>