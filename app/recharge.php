<?php
include('../core/db.php');
if (!isset($_COOKIE['uip']) && !isset($_COOKIE['ukey'])) {
    header('location:../auth/login.php');
} elseif (isset($_COOKIE['uip']) && isset($_COOKIE['ukey'])) {
    $local_uip = $_COOKIE['uip'];
    $uKey = $_COOKIE['ukey'];
    // Check Server UIP
    $check_sql = "SELECT * FROM `users` WHERE `uip`='$local_uip' AND `auth_key`='$uKey'";
    $check_qry = $con->query($check_sql);
    if ($check_qry->num_rows == 1) {
        $user = $check_qry->fetch_assoc();
        if ($user['group'] > 0) {
            // User Email and ID here for validity reason
            $user_id = $user['id'];
            $user_email = $user['email'];
        } else {
            header("location:./unauthorize.php?user_error=no_package");
        }
    } else {
        setcookie("uip", $uip, time() - (86400 * 90), "/");
        setcookie("ukey", $uip, time() - (86400 * 90), "/");
        header('location:../auth/login.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../res/bs/css/bootstrap.min.css">
    <link rel="stylesheet" href="../res/bs/icons/bootstrap-icons.css">
    <link rel="stylesheet" href="../res/style.css">
    <title>ScholarAI - AI Based Student Access</title>
</head>

<body data-bs-theme="dark">
    <div class="container d-flex align-items-center justify-content-center" style="min-height: 100vh;">
        <div class="col-md-4"></div>
        <div class="col-md-4 my-3">
            <div class="card border-3 rounded-0 bg-secondary-dark">
                <div class="card-header">
                    <h1 class="text-center">ScholarAI</h1>
                </div>
                <div class="card-body">
                    <form action="../core/auth_core/signup_core.php" method="post">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" placeholder="Your Name" name="name">
                            <label for="floatingInput">Your Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
                            <label for="floatingInput">Your Email</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" id="floatingInput" placeholder="Your Phone" name="phone">
                            <label for="floatingInput">Your Phone</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" placeholder="Your Institute Name" name="institute">
                            <label for="floatingInput">Your Institute Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="pwd">
                            <label for="floatingPassword">Set Password</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="floatingPassword" placeholder="TrxID" name="trxid">
                            <label for="floatingPassword">Enter TrxID</label>
                        </div>
                        <button class="btn btn-primary w-100 fw-bolder">Signup</button>
                    </form>
                </div>

                <div class="card-footer">
                    <p class="m-0 p-0">This payment gateway is powered by <a href="https://blacktelesope.xyz" target="_blank">Black Telescope</a></p>
                </div>
            </div>
        </div>
        <div class="col-md-4"></div>
    </div>

    <script src="../res/bs/js/bootstrap.bundle.min.js"></script>
</body>

</html>