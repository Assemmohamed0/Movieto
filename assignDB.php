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
    $ActorId = $_POST['ActorId'];
    $MovieId = $_POST['MovieId'] ;
    
    $sqlQuery = "INSERT INTO actor_movie (ActorId, MovieId)
    VALUES ('$ActorId', '$MovieId')";
    
    if ($conn->query($sqlQuery) === TRUE) {
      echo "New record created successfully";
      header('Location: assign.php');
    } else {
      header('Location: assignProblem.php');
    }

}


$conn->close();
?>
