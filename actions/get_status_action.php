<?php
    include_once('../utils/init.php');
    include_once('../database/user.php');
    include_once('../database/status.php');

    $status = getStatus();

    $showStatus = array();
    foreach ($status as $singleStatus) {

        $showSingleStatus = array(
            "id" => $singleStatus["id"],
            "name" => $singleStatus["name"]
        );
        array_push($showStatus, $showSingleStatus);
    }
    header("Content-Type: application/json");
    echo json_encode($showStatus);
    exit();
?>