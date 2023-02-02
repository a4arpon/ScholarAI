<?php
include('../core/db.php'); 
include('../core/app_core/check_auth.php'); 
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
    <div class="container py-5">
        <div class="row">
            <div class="col-md-8">
                <div class="card bg-secondary-dark border-3">
                    <div class="card-header">
                        <h1 class="">ScholarAI QNA</h1>
                    </div>
                    <div class="card-body overflow-y-scroll output-box">
                        <div id="prompt-text d-none"></div>
                        <div id="response-text d-none"></div>
                    </div>
                    <div class="card-footer">
                        <div class="input-group">
                            <input type="text" class="form-control p-3" id="prompt_input" required
                                placeholder="Ask any question here....">
                            <button class="btn btn-primary" onclick="nulls()"><i
                                    class="bi bi-question fs-2"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
    <?php include('../core/app_core/generate.php'); ?>
    <script src="../res/bs/js/bootstrap.bundle.min.js"></script>
</body>

</html>