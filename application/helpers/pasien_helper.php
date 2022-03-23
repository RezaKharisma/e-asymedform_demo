<?php

function customTanggal($tanggal)
{
    setlocale(LC_ALL, 'id-ID', 'id_ID');
    $result = strftime("%A, %d %B %Y %H:%M %p", strtotime($tanggal));
    return $result;
}

function cekValueKosong($input)
{
    if ($input == null) {
        return "-";
    }
    return $input;
}

function cekBiayaKosong($input)
{
    if ($input == null) {
        return "0";
    }
    return $input;
}
