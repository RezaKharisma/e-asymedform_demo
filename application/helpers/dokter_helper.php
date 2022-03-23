<?php

function storeImg($file)
{
    $CI = &get_instance();

    $config['upload_path']   = './application/views/assets/img/dokter/';
    $config['allowed_types'] = 'jpg|jpeg|png';
    $config['max-size']      = '2048';
    $config['file_name']     = rand() . '.jpg';

    $CI->load->library('upload', $config);

    $CI->upload->do_upload('file_0');
    $CI->upload->data();

    return $config['file_name'];
}

function storeSignature($signature)
{
    $CI = &get_instance();

    $config['upload_path']   = './application/views/assets/img/dokter/';
    $config['allowed_types'] = 'png';
    $config['max-size']      = '2048';
    $config['file_name']     = rand() . '.png';

    $CI->load->library('upload', $config);

    $data_uri = $signature;
    $encoded_image = explode(",", $data_uri)[1];
    $decoded_image = base64_decode($encoded_image);
    file_put_contents("./application/views/assets/img/dokter/" . $config['file_name'], $decoded_image);

    $CI->upload->do_upload('signature');
    $CI->upload->data();

    return $config['file_name'];
}
