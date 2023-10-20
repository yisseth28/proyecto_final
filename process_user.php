<?php
session_start();
date_default_timezone_set('America/Bogota');
require_once 'class/User.php';
if(isset($_POST['new'])){ //insert
    if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['pass']) || empty($_POST['pass_repite']) || empty($_POST['type'])){
        header('location:user_new.php');
    }
    if($_POST['pass_repite']!=$_POST['pass']){
        header('location:user_new.php');
        echo "Las contraseñas no coinciden";
    }else{
        $date=date('Y-m-d H:i:s');
        $password= password_hash($_POST['pass'],PASSWORD_DEFAULT);
        $data=[
            'name'=>$_POST['name'],
            'email'=>$_POST['email'],
            'password'=> $password,
            'type'=>$_POST['type'],
            'created_at'=>$date,
            'updated_at'=>$date
        ];
        $user=new User;
        $response=$user->create($data);
          if($response){
            $_SESSION['success']="Usuario agregado correctamente"; 
            header('location:usuarios.php');
          }else{
            $_SESSION['error']="No se pudo insertar el usuario";
            header('location:user_new.php');
          }
    }
    
}
