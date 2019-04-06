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
            $query = 'SELECT * FROM usuario WHERE usuario = :user AND password = :pass';
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
            $query = 'SELECT * FROM usuario WHERE usuario = :user';
            $statement = $conexion->prepare($query);                    
            $statement->execute(['user'=>$user]);
            
            while($result = $statement->fetch())
            {
                if(!result) die("Error al buscar!");
                $this->usuario = $result['usuario'];
            }            
        }
            
        public function getUsuario(){
            return $this->usuario;
        }
        /********************************************/

    }

?>