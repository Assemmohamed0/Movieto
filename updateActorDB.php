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
    $ActorID = $_POST['ActorID'];
    $Picturename = $_FILES["ActorPicture"]["name"];
    $tempname = $_FILES["ActorPicture"]["tmp_name"];
    $folder = "images/" . $Picturename;
  
    if($Picturename == "")
    {
      $query = "UPDATE `actor` SET ActorName = '$_POST[ActorName]' , ActorGender = '$_POST[ActorGender]' , ActorAge = '$_POST[ActorAge]' , ActorDescription = \"$_POST[ActorDescription]\"  where ActorID = $ActorID";
    }
    else
    {
      $query = "UPDATE `actor` SET ActorName = '$_POST[ActorName]' , ActorPicture = '$Picturename' , ActorGender = '$_POST[ActorGender]' , ActorDescription = \"$_POST[ActorDescription]\"  where ActorID = $ActorID";
    }

    $runQuery = $conn->query($query);
    
    if($runQuery){
      
      if (is_uploaded_file($_FILES['ActorPicture']['tmp_name']))
      {
        move_uploaded_file($_FILES['ActorPicture']['tmp_name'], $folder);

        header('Location: showActors.php');
      }
    }else{
      echo '<script type="text/javascript">alert("Data not updated")</script>';
    }

    header('Location: showActors.php');
  }


  $conn->close();
?>
