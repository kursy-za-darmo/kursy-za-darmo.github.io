<?php

include_once("header.php");
require_once "connect.php";
$connect=@new mysqli( $host,$db_user,$db_password,$db_name);
if($connect->connect_errno!=0)
{
    echo $connect->connect_errno;
    echo $connect->connect_error;
}
else
{//"SELECT * FROM kursy INNER JOIN accaunt_date ON kursy.id = accaunt_date.id_kursu WHERE accaunt_date.id_user=1"
    $id_kursu=$_GET["id"];
    //$id_user=$_SESSION["ID_User"];

    $id_kursu=4;
    
    $_SESSION["id_kursu"]=$id_kursu;
    $result = $connect->query("SELECT * FROM kurs_parts WHERE id_kursu='$id_kursu'" );
    $dane = $result;
    
    $id_parts=1;
    
}
?>


<div class="container mt-3">
  <div id="content"></div>
 
  
  
  <?php
  while($rows = mysqli_fetch_array($dane))
  {
    echo '<button type="button" class="btn btn-lg btn-outline partsContainer" data-bs-toggle="collapse" data-bs-target="#k',$rows["id"],'" >',$rows["title"],'</button>';
    echo '<div id="k',$rows["id"],'" class="collapse">';
    
    $result = $connect->query("SELECT * FROM kurs_sub_parts WHERE id_parts='$id_parts'" );
    while($row = mysqli_fetch_array($result))
    {
        $test=$row["content"];
        echo '<button class="btn btn-outline  px-5 parts"';
        echo   "onclick=";
        echo 'ToggleContent(',$test,')>', $row["subTitle"] ,'</button>';
       
    }
    $id_parts+=1;
    echo '  </div>';
  }
  ?>

</div>


<?php
include_once("footer.php");
$connect->close();
?>




