<?php
function get_client_ip() {
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if(isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else if(isset($_SERVER['REMOTE_HOST']))
        $ipaddress = $_SERVER['REMOTE_HOST'];
    else
        $ipaddress = 'UNKNOWN';

    if($ipaddress == '::1')
        $ipaddress = 'localhost';
    return  $ipaddress ;
}


function get_file_name(){
    return '{' . $_SERVER['PHP_SELF'] . '}';
}

function get_timestamp(){
    $now = new DateTime();
    return '[' . $now->format('Y-m-d h:i:s') . ']';
}

function get_country(){
    $ip = get_client_ip();
    if($ip == 'localhost')
        return '';
    else{
        $temp = json_decode(file_get_contents("http://ipinfo.io/$ip/json"),true);
        $cnt = $temp['country']; 
        $temp2 = json_decode(file_get_contents("https://restcountries.eu/rest/v2/alpha/$cnt?fields=name"),true); //request only what we need to save time

        $file = $_SERVER['DOCUMENT_ROOT'] . "/phpScripts/visit_per_countries.json";

        $json = json_decode(file_get_contents($file),true);

        if (array_key_exists($temp2['name'],$json))
        {
            $json[$temp2['name']] = $json[$temp2['name']] + 1;
        }
        else{
            $json[$temp2['name']] = 1;
        }
        file_put_contents($file, json_encode($json));


        return ' (' .$temp2['name'] .')';
    }

}

$file = fopen($_SERVER['DOCUMENT_ROOT'] . "/phpScripts/server.log","a");
fputs($file,get_timestamp() . ' '.'(' .  get_client_ip() .')'. get_country() .' '. get_file_name() ."\n");
fclose($file);

?>