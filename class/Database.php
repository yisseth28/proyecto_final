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

        //METODO PARA CREAR UN NUEVO REGISTRO
        //public function create($data){
        //    $sql="INSERT INTO users (name, email, password, type, status, created_at, updated_at) VALUES ({$data['name']},{$data['email']},{$data['password']},{$data['type']},{$data['status']},{$data['created_at']},{$data['updated_at']})";
        //    $this->conexion->query($sql);
        //}
        //METODO ARRAY_KEYS($data)=> devuelve unicamente los encabezados
        //METODO ARRAY_VALUES($data)=>devuelve los valores de un array
        //implode divide un array y convierte en string con un separador ejm: implode(separador, array)
        
        public function create($data){
            $columns= implode(",", array_keys($data));
            $values=implode("','",array_values($data));
            $sql="INSERT INTO {$this->table} ({columns}) VALUES (" . "'{$values}')";
            $this->conexion->query($sql);
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
