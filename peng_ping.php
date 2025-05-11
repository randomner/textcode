<?php
session_start();
$myid = $_SESSION["myid"];
$pengid = $_POST["pengid"];
$text = $_POST["text"];
$con = mysqli_connect("localhost","root","","testdata");
$insert = mysqli_query($con,"insert into ping (pengid, fromid, text) value ('$pengid', '$myid', '$text')");


?>