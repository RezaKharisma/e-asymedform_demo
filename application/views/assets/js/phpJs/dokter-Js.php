<script>
    /* *
        @ Javascript Pasien
    * */

    // Preview Image
    // =============
    function previewImg() {
        const sampul = document.querySelector("#thumbnail");
        const imgPreview = document.querySelector("#img-preview");
        const labelFile = document.querySelector("#labelFile");

        const fileSampul = new FileReader();
        fileSampul.readAsDataURL(sampul.files[0]);

        fileSampul.onload = function(e) {
            labelFile.textContent = sampul.files[0].name;
            imgPreview.src = e.target.result;
        };
    }

    function hapusFoto() {
        const sampul = document.querySelector("#thumbnail");
        const imgPreview = document.querySelector("#img-preview");
        const labelFile = document.querySelector("#labelFile");
        var jenisKelamin, namaFile;

        if ($("input[id='customRadio1'").prop("checked")) {
            jenisKelamin = "Laki - laki";
            namaFile = "default.jpg";
        } else if ($("input[id='customRadio2'").prop("checked")) {
            jenisKelamin = "Perempuan";
            namaFile = "defaultWoman.jpg";
        }

        const foto = (jenisKelamin == "Laki - laki" ? "<?= base_url('/application/views/assets/img/dokter/default.jpg'); ?>" : "<?= base_url('/application/views/assets/img/dokter/defaultWoman.jpg'); ?>")

        $("#defaultImg").val(namaFile);
        labelFile.textContent = namaFile;
        imgPreview.src = foto;
    }

    function resetForm() {
        $("#errorNama").html("");
        $("#errorAlamat").html("");
        $("#errorNomorTelepon").html("");
        $("#errorEmail").html("");
        $("#errorJenisKelamin").html("");
        $("#errorTanggalLahir").html("");
        $("#errorUmur").html("");
        $("#errorPendidikan").html("");

        $("#nama").removeClass('is-invalid');
        $("#alamat").removeClass('is-invalid');
        $("#nomorTelepon").removeClass('is-invalid');
        $("#email").removeClass('is-invalid');
        $("#jenisKelamin").removeClass('is-invalid');
        $("input[name='tanggalLahir']").removeClass('is-invalid');
        $("#umur").removeClass('is-invalid');
        $("#pendidikan").removeClass('is-invalid');
    }

    $(function() {
        moment.locale('id');

        $("#btnReset").on('click', function() {
            $("#img-preview").attr("src", "<?= base_url('/application/views/assets/img/dokter/default.jpg'); ?>");
            $("#labelFile").html("Pilih foto...");
            resetForm();
        });

        $("#simpan").off().on('click', function() {
            $.ajax({
                type: "POST",
                url: "simpan",
                data: $("#form-dokter").serialize(),
                dataType: "json",
                success: function(response) {
                    $("#errorNama").html("");
                    $("#errorAlamat").html("");
                    $("#errorNomorTelepon").html("");
                    $("#errorEmail").html("");
                    $("#errorJenisKelamin").html("");
                    $("#errorTanggalLahir").html("");
                    $("#errorUmur").html("");
                    $("#errorPendidikan").html("");

                    if (response.Message == "Error") {
                        var error = response.Error;

                        toastr.error("Mohon periksa form kembali");
                        (error.nama) ? $("#errorNama").append(`<small class="text-danger pl-3 marginSmall">` + error.nama + `</small>`): "";
                        (error.nama) ? $("#nama").addClass('is-invalid'): $("#nama").removeClass('is-invalid');

                        (error.alamat) ? $("#errorAlamat").append(`<small class="text-danger pl-3 marginSmall">` + error.alamat + `</small>`): "";
                        (error.alamat) ? $("#alamat").addClass('is-invalid'): $("#alamat").removeClass('is-invalid');

                        (error.nomorTelepon) ? $("#errorNomorTelepon").append(`<small class="text-danger pl-3 marginSmall">` + error.nomorTelepon + `</small>`): "";
                        (error.nomorTelepon) ? $("#nomorTelepon").addClass('is-invalid'): $("#nomorTelepon").removeClass('is-invalid');

                        (error.email) ? $("#errorEmail").append(`<small class="text-danger pl-3 marginSmall">` + error.email + `</small>`): "";
                        (error.email) ? $("#email").addClass('is-invalid'): $("#email").removeClass('is-invalid');

                        (error.jenisKelamin) ? $("#errorJenisKelamin").append(`<small class="text-danger pl-3 marginSmall">` + error.jenisKelamin + `</small>`): "";
                        (error.jenisKelamin) ? $("#jenisKelamin").addClass('is-invalid'): $("#jenisKelamin").removeClass('is-invalid');

                        (error.tanggalLahir) ? $("#errorTanggalLahir").append(`<small class="text-danger pl-3 marginSmall">` + error.tanggalLahir + `</small>`): "";
                        (error.tanggalLahir) ? $("input[name='tanggalLahir']").addClass('is-invalid'): $("input[name='tanggalLahir']").removeClass('is-invalid');

                        (error.umur) ? $("#errorUmur").append(`<small class="text-danger pl-3 marginSmall">` + error.umur + `</small>`): "";
                        (error.umur) ? $("#umur").addClass('is-invalid'): $("#umur").removeClass('is-invalid');

                        (error.pendidikan) ? $("#errorPendidikan").append(`<small class="text-danger pl-3 marginSmall">` + error.pendidikan + `</small>`): "";
                        (error.pendidikan) ? $("#pendidikan").addClass('is-invalid'): $("#pendidikan").removeClass('is-invalid');
                    } else {
                        window.location.href = "show";
                    }
                },
                error: function(response) {
                    console.log(JSON.parse(xhr.responseText));
                    toastr.error("Terjadi Kesalahan");
                }
            });
        });

        // Tombol hapus data dokter
        // ========================
        $("#tabelDokter").on("click", "#btnDelete", function() {
            var idDokter = $(this).data('id');
            $("#btnYes").off().click(function() {
                $("#modalHapus").modal("hide");
                $.ajax({
                    type: "POST",
                    url: "delete",
                    data: {
                        id: idDokter
                    },
                    dataType: "json",
                    success: function(response) {
                        toastr.success("Data berhasil terhapus");
                    },
                    error: function(response) {
                        console.log(JSON.parse(xhr.responseText));
                        toastr.error("Data gagal terhapus");
                    }
                });
            });
        });

        $("#btnEdit").off().on("click", function() {
            $("#modalView").modal("hide");
            window.setTimeout(function() {
                $("#modalUpdate").modal("show");
                $("#btnUpdate").off().on('click', function() {
                    $.ajax({
                        type: "POST",
                        url: "update",
                        data: $("#formUpdate").serialize(),
                        dataType: "json",
                        success: function(response) {
                            $("#errorNama").html("");
                            $("#errorAlamat").html("");
                            $("#errorNomorTelepon").html("");
                            $("#errorEmail").html("");
                            $("#errorJenisKelamin").html("");
                            $("#errorTanggalLahir").html("");
                            $("#errorUmur").html("");
                            $("#errorPendidikan").html("");

                            if (response.Message == "Error") {
                                toastr.error("Mohon periksa form kembali");

                                var error = response.Error;
                                (error.nama) ? $("#errorNama").append(`<small class="text-danger pl-3 marginSmall">` + error.nama + `</small>`): "";
                                (error.alamat) ? $("#errorAlamat").append(`<small class="text-danger pl-3 marginSmall">` + error.alamat + `</small>`): "";
                                (error.nomorTelepon) ? $("#errorNomorTelepon").append(`<small class="text-danger pl-3 marginSmall">` + error.nomorTelepon + `</small>`): "";
                                (error.email) ? $("#errorEmail").append(`<small class="text-danger pl-3 marginSmall">` + error.email + `</small>`): "";
                                (error.jenisKelamin) ? $("#errorJenisKelamin").append(`<small class="text-danger pl-3 marginSmall">` + error.jenisKelamin + `</small>`): "";
                                (error.tanggalLahir) ? $("#errorTanggalLahir").append(`<small class="text-danger pl-3 marginSmall">` + error.tanggalLahir + `</small>`): "";
                                (error.umur) ? $("#errorUmur").append(`<small class="text-danger pl-3 marginSmall">` + error.umur + `</small>`): "";
                                (error.pendidikan) ? $("#errorPendidikan").append(`<small class="text-danger pl-3 marginSmall">` + error.pendidikan + `</small>`): "";

                            } else {
                                $("#modalUpdate").modal("hide")
                                toastr.success("Data berhasil terupdate");
                                window.setTimeout(function() {
                                    location.reload();
                                }, 300);
                            }
                        }
                    });
                });
            }, 500);
        });

        $("#thumbnail").on("change", function() {
            previewImg();
        });

        // Date picker tanggal lahir
        // =========================
        $('input[name="tanggalLahir"]').daterangepicker({
                locale: {
                    format: "DD/MM/YYYY",
                },
                singleDatePicker: true,
                showDropdowns: true,
                autoUpdateInput: false,
                autoApply: true,
                minYear: 1901,
                maxYear: parseInt(moment().format("YYYY"), 10),
            },
            function(start, end, label, picker) {
                var years = moment().diff(start, "years");
                $("input[name='umur']").val(years);
            }
        );

        $('input[name="tanggalLahir"]').on(
            "apply.daterangepicker",
            function(ev, picker) {
                $(this).val(picker.startDate.format("DD/MM/YYYY"));
            }
        );

        // Input mask nomor telepon
        // ========================
        $("[data-mask]").inputmask();

        // Datatable dokter
        // ================
        var table = $("#tabelDokter").DataTable({
            processing: true,
            serverSide: false,
            responsive: true,
            autoWidth: true,
            scrollX: false,
            scrollCollapse: true,
            searching: true,
            order: [
                [0, "desc"]
            ],
            lengthMenu: [
                [5, 10, 25],
                [5, 10, 25],
            ]
        });
    });
</script>