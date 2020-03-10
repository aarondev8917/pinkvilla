<?php

require __DIR__. '/vendor/autoload.php';
require __DIR__ . '/common.php';

$data = getData();




$sorted_data = [];

foreach($data as $key => $val){
    $sorted_data[$key] = $val->viewCount;
}


// Sort and print the resulting array
uasort($sorted_data, 'cmp');

$sorted_keys = array_keys($sorted_data);

$final_data = [];
foreach($sorted_keys as $key => $value){

    $final_data[] = $data[$value];
}


$template_file_path = __DIR__ . '/view/index.php';
render($template_file_path,$final_data);
