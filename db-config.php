<?php
    class DBController {
        private $hostname       =       "localhost";
        private $username       =       "root";
        private $password       =       "";
        private $db             =       "autók";

        public function connect() {
            $conn               =       new mysqli($this->hostname, $this->username, $this->password, $this->db)or die("Csatlakozási hiba." . $conn->connect_error);
                                        
            return $conn;           
        }

        public function close($conn) {
            $conn->close();
        }
    }
?>