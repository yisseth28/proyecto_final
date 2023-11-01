<?php 
    require_once "DataBase.php";

    class Doctor extends DataBase{

        protected $table = "doctors";

        public function loadDoctors(){
            $sql = "SELECT doctors.id, doctors.specialty, users.name FROM doctors INNER JOIN users ON doctors.user_id = users.id";
            $this->query = $this->conexion->query($sql);
            return $this->query->fetch_all(MYSQLI_ASSOC);
        }
        
    }