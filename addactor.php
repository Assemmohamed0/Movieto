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

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- bootstrap and font awesome  -->
        <link rel="Stylesheet" href="css/all.min.css" />
        <link rel="stylesheet" href="css/bootstrap.min.css" />
        <!-- font google  -->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&family=Roboto:wght@100;300;400;500&display=swap"
        rel="stylesheet"
        />
        <!-- style of page  -->
        <link rel="stylesheet" href="css/style.css" />
        <title>Add Actor</title>
    </head>
    <body>
        <div class="container-fluid py-4"> 
            <div class="row">
            <?php include 'aside.php';?>
            <div class="col-lg-9 content">
                <form class="main" action="insertActorData.php" method="POST" enctype="multipart/form-data">
                    <div class="container w-100 pt-3 pb-3 ms-auto me-auto">
                    <div class="col-7 pe-3 ps-3 w-100">
                        <div class="main_title d-flex flex-row justify-content-start align-items-center flex-wrap mb-3 pb-2 mt-3">
                            <h3 class="m-1 p-1 fw-bolder lh-1">Add Actor:</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-lg-4 col-12 pt-3 pb-3">
                            <div
                                class="image w-100 overflow-hidden pb-3 position-relative"
                                action="/action_page.php">
                                <label for="imageInput__form" class="position-absolute d-flex flex-row justify-content-center align-items-center top-0 bottom-0 m-0 fw-normal fs-5">Upload Cover</label>
                                <input
                                id="imageInput__form"
                                name="ActorPicture"
                                type="file"
                                accept="image/*"
                                class="position-absolute"
                                
                                required
                                />
                                <img
                                src=""
                                id="image_form"
                                alt=""
                                class="m-auto position-absolute w-100 h-100"
                                
                                />
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-7 pt-5 mt-5 pb-3">
                            <div class="title">
                                <input
                                id="ActorName__form"
                                name="ActorName"
                                type="text"
                                class="mb-2 fs-5 w-100 pe-3 ps-3 position-relative"
                                placeholder="Actor Name:-"
                                required
                                />
                            </div>
                            <div class="title mt-3">
                                <select name="ActorGender" required id = "ActorGender_form" class="form-select py-0" aria-label="Floating label select example">
                                    <option value="" disabled selected>Select Actor Gender</option>
                                    <option value="Male" required>Male</option>
                                    <option value="Female" required>Female</option>
                                </select>
                            </div>
                            <div class="title mt-3">
                                <input
                                id="ActorAge__form"
                                name="ActorAge"
                                type="number"
                                min="10"
                                max="120"
                                class="mb-2 fs-5 w-100 pe-3 ps-3 position-relative"
                                placeholder="Actor Age:-"
                                required
                                />
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12 pt-3 pb-3">
                            <div class="description">
                                <input
                                id="Description__form"
                                name="ActorDescription"
                                type="text"
                                class="mb-2 fs-5 w-100 pe-3 ps-3 position-relative"
                                placeholder="Actor Description:-"
                                required
                                />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input class="btn btn-primary w-25" type="submit" value="Submit"/>
                    </div>
                    </div>
                </form>
            </div>

            </div>
        </div>


        <script src="js/script_add(movie-actor-director).js"></script>
    </body>
</html>