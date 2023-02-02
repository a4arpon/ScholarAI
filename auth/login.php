<?php
include('../core/db.php');
if (!isset($_COOKIE['uip'])) {
   
} elseif (isset($_COOKIE['uip'])) {
    header("location:../app/");
}?>
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
    <div class="container d-flex align-items-center justify-content-center" style="height: 100vh;">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="card border-3 rounded-0 bg-secondary-dark">
                <div class="card-header">
                    <h1 class="text-center">ScholarAI</h1>
                </div>
                <div class="card-body">
                    <form action="../core/auth_core/login_core.php" method="post">
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com"
                                name="email">
                            <label for="floatingInput">Email address</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="floatingPassword" placeholder="Password"
                                name="pwd">
                            <label for="floatingPassword">Password</label>
                        </div>
                        <button class="btn btn-primary w-100 fw-bolder">Login</button>
                    </form>
                </div>
                <div class="card-footer">
                    <p class="m-0 p-0">Don't have any account? <a href="./signup.php">Click To Signup</a></p>
                </div>
            </div>
        </div>
        <div class="col-md-4"></div>
    </div>
    <script src="../res/bs/js/bootstrap.bundle.min.js"></script>
</body>

</html>