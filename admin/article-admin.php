<?php
    require_once("../resources/lib/core.php");

    $updateResponse = $_POST['updateResponse'];
    $updateIds = $_POST['updateIds'];
    $dateTime = $_POST['dateTime'];

    $core = Core::GetInstance();

    foreach($updateIds as $id) {
        if ($updateResponse == 2) {
            $query = $core->conn->prepare("UPDATE `articles` SET status=:status WHERE id=:id");
            $query->execute( array(":status" => $updateResponse, ":id" => $id) );
        } else if ($updateResponse == 1) {
            $query = $core->conn->prepare("UPDATE `articles` SET status=:status WHERE id=:id");
            $query->execute( array(":status" => $updateResponse, ":id" => $id) );

            $query = $core->conn->prepare("UPDATE `articles` SET `date`=:dateTime WHERE id=:id");
            $query->execute( array(":dateTime" => $dateTime, ":id" => $id) );
        } else if ($updateResponse == 0) {
            $query = $core->conn->prepare("DELETE FROM `articles` WHERE id=:id");
            $query->execute( array(":id" => $id) );
        } else if ($updateResponse == 3) {
            $query = $core->conn->prepare("UPDATE `articles` SET status=:status WHERE id=:id");
            $query->execute( array(":status" => 0, ":id" => $id) );

            $query = $core->conn->prepare("UPDATE `articles` SET `date`=:dateTime WHERE id=:id");
            $query->execute( array(":dateTime" => $dateTime, ":id" => $id) );
        } else if ($updateResponse == 4) {
            $query = $core->conn->prepare("UPDATE `articles` SET featured=:featured WHERE id=:id");
            $query->execute( array(":featured" => 0, ":id" => $id) );
        } else if ($updateResponse == 5) {
            $query = $core->conn->prepare("UPDATE `articles` SET featured=:featured WHERE id=:id");
            $query->execute( array(":featured" => 1, ":id" => $id) );
        }
    }
?>