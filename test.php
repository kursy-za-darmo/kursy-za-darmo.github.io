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
    $id_user=$_SESSION["ID_User"];

    $id_kursu=4;
    
    $_SESSION["id_kursu"]=$id_kursu;
    $result = $connect->query("SELECT * FROM kurs_parts WHERE id_kursu='$id_kursu'" );
    $dane = $result -> fetch_assoc();
    $result ->free_result();
}
?>


<div class="container mt-3">
  
  <button type="button" class="btn btn-outline partsContainer" data-bs-toggle="collapse" data-bs-target="#<?php echo $dane["id"]?>" >Simple collapsible</button>
  <div id="#<?php echo $dane["id"]?>" class="collapse">
  <button class="btn btn-outline btn-lg px-5 parts" type="submit">Active Directory</button>
  <button class="btn btn-outline btn-lg px-5 parts" type="submit">Urzytkownicy Domeny</button>
  <button class="btn btn-outline btn-lg px-5 parts" type="submit">Zasady Grupy</button>
  </div>
</div>

<?php
include_once("footer.php");
$connect->close();
?>




