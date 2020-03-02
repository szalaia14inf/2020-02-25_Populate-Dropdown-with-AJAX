<?php
    require_once 'data-controller.php';
    
    if(isset($_POST['markId'])) {
        $markId             =           $_POST['markId'];

        $dController         =           new DataController();

        $frameworks          =           $dController-> marka($id);

        echo json_encode($frameworks);
    }

    elseif(isset($_POST['tipusId'])) {
        $tipusId              =           $_POST['tipusId'];

        $dController         =           new DataController();
        
        $version             =           $dController->tipus($tipusId);

        echo json_encode($version);

    }
    
?>