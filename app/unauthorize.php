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
    <div class="container py-5">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <?php
                if (!isset($_GET['user_error'])) {
                    header("location:./index.php");
                } elseif (isset($_GET['user_error'])) {
                    $error = $_GET['user_error'];
                    if ($error == "no_package") {
                        ?>
                        <div class="alert alert-primary p-5 border-2 text-justify">
                            <h2>
                                Please wait while until we approve your account.
                            </h2>
                        </div>
                    <?php
                    } elseif ($error == "expired_package") {
                        ?>
                        <div class="alert alert-warning p-5 border-2 text-justify">
                            <h2>
                                Your ScholarAI account has expired, please recharge. <a href="./recharge.php">Click to recharge.</a>
                            </h2>
                        </div>
                    <?php
                    } elseif ($error == "account_suspected") {
                        ?>
                        <div class="alert alert-warning p-5 border-2 text-justify">
                            <h2>
                                Your account has been paused due to suspicious login or activity. Feel free to discuss this
                                matter with us as soon as possible. Then we will take some action regarding it soon.
                            </h2>
                        </div>
                    <?php
                    } elseif ($error == "account_suspend") {
                        ?>
                        <div class="alert alert-danger p-5 border-2 text-justify">
                            <h2>
                                Your account has been suspended as you have violated our policy despite multiple warnings. You
                                are requested to contact us soon.
                            </h2>
                        </div>
                    <?php
                    } else {
                        ?>
                        <div class="alert alert-info p-5 border-2 text-justify">
                            <h2>
                                Unknown Error
                            </h2>
                        </div>
                    <?php
                    }

                }

                ?>
            </div>
            <div class="col-md-2"></div>
        </div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 text-center">
                <div class="fs-1">
                    <span class="fs-4">©2023 Copyright</span> ScholarAI
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</body>

</html>