<?php

use \Curl\Curl;

function getData() {
    $pinkvilla_data_feed_url = 'https://cdn.pinkvilla.com/feed/fashion-section.json';
    $curl = new Curl();
    $curl->get($pinkvilla_data_feed_url);

    if ($curl->error) {
        echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
        return $curl->error;
    } else {
        return $curl->response;
    }
}



//simply render function
function render($filepath = '', $data = null){
    if(file_exists($filepath)){
        include $filepath;
    }
}


// Comparison function
function cmp($a, $b) {
    if ($a == $b) {
        return 0;
    }
    return ($a > $b) ? -1 : 1;
}