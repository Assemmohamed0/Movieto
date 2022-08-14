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

  $actorID = $_GET['actorId'];
  $sql = "SELECT ActorName, ActorPicture, ActorDescription, ActorGender, RegisterDate, ActorAge FROM actor where ActorID = $actorID" ;
  $result = $conn->query($sql);

  $movieActorsSql = "SELECT actor_movie.MovieID, MovieName FROM movie, actor_movie WHERE movie.MovieID=actor_movie.MovieID and ActorID = $actorID";
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
      <title>Actor Details</title>
  </head>
  <body>

    <div class="container-fluid py-4"> 
        <div class="row">
          <?php include 'aside.php';?>
          <div class="col-lg-9 content">
              <div class="container w-100 pt-3 pb-3 ms-auto me-auto">
                <div class="col-7 pe-3 ps-3 w-100">
                  <div class="main_title d-flex flex-row justify-content-start align-items-center flex-wrap mb-3 pb-2 mt-3">
                        <h3 class="m-1 p-1 fw-bolder lh-1">Actor Details:</h3>
                  </div>
                </div>



                <section class="mt-4 mb-5 row">
                  <div class="col-md-4">
                    <img class="img-fluid h-100" src="images/<?php echo $row["ActorPicture"]; ?>" alt="" />
                  </div>
                  <div class="p-4 col-md-8">
                    <h2 class="mb-4 text-capitalize"><?php echo $row["ActorName"]; ?></h2>
                    <div class="my-4">
                        <p class="lead"><span class="fw-bold">Gender:-</span> <?php echo $row["ActorGender"]; ?></p>
                        <p class="lead"><span class="fw-bold">Age:-</span> <?php echo $row["ActorAge"]; ?></p>
                        <p class="lead"><span class="fw-bold">Regiter Date:-</span> <?php echo $row["RegisterDate"]; ?></p>
                        <p class="lead text-muted"><span class="fw-bold text-white">Description:-</span> <?php echo $row["ActorDescription"]; ?></p>
                    </div>
                    <p class="lead Movies">
                      <span class="fw-bold">Movies:-</span>
                      
                      <?php foreach ($movieActorsResult as $movieActorRows) :?>
                        <a href="movieDetails.php?movieId=<?php echo $movieActorRows['MovieID']; ?>"><span class="bg-secondary p-2 mx-2 rounded actor-name"><?php echo $movieActorRows['MovieName']; ?> <i class="fa-solid fa-share"></i></span></a>
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