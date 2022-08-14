<?php

    $urlPath = $_SERVER['REQUEST_URI'];

    if((strpos($urlPath, 'loginRegisterAside') !== false))
    {
        header('Location: home.php');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login and Register Aside.php</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <aside class="menu col-lg-3 position-relative d-flex align-items-center my-border-right">
        <div>
            <h1 class="text-warning m-1 p-3 fw-bolder">Movieto</h1>
            
            <div class="categories">
                <div class="text-decoration-none">
                    <div class="nav ms-3 mt-1">
                        <div class="navs d-grid fs-5">
                            <i class="fa-solid fa-pen-to-square <?= (strpos($urlPath, 'registeration') !== false) ? 'active' : ''?>"></i>
                        </div>
                        <div class="dashboard ms-3 text-uppercase">
                            <a class="<?= (strpos($urlPath, 'registeration') !== false) ? 'active' : ''?>" href="registeration.php">Register</a>
                        </div>
                    </div>
                </div>
                <div class="">
                    <div class="nav ms-3 mt-1 pt-2 ">
                        <div class="navs d-grid fs-5">
                            <i class="fa-solid fa-arrow-right-to-bracket <?= (strpos($urlPath, 'login') !== false) ? 'active' : ''?>"></i>
                        </div>
                        <div class="dashboard  ms-3 text-uppercase">
                            <a class="<?= (strpos($urlPath, 'login') !== false) ? 'active' : ''?>" href="login.php">Login</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="copy-right m-3">
            <div>&copy; 2022 - <span class="text-white"> <a href="https://github.com/Assemmohamed0" target="_blank">Assem Mohamed</a> & <a href="https://github.com/Ahmedsalahmohammed22" target="_blank">Ahmed Salah</a></span></div>
            </div>
        </div>
    </aside>
</body>
</html>