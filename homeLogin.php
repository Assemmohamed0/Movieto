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

  if($_SERVER['REQUEST_METHOD']  == 'POST')
  {
      $email = $_POST['email'];
      $password = $_POST['password'];

      $sql = "SELECT email , UserPassword FROM user where email = '$email' AND UserPassword = '$password'";
      // where email = $email AND passwordUser = $password
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        $getUsername=$conn->query("SELECT Fname,Lname,UserRole FROM user where email = '$email'");
        $row = $getUsername->fetch_assoc();
        $userFirstName = $row["Fname"];
        $userLastName = $row["Lname"];
        $userRole = $row["UserRole"];
        
        $_SESSION['firstName'] = $userFirstName;
        $_SESSION['lastName'] = $userLastName;
        if($userRole == 1)
        {
          $_SESSION['userRole'] = "User";
        }
        else if($userRole == 0)
        {
          $_SESSION['userRole'] = "Admin";
        }
        // echo $userFirstName;
        // echo "<br>";
        // echo $userLastName;
        header('Location: home.php');
      } else 
      {
        header('Location: loginProblem.php');
      }
  }


  $conn->close();
?>