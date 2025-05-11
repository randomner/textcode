<?php
$fromid = $_POST["fromid"];
$toid = $_POST["toid"];
$con = mysqli_connect("localhost","root","","testdata");
$friendNameIndex = mysqli_query($con,"select name from user where id='$toid'");
$friendName = (mysqli_fetch_assoc($friendNameIndex))["name"];
echo "<div style='text-align: center; color: green;'>$friendName</div>";
$chat = mysqli_query($con,"select * from ms where (fromid='$fromid' and toid='$toid') or  (fromid='$toid' and toid='$fromid') ");
while ($row = mysqli_fetch_assoc($chat)) {
    $text = $row['text'];
    if($row['fromid']==$fromid){
        echo "<span style='float: right;'>$text</span>". "<br>";
    }else{
        echo "<span style='float: left; color: green;'>$text</span>". "<br>";
    }
}
?>