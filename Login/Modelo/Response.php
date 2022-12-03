<?php
    //Nos permitira tener el mismo tipo de respuesta a los errores posibles

    class Response{
        private $_httpStatusCode;
        private $_message = array();
        private $_data;

        public function setHttpStatusCode($_httpStatusCode){
            $this->_httpStatusCode = $_httpStatusCode;
        }

        public function addMessage($message){
            $this->_message[] = $message;
        }

        public function setData($data){
            $this->_data = $data;
        }

        public function send(){
            header('Content-type: application/json; charset=utf-8');

            http_response_code($this->_httpStatusCode);

            $response = array();

            $response["messages"] = $this->_message;
            $response["data"] = $this->_data;

            echo json_encode($response);
        }

    }


?>