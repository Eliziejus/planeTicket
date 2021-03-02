<?php

function validate($data){
    $validation= array();
    $pastabaBool = !preg_match('/^[a-zA-Z0-9\s,.:$!?-]{1,1000}$/', $_POST['message']);
    $asmenskodasBool = !preg_match('/\d{11}/', $_POST['code']);
    $vardasBool = !preg_match('/\A[A-Z][a-z]{1,100}/', $_POST['name']);
    $pavardeBool = !preg_match('/\A[A-Z][a-z]{1,100}/', $_POST['lastname']);

    if ($pastabaBool == True){array_push($validation, "Pastaba turi būti nuo 1 iki 1000 simbolių.");}
    if ($asmenskodasBool == True){array_push($validation, "Asmens kodą turi sudaryti 11 skaitmenų.");}
    if ($vardasBool == True){array_push($validation, "Vardas turi prasidėti didžiąją raide.");}
    if ($pavardeBool == True){array_push($validation, "Pavardė turi prasidėti didžiąją raide.");}
    if (empty($_POST['weight'])){array_push($validation, "Reikia pasirinkti bagazo svori.");}
    if (empty($_POST['inlocation'])){array_push($validation, "Reikia pasirinkti isvykimo miesta.");}
    if (empty($_POST['number'])){array_push($validation, "Reikia pasirinkti skrydzio numeri.");}
    if (empty($_POST['location'])){array_push($validation, "Reikia pasirinkti atvykimo miesta.");}

    return $validation;
}


function printData(){
    $data="data/reservation.txt";
    $content=file_get_contents($data);
    $formData=implode(',',$_POST);
    if($content != ''){
        $content.=",";
    }
    $content.="\n".substr($formData, 0, -1);
    file_put_contents($data,$content);

}

function getData(){
    $data="data/reservation.txt";
    $reservation=file_get_contents($data, true);
    $reservation=explode(',', $reservation);
    $link=(array)$reservation;

    return $link;

}


?>