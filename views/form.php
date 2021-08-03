
<?php
session_start();
if(empty($_SESSION['email']))
{
  header('location:login.php');

}

 include('../controller/UserController.php') ;

if($_SERVER['REQUEST_METHOD']=='POST')
{
  if(!empty($_POST['name']) && !empty($_POST['email']) && $_POST['phone'])
  {
      store($_POST['name'],$_POST['email'],$_POST['phone']);

      header('location:index.php');
    }
}





?>





<?php include('../layouts/header.php') ?>



<div class="container">
    <div class="row">
        <form action="" method="post" class="form-group mt-5 col-md-6 offset-3">
            <h2 class="text-center text-secondary ">Saisir un nouveau client</h2>
            <input type="text" name="name" class="form-control mt-2" placeholder="name">
            <input type="email" name="email" class="form-control mt-2" placeholder="email">
            <input type="phone" name="phone" class="form-control mt-2" placeholder="phone">
            <button class="btn btn-dark form-control mt-2">save</button>

        </form>
</div>









        <?php include('../layouts/footer.php') ?>