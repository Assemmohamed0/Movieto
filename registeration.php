
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registeration</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>  

    <div class="container-fluid py-4 row vh-100">
        <?php include 'asideLoginRegister.php';?>
        <form class="d-flex align-items-center py-5 col-lg-9" action="homeRegister.php" method="POST">
            <div class="w-75 mx-auto inputs" >
                <h2 class="font-weight-bold text-center">Registration form</h2>

                <div class="form-group py-2">
                    <label>First Name</label>
                    <input id="firstName" name="firstName" class="form-control" type="text">
                    <div id="firstNameError" class="alert alert-danger my-2 d-none" role="alert">
                        Your First Name is Not Valid *no spaces*!
                    </div>
                </div>
                <div class="form-group py-2">
                    <label>Last Name</label>
                    <input id="lastName" name="lastName" class="form-control" type="text">
                    <div id="lastNameError" class="alert alert-danger my-2 d-none" role="alert">
                        Your Last Name is Not Valid *no spaces*!
                    </div>
                </div>
                <div class="form-group py-2">
                    <label>Email</label>
                    <input id="email" name="email" class="form-control" type="email">
                    <div id="emailError" class="alert alert-danger my-2 d-none" role="alert">
                        Enter Valid Email *ex: lorem@gmail.com*!
                    </div>
                </div>
                <div class="form-group py-2">
                    <label>Phone</label>
                    <input id="phone" name="phone" class="form-control" type="number">
                    <div id="phoneError" class="alert alert-danger my-2 d-none" role="alert">
                        Enter Valid Phone Number *Egyptian Numbers*!
                    </div>
                </div>
                <div class="form-group py-2">
                    <label>Password</label>
                    <input id="password" name="password" class="form-control" type="password">
                    <div id="passwordError" class="alert alert-danger my-2 d-none" role="alert">
                        Enter Valid Password *minimum 8 letters or numbers but should contains at least one letter and one number*!
                    </div>
                </div>
                <button id="submitBtn" type="submit" class="btn btn-primary">Register</button>
            </div>
            
        </form>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.5.0.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>





