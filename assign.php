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
    $serverName = "localhost";
    $userName = "root";
    $password = "";
    $dbName = "movieDB";

    $conn = new mysqli($serverName , $userName , $password , $dbName);

    if($conn->connect_error)
    {
        die("Connection Failed " . $conn->connect_error);
    }

    $ActorQuery = "SELECT ActorID, ActorName  FROM  actor";
    $ActorResult = $conn->query($ActorQuery);

    $MovieQuery = "SELECT MovieID, MovieName  FROM  movie";
    $MovieResult = $conn->query($MovieQuery);
    // if($result->num_rows <= 0)
    // {
    //     echo "0 Results";
    // }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assign</title>
    <link rel="Stylesheet" href="css/all.min.css" />
      <link rel="stylesheet" href="css/bootstrap.min.css" />
      <link rel="stylesheet" href="css/style.css" />
</head>
<body>
    <div class="container-fluid py-4 assign"> 
        <div class="row">
            <?php include 'aside.php';?>
            <div class="col-lg-9 content">
            <div class="pe-3 ps-3 w-100">
                <div
                class="main_title d-flex flex-row justify-content-start align-items-center flex-wrap mb-3 pb-2 mt-3"
                >
                <h3 class="m-1 p-1 fw-bolder lh-1">Assign Actor to Movie</h3>
                </div>
            </div>
                <div class=" h-75 d-flex align-items-center">
                    <form class="w-100" action="assignDB.php" method="post">
                    <div class="container d-flex justify-content-around ">
                        <div class="form-floating">
                            <p>Choose Actor:-</p>
                            <select name="ActorId" required class="form-select py-0" id="floatingSelect" aria-label="Floating label select example">
                            <option value="" disabled selected>Choose an Actor:-</option>
                            <?php foreach ($ActorResult as $actorRows) :?>
                                <option required value="<?php echo $actorRows["ActorID"]; ?>"><?php echo $actorRows["ActorID"]; ?>- <?php echo $actorRows["ActorName"]; ?></option>
                            <?php endforeach;?>
                            </select>
                        </div>
                        <div class="form-floating">
                            <p>Choose Movie:-</p>
                            <select name="MovieId" required class="form-select py-0" id="floatingSelect" aria-label="Floating label select example">
                            <option value="" disabled selected>Choose a Movie:-</option>
                            <?php foreach ($MovieResult as $movieRows) :?>
                                <option required value="<?php echo $movieRows["MovieID"]; ?>"><?php echo $movieRows["MovieID"]; ?>- <?php echo $movieRows["MovieName"]; ?></option>
                            <?php endforeach;?>
                            </select>
                        </div>
                    </div>
                    <p class="text-center text-danger my-2">Please Make Sure Not to Assign the same Actor to the same Movie Two Times</p>
                    <div class="d-flex justify-content-center my-4">
                        <button class="btn btn-success py-2 px-4" type="submit">Assign</button>
                    </div>
                    
                    </form>
                </div>
                
            </div>
        </div>
    </div>
</body>
</html>