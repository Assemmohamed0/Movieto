<?php

  session_start();
  if(!isset($_SESSION['firstName']))
  {
      header('Location: login.php');
      die("you are not registered");
  }
  
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

  $Highest_rated = "SELECT MovieRating, MoviePicture , MovieName , MovieID FROM movie WHERE MovieRating = (SELECT MAX(MovieRating) FROM movie);"  ;
  $Lowest_rated = "SELECT MovieRating, MoviePicture , MovieName , MovieID FROM movie WHERE MovieRating = (SELECT MIN(MovieRating) FROM movie);"  ;
  $count_Movie = "SELECT Count(MovieID)FROM movie";
  $Latest_Movie = "SELECT MovieID, MovieName, MoviePicture, ReleaseDate, ReleaseDate-CURDATE()  FROM movie WHERE ReleaseDate-CURDATE()= (SELECT MIN(ReleaseDate-CURDATE()) FROM movie WHERE ReleaseDate-CURDATE()>0);";
  $result_HighestRating = $conn->query($Highest_rated);
  $result_LowestRating =  $conn->query($Lowest_rated);
  $result_countMovie =  $conn->query($count_Movie);
  $result_LatestMovie =  $conn->query($Latest_Movie);

  if ($result_HighestRating->num_rows > 0) {
    // $getUsername=$conn->query("SELECT Fname,Lname,UserRole FROM user where email = '$email'");
    $row_result_HighestRating = $result_HighestRating->fetch_assoc();
    
    
    
  }
  if($result_LowestRating->num_rows > 0)
  {
    $row_result_LowestRating = $result_LowestRating->fetch_assoc();
  }
  if($result_countMovie->num_rows > 0)
  {
    $row_result_countMovie = $result_countMovie->fetch_assoc();
  }
  if($result_LatestMovie->num_rows > 0)
  {
    $row_result_LatestMovie = $result_LatestMovie->fetch_assoc();
  }
  
  
  

  $conn->close();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>


<div class="container-fluid py-4"> 
     <div class="row">
     <?php include 'aside.php';?>
     <div class="col-lg-9 content">
        
     
     <div class="main">
        <div class="container w-100 pt-3 pb-3 ms-auto me-auto">
          <div class="col-12 pe-3 ps-3 w-100">
            <div
              class="main_title d-flex flex-row justify-content-start align-items-center flex-wrap mb-3 pb-2 mt-3"
            >
              <h3 class="m-1 p-1 fw-bolder lh-1">Home</h3>
            </div>
          </div>
          <div class="row">

          <?php if($result_HighestRating->num_rows == 0 && $result_LowestRating->num_rows == 0 && $result_LatestMovie->num_rows == 0 && $result_countMovie->num_rows == 0) : ?>
            <h2 class="text-center alert alert-danger">No Data Yet!!</h2>
          <?php endif; ?>

            <?php if($result_HighestRating->num_rows > 0) : ?>
            <a href='movieDetails.php?movieId=<?php echo $row_result_HighestRating['MovieID']; ?>'>
              <div class="col-md-6 col-lg-12 pt-3 pb-3" >
                <div
                  class="stats d-flex justify-content-center flex-column align-items-start p-3 position-relative"

                >
                  <span class="fs-6 mb-2 fw-bold d-block"
                    >Highest rated movie</span
                  >
                  <p class="fs-2 fw-bold m-0"><?php  echo $row_result_HighestRating["MovieRating"]; ?><i class="fa-solid fs-4 ms-2 fa-star text-warning"></i></p>
                  <p class="fs-2 fw-bold m-0"><?php  echo $row_result_HighestRating["MovieName"]; ?></p>
                  <img
                    src="images/<?php echo $row_result_HighestRating["MoviePicture"]; ?>"
                    id="image_form"
                    alt=""
                    class="m-auto position-absolute end-0 h-100"
                  />
                </div>
              </div>
            </a>
            <?php endif; ?>

            <?php if($result_LowestRating->num_rows > 0) : ?>
            <a href='movieDetails.php?movieId=<?php echo $row_result_LowestRating['MovieID']; ?>'>
              <div class="col-md-6 col-lg-12 pt-3 pb-3">
                <div
                  class="stats d-flex justify-content-center flex-column align-items-start p-3 position-relative"
                >
                  <span class="fs-6 mb-2 fw-bold d-block"
                    >Lowest rated movie</span
                  >
                  <p class="fs-2 fw-bold m-0"><?php  echo $row_result_LowestRating["MovieRating"]; ?><i class="fa-solid fa-star ms-2 fs-4 text-warning"></i></p>
                  <p class="fs-2 fw-bold m-0"><?php  echo $row_result_LowestRating["MovieName"]; ?></p>
                  <img
                    src="images/<?php echo $row_result_LowestRating["MoviePicture"]; ?>"
                    id="image_form"
                    alt=""
                    class="m-auto position-absolute end-0 h-100"
                  />
                </div>
              </div>
            </a>
            <?php endif; ?>

            <?php if($result_LatestMovie->num_rows > 0) : ?>
            <a href='movieDetails.php?movieId=<?php echo $row_result_LatestMovie['MovieID']; ?>'>
              <div class="col-md-6 col-lg-12 pt-3 pb-3">
                <div
                  class="stats d-flex justify-content-center flex-column align-items-start p-3 position-relative"
                >
                  <span class="fs-6 mb-2 fw-bold d-block"
                    >Coming Soon</span
                  >
                  <p class="fs-2 fw-bold m-0"><?php  echo $row_result_LatestMovie["MovieName"]; ?></p>
                  <p class="fs-2 fw-bold m-0"><?php  echo $row_result_LatestMovie["ReleaseDate"]; ?></p>

                  <img
                    src="images/<?php echo $row_result_LatestMovie["MoviePicture"]; ?>"
                    id="image_form"
                    alt=""
                    class="m-auto position-absolute end-0 h-100"
                  />
                </div>
              </div>
            </a>
            <?php endif; ?>

            <div class="col-md-6 col-lg-6 pt-3 pb-3 offset-2">
              <div
                class="stats d-flex justify-content-center flex-column align-items-start p-3 position-relative"
              >
                <span class="fs-6 mb-2 fw-bold d-block"
                  >Number of Movies</span
                >
                <p class="fs-2 fw-bold m-0"><?php  echo $row_result_countMovie["Count(MovieID)"]; ?> </p>
                <i class="fa-solid fa-film fs-2 position-absolute"></i>
              </div>
            </div>


          </div>
        </div>

     </div>



     </div>

     </div>
</div>

<script src="js/all.min.js"></script>
</body>
</html>