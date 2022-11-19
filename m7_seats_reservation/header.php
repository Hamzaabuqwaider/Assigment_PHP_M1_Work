<?php

include './includes/function.php';
$user_session = get_user((int) $_SESSION['user_id']);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/style.css">
</head>

<body>

    <div class="container-fluid">
        <?php if (!strpos($_SERVER['SCRIPT_FILENAME'], 'index.php')) { ?>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="./home.php">Seats</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="./home.php">Home</a>
                            </li>
                            <?php if ($user_session['is_admin'] == 1) : ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="./create.php">Create seats</a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>

                    <div class="my-2 my-lg-0">
                        <a href="./logout.php" class="btn btn-danger my-2 my-sm-0">Logout</a>
                    </div>
                </div>
            </nav>
        <?php } ?>