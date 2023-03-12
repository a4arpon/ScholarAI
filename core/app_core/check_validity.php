<?php

// Query to get payment track data for the current user by email and UID
$get_data_from_validity = $con->query("SELECT * FROM `payment_track` WHERE `email`='$user_email' AND `uid`='$user_id'");

// Check if there's a single row in the result
if ($get_data_from_validity->num_rows == 1) {

    // Fetch the validity data
    $validity_data = $get_data_from_validity->fetch_assoc();

    // Get the starting time and end time of the validity period
    $validity_starting_time = $validity_data['starting_time'];
    $validity_end_time = $validity_data['end_time'];

    // Calculate the targeted time for the validity period
    $validity_targeted_time = $validity_end_time - $validity_starting_time;

    // Calculate the current time of the validity period
    $validity_current_time = time() - $validity_data['starting_time'];

    // Check if the current time is within the targeted time for the validity period
    if ($validity_current_time < $validity_targeted_time) {

        // Query to get the engine details for the user's group
        $user_group = $user['Ugroup'];
        $select_engine = $con->query("SELECT * FROM `openai_engines` WHERE `id`='$user_group'");

        // Check if there's a single row in the result
        if ($select_engine->num_rows == 1) {

            // Fetch the engine details
            $engine = $select_engine->fetch_assoc();

            // Get the engine's API key
            $engine_key = $engine['api_key'];
            $_SESSION['temp_key'] = $engine_key;
        } else {
            // Redirect the user to an unauthorize page with an error message
            header("location:./unauthorize.php?user_error=engine_not_found");
        }
    } else {
        // Redirect the user to an unauthorize page with an error message
        header("location:./unauthorize.php?user_error=expired_package");
    }
} else {
    // Redirect the user to an unauthorize page with an error message
    header("location:./unauthorize.php?user_error=account_dual");
}

?>