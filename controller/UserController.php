<?php 
include('../config/db.php');


$pdo=new PDO(ROOT,USERNAME,PASSWORD);


function getData()
{
    global $pdo;
    if(!$pdo)
    {
        echo 'error conexion';
    }
    else{
        $query="SELECT *FROM users ORDER BY date DESC ";

        $statement=$pdo->prepare($query);

        $statement->execute();

         return $statement->fetchAll();
    }


}

function store($name,$email,$phone){
    global $pdo;
    if(!$pdo)
    {
        echo 'error conexion';
    }
    else{
        $query="INSERT INTO users (name,email,phone,date) values(:name,:email,:phone,:date)";

        $statement=$pdo->prepare($query);

        $statement->execute([
            ':name'=>$name,
            ':email'=>$email,
            ':phone'=>$phone,
            ':date'=>date("Y-m-d H:i:s")

        ]);

        
    }

}

function delete($id)
{
    global $pdo;
    if(!$pdo)
    {
        echo 'error conexion';
    }
    else{
        $query='DELETE from users where id=:id';
        $statement=$pdo->prepare($query);

        $statement->execute([
            ':id'=>$id
        ]);
    }
}

function show($id)
{
    global $pdo;
    if(!$pdo)
    {
        echo 'error conexion';
    }
    else{
        $query='SELECT *from users where id=:id';
        $statement=$pdo->prepare($query);

        $statement->execute([
            ':id'=>$id
        ]);

        return $statement->fetch();
    }
}

function update($id,$name,$email,$phone)
{
    global $pdo;
    if(!$pdo)
    {
        echo 'error conexion';
    }
    else{
        $query='UPDATE users set name=:name,email=:email,phone=:phone where id=:id';

        $statement=$pdo->prepare($query);

        $statement->execute([
            ':id'=>$id,
            ":name"=>$name,
            ":email"=>$email,
            ":phone"=>$phone,
        ]);

    }
}

function search($name){

    global $pdo;
    if(!$pdo)
    {
        echo 'error conexion';
    }
    else{
        $query="SELECT *FROM users where name like :name";
        $statement=$pdo->prepare($query);
        $statement->execute([
            ':name'=>"$name%"
        ]);
        return $statement->fetchAll();
    }

}