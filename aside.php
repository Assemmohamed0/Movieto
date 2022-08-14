<?php


  $firstName = $_SESSION['firstName'];
  $lastName = $_SESSION['lastName'];
  $role = $_SESSION['userRole'];

  $urlPath = $_SERVER['REQUEST_URI'];

  if((strpos($urlPath, 'loginRegisterAside') !== false))
  {
      header('Location: home.php');
  }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Aside</title>
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <link rel="stylesheet" href="css/all.min.css">
      <link rel="stylesheet" href="css/style.css">
  </head>
  <body>

      <aside class="menu col-lg-3 position-relative my-border-right vh-100">
          <h1 class="text-warning m-1 p-3 fw-bolder">Movieto</h1>
        <div class="admin d-flex m-3 w-auto">
          <div class="icon fs-1 m-2">
            <i class="fa-solid fa-image-portrait"></i>
          </div>
          <div class="user mt-3">
            <span class=""><?php echo $role; ?></span>
            <h2 class="fs-5"><?php echo $firstName . " " . $lastName?></h2>
          </div>
          <a href="logout.php">
            <div class="log-out fs-4 p-1 m-3 border border-2 border-warning curs rounded-1 d-flex justify-content-center align-items-center position-absolute ms-4">
              <i class="fa-solid fa-arrow-right-from-bracket"></i>
            </div>
          </a>
        </div>

        <div  class="text-decoration-none">
          <div class="nav m-3">
            <div class="navs d-grid fs-5 <?= (strpos($urlPath, 'home') !== false) ? 'active' : ''?>">
              <i class="fa-solid fa-ellipsis first"></i>
              <i class="fa-solid fa-ellipsis second"></i>
              <i class="fa-solid fa-ellipsis third"></i>
            </div>
            <!-- <i class="fa-solid fa-chart-column navs d-grid fs-5 <?= (strpos($urlPath, 'home') !== false) ? 'active' : ''?>"></i> -->
            <div class="dashboard m-3 text-uppercase">
              <a href="home.php"><h6 class="<?= (strpos($urlPath, 'home') !== false) ? 'active' : ''?>" >Home</h6></a>
            </div>
          </div>
        </div>

        <div class="text-decoration-none ">
          <div class="nav ms-3 mt-1">
            <div class="navs d-grid fs-5">
              <i class="fa-solid fa-film <?= (strpos($urlPath, 'Movie') !== false) ? 'active' : ''?>"></i>
            </div>
            <div class="dashboard ms-3 text-uppercase">
              <a
                class="<?= (strpos($urlPath, 'Movie') !== false) ? 'active' : ''?>" 
                data-bs-toggle="collapse"
                href="#movie"
                role="button"
                aria-expanded="false"
                aria-controls="movie"
              >
                movies
              </a>
            </div>
          </div>
          <div class="collapse" id="movie">
            <div class="show-add card card-body">
              <ul class="collapse show">
                <a class="text-decoration-none <?= (strpos($urlPath, 'showMovies') !== false) ? 'active' : ''?>" href="showMovies.php"><li>Show movies</li></a>
                <?php if($_SESSION['userRole']=='Admin') : ?>
                      <a class="text-decoration-none <?= (strpos($urlPath, 'addMovie') !== false) ? 'active' : ''?>" href="addMovie.php"><li class="mt-2">Add movies</li></a>
                <?php endif; ?>
                
              </ul>
            </div>
          </div>
        </div>

        <div class="text-decoration-none ">
          <div class="nav ms-3 mt-1 pt-2">
            <div class="navs d-grid fs-5">
              <i class="fa-solid fa-users <?= (strpos($urlPath, 'Actor') !== false) ? 'active' : ''?>"></i>
            </div>
            <div class="dashboard ms-3 text-uppercase">
              <a
              class="<?= (strpos($urlPath, 'Actor') !== false) ? 'active' : ''?>"
                data-bs-toggle="collapse"
                href="#actor"
                role="button"
                aria-expanded="false"
                aria-controls="actor"
              >
                actors
              </a>
            </div>
          </div>
          <div class="collapse" id="actor">
            <div class="show-add card card-body">
              <ul class="collapse show">
                <a class="text-decoration-none <?= (strpos($urlPath, 'showActors') !== false) ? 'active' : ''?>" href="showActors.php"
                  ><li>Show actors</li></a
                >
                <?php if($_SESSION['userRole']=='Admin') : ?>
                      <a class="text-decoration-none <?= (strpos($urlPath, 'addActor') !== false) ? 'active' : ''?>" href="addActor.php"><li class="mt-2">Add actor</li></a>
                <?php endif; ?>
                
              </ul>
            </div>
          </div>
        </div>

        
          <?php if($_SESSION['userRole']=='Admin') : ?>
              <div class="text-decoration-none "><div class="nav ms-3 mt-4">
              <div class="navs d-grid fs-5"><i class="fa-solid fa-user-check <?= (strpos($urlPath, 'assign') !== false) ? 'active' : ''?>"></i></div>
              <div class="dashboard ms-3 text-uppercase"><a href="assign.php" class="<?= (strpos($urlPath, 'assign') !== false) ? 'active' : ''?>">Assign</a></div></div>
              </div>
              
          <?php endif; ?>
        
        <div class="copy-right m-3">
          <div>&copy; 2022 - <span class="text-white"> <a href="https://github.com/Assemmohamed0" target="_blank">Assem Mohamed</a> & <a href="https://github.com/Ahmedsalahmohammed22" target="_blank">Ahmed Salah</a></span></div>
        </div>

      </aside>
  <script src="js/bootstrap.bundle.min.js"></script>
  </body>
</html>

