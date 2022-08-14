<?php
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
      $firstname = $_POST['firstName'];
      $lastname = $_POST['lastName'] ;
      $email = $_POST['email'];
      $phone = $_POST['phone'];
      $password = $_POST['password'];
      echo "<br> hi " . $firstname;
      $sql = "INSERT INTO User(Fname, Lname, email,phoneNumber,UserPassword,UserRole)
      VALUES ('$firstname', '$lastname', '$email', '$phone', '$password', '1')";

      // $sqlqu = "SELECT email, passwordUser from USER where email=$email and passwordUser=$password"
      
      if ($conn->query($sql) === TRUE) {
        header('Location: login.php');
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }

  }


  $conn->close();
?>