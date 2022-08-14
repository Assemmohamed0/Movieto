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
    // $ActorPicture = $_POST['ActorPicture'];
    $Picturename = $_FILES["ActorPicture"]["name"];
    $tempname = $_FILES["ActorPicture"]["tmp_name"];
    $folder = "images/" . $Picturename;
    $ActorName = $_POST['ActorName'];
    $ActorGender = $_POST['ActorGender'];
    $ActorAge = $_POST['ActorAge'];
    $ActorDescription = $_POST['ActorDescription'];

    $sql = "INSERT INTO actor (ActorName, ActorPicture, ActorDescription, ActorGender, ActorAge)
    VALUES ('$ActorName', '$Picturename', \"$ActorDescription\", '$ActorGender', '$ActorAge')";

    if ($conn->query($sql) === TRUE) {
        if (is_uploaded_file($_FILES['ActorPicture']['tmp_name']))
          {  
            move_uploaded_file($_FILES['ActorPicture']['tmp_name'], $folder);

            header('Location: showActors.php');
          }
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }


  }


  $conn->close();
?>