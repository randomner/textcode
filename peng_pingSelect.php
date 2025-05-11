<?php
session_start();
$myid = $_SESSION["myid"];
$pengid = $_POST["pengid"];
$con = mysqli_connect("localhost","root","","testdata");
$peng = mysqli_query($con,"select * from pengyouquan where pengid='$pengid'");
$fromid = (mysqli_fetch_assoc($peng))['fromid'];
$NameIndex = mysqli_query($con,"select name from user where id='$fromid'");
$name =  (mysqli_fetch_assoc($NameIndex))["name"];
echo "评论给$name<input type='text' id='text'></input><button onclick='ping($pengid)'>+</button>";


?>