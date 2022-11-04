<?php
session_start();

//UPDATE `users` SET `point` = '100' WHERE `users`.`id` = 1;

$unlockPoints=0;
    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['unlock']))
    {
        func($unlockPoints);
    }
    else
    {
        
    }
    function func(&$unlockPoints)
    {
        require_once "connect.php";
        $connect=@new mysqli( $host,$db_user,$db_password,$db_name);
        if($connect->connect_errno!=0)
        {
            echo $connect->connect_errno;
            echo $connect->connect_error;
        }
        else
        {
            $id_user=$_SESSION["ID_User"];
            $id_kursu=$_SESSION["id_kursu"];
            $user_point= $_SESSION["user_points"];
            $kurs_name=$_SESSION["kurs_name"];
            $unlockPoint=$_POST['unlock'];
            if($_SESSION["user_points"]>=$_POST['unlock'])  
            {
                
                
                $update_Point=$user_point-$unlockPoint;
                $results = $connect->query("UPDATE users SET point = '$update_Point ' WHERE users.id =' $id_user '" );
                
                //
                $result = $connect->query("INSERT INTO accaunt_date (id, id_user, id_kursu) VALUES (NULL, ' $id_user ', '$id_kursu');");
                
                header("Location: moje-kursy.php");
                
            } 
            else
            {
                $unlockPoints=$unlockPoint-$user_point;
            }
        }


            
    }
    include_once("header.php");
?>


<?php
$id_user=$_SESSION["ID_User"];
$id_kursu=$_SESSION["id_kursu"];
$user_point= $_SESSION["user_points"];
$kurs_name=$_SESSION["kurs_name"];
?>
<div class="container col-lg-8 col-md-12 bg-0 ">
  <div class="row">
    <div class="container mt-3">
        <div class="card bg-1" style="border-radius: 1rem; margin: 5rem 15rem ">
            <div class="card-body ps-5 text-center">
                <div class="mt-md-4 p-2">
                    <h2 class="fw-bold mb-2 text-uppercase">Kurs <?php echo $kurs_name ?></h2>
                    <p class="text-50 mb-5">Nie odblokowałeś jeszcze tego kursu</p>
                    <p class="text-50 mb-5">Posiadasz <?php echo $user_point?> pkt</p>
                    <p class="text-50 mb-5">Potrzebujesz jeszcze <?php echo $unlockPoints?> pkt</p>
                    <a href="kursy.php"><button class="btn btn-outline btn-lg px-5" > Powrót</button></a> 
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