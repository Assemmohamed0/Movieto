<?php
    session_start();
    if(!isset($_SESSION['firstName']))
    {
        header('Location: login.php');
        die("you are not registered");
    }

    $serverName = "localhost";
    $userName = "root";
    $password = "";
    $dbName = "movieDB";

    $conn = new mysqli($serverName , $userName , $password , $dbName);

    if($conn->connect_error)
    {
        die("Connection Failed " . $conn->connect_error);
    }

    $sqlQuery = "SELECT MovieID, MovieName, MovieType, MovieRating, RegisterDate, MoviePicture  FROM  movie";
    $result = $conn->query($sqlQuery);

    // if($result->num_rows <= 0)
    // {
    //     echo "0 Results";
    // }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Movies</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
    <body>

        <section class="show-table container-fluid py-4"> 
            <div class="row">
                <?php include 'aside.php';?>
                <div class="col-lg-9 content">
                    
                    <table class="table text-white">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Type</th>
                                <th scope="col">Rating</th>
                                <th scope="col">Register Date</th>
                                <th scope="col">Picture</th>
                                <?php if($_SESSION['userRole']=='Admin') : ?>
                                    <th scope="col">Actions</th>
                                <?php endif; ?>
                                
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">

                        <?php foreach ($result as $rows) :?>
                            
                                <tr onclick="window.location.href='movieDetails.php?movieId=<?php echo $rows['MovieID']; ?>'">
                                <th scope="row"><?php echo $rows["MovieID"]; ?></th>
                                <td><?php echo $rows["MovieName"]; ?></td>
                                <td><?php echo $rows["MovieType"]; ?></td>
                                <td><i class="fa-solid fa-star text-warning"></i><?php echo $rows["MovieRating"]; ?></td>
                                <td><?php echo $rows["RegisterDate"]; ?></td>
                                <td><img class="table-img" src="images/<?php echo $rows["MoviePicture"]; ?>"></td>
                                <?php if($_SESSION['userRole']=='Admin') : ?>
                                
                                    <td><div class="action position-relative">
                                    <a href="editMovie.php?movieId=<?php echo $rows['MovieID'] ?>"><i class="fa-solid fa-pen-to-square text-warning px-1"></i></a>
                                    <a href="deleteMovie.php?movieId=<?php echo $rows['MovieID'] ?>"><i class="fa-solid fa-trash-can delete text-danger px-1" ></i></a>
                                    </div></td>
                                    <?php endif; ?>
                                
                            </tr>
                            
                            
                            <?php endforeach;?>

                        </tbody>
                    </table>
                
                </div>
            </div>
        </section>
    </body>
</html>



<?php


$conn->close();

?>