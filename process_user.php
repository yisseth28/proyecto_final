<?php
date_default_timezone_set('America/Bogota');
require_once 'class/User.php';
if(isset($_POST['new'])){ //insert
    if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['pass_repite']) || empty($_POST['type'])){
        header('location:user_new.php');
    }
    $date=date('Y-m-d H:i:s');
    $data=[
        'name'=> $_POST['name'],
        'email' => $_POST['email'],
        'password'=>$_POST['password'],
        'type'=>$_POST['type'],
        'created_at'=> $date,
        'updated_at'=> $date
    ];
    var_dump ($data);
    $user=new User;
    $response=$user->create($data);
    echo $response;
     if($response){
         echo "Inserción correcta";
     }else{
         echo "Error al insertar";
     }
}
