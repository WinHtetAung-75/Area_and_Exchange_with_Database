<?php
echo "<pre>";

print_r($_GET);
$id = $_GET["id"];

//connect 
$connect = mysqli_connect("localhost","wha","asdf","wad_test");

//sql statement just String
$sql = "DELETE FROM area_results WHERE id=$id";

//query Function Run
$query = mysqli_query($connect,$sql);

if($query){
    header("Location:areaRecords.php");
}