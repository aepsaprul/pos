<?php
function set_active($path, $active = 'active') {
    return call_user_func_array('Request::is', (array)$path) ? $active : '';
}

function rupiah($angka){
    $hasil_rupiah = "" . number_format($angka,0,',','.');
    return $hasil_rupiah;
}
?>
