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
        if ($user['Ugroup'] > 0) {
            // User Email and ID here for validity reason
            $user_id = $user['uid'];
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
    <title>Red Cap - AI Based Student Access</title>
</head>

<body data-bs-theme="dark">
    <div class="container d-flex align-items-center " style="min-height: 100vh;">
        <div class="row justify-content-between">
            <div class="col-md-4  mt-3">
                <div class="card border-3 rounded-0 bg-secondary-dark">
                    <div class="card-header">
                        <h3 class="text-center">Red Cap bKash Recharge</h3>
                    </div>
                    <div class="card-body bg-white text-black overflow-y-scroll" style="max-height: 600px;">
                        <img src="../res/bkash.jpg" alt="" class="img-fluid">

                        <h2 class="text-black">Step 1: Send Money</h2>
                        <ul>
                            <li>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Officiis, atque perspiciatis consectetur nemo quaerat voluptatibus cupiditate. Amet modi error deleniti.</li>
                            <li>Lorem ipsum dolor sit amet consectetur adipisicing elit.</li>
                            <li>Lorem ipsum dolor, sit amet consectetur adipisicing elit. </li>
                        </ul>
                        <h2 class="text-black">Step 2: Send Money</h2>
                        <ul>
                            <li>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Officiis, atque perspiciatis consectetur nemo quaerat voluptatibus cupiditate. Amet modi error deleniti.</li>
                            <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores rerum similique magnam fugit unde earum impedit distinctio natus. Tempora, perferendis.</li>
                            <li>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quis nobis adipisci omnis unde, voluptas labore! Pariatur rem esse officia. Placeat!</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mt-3">
                <div class="card border-3 rounded-0 bg-secondary-dark">
                    <div class="card-header">
                        <h1 class="text-center">Red Cap</h1>
                    </div>
                    <div class="card-body">
                        <form action="../core/auth_core/signup_core.php" method="post">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" readonly value="<?= $user['name'] ?>" id="floatingInput" placeholder="Your Name" name="name">
                                <label for="floatingInput">Your Name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" readonly value="<?= $user['email'] ?>" id="floatingInput" placeholder="name@example.com" name="email">
                                <label for="floatingInput">Your Email</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" readonly value="<?= $user['phone'] ?>" id="floatingInput" placeholder="Your Phone" name="phone">
                                <label for="floatingInput">Your Phone</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" readonly value="<?= $user['institute'] ?>" id="floatingInput" placeholder="Your Institute Name" name="institute">
                                <label for="floatingInput">Your Institute Name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="pwd">
                                <label for="floatingPassword">Enter Password</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingTrxID" placeholder="TrxID" name="trxid">
                                <label for="floatingTrxID">Enter TrxID</label>
                            </div>
                            <button class="btn btn-danger w-100 fw-bolder">Recharge</button>
                        </form>
                    </div>

                    <div class="card-footer">
                        <p class="m-0 p-0">This payment gateway is powered by <a href="https://blacktelesope.xyz" target="_blank">Black Telescope</a></p>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="../res/bs/js/bootstrap.bundle.min.js"></script>
</body>
</html>