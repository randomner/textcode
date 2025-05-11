<?php
session_start();
$fromid = $_POST["fromid"];
$toid = $_POST["toid"];
$text = $_POST['text'];
$con = mysqli_connect("localhost","root","","testdata");
$insert = mysqli_query($con,"insert into ms (fromid, toid, text) value ('$fromid', '$toid', '$text')");

?>