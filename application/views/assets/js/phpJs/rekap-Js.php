<script>
    /* @Javascript Rekap */

    var currentDate = new Date()
    var day = currentDate.getDate()
    var month = currentDate.getMonth() + 1
    var year = currentDate.getFullYear()
    var searchYear = "",
        searchMonth = "",
        startDate = "",
        endDate = "";
    var d = day + "-" + month + "-" + year;
    const zeroPad = (num, places) => String(num).padStart(places, '0')

    // Datatable filtering
    $.fn.dataTableExt.afnFiltering.push(function(oSettings, aData, iDataIndex) {
        var filterstart = startDate;
        var filterend = endDate;
        var iStartDateCol = 17;
        var iEndDateCol = 17;

        var tabledatestart = moment(aData[iStartDateCol]).format('YYYY-MM-DD');
        var tabledateend = moment(aData[iEndDateCol]).format('YYYY-MM-DD');

        if (filterstart === "" && filterend === "") {
            return true;
        } else if ((moment(filterstart).isSame(tabledatestart) || moment(filterstart).isBefore(tabledatestart)) && filterend === "") {
            return true;
        } else if ((moment(filterstart).isSame(tabledatestart) || moment(filterstart).isAfter(tabledatestart)) && filterstart === "") {
            return true;
        } else if ((moment(filterstart).isSame(tabledatestart) || moment(filterstart).isBefore(tabledatestart)) && (moment(filterend).isSame(tabledateend) || moment(filterend).isAfter(tabledateend))) {
            return true;
        }
        return false;
    });

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

    $(function() {
        moment.locale('id');

        $("#year").keydown(function(e) {
            limitCharacter(event);
        });

        // Filtering date
        $('#year').keyup(function() {
            searchYear = $("#year").val();
            $("#start_date").val("");
            $("#end_date").val("");
            startDate = "";
            endDate = "";

            table.columns(14).search(searchMonth + " " + searchYear);
            table.draw();
        });

        $('#month').on('change', function() {
            searchMonth = $("#month").val();
            $("#start_date").val("");
            $("#end_date").val("");
            startDate = "";
            endDate = "";

            table.columns(14).search(searchMonth + " " + searchYear);
            table.draw();
        });

        $("#resetTahun").on('click', function() {
            $("#year").val("");
            searchYear = "";
            table.columns(14).search(searchMonth + " " + searchYear);
            table.draw();
        });

        $("#resetBulan").on('click', function() {
            $("#month").val("0");
            searchMonth = "";
            table.columns(14).search(searchMonth + " " + searchYear);
            table.draw();
        });

        // Range filter date
        $('#start_date').datepicker({
            format: 'YYYYMMDD'
        });

        $('#end_date').datepicker({
            format: 'YYYYMMDD'
        });

        $("#start_date").on('change', function() {
            $("#year").val("");
            $("#month").val("0");
            searchYear = "";
            searchMonth = "";

            startDate = $("#start_date").datepicker('getDate');
            startDate = startDate.getFullYear() + "-" + ((startDate.getMonth() + 1) < 10 ? "0" + (startDate.getMonth() + 1) : (startDate.getMonth() + 1)) + "-" + (startDate.getDate() < 10 ? "0" + startDate.getDate() : startDate.getDate());
            $("#start_date").val(moment(startDate).format("dddd, D MMMM YYYY"));
            startDate = moment(startDate).format('YYYY-MM-DD');
        });

        $("#end_date").on('change', function() {
            $("#year").val("");
            $("#month").val("0");
            searchYear = "";
            searchMonth = "";

            endDate = $("#end_date").datepicker('getDate');
            endDate = endDate.getFullYear() + "-" + ((endDate.getMonth() + 1) < 10 ? "0" + (endDate.getMonth() + 1) : (endDate.getMonth() + 1)) + "-" + (endDate.getDate() < 10 ? "0" + endDate.getDate() : endDate.getDate());
            $("#end_date").val(moment(endDate).format("dddd, D MMMM YYYY"));
            endDate = moment(endDate).format('YYYY-MM-DD');
        });

        $("#searchRange").on("click", function() {
            if ($("#start_date").val() == "" || $("#end_date").val() == "") {
                toastr.error("Filter tidak boleh kosong");
            } else {
                table.draw();
            }
        });

        $("#resetRange").on("click", function() {
            $("#start_date").val("");
            $("#end_date").val("");

            $("#month").val("0");
            searchMonth = "";

            $("#year").val("");
            searchYear = "";

            startDate = "";
            endDate = "";

            table.columns(14).search(searchMonth + " " + searchYear);
            table.draw();
        });

        // Datatable Pasien
        var table = $("#tabelPasien").DataTable({
            processing: false,
            serverSide: false,
            autoWidth: true,
            scrollX: true,
            scrollCollapse: true,
            searching: true,
            columnDefs: [{
                targets: "no-sort",
                orderable: false,
            }, {
                targets: [13, 16],
                searchable: false
            }, {
                targets: 0,
                className: 'boldId',
            }, {
                targets: 10,
                render: function(data, type, row) {
                    return data.replace(/\:/g, " : ").replace(/\//g, " || ");
                }
            }, {
                targets: 17,
                visible: false
            }],
            dom: "<'row'<'col-sm-12 col-md-6'B><'col-sm-12 col-md-6'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
            buttons: [{
                    extend: 'excel',
                    title: 'Rekap Data Rekam Medis (' + d + ')',
                    text: '<i class="fas fa-file-excel" aria-hidden="true"></i> Backup',
                    attr: {
                        id: 'btnEksport'
                    },
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                'pageLength'
            ],
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