<?php

    $errorMessage = "The email or password you entered is invalid";

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login Error</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <style>
            body {
                background-color: #131722;
                color:white;
                font-family: 'Montserrat Alternates', sans-serif;
            }

            .errorPage .alert {
                width: 600px;
            }
            
        </style>
    </head>
    <body>

        <section class="d-flex justify-content-center align-items-center vh-100 errorPage">
            <div>
                <div class="alert alert-danger text-center p-4" role="alert">
                    <?php echo $errorMessage?>
                </div>
                <div class="w-100 d-flex justify-content-center">
                <button class="btn btn-success"><a href="login.php" class="text-decoration-none text-white">Return To Login Page</a></button>
                </div>
            </div>

        </section>
        
    </body>
</html>