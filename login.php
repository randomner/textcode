<?php
session_start();
header('Content-Type: application/json; charset=utf-8');
$email = $_POST['email'];
$password = $_POST['password'];
$con = mysqli_connect("localhost","root","","testdata");
$res = mysqli_query($con,"select * from userlist where email='$email'");
$passcheck = mysqli_query($con,"select password from userlist where email='$email'");
//var_dump($res);

if( $res->num_rows > 0 ){
    if($password == (mysqli_fetch_assoc($passcheck))['password']){
        $_SESSION["email"] = $email;
        //echo "用户已登录";
        echo json_encode(['success'=>true,'message' => '登录成功']);
        exit;
    }
    //echo "密码错误";
    //http_response_code(400);
    echo json_encode(['success'=>false,'message' => '密码错误']);
    exit;
}else{
    //echo "用户不存在";
    //http_response_code(400);
    echo json_encode(['success'=>false,'message' => '用户不存在']);
    exit;
}


?>