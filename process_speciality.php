<?php 
    session_start();
    require_once 'class/Speciality.php';
    if(isset($_POST['action'])){ //insert
        switch ($_POST['action']) {
            case 'insert':
                insert();
                break;
            case 'delete':
                $id = $_POST['id'];
                delete($id);
                break;            
            default:
                # code...
                break;
        }
    }
    function insert(){

        //validaciones todos los campos llenos
        if(empty($_POST['name'])){
            $_SESSION['error'] = "Favor de llenar todos los campos...";
            header('Location: speciality_new.php');
           exit;
        }
    
        $_SESSION['name'] = $_POST['name'];

        $speciality = new Speciality;
        $query = $speciality->selectForField('name', trim($_POST['name']));
        if($query){
            $_SESSION['error'] = "La Especialidad ya existe, intenta con otro...";
            header('Location: speciality_new.php');
            exit;
        }

        try{
            $date = date('Y-m-d H:i:s');
            $data = [
                'name' => trim($_POST['name']),     
                'created_at' => $date,
                'updated_at' => $date
            ];
            
           /* var_dump($data);
            exit;*/

            $response = $speciality->create($data);
            if($response){
                $_SESSION['success'] = 'Especialidad agregada correctamente...';
                //eliminar las variables de sesión
                header('Location: specialities.php');
            }else{
                $_SESSION['error'] = "No se pudo insertar la especialidad...";
                header('Location: speciality_new.php');
            }
        }catch(\Throwable $th){
            $_SESSION['error'] = $th->getMessage();
            header('Location: speciality_new.php');
        }

        
    }

    function delete($id){
        $speciality = new Speciality;
        $speciality->delete($id);
        $_SESSION['success'] = 'Especialidad eliminada correctamente...';
        header('Location: specialities.php');
    }

        /*// //buscar el email
        $email = trim($_POST['email']);
        $user = new User;
        $query = $user->selectForField('email', $email);
        if(!$query){
            $_SESSION['error'] = "Credenciales incorrectas";
            header('Location: login.php');
            return;
        }*/

        //variables de sesión con info del usuario
        $_SESSION['id'] = $query[0]['id'];
        $_SESSION['name'] = $query[0]['name'];
        $_SESSION['status'] = $query[0]['status'];
        $_SESSION['created_at'] = $query[0]['created_at'];
        $_SESSION['updated_at'] = $query[0]['updated_at'];
        $_SESSION['isLogged'] = true;

        header('Location: specialities.php');
    

    function logout(){
        session_destroy();
        // $_SESSION['success'] = "Ha salido de forma satisfactoria";
        header('Location: index.php');
    }