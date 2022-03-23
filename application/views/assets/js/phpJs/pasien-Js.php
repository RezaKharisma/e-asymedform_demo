<script>
    /* @Javascript Pasien */

    const zeroPad = (num, places) => String(num).padStart(places, '0')
    var tanpa_rupiah = document.getElementById("biayaFormat");
    var pasien, dokter, user, diagnosisPasien, idDiagnosisPasien, btnViewId;
    var i = 0;

    // Add zero
    function addZeros(n) {
        return (n < 10) ? '00' + n : (n < 100) ? '0' + n : '' + n;
    }

    // Remove Focus Form Pasien
    function removeFocus() {
        $("#nama").removeClass("inputFocus");
        $("#noRekap").removeClass("inputFocus");
        $("#alamat").removeClass("inputFocus");
        $("#nomorTelepon").removeClass("inputFocus");
        $("#jenisKelamin").removeClass("inputFocus");
        $("input[name='tanggalLahir']").removeClass("inputFocus");
        $("#umur").removeClass("inputFocus");
        $("#alergi").removeClass("inputFocus");
        $("#anamnesis").removeClass("inputFocus");
        $("#diagnosis").removeClass("inputFocus");
        $("#perawatan").removeClass("inputFocus");
        $("#riwayatPasien").removeClass("inputFocus");
    }

    // Remove Html Form Pasien
    function clearValidation() {
        $("#errornama").html("");
        $("#erroralamat").html("");
        $("#errornomorTelepon").html("");
        $("#errorjenisKelamin").html("");
        $("#errortanggalLahir").html("");
        $("#errorumur").html("");
        $("#erroranamnesis").html("");
        $("#errordiagnosis").html("");
        $("#errorperawatan").html("");
        $("#errorriwayatPasien").html("");
        $("#erroridDokter").html("");
        $("#errorbiaya").html("");
        $("#nama").removeClass("is-invalid");
        $("#alamat").removeClass("is-invalid");
        $("#nomorTelepon").removeClass("is-invalid");
        $("#jenisKelamin").removeClass("is-invalid");
        $("#tanggalLahir").removeClass("is-invalid");
        $("#umur").removeClass("is-invalid");
        $("#anamnesis").removeClass("is-invalid");
        $("#diagnosis").removeClass("is-invalid");
        $("#diagnosisUpdate").removeClass('is-invalid');
        $("#perawatan").removeClass("is-invalid");
        $("#riwayatPasien").removeClass("is-invalid");
        $("#idDokter").removeClass("is-invalid");
        $("#biaya").removeClass("is-invalid");
    }

    // Function Format Rupiah
    function formatRupiah(bilangan, prefix) {
        var number_string = bilangan.replace(/[^,\d]/g, "").toString(),
            split = number_string.split(","),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{1,3}/gi);
        if (ribuan) {
            separator = sisa ? "." : "";
            rupiah += separator + ribuan.join(".");
        }
        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }

    // Function Limitasi Karakter Input
    function limitCharacter(event) {
        key = event.which || event.keyCode;
        if (key != 8 &&
            key != 17 &&
            (key != 86) & (key != 67) &&
            (key < 48 || key > 57) &&
            key <= 95) {
            event.preventDefault();
            return false;
        }
    }

    // Print Function Tabel Pasien
    function printElement(elem) {
        var domClone = elem.cloneNode(true);
        var $printSection = document.getElementById("printSection");
        if (!$printSection) {
            var $printSection = document.createElement("div");
            $printSection.id = "printSection";
            document.body.appendChild($printSection);
        }
        $printSection.innerHTML = "";
        $printSection.appendChild(domClone);
        window.print();
    }

    // Add Dynamic Diagnosis
    function addDynamic($diagnosis) {
        var $input = $("<input>", {
            name: "diagnosis[]",
            id: "diagnosis",
            value: ($diagnosis == "default" ? "-" : $diagnosis),
            "class": "form-control searchDiagnosis",
            placeholder: "Masukkan diagnosis",
        });
        $input.appendTo(".addInput" + i).focus();
    }

    // Dynamic Diagnosis Input
    function dynamicCheck() {
        if ($.trim($("#dynamicDiagnosis").html()) === '') {
            $("#dynamicDiagnosis").append(`
                <div class="row mb-2" id="row` + i + `">
                    <div class="col-4 addInput` + i + `">
                        <input type="hidden" name="idDiagnosis[]" id="idDiagnosis" value="0">
                    </div>
                    <div class="col-8">
                        <input type="text" class="form-control" name="ketDiagnosis[]" id="ketDiagnosis" placeholder="Masukkan keterangan diagnosis">
                    </div>
                </div>
            `);
            addDynamic();
        }
    }

    // Document Running
    $(function() {
        dynamicCheck();
        $("#nama").focus();
        moment.locale('id');

        // Input Mask Tanggal
        $('#datemask').inputmask('dd/mm/yyyy', {
            'placeholder': 'dd/mm/yyyy'
        })

        // Input Mask Nomor Telepon
        $("[data-mask]").inputmask();

        // Button Reset
        $("#btnReset").on('click', function() {
            clearValidation();
            for (let index = 1; index <= i; index++) {
                $("#row" + index).remove();
            }
        });

        // Format Rupiah
        if (tanpa_rupiah) {
            tanpa_rupiah.addEventListener("keyup", function(e) {
                tanpa_rupiah.value = formatRupiah(this.value);
            });
            tanpa_rupiah.addEventListener("keydown", function(event) {
                limitCharacter(event);
            });
        }

        // Tombol Simpan Data Pasien
        $("#btnSimpan").off().on('click', function() {
            $.ajax({
                type: "POST",
                url: "simpan",
                data: $("#formPasien").serialize(),
                dataType: "json",
                success: function(response) {
                    clearValidation()
                    if (response.Message == "Error") {
                        var error = response.Error;
                        $.each(error, function(index, value) {
                            (index) ? $(`#error` + index).append(`<small class="text-danger pl-3 marginSmall">` + value + `</small>`): "";
                            (index) ? $(`#` + index + ``).addClass('is-invalid'): "";
                        });
                        toastr.error("Mohon periksa form kembali");
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

        // Tombol Hapus Data Pasien
        $("#tabelPasien").on("click", "#btnDelete", function() {
            $("#btnYes").click(function(e) {
                console.log("Pencet");
            });

            $("#btnYes").off().click(function() {
                $("#modalHapus").modal("hide");
                $.ajax({
                    type: "POST",
                    url: "delete",
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

        // Tombol Edit Data Pasien
        $("#btnEdit").off().on("click", function() {
            $("#modalView").modal("hide")
            $("#dynamicDiagnosis").html("");

            clearValidation();
            for (let index = 1; index <= i; index++) {
                $("#row").remove();
                $("#row" + index).remove();
            }

            window.setTimeout(function() {
                $("#modalUpdate").modal("show");
            }, 500);
        });

        // Tombol Update Data Pasien
        $("#btnUpdate").off().on("click", function() {
            $.ajax({
                type: "POST",
                url: "update",
                dataType: "json",
                beforeSend: function() {
                    $(".loading-icon-update").removeClass("hide");
                    $("#btnUpdate").attr("disabled", true);
                },
                success: function(response) {
                    clearValidation();
                    $("#modalUpdate").modal("hide")
                    window.setTimeout(function() {
                        $("[data-idselected='" + btnViewId + "']").click();
                    }, 300);

                    toastr.success("Data berhasil terupdate");
                },
                complete: function(params) {
                    $(".loading-icon-update").addClass("hide");
                    $("#btnUpdate").attr("disabled", false);
                },
                error: function(response) {
                    console.log(JSON.parse(xhr.responseText));
                    toastr.error("Data gagal terupdate");
                }
            });
        });

        // Tombol Print Data Pasien
        $("#btnPrint").off().on('click', function() {
            $('#printThis').printThis({
                importCSS: true,
                importStyle: true,
                loadCSS: "<?= base_url('/application/views/assets/css/printThis.css'); ?>",
                removeInline: false,
                pageTitle: "TW Dental Care",
                header: `
                    <br/>
                    <div class="p-1 mb-3">
                        <img class="animation__shake mr-2 " src="<?= base_url('/application/views/assets/img/profil/'); ?>` + user.picture + `" alt="Logo" height="30" width="30" style="margin-top: -14px;">
                        <h3 class="d-inline">` + user.nama + `</h3>
                    </div>
                    <table border="0" align="left" width="50%" class="mb-3">
                        <tbody>
                            <tr>
                                <td width="150px">Alamat </td>
                                <td>: </td>
                                <td>` + user.alamat + `</td>
                            </tr>
                            <tr>
                                <td>Nomor Telepon </td>
                                <td>: </td>
                                <td>` + user.nomorTelepon + `</td>
                            </tr>
                            <tr>
                                <td>Email </td>
                                <td>: </td>
                                <td>` + user.email + `</td>
                            </tr>
                        </tbody>
                    </table>

                    <table border="0" align="right" width="40%" class="mb-3">
                        <tbody>
                            <tr>
                                <td>Tanggal Cetak </td>
                                <td>: </td>
                                <td> <?= strftime("%A, %e %B %Y"); ?> </td>
                            </tr>
                        </tbody>
                    </table>
                    `,
                footer: `<table class="mt-3" width="auto" align="right">
                    <tr align="center">
                        <td>Dokter Penanggung Jawab,</td>
                    </tr>
                    <tr align="center">
                        <td><div style="height: 150px;"></div></td>
                    </tr>
                    <tr align="center">
                        <td>(` + dokter.nama + `)</td>
                    </tr>
                </table>`
            });
        });

        // Datatable Pasien
        var table = $("#tabelPasien").DataTable({
            processing: true,
            serverSide: false,
            responsive: false,
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
            ],
        });

        // Date Picker Tanggal Lahir
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

        // Diagnosis Dynamical Add
        $("#addDiagnosis").on('click', function() {
            i++;
            $("#dynamicDiagnosis").append(`
                <div class="row mb-2" id="row` + i + `">
                    <div class="col-4 addInput` + i + `">
                        <input type="hidden" name="idDiagnosis[]" id="idDiagnosis" value="0">
                    </div>
                    <div class="col-7">
                        <input type="text" class="form-control" name="ketDiagnosis[]" id="ketDiagnosis" value="<?= set_value('ketDiagnosis'); ?>" placeholder="Masukkan keterangan diagnosis">
                    </div>
                    <div class="col-1">
                        <button type="button" class="btn btn-danger float-right btn-remove" id="` + i + `" style="width: 100%;"><i class="fa fa-times"></i></button>
                    </div>
                </div>
            `);
            addDynamic();
        });

        $(document).on('click', '.btn-remove', function() {
            i = i - 1;
            var id = $(this).attr('id');
            $("#row" + id).remove();
            dynamicCheck();
        });

        // Fix Multiple Modal
        $('.modal').on('hidden.bs.modal', function(event) {
            $(this).removeClass('fv-modal-stack');
            $('body').data('fv_open_modals', $('body').data('fv_open_modals') - 1);
        });
        $('.modal').on('shown.bs.modal', function(event) {
            if (typeof($('body').data('fv_open_modals')) == 'undefined') {
                $('body').data('fv_open_modals', 0);
            }
            if ($(this).hasClass('fv-modal-stack')) {
                return;
            }
            $(this).addClass('fv-modal-stack');
            $('body').data('fv_open_modals', $('body').data('fv_open_modals') + 1);
            $(this).css('z-index', 1040 + (10 * $('body').data('fv_open_modals')));
            $('.modal-backdrop').not('.fv-modal-stack').css('z-index', 1039 + (10 * $('body').data('fv_open_modals')));
            $('.modal-backdrop').not('fv-modal-stack').addClass('fv-modal-stack');
        });
    });
</script>