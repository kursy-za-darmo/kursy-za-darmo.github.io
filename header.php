<?php
if(!isset($_COOKIE["ColorMode"]))
{
  setcookie("ColorMode","Light");
  header("Refresh:0");
}
$Zalogowany=0;
if(isset($_SESSION['Login']))
{
  $Zalogowany=1;
}
else
{
  $Zalogowany=0;
}
?>
<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Kursy za darmo</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
       
       
        <?php
            if($_COOKIE["ColorMode"]=="Dark")
            {
                echo '<link rel="stylesheet" href="style.css">';
            }
            else
            {
                echo '<link rel="stylesheet" href="style1.css">';
            }
        ?>
        

    </head>
<body class="d-flex flex-column min-vh-100">
    <nav class="navbar navbar-expand-lg  bg-1">
  <div class="container-fluid">
    <a class="navbar-brand">Kursy za darmo</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <?php
          
          if($Zalogowany==0) 
          {
          echo '<a class="nav-link active" aria-current="page" href="index.php">Zaloguj</a>';
          }
          else 
          {
          echo '<li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Moje Konto</a>
                <ul class="dropdown-menu bg-1" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="acount.php">Profil</a></li>
                <li><a class="dropdown-item" href="logout.php">Wyloguj</a></li>
                </ul>
                </li>';
          }
          ?>
          
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Kursy
          </a>
          <ul class="dropdown-menu bg-1" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="kursy.php">Kursy</a></li>
            <li><a class="dropdown-item" href="moje-kursy.php">Moje Kursy</a></li>
            
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link ColorMode" href="" onclick="ColorMode()"><?php
          if($_COOKIE["ColorMode"]=="Dark")
          {
            echo 'Zmień motyw strony na jasny <i class="fa-solid fa-sun"></i>';
          }
          else
          {
            echo 'Zmień motyw strony na ciemny <i class="fa-solid fa-moon"></i>';
          }
          ?></a>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2 inputStyle" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline" type="submit">Wyszukaj</button>
      </form>
    </div>
  </div>
</nav>
