<?php
session_start();

if(!empty($_SESSION['email']))
{
  header('location:index.php');

}

 include('../controller/AuthController.php');

   if($_SERVER['REQUEST_METHOD']=="POST")
   {
       if(!empty($_POST['username'])&& !empty($_POST['email']) && !empty($_POST['password']))
       {
          if(!register($_POST['username'],$_POST['email'],$_POST['password']))
          {
              echo 'record already exist';
          } 
          else{
            $_SESSION['email']=$_POST['email'];
            header('location:index.php');

          }
       }
   }

 ?>


<?php include('../layouts/header.php')  ?>


<div class="container mt-5">
    <div class="row">
        <form action="" class="form-group col-md-6 offset-3" method="POST">
            <h2 class="text-secondary text-center">register</h2>
            <input type="text" class="form-control mt-2" placeholder="username" name="username">
            <input type="email" class="form-control mt-2" placeholder="email" name="email">
            <input type="password" class="form-control mt-2" placeholder="password" name='password'>
            <button class="form-control btn btn-secondary">register</button>
        </form>
    </div>
</div>



















<?php include('../layouts/footer.php')  ?>