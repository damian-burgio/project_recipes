<?php

function initiate_api($meal_name)
{
    $url = "https://www.themealdb.com/api/json/v1/1/search.php?s=" . $meal_name;

    //Inicia la llamada
    $curl = curl_init($url);

    //opciones GET request
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);

    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
    //false para que cURL no verifique el peer del certificado. 
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);

    //enviar el request
    $result = curl_exec($curl);

    //cerrar la conexion
    curl_close($curl);

    return $result;
}



function convert_into_array($meal_name)
{
    $result = initiate_api($meal_name);
    /*
    * Convierte un string codificado en JSON a una variable de PHP.
    * Cuando es true, los objects JSON devueltos serán convertidos a array asociativos
    */
    $response_array = json_decode($result, true);

    return $response_array;
}
function location()
{

    $ip = $_SERVER['REMOTE_ADDR'];

    $api_key = '8b1be5034664428da07f002e6a39fec5';


    //Crear recurso de curl
    $ch = curl_init();

    //set url
    curl_setopt($ch, CURLOPT_URL, 'https://api.ipgeolocation.io/ipgeo?apiKey=' . $api_key . '&ip=' . $ip);

    //devuelve un string
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    //$output contiene el string
    $output = curl_exec($ch);

    //print_r($output);

    //cierro curl
    curl_close($ch);
    /*
    * Convierte un string codificado en JSON a una variable de PHP.
    * Cuando es true, los objects JSON devueltos serán convertidos a array asociativos
    */
    $response_array = json_decode($output, true);

    return $response_array;
}


function is_valid_email($str)
{
    $email = $str;

    // Remove all illegal characters from email
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
      return "True";
    } else {
      return "False";
    }
}


