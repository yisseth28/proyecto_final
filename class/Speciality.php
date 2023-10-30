<?php 
    require_once 'DataBase.php';

    class Speciality extends DataBase{

        protected $table = "specialties";

        public function list(){
            $sql = "SELECT id, name FROM " . $this->table . " WHERE status = 1";
            $this->query = $this->conexion->query($sql);
            return $this->query->fetch_all(MYSQLI_ASSOC);
        }
        
    }