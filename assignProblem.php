<?php

    
    session_start();
    if(!isset($_SESSION['firstName']))
    {
        header('Location: login.php');
        die("you are not registered");
    }
    else if($_SESSION['userRole']=='User')
    {
        header('Location: home.php');
        die("you are not Authorized");
    }
    $errorMessage = "You Assigned an Actor to a Movie for the Second Time!";

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
                    <button class="btn btn-success"><a href="assign.php" class="text-decoration-none text-white">Return To Assign Page</a></button>
                </div>
            </div>

        </section>
        
    </body>
</html>