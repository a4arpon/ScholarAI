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
                        <h1 class="">Red Cap ToolBox</h1>
                    </div>
                    <div class="card-body overflow-y-scroll output-box">
                        <div class="row row-cols-2 row-cols-md-3">
                            <div class="col p-2">
                                <a class="btn btn-primary h-100 w-100 py-4 fs-2 fw-bolder" href="./tool.php?type=blog-writer">Blog Write</a>
                            </div>
                            <div class="col p-2">
                                <a class="btn btn-primary h-100 w-100 py-4 fs-2 fw-bolder" href="./tool.php?type=blog-writer">YT Script</a>
                            </div>
                            <div class="col p-2">
                                <a class="btn btn-primary h-100 w-100 py-4 fs-2 fw-bolder" href="./tool.php?type=blog-writer">KeyWord Research</a>
                            </div>
                            <div class="col p-2">
                                <a class="btn btn-primary h-100 w-100 py-4 fs-2 fw-bolder" href="./tool.php?type=blog-writer">Copywriting</a>
                            </div>
                            <div class="col p-2">
                                <a class="btn btn-primary h-100 w-100 py-4 fs-2 fw-bolder" href="./tool.php?type=blog-writer">Social Post</a>
                            </div>
                            <div class="col p-2">
                                <a class="btn btn-primary h-100 w-100 py-4 fs-2 fw-bolder" href="./tool.php?type=blog-writer">Tagline</a>
                            </div>
                            <div class="col p-2">
                                <a class="btn btn-primary h-100 w-100 py-4 fs-2 fw-bolder" href="./tool.php?type=blog-writer">Paragraph Expand</a>
                            </div>
                            <div class="col p-2">
                                <a class="btn btn-primary h-100 w-100 py-4 fs-2 fw-bolder" href="./tool.php?type=blog-writer">Paragraph Shorten</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
    <script src="../res/bs/js/bootstrap.bundle.min.js"></script>
</body>

</html>