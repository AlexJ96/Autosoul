<?php

	require_once("../resources/lib/article.php");
	
	$title = $_POST["title"];
    $subTitle = $_POST["subTitle"];
    $articleContent = $_POST["articleContent"];
    $featuredImage = $_POST["featuredImage"];
    $mainTopic = $_POST["mainTopic"];
    $topics = $_POST["topics"];
    $tags = $_POST["tags"];
    $imageGallery = $_POST["imageGallery"];
    $dateTime = $_POST["dateTime"];
    $status = $_POST["status"];

    list($type, $featuredImage) = explode(';', $featuredImage);
    list(, $featuredImage)      = explode(',', $featuredImage);
    $featuredImage = base64_decode($featuredImage);

    $f = finfo_open();
    $mime_type = finfo_buffer($f, $featuredImage, FILEINFO_MIME_TYPE);

    $mime_type = str_replace("image/", "", $mime_type);

    file_put_contents('../public/uploads/' . str_replace(" ", "-", $title) . '-featured.' .$mime_type, $featuredImage);

    $link =  "/autosoul/public/uploads/" . str_replace(" ", "-", $title) . '-featured.' .$mime_type;

    $article = new Article();
    $article->submitNewArticle($title, $subTitle, $articleContent, $link, $mainTopic, $topics, $tags, $imageGallery, $dateTime, $status);
?>