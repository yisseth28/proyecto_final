<?php 
    session_start();
    require_once 'class/doctor.php';
    if(isset($_POST['action'])){ //insert
        switch ($_POST['action']) {
            case 'insert':
                // if(!empty($_POST["id"])){
                //     edit();
                // }else{
                insert();
                // }
                break;
            case 'edit':
                edit();
                break;
            case 'query':
                $id = $_GET['id'];
                consult($id);
                break;
            default:
                # code...
                break;
        }
    }


    function insert(){
        //validaciones todos los campos llenos

        
        try{
            $date = date('Y-m-d H:i:s');
            $data = [
                'user_id' => $_SESSION['id'],
                'specialty' => trim($_POST['speciality']),
                'professional_id' => $_POST['professional_id'],
                'address' => trim($_POST['address']),
                'phone' => trim($_POST['phone']),
                'work_days' => json_encode($_POST['work_days']),
                'working_hours' => json_encode($_POST['working_hours']),
                'created_at' => $date,
                'updated_at' => $date
            ];
            $doctor = new Doctor;
            $response = $doctor->create($data);
            if($response){
                $_SESSION['success'] = 'Datos agregado correctamente...';
                header('Location: profile.php');
            }else{
                $_SESSION['error'] = "No se pudo guardar la información...";
                header('Location: profile.php');
            }
        }catch(\Throwable $th){
            $_SESSION['error'] = $th->getMessage();
            header('Location: profile.php');
        }

        
    }
    
    function edit(){
        //validaciones todos los campos llenos

        
        try{
            $date = date('Y-m-d H:i:s');
            $data = [
                'specialty' => trim($_POST['speciality']),
                'professional_id' => $_POST['professional_id'],
                'address' => trim($_POST['address']),
                'phone' => trim($_POST['phone']),
                'work_days' => json_encode($_POST['work_days']),
                'working_hours' => json_encode($_POST['working_hours']),
                'updated_at' => $date
            ];
            $doctor = new Doctor;
            $response = $doctor->update($_POST['id'], $data);
            if($response){
                $_SESSION['success'] = 'Operación exitosa...';
                header('Location: profile.php');
            }else{
                $_SESSION['error'] = "No se pudo guardar la información...";
                header('Location: profile.php');
            }
        }catch(\Throwable $th){
            $_SESSION['error'] = $th->getMessage();
            header('Location: profile.php');
        }

        
    }

    // function consult($id){
    //     $doctor = new Doctor;
    //     $query = $doctor->selectById($id);
    //     echo json_encode($query);
    // }

