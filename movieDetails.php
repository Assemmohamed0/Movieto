<?php
  session_start();
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "moviedb";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $MovieID = $_GET['movieId'];
  $sql = "SELECT MovieName, MoviePicture, MovieType, movieRating, Description_Movie,ReleaseDate,RegisterDate FROM movie where MovieID = $MovieID" ;
  $result = $conn->query($sql);

  $movieActorsSql = "SELECT actor_movie.ActorID, ActorName FROM actor, actor_movie WHERE actor.ActorID=actor_movie.ActorID and MovieId = $MovieID";
  $movieActorsResult = $conn->query($movieActorsSql);

  if ($result->num_rows > 0) {
    // $getUsername=$conn->query("SELECT Fname,Lname,UserRole FROM user where email = '$email'");
    $row = $result->fetch_assoc();
  }else{
    header('Location: home.php');
  }


  $conn->close();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="Stylesheet" href="css/all.min.css" />
      <link rel="stylesheet" href="css/bootstrap.min.css" />
      <link rel="stylesheet" href="css/style.css" />
      <title>Movie Details</title>
  </head>
  <body>

    <div class="container-fluid py-4"> 
        <div class="row">
          <?php include 'aside.php';?>
          <div class="col-lg-9 content">
              <div class="container w-100 pt-3 pb-3 ms-auto me-auto">
                <div class="col-7 pe-3 ps-3 w-100">
                  <div class="main_title d-flex flex-row justify-content-start align-items-center flex-wrap mb-3 pb-2 mt-3">
                        <h3 class="m-1 p-1 fw-bolder lh-1">Movie Details:</h3>
                  </div>
                </div>

                <!-- Movie Details -->
                <section class="mt-4 mb-5 row">
                  <div class="col-md-4">
                    <img class="img-fluid h-100" src="images/<?php echo $row["MoviePicture"]; ?>" alt="" />
                  </div>
                  <div class="p-4 col-md-8">
                    <h2 class="mb-4 text-capitalize"><?php echo $row["MovieName"]; ?></h2>
                    <span class="bg-info p-2 mx-2 rounded text-capitalize"><?php echo $row["MovieType"]; ?></span>
                    <div class="my-4">
                        <p class="lead"><span class="fw-bold">Rate:-</span> <?php echo $row["movieRating"]; ?> <i class="fa-solid fa-star text-warning"></i></p>
                        <p class="lead"><span class="fw-bold">Release Date:-</span> <?php echo $row["ReleaseDate"]; ?></p>
                        <p class="lead"><span class="fw-bold">Regiter Date:-</span> <?php echo $row["RegisterDate"]; ?></p>
                        <p class="lead text-muted"><span class="fw-bold text-white">Description:-</span> <?php echo $row["Description_Movie"]; ?></p>
                    </div>
                    <p class="lead Actors">
                      <span class="fw-bold">Actors:-</span>
                      
                      <?php foreach ($movieActorsResult as $movieActorRows) :?>
                        <a class="my-3" href="actorDetails.php?actorId=<?php echo $movieActorRows['ActorID']; ?>"><span class="bg-secondary p-2 mx-2 rounded actor-name"><?php echo $movieActorRows['ActorName']; ?> <i class="fa-solid fa-share"></i></span></a>
                      <?php endforeach;?>
                      
                    </p>
                  </div>
                </section>

              </div>
          </div>
        </div>
    </div>


  </body>
</html>