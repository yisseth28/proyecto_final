<?php 
    require_once "DataBase.php";

    class Quote extends DataBase{

        protected $table = "quotes";

        public function validateQoute($date, $hour, $doctorId){
            $sql = "SELECT id FROM quotes WHERE doctor_id = {$doctorId} AND DATE(date) = '{$date}' AND hour={$hour} LIMIT 1";
            $this->query = $this->conexion->query($sql);
            return $this->query->fetch_all(MYSQLI_ASSOC);
        }
        
    }