<?php

if (! function_exists('request_raja_ongkir')) {

function request_raja_ongkir($url,$tipe = 'GET',$param)
{
    $curl = curl_init();

    curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.rajaongkir.com/starter/".$url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => $tipe,
    CURLOPT_POSTFIELDS => $param,
    CURLOPT_HTTPHEADER => array(
        "content-type: application/x-www-form-urlencoded",
        "key: ".env("RAJA_ONGKIR_KEY")
      ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {

      return "cURL Error #:" . $err;
    } else {
       $_respose = json_decode($response);
       if ($_respose->rajaongkir->status->code == 200)
       {
        //   dd($_respose->rajaongkir->results);
        return $_respose->rajaongkir->results;
      }else{
         return [];
      }


    }

}
}