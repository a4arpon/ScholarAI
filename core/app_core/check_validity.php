<?php
// Get Data From Server
$get_data_from_validity = $con->query("SELECT * FROM `payment_track` WHERE `email`='$user_email' AND `uid`='$user_id'");
if ($get_data_from_validity->num_rows == 1) {
    $validity_data = $get_data_from_validity->fetch_assoc();
    $validity_starting_time = $validity_data['starting_time'];
    $validity_end_time = $validity_data['end_time'];
    $validity_targeted_time = $validity_end_time - $validity_starting_time;
    $validity_current_time = time() - $validity_data['starting_time'];
    if ($validity_current_time < $validity_targeted_time) {
        // Engine Loader
        $user_group = $user['group'];
        $select_engine = $con->query("SELECT * FROM `openai_engines` WHERE `id`='$user_group'");
        if ($select_engine->num_rows == 1) {
            $engine = $select_engine->fetch_assoc();
            $engine_key = $engine['api_key'];
        } else {
            header("location:./unauthorize.php?user_error=engine_not_found");
        }

    } else {
        header("location:./unauthorize.php?user_error=expired_package");
    }

} else {
    header("location:./unauthorize.php?user_error=account_dual");
}

?>