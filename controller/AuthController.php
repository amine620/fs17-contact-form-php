<?php 

include('../config/db.php');


$pdo=new PDO(ROOT,USERNAME,PASSWORD);


function check($username,$email)
{
    global $pdo;

    if($pdo)
    {

        $query='SELECT *from customers where email=:email or username=:username';
    
        $statement=$pdo->prepare($query);
    
        $statement->execute([
            ':username'=>$username,
            ':email'=>$email
        ]);
    
        $result=$statement->fetchAll();

        return  count($result)==1 ? true : false;
    }
}

function register($username,$email,$password)
{
    global $pdo;
    if($pdo)
    {
       if(!check($username,$email))
       {
        $query='INSERT INTO customers(username,email,password) values(:username,:email,:password)';
    
        $statement=$pdo->prepare($query);
    
        $statement->execute([
            ':username'=>$username,
            ':email'=>$email,
            ':password'=>$password,
        ]);
    
        return true;
       }
        return false;

    }

     
}

function login($email,$password)
{
    global $pdo;

    if($pdo)
    {

        $query='SELECT *from customers where email=:email and password=:password';
    
        $statement=$pdo->prepare($query);
    
        $statement->execute([
            ':email'=>$email,
            ':password'=>$password,
        ]);
    
        $result=$statement->fetchAll();

        return  count($result)==1 ? true : false;
    }
}