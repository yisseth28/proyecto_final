<?php
    require_once "./config/settings.php";
    class DataBase{
    //host, usuario, contraseña, base de datos y se almacena en conexion
        protected $bd_host=DB_HOST;
        protected $bd_name=DB_NAME;
        protected $bd_user=DB_USER;
        protected $bd_pass=DB_PASS;
        protected $conexion;
        protected $query;
        protected $table;

        public function __construct(){
            $this->connect();
        }

        protected function connect(){
            try{
                $this->conexion=new mysqli($this->bd_host, $this->bd_user, $this->bd_pass,$this->bd_name);
            }catch (\throwable $th){
                die("Error de conexion a la base de datos".$th->getMessage());
            }
        }
        //METODO BUSCA TODOS LOS REGISTROS
        public function selectALL(){
            $sql="SELECT * FROM {$this->table}";
            $this->query = $this->conexion->query($sql);
            return $this->query->fetch_all(MYSQLI_ASSOC);
        }

        //METODO BUSCA EL REGISTRO SEGÚN EL ID
        public function selectById($id){
            $sql="SELECT * FROM {$this->table} WHERE id={$id}";
            $this->query = $this->conexion->query($sql);
            return $this->query->fetch_all(MYSQLI_ASSOC);
        }

        //BUSQUEDA POR CUALQUIER CAMPO DE LA TABLA
        public function selectForField($column,$value){
            $sql="SELECT * FROM {$this->table} WHERE {$column}='{$value}'";
            $this->query = $this->conexion->query($sql);
            return $this->query->fetch_all(MYSQLI_ASSOC);
        }
        
        public function create($data){
            $columns= implode(",", array_keys($data));
            $values=implode("','",array_values($data));
            $sql="INSERT INTO {$this->table} ({$columns}) VALUES (" . "'{$values}')";
            $response=$this->conexion->query($sql);
            return $response;
        }
        //METODO PARA ACTUALIZAR UN REGISTRO
        public function update ($id, $data){
            $columns=array_keys($data);
            $values=array_values($data);
            $sql="UPDATE {$this->table} SET ";
                for($i=0; $i<count($columns); $i++){
                    $sql .= "{$columns[$i]}='{$values[$i]}'";
                    if($i < count($columns)-1){
                        $sql.=", ";
                    }
                }
                $sql .= "WHERE id={$id}";
                $this->conexion->query($sql);
        }

        public function delete($id){
            $sql="DELETE FROM {$this->table} WHERE id={$id}";
            $this->conexion->query($sql);
        }
    }
    
?>
