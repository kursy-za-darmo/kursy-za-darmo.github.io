<?php
session_start();
if(!isset($_SESSION['Login']))
{
  header("Location: index.php");
  exit();
}

require_once "connect.php";
$connect=@new mysqli( $host,$db_user,$db_password,$db_name);
if($connect->connect_errno!=0)
{
    echo $connect->connect_errno;
    echo $connect->connect_error;
}
else
{//"SELECT * FROM kursy INNER JOIN accaunt_date ON kursy.id = accaunt_date.id_kursu WHERE accaunt_date.id_user=1"
    $result = $connect->query("SELECT * FROM kursy INNER JOIN accaunt_date ON kursy.id = accaunt_date.id_kursu WHERE accaunt_date.id_user=1");
    
}
    include_once("header.php");
?>

<div class="container col-lg-8 col-md-12 bg-0 ">
  <div class="row">
  <?php
while($row = mysqli_fetch_array($result))
{
  echo '<div class="col-lg-4 col-md-12 card block"> 
  <img src="img/',$row['image'],'" class="card-img-top" alt="Graficzna reprezentacja kursu">
  <div class="card-body">
      <h5 class="card-title">',$row['name'],'</h5>
      <p class="card-text">',$row['description'],'</p>
      <a href="kurs.php?id=',$row['id'],'" class="btn btn-outline">Sprawdź</a>
      </div>  
</div>';

}

?>
        
  </div>
</div>







<?php   
    include_once("footer.php");    
$connect->close();
?>


