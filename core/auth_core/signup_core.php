<?php
include('../db.php');
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    extract($_POST);
    $name = $con->real_escape_string($name);
    $email = $con->real_escape_string($email);
    $phone = $con->real_escape_string($phone);
    $institute = $con->real_escape_string($institute);
    $pwd = $con->real_escape_string($pwd);
    $trxid = $con->real_escape_string($trxid);
    $uip = $con->real_escape_string(get_client_ip());
    // Auth Key Gen
    $auth_key = $con->real_escape_string(password_hash($pwd, PASSWORD_DEFAULT));
    // SQL Query
    $check_previous_user = $con->query("SELECT * FROM `users` WHERE `email`='$email'"); // Check Previous User
    if ($check_previous_user->num_rows < 1) {
        // Insert New User
        $SQL = "INSERT INTO `users`(`uip`,`name`, `email`, `phone`, `institute`, `auth_key`, `trxid`) VALUES ('$uip','$name','$email','$phone','$institute','$auth_key','$trxid')";
        $Query = $con->query($SQL);
        if ($Query == true) {
            setcookie("uip", $uip, time() + (86400 * 90), "/"); // Set Cookies
            header("location:../../app/"); // Redirect User
        } else {
            echo ("Signup Error");
        }
    } else {
        echo "User exists in this email account";
    }


} else {
    echo ("Unauthorize Method");
}
function get_client_ip()
{
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if (isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if (isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if (isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if (isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}
?>