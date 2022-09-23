<?php
function create_response()
{
    $response = new stdClass;
    $response->status = FALSE;
    $response->status_code = 404;
    $response->message = "Not found!";
    $response->data = [];

    return $response;
}

function generateRandomString($length = 10)
{
    $characters = '0123456789';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function add_new_key_to_array($arrays, $new_key, $new_value)
{
    foreach ($arrays as $key => $value) {
        $arrays[$key][$new_key] = $new_value;
    }
    return $arrays;
}
