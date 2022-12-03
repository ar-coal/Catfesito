<?php 

    class Usuario {
        private $_id;
        private $_nombre_usuario;
        //No se recomienda guardar la contraseña ya que es un dato sencible
        private $_contraseña;
        private $_correo;

        public function __construct($id, $nombre_usuario,$password, $correo) {
            $this->setId($id);
            $this->setNombre($nombre_usuario);
            $this->setPass($password);
            $this->setCorreo($correo);
        }
        public function getCorreo(){
            return $this->_correo;
        }

        public function setCorreo($pass){
            $this->_correo = $pass;
        }



        public function getPass(){
            return $this->_contraseña;
        }

        public function setPass($pass){
            $this->_contraseña = $pass;
        }

        public function getId() {
            return $this->_id;
        }

        public function getNombre() {
            return $this->_nombre_usuario;
        }

        public function setId($id) {
            $this->_id = $id;
        }

        public function setNombre($nombre) {
            $this->_nombre_usuario = $nombre;
        }

        public function returnArray() {
            $Usuario = array();

            $Usuario["id"] = $this->getId();
            $Usuario["nombre_usuario"] = $this->getNombre();
            $Usuario["pass"] =  $this->getPass();
            $Usuario["correo"] =  $this->getCorreo();

            return $Usuario;
        }
    }

?>