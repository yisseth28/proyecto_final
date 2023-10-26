<?php
session_start();
date_default_timezone_set('America/Bogota');
require_once 'class/User.php';

if(isset($_POST['action'])){ 
  switch($_POST['action']){
    case 'insert':
      insert();
      break;
    case 'delete':
      $id=$_POST['id'];
      delete($id);
      break;
    case 'auth':
      auth();
      break;
  }   
}
function insert(){
  $_SESSION['name'] = $_POST['name'];
  $_SESSION['email'] = $_POST['email'];
  $_SESSION['type'] = $_POST['type'];
  
  if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['pass']) || empty($_POST['pass_repite']) || empty($_POST['type'])){
    $_SESSION['error']="Favor de llenar todos los campos"; 
    header('location:user_new.php');
    return;
  }
  //Que las contraseñas coincidan
  $pass=trim($_POST['pass']);
  $pass_repite=trim($_POST['pass_repite']);
  if($pass != $pass_repite){
    $_SESSION['error']="Las contraseñas no coinciden";
    header('location:user_new.php');
    return;
  }
  $user=new User;
  $query=$user->selectForField('email', trim($_POST['email']));
  if($query){
    $_SESSION['error']="El correo electrónico ya existe, intente con otro diferente";
    header('location:user_new.php');
    return;
  }
  try{
      $date=date('Y-m-d H:i:s');
      $password= password_hash($pass,PASSWORD_DEFAULT);
      $data=[
        'name'=>trim($_POST['name']),
        'email'=>trim($_POST['email']),
        'password'=> $password,
        'type'=>$_POST['type'],
        'created_at'=>$date,
        'updated_at'=>$date
    ];
    $user=new User;
    $response=$user->create($data);
    if($response){
      $_SESSION['success']="Usuario agregado correctamente";
      //ELIMINAR LAS VARIABLES DE SESION
      unset($_SESSION['success']);
      header('location:usuarios.php');
    }else{
      $_SESSION['error']="No se pudo insertar el usuario";
      header('location:user_new.php');
    }
  }catch(\Throwable $th ){
      $_SESSION['error']=$th->getMessage();   
    }    
  }

  function delete($id){
    $user=new User;
    $user->delete($id);
    $_SESSION['success']="Usuario eliminado correctamente";
    header('location:usuarios.php');
  }

  function auth(){
    //validar que la información venga completa
    if(empty($_POST['email']) || empty($_POST['passwd'])){
      $_SESSION['error']="Favor llenar todos los campos";
      header('location: index.php');
      return;
    }
    // BUSCAR POR EL EMAIL
    $email=trim($_POST['email']);
    $user=new User;
    $query=$user->selectForField('email', $email);
    if(!$query){
      $_SESSION['error']="Credenciales incorrectas";
      header('location: index.php');
      return;
    }
    //VALIDAR EL PASSWORD
    $password=trim($_POST['passwd']);
    if(!password_verify($password,$query[0]['password'])){
      $_SESSION['error']="Credenciales incorrectas";
      header('location: index.php');
      return;
    }
    //VARIABLES DE SESION CON INFORMACIÓN DEL USUARIO
    $_SESSION['name']=$query[0]['name'];
    $_SESSION['email']=$query[0]['email'];
    $_SESSION['type']=$query[0]['type'];


    header('location: dashboard.php');
  }

