<?php
    include_once 'db-config.php';

    class DataController {

            public function getLanguages() {
                $data            =           array();
                $db              =           new DBController();
                $conn            =           $db->connect();

                $sql             =           "SELECT * FROM autók";
                $result          =           $conn->query($sql);
                if($result->num_rows > 0) {
                    $data        =           mysqli_fetch_all($result, MYSQLI_ASSOC);
                }
              
               $db->close($conn);
               return $data;
            }
    }
