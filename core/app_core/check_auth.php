<?php
// Check if user is logged in
if (!isset($_COOKIE['uip']) && !isset($_COOKIE['ukey'])) {
    header('location:../auth/login.php');
} elseif (isset($_COOKIE['uip']) && isset($_COOKIE['ukey'])) {
    // Get user's IP and auth key
    $local_uip = $_COOKIE['uip'];
    $uKey = $_COOKIE['ukey'];

    // Query the database to check if the user is authenticated
    $check_sql = "SELECT * FROM `users` WHERE `uip`='$local_uip' AND `auth_key`='$uKey'";
    $check_qry = $con->query($check_sql);

    // If user is authenticated, check if they have a valid package
    if ($check_qry->num_rows == 1) {
        $user = $check_qry->fetch_assoc();
        if ($user['Ugroup'] > 0) {
            // If the user has a valid package, include a validity check
            $user_id = $user['uid'];
            $user_email = $user['email'];
            include('../core/app_core/check_validity.php');
        } else {
            // If the user does not have a valid package, redirect to an unauthorized page
            header("location:./unauthorize.php?user_error=no_package");
        }
    } else {
        // If the user is not authenticated, delete their cookies and redirect to login page
        setcookie("uip", $uip, time() - (86400 * 90), "/");
        setcookie("ukey", $uip, time() - (86400 * 90), "/");
        header('location:../auth/login.php');
    }
}

// Get client IP address
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