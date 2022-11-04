<?php
session_start();


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
    
    $_SESSION["id_kursu"]=$id_kursu;
    $result = $connect->query("SELECT * FROM accaunt_date WHERE id_user =' $id_user 'AND id_kursu ='$id_kursu'" );
    $result ->free_result();
}
    include_once("header.php");


//SELECT * FROM accaunt_date WHERE id_user = 1 AND id_kursu = 2;


$result = $connect->query("SELECT * FROM kursy where id='$id_kursu'" );

$data = $result->fetch_assoc();
$resulte = $connect->query("SELECT * FROM users where id='$id_user'" );
$datae = $resulte->fetch_assoc();

$_SESSION["user_points"]=$datae["point"];
$_SESSION["kurs_name"]=$data["name"];
$_SESSION["kurs_name"]=$data["name"];

?>

<div class="container col-lg-8 col-md-12 bg-0 ">
  <div class="row">
    <div class="container mt-3">
        <div class="card bg-1" style="border-radius: 1rem; margin: 5rem 15rem ">
            <div class="card-body ps-5 text-center">
                <div class="mt-md-4 p-2">
                    <h2 class="fw-bold mb-2 text-uppercase">Kurs <?php echo $data["name"]?></h2>
                    <p class="text-50 mb-5">Nie odblokowałeś jeszcze tego kursu</p>
                    <p class="text-50 mb-5">Posiadasz <?php echo $datae['point']?> pkt</p>
                    <form action="unlock.php" method="POST">
                        <button class="btn btn-outline btn-lg px-5" type="submit" name="unlock" value='<?php echo $data["pointToUnlock"]?>'>
                        Odblokuj za <?php echo $data["pointToUnlock"]?> pkt</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>







<?php   
    include_once("footer.php");    
$connect->close();
?>