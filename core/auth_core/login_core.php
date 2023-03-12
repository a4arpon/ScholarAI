<?php
include('../db.php');
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    extract($_POST);
    $email = $con->real_escape_string($email);
    $uip = $con->real_escape_string(get_client_ip());
    // SQL Query
    $check_previous_user = $con->query("SELECT * FROM `users` WHERE `email`='$email'"); // Check Previous User
    if ($check_previous_user->num_rows == 1) {
        $user_log = $check_previous_user->fetch_assoc();
        $uid = $user_log['uid'];
        if (password_verify($pwd, $user_log['auth_key'])) {
            $ip_update = $con->query("UPDATE `users` SET `uip`='$uip' WHERE `uid`='$uid'");
            // Record User IP
            $record_ip = $con->query("INSERT INTO `ip_tracks`(`uid`, `uip`) VALUES ('$uid','$uip')");
            setcookie("uip", $uip, time() + (86400 * 90), "/"); // Set Cookies
            setcookie("ukey", $user_log['auth_key'], time() + (86400 * 90), "/"); // Set Cookies
            header("location:../../app/"); // Redirect User
        }else {
            echo "<h1>Password Incorrect</h1>";
        }
    } else {
        echo "<h1>User doesn't exists in this email account</h1>";
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