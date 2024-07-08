<?php
function tgl_indonesia($date)
{
    // ARRAY untuk hari dan bulan //
    $Hari = array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu",);
    $Bulan = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

    // Memisahkan format tanggal bulan dan tahun menggunakan substring//
    $tahun      = substr($date, 0, 4);
    $bulan      = substr($date, 5, 2);
    $tgl     = substr($date, 8, 2);
    $hari     = date("w", strtotime($date));

    $result = $Hari[$hari] . ", " . $tgl . " " . $Bulan[(int)$bulan - 1] . " " . $tahun . "";
    return $result;
}
function tgl_indonesia2($date)
{
    // ARRAY untuk hari dan bulan //
    $Hari = array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu",);
    $Bulan = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

    // Memisahkan format tanggal bulan dan tahun menggunakan substring//
    $tahun      = substr($date, 0, 4);
    $bulan      = substr($date, 5, 2);
    $tgl     = substr($date, 8, 2);
    $hari     = date("w", strtotime($date));

    $result = $Hari[$hari] . " " . $tgl . " " . $Bulan[(int)$bulan - 1] . " " . $tahun . "";
    return $result;
}
function tgl_indonesia3($date)
{
    // ARRAY untuk hari dan bulan //
    $Bulan = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

    // Memisahkan format tanggal bulan dan tahun menggunakan substring//
    $tahun      = substr($date, 0, 4);
    $bulan      = substr($date, 5, 2);
    $tgl     = substr($date, 8, 2);

    $result = $tgl . " " . $Bulan[(int)$bulan - 1] . " " . $tahun . "";
    return $result;
}
