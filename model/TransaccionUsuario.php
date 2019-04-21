<?php
    class TransaccionUsuario
    {
        private $rol;
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

        public function buscarRol($user){
            $modelo = new Conexion();
            $conexion = $modelo->getConexion();
            $query = 'SELECT user_var, user_rol FROM users WHERE user_var = :user';
            $statement = $conexion->prepare($query);
            $statement->execute(['user'=>$user]);

            $result = $statement->fetch();

            $rol = $result['user_rol'];

            return $rol;
        }
    }

?>