<script>
    /* @Javascript Pendapatan */

    var Tahun = <?= date("Y"); ?>;
    var idDokter = ($("#dokter").val() == null ? 0 : $("#dokter").val());

    const dataPendapatan0 = {
        1: ["Januari", "3", "Rp. 900.000"],
        2: ["Februari", "2", "Rp. 350.000"],
        3: ["Maret", "3", "Rp. 1.200.000"],
        4: ["April", "9", "Rp. 2.000.000"],
        5: ["Mei", "2", "Rp. 450.000"],
        6: ["Juni", "2", "Rp. 400.000"],
        7: ["Juli", "2", "Rp. 300.000"],
        8: ["Agustus", "2", "Rp. 300.000"],
        9: ["September", "2", "Rp. 300.000"],
        10: ["Oktober", "2", "Rp. 300.000"],
        11: ["November", "2", "Rp. 300.000"],
        12: ["Desember", "2", "Rp. 300.000"],
    }

    const dataPendapatan1 = {
        1: ["Januari", "2", "Rp. 750.000"],
        2: ["Februari", "1", "Rp. 100.000"],
        3: ["Maret", "2", "Rp. 1.000.000"],
        4: ["April", "8", "Rp. 1.900.000"],
        5: ["Mei", "1", "Rp. 200.000"],
        6: ["Juni", "1", "Rp. 200.000"],
        7: ["Juli", "1", "Rp. 200.000"],
        8: ["Agustus", "1", "Rp. 200.000"],
        9: ["September", "1", "Rp. 200.000"],
        10: ["Oktober", "1", "Rp. 200.000"],
        11: ["November", "1", "Rp. 200.000"],
        12: ["Desember", "1", "Rp. 200.000"],
    }

    const dataPendapatan2 = {
        1: ["Januari", "1", "Rp. 150.000"],
        2: ["Februari", "1", "Rp. 250.000"],
        3: ["Maret", "1", "Rp. 200.000"],
        4: ["April", "1", "Rp. 100.000"],
        5: ["Mei", "1", "Rp. 250.000"],
        6: ["Juni", "1", "Rp. 200.000"],
        7: ["Juli", "1", "Rp. 100.000"],
        8: ["Agustus", "1", "Rp. 100.000"],
        9: ["September", "1", "Rp. 100.000"],
        10: ["Oktober", "1", "Rp. 100.000"],
        11: ["November", "1", "Rp. 200.000"],
        12: ["Desember", "1", "Rp. 200.000"],
    }

    const dataPendapatanNull = {
        1: ["Januari", "0", "Rp. 0"],
        2: ["Februari", "0", "Rp. 0"],
        3: ["Maret", "0", "Rp. 0"],
        4: ["April", "0", "Rp. 0"],
        5: ["Mei", "0", "Rp. 0"],
        6: ["Juni", "0", "Rp. 0"],
        7: ["Juli", "0", "Rp. 0"],
        8: ["Agustus", "0", "Rp. 0"],
        9: ["September", "0", "Rp. 0"],
        10: ["Oktober", "0", "Rp. 0"],
        11: ["November", "0", "Rp. 0"],
        12: ["Desember", "0", "Rp. 0"],
    }

    const dataDiagnosis0 = {
        1: ["Karies", "1"],
        2: ["Nekrosis pulpa", "1"],
        3: ["Perikoronitis", "1"],
        4: ["Periodontitis", "2"]
    }

    const dataDiagnosis1 = {
        1: ["Karies", "1"],
        2: ["Nekrosis pulpa", "1"],
        3: ["Periodontitis", "1"]
    }

    const dataDiagnosis2 = {
        1: ["Perikoronitis", "1"],
        2: ["Periodontitis", "1"],
    }

    // Function Limitasi Karakter Input
    function limitCharacter(event) {
        key = event.which || event.keyCode;
        if (
            key != 188 &&
            key != 8 &&
            key != 17 &&
            (key != 86) & (key != 67) &&
            (key < 48 || key > 57) &&
            (key <= 95)
        ) {
            event.preventDefault();
            return false;
        }
    }

    function resetTable() {
        $("#tabelBodyPendapatan").html("");
        $("#tabelBodyPendapatan").append(`
            <tr align = "center" >
                <th width = "20px"> No </th> 
                <th>Bulan</th> 
                <th width = "70px"> Pasien </th> 
                <th width = "120px"> Jumlah </th> 
            </tr>
        `);

        $("#tabelBodyDiagnosis").html("");
        $("#tabelBodyDiagnosis").append(`
            <tr align="center">
                <th width="20px">No</th>
                <th>Diagnosis</th>
                <th width="120px">Jumlah Pasien</th>
            </tr>
        `);
    }

    function dataPendapatanForeach(data) {
        var i = 1;
        $.each(data, function(key, value) {
            $("#tabelBodyPendapatan").append(`
                <tr>
                    <td align="center">` + i + `</td>
                    <td>` + value[0] + `</td>
                    <td align="center">` + value[1] + `</td>
                    <td>Rp. ` + value[2] + `</td>
                </tr>
                `);
            i++;
        });
    }

    function dataDiagnosisForeach(data) {
        var i = 1;
        $.each(data, function(key, value) {
            $("#tabelBodyDiagnosis").append(`
                <tr>
                    <td align="center">` + i + `</td>
                    <td>` + value[0] + `</td>
                    <td align="center">` + value[1] + `</td>
                </tr>
            `);
            i++;
        });
    }

    function getDataPendapatan(Tahun, idDokter) {
        resetTable();

        if (idDokter == "1") {
            dataPendapatanForeach(dataPendapatan1);
            dataDiagnosisForeach(dataDiagnosis1);
            $("#tp").html("<b>" + "21" + "</b>");
            $("#tb").html("<b>Rp. 5.350.000</b>");

        } else if (idDokter == "2") {
            dataPendapatanForeach(dataPendapatan2);
            dataDiagnosisForeach(dataDiagnosis2);
            $("#tp").html("<b>" + "12" + "</b>");
            $("#tb").html("<b>Rp. 1.950.000</b>");
        } else {
            dataPendapatanForeach(dataPendapatan0);
            dataDiagnosisForeach(dataDiagnosis0);
            $("#tp").html("<b>" + "33" + "</b>");
            $("#tb").html("<b>Rp. 6.050.000</b>");
        }

        if (Tahun != <?= date("Y"); ?>) {
            resetTable();
            toastr.error("Data tidak ditemukan");
            $("#txtTahun").html(`<font style="color: red;">*null*</font>`);
            $("#txtTahun2").html(`<font style="color: red;">*null*</font>`);

            var i = 1;
            $.each(dataPendapatanNull, function(key, value) {
                $("#tabelBodyPendapatan").append(`
                    <tr>
                        <td align="center">` + i + `</td>
                        <td>` + value[0] + `</td>
                        <td align="center">` + value[1] + `</td>
                        <td>Rp. ` + value[2] + `</td>
                    </tr>
                `);
                i++;
            });
            $("#tp").html("<b>" + "0" + "</b>");
            $("#tb").html("<b>Rp. 0</b>");

            $("#tabelBodyDiagnosis").append(`
                <tr>
                    <td></td>
                    <td align="center"><font style="color: red;">DATA TIDAK DITEMUKAN</font></td>
                    <td></td>
                </tr>
            `);
        }
    }

    // Document Running
    $(function() {
        // Library
        moment.locale('id');

        getDataPendapatan(Tahun, null);

        $("#inputTahun").keydown(function(e) {
            limitCharacter(event);
        });

        $("#inputTahun").val(Tahun);
        $("#txtTahun").html(Tahun);
        $("#txtTahun2").html(Tahun);

        // Input Cari Dokter
        $("#searchDokter").on('click', function() {
            Tahun = $("#inputTahun").val();
            idDokter = $("#dokter").val();
            if (idDokter != null) {
                getDataPendapatan(Tahun, idDokter);
                $("#txtDokter").html(" (" + $("#dokter option:selected").text() + ")");
                toastr.success("Dokter berhasil diubah");
            } else {
                $("#txtDokter").html("");
                toastr.error("Pilih nama dokter terlebih dahulu");
            }
        });

        // Input Cari Tahun
        $("#searchTahun").on('click', function() {
            Tahun = $("#inputTahun").val();
            idDokter = $("#dokter").val();
            $("#txtTahun").html(Tahun);
            $("#txtTahun2").html(Tahun);
            getDataPendapatan(Tahun, idDokter);
            toastr.success("Tahun berhasil diubah");
        });

        // Reset Cari Dokter
        $("#resetDokter").on('click', function() {
            idDokter = 0;
            $("#dokter").val("0");
            $("#txtDokter").html("");
            getDataPendapatan(Tahun, idDokter);
            toastr.success("Dokter disetel ulang");
        });

        // Reset Cari Tahun
        $("#resetTahun").on('click', function() {
            Tahun = <?= date("Y"); ?>;
            $("#inputTahun").val(Tahun);
            $("#txtTahun").html(Tahun);
            $("#txtTahun2").html(Tahun);
            getDataPendapatan(Tahun, idDokter);
            toastr.success("Tahun disetel ulang");
        });
    });
</script>