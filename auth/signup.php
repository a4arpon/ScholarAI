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
                    <form action="" method="post">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" placeholder="Your Name">
                            <label for="floatingInput">Your Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                            <label for="floatingInput">Your Email</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" id="floatingInput" placeholder="Your Phone">
                            <label for="floatingInput">Your Phone</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Set Password</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="floatingPassword" placeholder="TrxID">
                            <label for="floatingPassword">Enter TrxID</label>
                        </div>
                        <button class="btn btn-primary w-100 fw-bolder">Signup</button>
                    </form>
                </div>
                <div class="card-footer">
                    <p class="m-0 p-0">Already have an account? <a href="./login.php">Click To Login</a></p>
                </div>
            </div>
        </div>
        <div class="col-md-4"></div>
    </div>

    <script src="../res/bs/js/bootstrap.bundle.min.js"></script>
</body>

</html>