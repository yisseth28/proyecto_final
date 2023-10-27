<?php
    session_start();
    require_once "Database.php";
    
    class User extends Database{
        protected $table="users";

        public static function auth(){
            if(empty($_SESSION['isLogged']) || $_SESSION['isLogged'] == false){
                header('location: index.php');
                return;
            }
        }

        public static function logged(){
            if(!empty($_SESSION['isLogged']) && $_SESSION['isLogged'] == true){
                header('location: dashboard.php');
                return;
            }
        }
    }
