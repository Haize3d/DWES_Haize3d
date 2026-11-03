<?php
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.openf1.org/v1/car_data?driver_number=16",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        $objeto = json_decode($response);

        echo "Piloto 16: ".$objeto->data->driver_number[15]."</br>";
        echo "Piloto 44: ".$objeto->data->driver_number[44]."</br>";
        /*echo "COVID19 en ".$objeto->data->covid19Stats[0]->country."<br/>";
        echo "Actualizado: ".$objeto->data->covid19Stats[0]->lastUpdate."<br/>";
        echo "Confirmados: ".$objeto->data->covid19Stats[0]->confirmed."<br/>";
        echo "Muertos: ".$objeto->data->covid19Stats[0]->deaths."<br/>";
        echo "Recuperados: ".$objeto->data->covid19Stats[0]->recovered."<br/>";*/
    }
?>