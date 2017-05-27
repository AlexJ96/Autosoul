<?php
    
    require_once("../resources/lib/core.php");

    $core = Core::GetInstance();
        
    $query = $core->conn->prepare("SELECT * FROM `articles` WHERE status = 1 AND `date` < :time ");
    $query->execute( array(":time" => time() ) );

    foreach($query->fetchAll() as $k=>$v) { 
        $query = $core->conn->prepare("UPDATE `articles` SET `status`= 2 WHERE `id` = :id");
        $query->execute( array(":id" => $v['id']) );
    }
        
?>