<?php
session_start();

if(empty($_SESSION['email']))
{
  header('location:login.php');

}





 include('../controller/UserController.php');

    $user=show($_GET['id'])

    ?>









<?php include('../layouts/header.php') ?>
<div class="container mt-5">
    <div class="row">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title"><?php echo $user['name'] ?></h5>
            <h6 class="card-subtitle mb-2 text-muted"><?php echo $user['email'] ?></h6>
            <p class="card-text"><?php echo $user['phone'] ?>.</p>
          </div>
        </div>

    </div>
</div>












<?php include('../layouts/footer.php') ?>