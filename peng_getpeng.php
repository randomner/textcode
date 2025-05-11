<?php
session_start();
$myid = $_SESSION["myid"];
$con = mysqli_connect("localhost","root","","testdata");
$res = mysqli_query($con,"select * from pengyouquan");
while ($row = mysqli_fetch_assoc($res)) {
    $fromid = $row['fromid'];
    $pengid = $row['pengid'];
    $NameIndex = mysqli_query($con,"select name from user where id='$fromid'");
    $name =  (mysqli_fetch_assoc($NameIndex))["name"];
    $text = $row['text'];
    echo "<div class='onepeng' onclick=\"pingSelect($pengid)\">$name <br> $text <br> ";
    $ping = mysqli_query($con,"select * from ping where pengid='$pengid'");
    while ($pingrow = mysqli_fetch_assoc($ping)) {
        $pingFromid = $pingrow['fromid'];
        $pingNameIndex = mysqli_query($con,"select name from user where id='$pingFromid'");
        $pingName =  (mysqli_fetch_assoc($pingNameIndex))["name"];
        $pingText = $pingrow['text'];
        echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class='oneping'>".$pingName.":".$pingText."</span><br>";
    }
    echo "</div><br>";

}





?>