<?php
    class UserSession
    {
        public function __construct(){
            session_start();
        }
        
        public function establecerSesion($user){
            $_SESSION['user'] = $user;
        }
        
        public function closeSession(){
            session_unset($_SESSION['user']);
            session_destroy();
        }
    }
?>
