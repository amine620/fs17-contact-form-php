<?php 
if(isset($_POST['logout']))
{
  session_destroy();
  header('location:login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<title>Title</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarNavAltMarkup">
      <div class="navbar-nav">

      <!--when session is not empty  -->
       <?php if(!empty($_SESSION['email'])): ?>
        <a class="nav-link" href="index.php">users</a>
        <a class="nav-link" href="form.php"><i class="fa fa-plus"></i></a>
        <?php endif ?>

      <!--when session is  empty  -->

        <?php if(empty($_SESSION['email'])): ?>
        <a class="nav-link" href="login.php"><i class="fa fa-user"></i></a>
        <a class="nav-link" href="register.php"><i class="fa fa-edit"></i></a>
        <?php endif ?>


      </div>
      <!--when session is not empty  -->

      <?php if(!empty($_SESSION['email'])): ?>
        <form action="" method="post" class="">
         <button class="btn btn-secondary" name="logout"><i class="fas fa-sign-out-alt"></i></button>
        </form>
      <?php endif ?>
    </div>
  </div>
</nav>


