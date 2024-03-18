<?php
echo "<pre>";

// print_r($_POST);
// var_dump($_POST);

$id = $_POST["id"];
$amount = $_POST["amount"];
$from_currency = $_POST["from_currency"];
$to_currency = $_POST["to_currency"];

$from_c_arr = explode("-",$from_currency);
    $to_c_arr = explode("-",$to_currency);

    // print_r($from_c_arr);

    $from_c_name = $from_c_arr[0];
    $to_c_name = $to_c_arr[0];

    $from_c_rate = $from_c_arr[1];
    $to_c_rate = $to_c_arr[1];

    // print_r($from_c_rate);
    // echo "<br>";

    $from_rate = (int) str_replace(",","",$from_c_rate);
    $to_rate = (int) str_replace(",","",$to_c_rate);

    // print_r($from_rate);
    // var_dump($from_rate);

    $mmk = $amount * $from_rate;
    $to = $mmk / $to_rate;

    $result = round($to,2);


$connect = mysqli_connect("localhost","wha","asdf","wad_test");

$sql = "UPDATE exchange_results SET amount='$amount',from_currency='$from_c_name',to_currency='$to_c_name',result=$result WHERE id=$id";

$query = mysqli_query($connect,$sql);

if($query){
    header("Location:exchangeRecords.php");
}