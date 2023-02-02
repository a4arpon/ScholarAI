<?php
if (!isset($_COOKIE['uip'])) {
    header('location:../auth/login.php');
} elseif (isset($_COOKIE['uip'])) {
    $local_uip = $_COOKIE['uip'];
    // Check Server UIP
    $check_sql = "SELECT * FROM `users` WHERE `uip`='$local_uip'";
    $check_qry = $con->query($check_sql);
    if ($check_qry->num_rows == 1) {
        $user = $check_qry->fetch_assoc();
        if ($user['group']>0) {
            
        } else {
            header("location:./unauthorize.php?user_error=no_package");
        }
        
    } else {
        setcookie("uip", $uip, time() - (86400 * 90), "/");
        header('location:../auth/login.php');
    }

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