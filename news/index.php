<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name=viewport content="width=device-width, initial-scale=1">
		<title>Autosoul</title>
		<!-- Main CSS -->
		<link rel="stylesheet" type="text/css" href="../resources/css/main.css"/>
		<!-- Javascript Link -->
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-1.10.2.js"></script>

         <script>
            (function() { // DON'T EDIT BELOW THIS LINE
            var d = document, s = d.createElement('script');
            s.src = '//autosoul.disqus.com/embed.js';
            s.setAttribute('data-timestamp', +new Date());
            (d.head || d.body).appendChild(s);
            })();
        </script>
        <script id="dsq-count-scr" src="//autosoul.disqus.com/count.js" async></script>
        
        <script type="text/javascript">     
            $(function() {
              var signUp = document.getElementById('signUp');
                $('.signUpButton').click(function() {
                    signUp.style.display = "block";
                });
            });
                           
            $(function() {
                var signUp = document.getElementById('signUp');
                $('.exit').click(function() {
                    signUp.style.display = "none";
                });
            });


            $(function() {
                var imageGallery = document.getElementById('image-gallery');
                $('.close-gallery').click(function() {
                    imageGallery.style.display = "none";
                });
            });


            var maxAmount = 0;

            $(function() {
                $('.gallery-main-button').click(function()
                {

                    var mainImage = document.getElementById('img1');
                    var string = mainImage.data;
                    var splitString = string.split('-');
                    
                    if($(this).hasClass("next"))
                    {
                        var id = parseInt(splitString[1]) + 1;
                        if (id >= maxAmount) {
                            id = 0;
                        }
                        var newString = splitString[0] + "-" + id;
                        openGallery(newString);
                    }
                    else if($(this).hasClass("previous"))
                    {
                        var id = parseInt(splitString[1]) - 1;
                        if (id < 0) {
                            id = maxAmount-1;
                        }
                        var newString = splitString[0] + "-" + id;
                        openGallery(newString);
                    }
                    
                });
            });

            $(function() {
                $('img[name="article-images"]').click(function() {
                    openGallery($(this).attr('data'));
                });
            });

            function openGallery(mainId) {
                var imageGallery = document.getElementById('image-gallery');
                imageGallery.style.display = "block";
                $('.images').html('');

                $('img[name="article-images"]').each(function(index) {
                    if ($(this).attr('data') == mainId) {
                        var mainImage = document.getElementById('img1');
                        mainImage.src = $(this).attr('src');
                        mainImage.data = $(this).attr('data');

                        $('.images').append('<img data="image-' + index + '" name="gallery-images-open" class="gallery-images-open" id="imgFirst" src="' + $(this).attr('src') + '"/>');
                        $('.image-caption').html('Test');
                    }
                });
                var amount = 0;
                $('img[name="article-images"]').each(function(index) {
                    if ($(this).attr('data') != mainId) {
                        $('.images').append('<img data="image-' + index + '" name="gallery-images-open" class="gallery-images-open" id="img' + index + '" src="' + $(this).attr('src') + '"/>');
                    }
                    amount++;
                });

                maxAmount = amount;
            }

            $(function() {
                $('.images').on('click', '.gallery-images-open', function() {
                    openGallery($(this).attr('data'));
                });
            });


        </script>

    </head>

    <body>
        <div id="signUp">
            <img class="exit" src="../resources/images/signup/exit.png"/>
            <img class="autosoul" src="../resources/images/signup/autosoul-logo.png"/>
            <p class="sign-up-motto"> Automotive Redefined </p>
            <p class="sign-up-info"> We’re working on a car social platform for petrolheads around the world.
                <br><br>Sign up to get the latest updates. </p>
        </div>

        <div id="image-gallery" class="image-gallery">
            <img class="close-gallery" src="../resources/images/article/cancel.png" />
            <div class="image-gallery-image">
                <img class="image-gallery-main" id="img1" data="" src="" />
                <p class="image-caption">
                    A lovely great caption here woooooooo
                </p>
                <div class="gallery-main-button previous">
                    <div class="button-text">
                        <img src="../resources/images/article/left-arrow.png" />
                    </div>
                </div>
                <div class="gallery-main-button next">
                    <div class="button-text">
                        <img src="../resources/images/article/right-arrow.png" />
                    </div>
                </div>
            </div>
            <div class="images">

            </div>
        </div>

        <div class="content-wrapper">
        <div class="nav">
            <div class="menu-icon"> </div>
            <h1>Autosoul</h1>
            <ul>
                <li><a href="">News</a></li>
                <li><a href="">Social</a></li>
                <li><a href="">About</a></li>
            </ul>
            <div class="signUpButton">
                <p> Sign Up </p>
            </div>
        </div>

        <nav class="side-bar-left">

            <ul class="side-bar-left-buttons">
                <br><br>
                <!--<li class="side-bar-left-button">
                    <div class="profile-img"></div>
                    <a href=""> Profile </a>
                </li>
                <li class="side-bar-left-button">
                    <div class="dashboard-img"></div>
                    <a href=""> Dashboard </a>
                </li>
                <li class="side-bar-left-button">
                    <div class="explore-img"></div>
                    <a href=""> Explore </a>
                </li>-->
                <li class="side-bar-left-button active">
                    <div class="news-img"></div>
                    <a href="/autosoul/"> News </a>
                </li>
               <!-- <li class="side-bar-left-button">
                    <div class="products-img"></div>
                    <a href=""> Products </a>
                </li>
                <li class="side-bar-left-button">
                    <div class="events-img"></div>
                    <a href=""> Events </a>
                </li>
                <li class="side-bar-left-button">
                    <div class="settings-img"></div>
                    <a href=""> Settings </a>
                </li>-->
            </ul>
        </nav>
		<div class="content-wrapper">
			<div class="middle-article">
                <?php
                    require("../config.php");
                    try {
                        
                        $stmt = Config::get()->prepare("SELECT * FROM `articles` WHERE id = :id");
                        $stmt->bindParam(":id", $_GET["id"]);
                        $stmt->execute();
    
                        // set the resulting array to associative
                        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                            foreach($stmt->fetchAll() as $k=>$v) {
                                echo "<div class='news-main-image'>";
                                    echo"<img class='news-article-image' src='" . $v["featured-image"] . "' />";
                                    echo "<div class='article-header'>";
                                        echo "<div class='article-header-left'>";
                                            echo "<h1>" . $v["title"] . "</h1>";
                                        echo "</div>";
                                        echo "<div class='article-header-right'>";
                                            echo "<div class='article-header-right-user'>";
                                                echo "<img src='../resources/images/article/profile.png'/>";
                                                echo "<p id='user'> by " . $v["author"] . "</p>";
                                                echo "<p><em>" . date('j F Y H:i', strtotime($v["date"])) . "</em></p>";
                                            echo "</div>";
                                            echo "<div class='article-header-right-views'>";
                                                echo "<p><strong>" . $v["views"] . "</strong> views</p>";
                                                echo "<p class='likes'><strong>" . $v["likes"] . "</strong> likes</p>";
                                            echo "</div>";
                                        echo "</div>";
                                    echo "</div>";
                                echo "</div>";
                                
                                echo "<div class='article-content-left'>";
                                    echo "<p>" . $v["sub-title"] . "</p>";
                                    echo "<div class='article-content'>" . $v["article-content"] . "</div>";
                                    echo "<div class='article-content-tags'>";
                                
                                    $tagStmt = Config::get()->prepare("SELECT * FROM `article_tags` WHERE `id` = :id");
                                    $tagStmt->bindParam(":id", $_GET["id"]);
                                    $tagStmt->execute();
                                
                                    $tagResult = $tagStmt->setFetchMode(PDO::FETCH_ASSOC);
                                
                                    foreach($tagStmt->fetchAll() as $k=> $c) {
                                        echo "<p>" . $c["tag"] . "</p>";
                                    }
                                    echo "</div>";
                                
                                
                                    echo "<div class='article-content-line'>";
                                    echo "</div>";
                                
                                    echo "<div class='article-image-gallery'>";
                                        echo "<p> Photo Gallery </p>";
                                
                                        echo "<div class='article-image-gallery-images'>";
                                
                                            $imageStmt = Config::get()->prepare("SELECT * FROM `article_images` WHERE `article_id` = :id");
                                            $imageStmt->bindParam(":id", $_GET["id"]);
                                            $imageStmt->execute();
                                
                                            $imageResult = $imageStmt->setFetchMode(PDO::FETCH_ASSOC);
                                            $amount = 0;
                                            foreach($imageStmt->fetchAll() as $k=> $d) {
                                                echo "<img name='article-images' data='image-" . $amount. "' src='" . $d["url"] . "'' />";
                                                $amount++;
                                            }
                                        echo "</div>";
                                    echo "</div>";
                                
                                

                                    echo "<div id='disqus_thread'></div>";
                        
                                echo "</div>";
                                
                                
                                echo "<div class='article-content-right'>";
                                    echo "<a class='facebook' href=''> share on Facebook</a>";
                                    echo "<a class='twitter' href=''> tweet on Twitter</a>";
                                    echo "<a class='google' href=''> share on Google+</a>";
                                echo "</div>";
                        }
                    } catch(PDOException $e) {
                        echo "Error: " . $e->getMessage();
                    }
                    $conn = null;
                ?>

                <div class="trending-wrapper">
					<div class="trending">
						<p class="trending-p">Trending</p>
						<div class="trending-element">
							<img class="trending-image" src="../resources/images/trending/frankfurt.png">
							<div class="image-overlay">
								<div class="image-text-overlay">
									<p>Frankfurt 2015</p>
								</div>
							</div>
						</div>
						<div class="trending-element">
							<img class="trending-image" src="../resources/images/trending/bugatti.png">
							<div class="image-overlay">
								<div class="image-text-overlay">
									<p>Veyron Vision GT</p>
								</div>
							</div>
						</div>
						<div class="trending-element">
							<img class="trending-image" src="../resources/images/trending/forza.png">
						</div>
					</div>

                    <p class="trending-p">Latest</p>
                    <div class="article-latest">

                    <?php
                        
                        require_once("../config.php");
                        
                        $stmt = Config::get()->prepare("SELECT * FROM `articles` WHERE status = 2 ORDER BY `date` DESC LIMIT 4");
                        $stmt->execute();
                        
                        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                        foreach($stmt->fetchAll() as $k=>$v) {
                            if ($v["status"] != 2)
                                    continue; 
                            echo "<div class='article-latest-wrap'>";
                                echo "<img src='" . $v["featured-image"] . "' />";
                                echo "<a href='/autosoul/news/" .$v["id"] . "-" . strtolower(str_replace(" ", "-", $v["title"])) . "'>" .$v["title"] . " </a>";
                            echo "</div>";
                        }
                    ?>
                    </div>
				</div>

			</div>
		</div>

        <div class="side-bar-right">
            <div class="right-container">
                <div class="social-icons">
                    <img class="facebook-mini" src="../resources/images/dashboard/social/facebook-mini.png" />
                    <img class="twitter-mini" src="../resources/images/dashboard/social/twitter-mini.png" />
                    <img class="instagram-mini" src="../resources/images/dashboard/social/insta-mini.png" />
                    <img class="google-mini" src="../resources/images/dashboard/social/google-mini.png" />
                </div>
                <ul class="links">
                    <li id="removeBullet"><a href="/">Terms</a></li>
                    <li><a href="/">Privacy</a></li>
                    <li><a href="/">Advertise</a></li>
                    <li><a href="/">Contact</a></li>
                    <li id="removeBullet"><a href="/">More</a></li>
                    <li><a href="/">Tip us</a></li>
                </ul>
                <p class="copyright"> © 2016 Autosoul </p>
            </div>
        </div>
        </div>
    </body>

</html>
