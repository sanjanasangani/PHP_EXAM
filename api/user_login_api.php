<?php
header("Access-Control-Allow-Methods: POST");
include("../Config/user_config.php");

$config = new User_Config();

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $res = $config->sign_in($email, $password);

    if ($res) {
        $arr['data'] = "User Sign In succefully....";
        http_response_code(201);
    } else {
        $arr['data'] = "User Sign in failed....";
    }
} else {
    $arr['error'] = "Only POST Method are allowed...";
}

echo json_encode($arr);
?>