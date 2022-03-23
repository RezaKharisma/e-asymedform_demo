<script>
    function resetForm(params) {
        $("#errorDiagnosis").html("");
        $("#diagnosis").removeClass('is-invalid');
    }

    $(function() {

        /*
         * ------------------------------------------------------------------------
         * Tombol Reset Data Diagnosis
         * ------------------------------------------------------------------------
         */
        $("#btnReset").on('click', function() {
            resetForm();
        });

        /*
         * ------------------------------------------------------------------------
         * Tombol Simpan Data Diagnosis
         * ------------------------------------------------------------------------
         */
        $("#btnSimpan").off().on('click', function() {
            $.ajax({
                type: "POST",
                url: "simpan",
                data: $("#formDiagnosis").serialize(),
                dataType: "json",
                success: function(response) {
                    if (response.Message == "Error") {
                        var error = response.Error;
                        toastr.error("Mohon periksa form kembali");
                        (error.diagnosis) ? $("#errorDiagnosis").append(`<small class="text-danger pl-3 marginSmall">` + error.diagnosis + `</small>`): "";
                        (error.diagnosis) ? $("#diagnosis").addClass('is-invalid'): $("#diagnosis").removeClass('is-invalid');
                    } else {
                        $("#errorDiagnosis").html("");
                        $("#diagnosis").removeClass('is-invalid');
                        toastr.success("Data berhasil tersimpan");
                        $("#diagnosis").val("");
                        table.draw();
                    }
                },
            });
        });

        /*
         * ------------------------------------------------------------------------
         * Tombol Update Data Diagnosis
         * ------------------------------------------------------------------------
         */
        $("#btnUpdate").off().on('click', function() {
            $("#errorDiagnosisUpdate").html("");
            $("#diagnosisUpdate").removeClass('is-invalid');

            $.ajax({
                type: "POST",
                url: "update",
                data: $("#formUpdate").serialize(),
                dataType: "json",
                beforeSend: function() {
                    $(".loading-icon-update").removeClass("hide");
                    $("#btnUpdate").attr("disabled", true);
                },
                success: function(response) {
                    if (response.Message == "Error") {
                        var error = response.Error;
                        toastr.error("Mohon periksa form kembali");
                        (error.diagnosisUpdate) ? $("#errorDiagnosisUpdate").append(`<small class="text-danger pl-3 marginSmall">` + error.diagnosisUpdate + `</small>`): "";
                        (error.diagnosisUpdate) ? $("#diagnosisUpdate").addClass('is-invalid'): $("#diagnosisUpdate").removeClass('is-invalid');
                    } else {
                        toastr.success("Data berhasil terupdate");
                        $("#modalUpdate").modal("hide");
                        $("#diagnosis").val("");
                    }
                },
                complete: function(params) {
                    $(".loading-icon-update").addClass("hide");
                    $("#btnUpdate").attr("disabled", false);
                },
                error: function(response) {
                    console.log(JSON.parse(xhr.responseText));
                    toastr.error("Terjadi Kesalahan");
                }
            });
        });

        /*
         * ------------------------------------------------------------------------
         * Tombol Delete Data Diagnosis
         * ------------------------------------------------------------------------
         */
        $("#tableDiagnosis").on("click", "#btnDelete", function() {
            var idDiagnosis = $(this).data('id');
            $("#btnYes").off().click(function() {
                $("#modalHapus").modal("hide");
                $.ajax({
                    type: "POST",
                    url: "delete",
                    data: {
                        id: idDiagnosis
                    },
                    dataType: "json",
                    success: function(response) {
                        if (response.Message == "Error") {
                            toastr.warning("Diagnosis tidak bisa dihapus karena terintegrasi pada pasien");
                        } else {
                            toastr.success("Data berhasil terhapus");
                        }
                    },
                    error: function(response) {
                        console.log(JSON.parse(xhr.responseText));
                        toastr.error("Data gagal terhapus");
                    }
                });
            });
        });
    });
</script>