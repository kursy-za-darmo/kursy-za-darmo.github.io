<?php
session_start();
if(isset($_SESSION['Login']))
{
  header("Location: acount.php");
  exit();
}

include_once ("header.php");
?>

<div class="container bg-0">

 
    <div class="row d-flex justify-content-center align-items-center py-3 panel"">
    <div class="col-8 col-md-8 col-lg-6 col-xl-5 ads" >
     
    </div>  
    <div class="col-8 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-1" style="border-radius: 1rem;">
          <div class="card-body ps-5 text-center">

            <div class="mt-md-4 p-2">

              <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
              <p class="text-50 mb-5">Proszę wprować swóją nazwę użytkownika i hasło.</p>
              <form action="login.php" method="POST">
              <div class="form-outline form-white mb-4">
                <input type="text" name="login" id="typeLoginX" class="form-control form-control-lg inputStyle" />
                <label class="form-label" for="typeLoginX">Nazwa użytkownika</label>
              </div>

              <div class="form-outline form-white mb-4">
                <input type="password" name="password"id="typePasswordX" class="form-control form-control-lg inputStyle" />
                <label class="form-label" for="typePasswordX">Hasło</label>
              </div>

              <p class="small mb-5 pb-lg-2"><a class="text-50" href="#!">Nipamietasz hasła?</a></p>

              <button class="btn btn-outline btn-lg px-5" type="submit">Zaloguj</button>

              </form>
            <div>
              <p class="mb-0">Nie posiadasz konta? <a href="#!" class="text-50 fw-bold">Zarejestruj się!</a>
              </p>
            </div>
            </div>

           

          
        </div>
      </div>
    </div>
  
</div>
</div>













<?php
include_once ("footer.php");
?>