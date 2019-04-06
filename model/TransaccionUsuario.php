<?php
    class TransaccionUsuario
    {
        private $usuario;
        private $password;
        /***************Funciones utilizadas para la validación de Login*************************/
        public function buscarUsuario($user, $pass)
        {
            //$md5pass = md5($pass);
            $modelo = new Conexion();
            $conexion = $modelo->getConexion();
            $query = 'SELECT * FROM users WHERE user_var = :user AND user_pass = :pass';
            $statement = $conexion->prepare($query);
            $statement->execute(['user'=>$user, 'pass'=>$pass]);

            if($statement->rowCount())
                return 1;
            else
                return 0;
        }

        public function setUsuario($user)
        {   
            $modelo = new Conexion();
            $conexion = $modelo->getConexion();
            $query = 'SELECT * FROM users WHERE user_var = :user';
            $statement = $conexion->prepare($query);                    
            $statement->execute(['user'=>$user]);
            
            while($result = $statement->fetch())
            {
                if(!result) die("Error al buscar!");
                $this->usuario = $result['user_var'];
            }            
        }
            
        public function getUsuario(){
            return $this->usuario;
        }
        /********************************************/

    }

?>