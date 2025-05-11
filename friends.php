<?php
session_start();
$fromemail = $_SESSION["email"];

$con = mysqli_connect("localhost","root","","testdata");
$idindex = mysqli_query($con,"select id from userlist where email='$fromemail'");
$data = mysqli_fetch_assoc($idindex);
$id = $data["id"];
$_SESSION["myid"] = $id;
//echo $id;

$Friends = mysqli_query($con,"select * from friends where fromid='$id'");
$requestFriends = mysqli_query($con,"select * from friends where toid='$id'");

$Friendslist = array();

//$requestFriendsID = array();
$html = "";

while ($row = mysqli_fetch_assoc($Friends)) {
    $FriendID = $row["toid"]; 
    $Friendslist[] = $FriendID;
//    echo $row["toid"];
    $FriendNameIndex = mysqli_query($con,"select name from user where id='$FriendID'");
    $FriendName = (mysqli_fetch_assoc($FriendNameIndex))["name"];
 //   echo $FriendName;
    echo "<button onclick=\"ms($id,$FriendID)\">$FriendName</button>"."<br>";
}

while ($row = mysqli_fetch_assoc($requestFriends)) {
    $FriendID = $row["fromid"];
    if(!in_array($FriendID, $Friendslist)){
        $FriendNameIndex = mysqli_query($con,"select name from user where id='$FriendID'");
        $FriendName = (mysqli_fetch_assoc($FriendNameIndex))["name"];
        echo "<button onclick=\"ms($id,$FriendID)\">$FriendName</button>" . "(新朋友)" ."<br>";
    }
}

//echo $html;

//print_r($Friendslist);
?>