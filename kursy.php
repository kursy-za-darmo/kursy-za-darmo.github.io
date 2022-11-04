<?php
session_start();
if(!isset($_SESSION['Login']))
{
  header("Location: index.php");
  exit();
}
if(isset($_SESSION['Login']))
{
  $Zalogowany=true;
}
else
{
  $Zalogowany=false;
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
    
    $result = $connect->query('SELECT * FROM kursy INNER JOIN accaunt_date ON kursy.id = accaunt_date.id_kursu WHERE accaunt_date.id_user='.$_SESSION["ID_User"]);
    
    while($row = mysqli_fetch_array($result))
    {
    $myKursy[]=$row['id_kursu'];
    }

}

    include_once("header.php");
?>

<div class="container col-lg-8 col-md-12 bg-0 ">
  <div class="row">
  <?php
 $brakKursu = 1;
  $result1 = $connect->query('SELECT * FROM kursy');
while($row = mysqli_fetch_array($result1))
{
    if(!(in_array($row['id'],$myKursy)) )
    {
        $brakKursu += 1;
        echo '<div class="col-lg-4 col-md-12 card block"> 
                <img src="img/',$row['image'],'" class="card-img-top" alt="Graficzna reprezentacja kursu">
                <div class="card-body">
                <h5 class="card-title">',$row['name'],'</h5>
                <p class="card-text">',$row['description'],'</p>
                <a href="kursDetal.php?id=',$row['id'],'" class="btn btn-outline">Sprawdź</a>
                </div>  
            </div>';
    }
    

}
if($brakKursu == 1)
    {
        echo "brak kursów";
    }

?>
        
  </div>
</div>







<?php   
    include_once("footer.php");    
$connect->close();
?>


