<?php
  session_start();

  if(!empty($_SESSION['email']))
  {
    header('location:index.php');

  }
 include('../controller/AuthController.php');

   if($_SERVER['REQUEST_METHOD']=="POST")
   {
       if( !empty($_POST['email']) && !empty($_POST['password']))
       {
          if(login($_POST['email'],$_POST['password']))
          {
              $_SESSION['email']=$_POST['email'];
              header('location:index.php');
            } 
            else{
              echo 'invalid email or password';
          }
       }
   }


 ?>

<?php include('../layouts/header.php')  ?>


<div class="container mt-5">
    <div class="row">
        <form action="" class="form-group col-md-6 offset-3" method="POST">
        <h2 class="text-secondary text-center">login</h2>
            <input type="email" class="form-control mt-2" placeholder="email" name="email">
            <input type="password" class="form-control mt-2" placeholder="password" name="password">
            <button class="form-control btn btn-secondary">login</button>
        </form>
    </div>
</div>



















<?php include('../layouts/footer.php')  ?>