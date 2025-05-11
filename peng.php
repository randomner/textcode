<?php
session_start();
$text = $_POST["text"];
$fromemail = $_SESSION["email"];
$con = mysqli_connect("localhost","root","","testdata");
$insert = mysqli_query($con,"insert into pengyouquan (text, fromemail) value ('$text', '$fromemail')");
$res = mysqli_query($con,"select * from pengyouquan");
while ($row = mysqli_fetch_assoc($res)) {
    echo $row['fromemail']." : ".$row['text'] . "<br>";
}
?>