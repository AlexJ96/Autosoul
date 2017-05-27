<?php

require_once(dirname(__FILE__) . "/core.php");

class Article
{

	private $id 			= null;
	private $title			= null;
	private $description	= null;
	private $published		= null;
	private $date			= null;
	private $author			= null;
	private $tags			= array();

	public function __construct($article_id = null)
	{
		if(!$article_id == null)
		{
			$this->id = $article_id;
			$this->LoadArticleData();
		}
	}

	public function updateArticle($articleId, $title, $subTitle, $articleContent, $featuredImage, $mainTopic, $topics, $tags, $imageGallery, $dateTime, $status) {
		$core = Core::GetInstance();
		
		$query = $core->conn->prepare("UPDATE `articles` SET `status`=:status,`title`=:title,`sub-title`=:subTitle,`article-content`=:articleContent,`featured-image`=:featuredImage,`main-topic`=:mainTopic,`author`=:author,`views`=:views,`likes`=:likes,`date`=:dateTime,`featured`=:featured WHERE id = $articleId");
		$query->execute( array(":title" => $title, ":status" => $status, ":subTitle" => $subTitle, ":articleContent" => $articleContent, ":featuredImage" => $featuredImage, ":mainTopic" => 0, ":author" => 0, ":views" => 0, ":likes" => 0, ":dateTime" => $dateTime, ":featured" => 0 ) );
		
	}

	public function submitNewArticle($title, $subTitle, $articleContent, $featuredImage, $mainTopic, $topics, $tags, $imageGallery, $dateTime, $status) {
		$core = Core::GetInstance();
		
		$query = $core->conn->prepare("INSERT INTO `autosoul`.`articles` (`id`, `status`, `title`, `sub-title`, `article-content`, `featured-image`, `main-topic`, `author`, `views`, `likes`, `date` ) VALUES (NULL, :status, :title, :subTitle, :articleContent, :featuredImage, :mainTopic, :author, :views, :likes, :dateTime)");
		$query->execute( array(":title" => $title, ":status" => $status, ":subTitle" => $subTitle, ":articleContent" => $articleContent, ":featuredImage" => $featuredImage, ":mainTopic" => $mainTopic, ":author" => 0, ":views" => 0, ":likes" => 0, ":dateTime" => $dateTime ) );
		
		$query = $core->conn->prepare("SELECT `id` FROM `articles` ORDER BY id DESC LIMIT 1");
		$query->execute();

		$id = $query->fetchColumn();

		foreach($tags as $tag) {
			$query = $core->conn->prepare("INSERT INTO `autosoul`.`article_tags` (`id`, `tag`) VALUES (:id, :tag)");
			$query->execute( array(":id" => $id, ":tag" => $tag) );
		}

		$amount = 0;
		foreach($imageGallery as $image) {
			list($type, $image) = explode(';', $image);
			list(, $image)      = explode(',', $image);
			$image = base64_decode($image);

			$f = finfo_open();
			$mime_type = finfo_buffer($f, $image, FILEINFO_MIME_TYPE);

			$mime_type = str_replace("image/", "", $mime_type);

			file_put_contents('../public/uploads/' . $id . '-' . str_replace(" ", "-", $title) . '-' . $amount . '.' .$mime_type, $image);

			$link = '/autosoul/public/uploads/' . $id . '-' . str_replace(" ", "-", $title) . '-' . $amount . '.' .$mime_type;

			$query = $core->conn->prepare("INSERT INTO `autosoul`.`article_images` (`article_id`, `url`) VALUES (:id, :url)");
			$query->execute( array(":id" => $id, ":url" => $link) );
			$amount++;
		}
	}
	
	private function LoadArticleData()
	{
		if(!$this->id == null)
		{
			$core = Core::GetInstance();
			
			$query = $core->conn->prepare("SELECT * FROM `articles` WHERE `id` = :id LIMIT 1");
			$query->execute( array(":id" => $this->id) );
			
			if($results = $query->fetch(PDO::FETCH_OBJ))
			{
				$this->id 		= $results->category_id;
				$this->title 	= $results->category_name;
			}
		}
	}
	
	public function ShowData()
	{
		echo $this->id . " and " . $this->title;
	}

}

?>