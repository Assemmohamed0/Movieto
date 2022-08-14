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

  if($_SERVER['REQUEST_METHOD']  == 'POST')
  {
      // $MoviePicture = $_POST['MoviePicture'];
      $PicturenameMovie = $_FILES["MoviePicture"]["name"];
      $tempname = $_FILES["MoviePicture"]["tmp_name"];
      $folder = "images/" . $PicturenameMovie;
      $MovieName = $_POST['MovieName'];
      $MovieType = $_POST['MovieType'] ;
      $MovieRating = $_POST['MovieRating'] ;
      $MovieReleaseDate = $_POST['MovieReleaseDate'];
      $MovieDescription = $_POST['MovieDescription'];

      $sql = "INSERT INTO movie (MovieName , MoviePicture , MovieType , MovieRating , ReleaseDate , Description_Movie)
      VALUES ('$MovieName', '$PicturenameMovie', '$MovieType', '$MovieRating', '$MovieReleaseDate', \"$MovieDescription\")";

      if ($conn->query($sql) === TRUE ) {
        if (is_uploaded_file($_FILES['MoviePicture']['tmp_name']))
        {
          move_uploaded_file($_FILES['MoviePicture']['tmp_name'], $folder);

          header('Location: showMovies.php');
        }
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }




  }


  $conn->close();

?>