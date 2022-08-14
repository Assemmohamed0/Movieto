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

    $movieId = $_GET['movieId'];

    $sql1 = "DELETE FROM actor_movie WHERE MovieID= $movieId";

    $sql2 = "DELETE FROM movie WHERE MovieId= $movieId" ;
   
    if ($conn->query($sql1) === TRUE && $conn->query($sql2) === TRUE) {
        header('Location: showMovies.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    

?>