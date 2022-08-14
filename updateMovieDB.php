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

  if(isset($_POST['update'])){
    $MovieID = $_POST['MovieID'];
    $PicturenameMovie = $_FILES["MoviePicture"]["name"];
    $tempname = $_FILES["MoviePicture"]["tmp_name"];
    $folder = "images/" . $PicturenameMovie;
  
    if($PicturenameMovie == "")
    {
      $query = "UPDATE `movie` SET MovieName = '$_POST[Moviename]' , MovieType = '$_POST[Movietype]' , MovieRating = '$_POST[MovieRating]' , Description_Movie = \"$_POST[Description]\" , ReleaseDate = '$_POST[Movie_Date]' where MovieID = '$MovieID'";
    }
    else
    {
      $query = "UPDATE `movie` SET MovieName = '$_POST[Moviename]' , MoviePicture = '$PicturenameMovie' , MovieType = '$_POST[Movietype]' , MovieRating = '$_POST[MovieRating]' , Description_Movie = \"$_POST[Description]\" , ReleaseDate = '$_POST[Movie_Date]' where MovieID = '$MovieID'";
    }

    $runQuery = $conn->query($query);
    
    if($runQuery){
      
      if (is_uploaded_file($_FILES['MoviePicture']['tmp_name']))
      {
        move_uploaded_file($_FILES['MoviePicture']['tmp_name'], $folder);

        header('Location: showMovies.php');
      }
    }else{
      echo '<script type="text/javascript">alert("Data not updated")</script>';
    }

    header('Location: showMovies.php');
  }




  $conn->close();
?>















