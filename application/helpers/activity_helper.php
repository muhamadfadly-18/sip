<?php

function activity_log($tipe, $aksi, $item, $assign_type){
    $CI =& get_instance();

    $param['log_user'] = $CI->session->userdata('name_user');
    $param['log_time'] = date("Y-m-d H:i:s");
    $param['log_tipe'] = $tipe; //asset, asesoris, komponen, inventori
    $param['log_aksi'] = $aksi; //membuat, menambah, menghapus, mengubah,
    $param['log_item'] = $item; //nama item
    $param['log_assign_to']= $CI->session->userdata('id_group');
    $param['log_assign_type']= $assign_type; //target

    //load model log
    $CI->load->model('m_log');

    //save to database
    $CI->m_log->save_log($param);

}
?> 
