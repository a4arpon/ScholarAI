<?php
echo time();
echo "<br />";
echo time() + 86400 * 30;
echo "<br />";
echo (time() + (86400 * 30)) - time();
echo "<br />";

// Get Data From Server
$get_data_from_validity = $con->query("SELECT * FROM `payment_track` WHERE `email`='$user_email' AND `uid`='$user_id'");
if ($get_data_from->num_rows == 1) {
    $validity_data = $get_data_from_validity->fetch_assoc();
    
} else {
    header("location:./unauthorize.php?user_error=account_dual");
}

?>