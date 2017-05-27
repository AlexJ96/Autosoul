<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name=viewport content="width=device-width, initial-scale=1">
		<title>Autosoul</title>
		<!-- Main CSS -->
		<link rel="stylesheet" type="text/css" href="resources/css/main.css"/>
		<!-- Javascript Link -->
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>

		<script type="text/javascript">

			$("document").ready(function()
                {
                                
				var sliderImages,
					id,
					maxSideImages,
					sliderTimer;
				
				function mod(n, m) 
				{
					return ((n % m) + m) % m;
				}
				
				function initialiseSlider()
				{
					sliderImages = $('.slider-image').length;
					id = 0;
					maxSideImages = 3;
					
					$('.slider-image').hide();
					$('.slider-image[id=0]').show();
					
					for(i = 0; 	i < maxSideImages; i++)
					{
						$('.slider-side-images').append('<img class="slider-side-image" id="' + i + '" />');
					}
					
					reloadSideImages();
                    updateFeatureText();
					
					sliderTimer = setInterval(function(){ changeSliderImage((id+1)) }, 3500);
					
				}
				
				function changeSliderImage(image_id)
				{
                    $('.slider-image[id=' + id + ']').hide();
					//id = id == -1 ? sliderImages-1 : (image_id % sliderImages);
					
					if(id == -1)
					{
						id = sliderImages-1;
					}
					else
					{
						id = mod(image_id,sliderImages);
					}

					$('.slider-image[id=' + id + ']').show();
					
					reloadSideImages();
                    updateFeatureText();
				}
			
				function reloadSideImages()
				{
					for(i = 0; i < maxSideImages; i++)
					{
						$('.slider-side-image[id=' + i + ']').attr("src", ($('.slider-image[id=' + ((id + i + 1) % sliderImages) + ']').attr("src")));
                        $('.slider-side-image[id=' + i + ']').attr("data-id", ((id + i + 1) % sliderImages));

					}
				}
                                
                function updateFeatureText()
                {
                    $('.caption a').html($('.slider-image[id=' + id + ']').attr("alt"));
                }
				
				$('.slider-main-button').click(function()
				{
					if($(this).hasClass("next"))
					{
						changeSliderImage(id+1);
					}
					else if($(this).hasClass("previous"))
					{
						changeSliderImage(id-1);
					}
					
					clearInterval(sliderTimer);
					sliderTimer = setInterval(function(){ changeSliderImage((id+1)) }, 3500);
				});
                                
                
                initialiseSlider();
                                
                $(function() {
                    $('.slider-side-image').click(function() {
                        changeSliderImage($(this).attr('data-id'));
                    });
                });
                                
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
                
                
			});
		</script>

    </head>

    <body>
        <div id="signUp">
            <img class="exit" src="resources/images/signup/exit.png"/>
            <img class="autosoul" src="resources/images/signup/autosoul-logo.png"/>
            <p class="sign-up-motto"> Automotive Redefined </p>
            <p class="sign-up-info"> We’re working on a car social platform for petrolheads around the world.
                <br><br>Sign up to get the latest updates. </p>
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
			<div class="middle">
				<div class="slider-box">
					<div class="slider-image-box">
                        <?php
                                
                            require_once("resources/lib/core.php");
                            
                            $core = Core::GetInstance();
                            $query = $core->conn->prepare("SELECT * FROM `articles` WHERE featured = 1 LIMIT 4");
                            $query->execute();
                            
                            $amount = 0;
                            foreach($query->fetchAll() as $k=>$v) {
                                echo "<img class='slider-image' src='" . $v['featured-image']. "' id='" .$amount. "' alt='" .$v['title']. "'>";
                                $amount++;
                            }

                        ?>
						<!--<img class="slider-image" src="resources/images/slider/porsche.jpg" id="0" alt="porsche on a mission">
						<img class="slider-image" src="resources/images/slider/lambo.png" id="1" alt="mclaren ">
						<img class="slider-image" src="resources/images/slider/ford.png" id="2" alt="lotus ">
						<img class="slider-image" src="resources/images/slider/pana.jpg" id="3" alt="mg">-->
						<div class="slider-main-button previous">
							<div class="button-text">
								<img src="resources/images/slider/arrow.png" />
							</div>
						</div>
						<div class="slider-main-button next">
							<div class="button-text">
								<img src="resources/images/slider/arrow.png" />
							</div>
						</div>
					</div>

					<div class="slider-side-images">
					</div>

					<div class="gradient"></div>
					<div class="gradient-bottom"></div>

					<div class="caption">
						<div class="featured-text">
							<p>Featured</p>
						</div>
						<a href=""> </a>
					</div>
					<div style="clear: both;"></div>
				</div>

                <div class="news-feed">
                    <p class="news-feed-p"> Latest News </p>

                    <?php
    
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "autosoul";
    
                        try {
                            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            $stmt = $conn->prepare("SELECT * FROM `articles` ORDER BY `date` DESC");
                            $stmt->execute();
                            
        
                            // set the resulting array to associative
                            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                            $id = 0;
                            foreach($stmt->fetchAll() as $k=>$v) {
                                $id = $v["id"];
                                if ($v["status"] != 2)
                                    continue; 
                                echo "<div class='news-feed-box'>";
            
                                echo "<img class='news-feed-box-image' src=" . $v["featured-image"] .">";
            
                                echo "</img>";
                                
                                echo "<div class='news-feed-box-wrapper'>";
                                
                                echo "<div class='news-feed-box-title'>";
                                echo "<a href='/autosoul/news/" .$v["id"] . "-" . strtolower(str_replace(" ", "-", $v["title"])) . "'>" .$v["title"] . " </a>";
                                echo "</div>";
            
                                echo "<div class='news-feed-box-description'>";
                                echo "<p>" . $v["sub-title"] . "</p>";
                                echo "</div>";
            
                                $tagStmt = $conn->prepare("SELECT * FROM `article_tags` WHERE `id` = $id");
                                $tagStmt->execute();
                                
                                $tagResult = $tagStmt->setFetchMode(PDO::FETCH_ASSOC);
                                
                                echo "<div class='news-feed-box-hashtag'>";
                                foreach ($tagStmt->fetchAll() as $k=>$b) {
                                    echo "<a href=''>" . $b["tag"] . "</a>";
                                }
                                echo "</div>";
                                
                                /** 
                                 TODO add username collect from ID
                                 **/
                                echo "<div class='news-feed-box-time'>";
                                echo "<p>" . date('j F Y H:i', strtotime($v['date'])) . " by </p> <a href='/' class='bold'> Autosoul </a>";
                                echo "</div>";
                                
                                echo "</div>";
                                echo "</div>";
                            }
                        }
                        catch(PDOException $e) {
                            echo "Error: " . $e->getMessage();
                        }
                        $conn = null;
                        
                        
                    ?>

                </div>


                <div class="trending-wrapper">
					<div class="trending">
						<p class="trending-p">Trending</p>
						<div class="trending-element">
							<img class="trending-image" src="resources/images/trending/frankfurt.png">
							<div class="image-overlay">
								<div class="image-text-overlay">
									<p>Frankfurt 2015</p>
								</div>
							</div>
						</div>
						<div class="trending-element">
							<img class="trending-image" src="resources/images/trending/bugatti.png">
							<div class="image-overlay">
								<div class="image-text-overlay">
									<p>Veyron Vision GT</p>
								</div>
							</div>
						</div>
						<div class="trending-element">
							<img class="trending-image" src="resources/images/trending/forza.png">
						</div>
					</div>
				</div>

			</div>
		</div>

        <div class="side-bar-right">
            <div class="right-container">
                <div class="social-icons">
                    <img class="facebook-mini" src="resources/images/dashboard/social/facebook-mini.png" />
                    <img class="twitter-mini" src="resources/images/dashboard/social/twitter-mini.png" />
                    <img class="instagram-mini" src="resources/images/dashboard/social/insta-mini.png" />
                    <img class="google-mini" src="resources/images/dashboard/social/google-mini.png" />
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
    </body>

</html>
