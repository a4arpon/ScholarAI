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
    <title>Red Cap - AI Based Student Access</title>
</head>

<body data-bs-theme="dark">
    <div class="container py-5">
        <div class="row">
            <div class="col-md-8">
                <div class="card bg-secondary-dark border-3">
                    <div class="card-header">
                        <h1 class="">RedCap <span class="text-muted">ChatBeast</span></h1>
                    </div>
                    <div class="card-body overflow-y-scroll output-box" id="response_container">
                        <!-- <div class="prompt-text d-none"></div> -->
                        <!-- <div class="response-text d-none"></div> -->
                        <div class="alert alert-warning fs-4">
                            ChatBeast can generate answer under only 40 words.
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="input-group">
                            <input type="text" class="form-control p-3" id="prompt_input" required
                                placeholder="Ask any question here....">
                            <button class="btn btn-primary" onclick="triggerChat()" id="trigerButton"><i
                                    class="bi bi-question fs-2"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <?php include('./sidebar.php') ?>
            </div>
        </div>
    </div>
    <script src="../core/app_core/chat.js"></script>
    <script src="../res/bs/js/bootstrap.bundle.min.js"></>
</body >

</html >