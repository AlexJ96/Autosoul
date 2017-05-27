<?php

	if($_GET['action'] == "search")
	{
		$search = $_GET['topic'];
		
		$dbh = new PDO('mysql:host=localhost;dbname=autosoul', 'root', '');
		$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$query = $dbh->prepare("SELECT COUNT(*) FROM `topics` WHERE `topic-name` = :topic");
		$query->bindParam(':topic', $search, PDO::PARAM_STR);
		$query->execute();
				
		echo $query->fetchColumn();
	}
	elseif($_GET['action'] == "add")
	{
		$search = $_GET['topic'];
		
		$dbh = new PDO('mysql:host=localhost;dbname=autosoul', 'root', '');
		$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$query = $dbh->prepare("INSERT INTO `topics` (`topic-name`) VALUES (:topic)");
		$query->bindParam(':topic', $search, PDO::PARAM_STR);
		
		if($query->execute())
			echo 1;
		else
			echo 0;
	}
?>