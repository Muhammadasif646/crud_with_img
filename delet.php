<?php
include("config.php"); 

$id =$_GET['id'];


$sql="DELETE FROM `students` WHERE id=$id";

$res=mysqli_query($conn,$sql);

if($res){

header("location:show.php");

}

?>
