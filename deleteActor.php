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

    $actorID = $_GET['actorId'];

    $sql1 = "DELETE FROM actor_movie WHERE ActorID= $actorID";

    $sql2 = "DELETE FROM actor WHERE actorId= $actorID" ;
   
    if ($conn->query($sql1) === TRUE && $conn->query($sql2) === TRUE) {
        header('Location: showActors.php');
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
    
// header('Location: home.php')

?>