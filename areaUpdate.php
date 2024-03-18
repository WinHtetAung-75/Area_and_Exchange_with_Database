<?php
echo "<pre>";

print_r($_POST);

$id = $_POST["id"];
$width = $_POST["width"];
$breadth = $_POST["breadth"];

$area = $width * $breadth ;

//connect 
$connect = mysqli_connect("localhost","wha","asdf","wad_test");

//sql statement just String
$sql = "UPDATE area_results SET width='$width',breadth='$breadth',result='$area' WHERE id=$id";

//query Function Run
$query = mysqli_query($connect,$sql);

if($query){
    header("Location:areaRecords.php");
}