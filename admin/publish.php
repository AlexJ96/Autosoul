<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name=viewport content="width=device-width, initial-scale=1">
		<title>Autosoul - Publish</title>
		<!-- Main CSS -->
        <link rel="stylesheet" type="text/css" href="../resources/css/main.css"/>
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">

		<!-- Javascript Link -->
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript" charset="utf-8"></script>
        <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js" type="text/javascript" charset="utf-8"></script>

        <!-- markItUp! -->
        <script type="text/javascript" src="markitup/jquery.markitup.js"></script>
        <!-- markItUp! toolbar settings -->
        <script type="text/javascript" src="markitup/sets/default/set.js"></script>
        <!-- markItUp! skin -->
        <link rel="stylesheet" type="text/css" href="markitup/skins/markitup/style.css">
        <!--  markItUp! toolbar skin -->
        <link rel="stylesheet" type="text/css" href="markitup/sets/default/style.css">

        <link href="../resources/css/jquery.tagit.css" rel="stylesheet" type="text/css">
        <link href="../resources/css/tagit.ui-zendesk.css" rel="stylesheet" type="text/css">

        <script src="../resources/js/tag-it.js" type="text/javascript" charset="utf-8"></script>
        <script src="../resources/js/topic.js" type="text/javascript" charset="utf-8"></script>
        <script src="../resources/js/featured-image.js" type="text/javascript" charset="utf-8"></script>
        <script src="../resources/js/image-gallery.js" type="text/javascript" charset="utf-8"></script>
        <script src="../resources/js/submit-article.js" type="text/javascript" charset="utf-8"></script>

        <script type="text/javascript">
            $(function() {
              $('#markItUp').markItUp(mySettings);
              $('#markItUp').val('');
              });

            $(function() {
              var sampleTags = [''];
              $('#allowSpacesTags').tagit({
                availableTags: sampleTags,
                allowSpaces: false
              });
            });
            $(function() {
                $('.main-topic-dropdown-cascade').click(function() {
                    $('.main-topic-dropdown-list').slideToggle('slow');
                    $(this).toggleClass('uparrow');

                });
            });

            $(function() {
                $('.topics-dropdown-cascade').click(function() {
                    $('.topics-dropdown-list').slideToggle('slow');
                    $(this).toggleClass('uparrow');
                });
              });

            $(function() {
              $('.main-topic-dropdown-list p').click(function() {
                 var id = $(this).attr('id');
                 $('.choose-topic').val($(this).text());
                 $('.choose-topic').focus();
              });
            });

            $(function() {
              var schedule = document.getElementById('schedule');
                $('.schedule-button').click(function() {
                    schedule.style.display = "block";
                });
            });

            $(function() {
                var schedule = document.getElementById('schedule');
                $('.exit2').click(function() {
                    schedule.style.display = "none";
                });
            });

            $(function() {
                var schedule = document.getElementById('schedule');
                $('.cancel-schedule').click(function() {
                    schedule.style.display = "none";
                });
            });

            $( function() {
              $( "#datepicker" ).datepicker({dateFormat: 'yy-mm-dd'
              });
            });
        </script>


    </head>

    <body>
        <div class="content-wrapper">
        <div class="nav">
            <div class="menu-icon"> </div>
            <h1>Autosoul</h1>
            <ul>
                <li><a href="">News</a></li>
                <li><a href="">Social</a></li>
                <li><a href="">About</a></li>
            </ul>
        </div>

        <nav class="side-bar-left">
            <p> Admin Panel </p>
            <ul class="side-bar-left-buttons">
                <li class="side-bar-left-button active">
                    <div class="publish-img"></div>
                    <a href="../admin/publish"> Publish </a>
                </li>
                <li class="side-bar-left-button">
                    <div class="featured-img inactive"></div>
                    <a href="../admin/featured"> Featured </a>
                </li>
            </ul>
        </nav>
		<div class="content-wrapper">
			<div class="admin-article">
                <div id="schedule">
                    <div class="schedule-title">
                        <p> Schedule Post </p>
                        <img class="exit2" src="../resources/images/signup/exit.png"/>
                    </div>

                    <input type="text" id="datepicker">
                    <input type="time" id="timepicker">
                    <p id="timezone"> UTC +1 </p>
                    <div class="schedule-buttons">
                        <div class="cancel-schedule">
                            <p> Cancel </p>
                        </div>
                        <div class="schedule-schedule">
                            <p class="schedule-button-popup"> Schedule </p>
                        </div>
                    </div>

                </div>
                <div class="publish-content">
                    <div class="publish-options">
                        <ul>
                            <li class="publish-active"> <a href="/autosoul/admin/publish"> Publish  </a> </li>
                            <li> <a href="/autosoul/admin/drafts"> Drafts  </a> </li>
                            <li> <a href="/autosoul/admin/schedule"> Schedule  </a> </li>
                            <li> <a href="/autosoul/admin/history"> History  </a> </li>
                        </ul>
                    </div>
                    <div class="publish-area">
                        <div class="publish-title">
                            <input name="title" type="text" placeholder="Enter title">
                        </div>
                        <div class="publish-sub-title">
                            <input name="sub-title" type="text" placeholder="Enter sub title">
                        </div>
                        <div class="publish-text-area">
                            <textarea id="markItUp" placeholder="Start writing article..">
                            </textarea>
                        </div>
                    </div>
                    <div class="publish-side-panel">
                        <div class="publish-buttons">
                            <img class="post-article" src="../resources/images/admin/post.png" />
                            <img class="schedule-button" src="../resources/images/admin/schedule-main.png" />
                            <img src="../resources/images/admin/draft.png" />
                        </div>
                        <div class="publish-featured" id="publish-featured">
                            <img class="cancel-featured" id="cancel-featured" src="../resources/images/admin/cancel-featured.png" />
                            <img class="edit-featured" id="edit-featured" src="../resources/images/admin/edit.png" />
                            <img id="publish-featured-image" src="../resources/images/admin/featured-image.png" />
                            <div class="publish-featured-photo-text" id="choose-featured-main">
                                <p class="choose-featured-main"> Set Featured Image </p>
                                <input type="file" class="choose-featured">
                            </div>
                        </div>
                        <div class="publish-tags">
                            <p> Tags </p>
                            <form>
                                <ul id="allowSpacesTags"></ul>
                            </form>
                            <p> Main Topic </p>
                            <div class="main-topic-dropdown">
                                <input name="topic_search" class="choose-topic" placeholder="Enter Main Topic">
                                <img class="add-new-topic" src="../resources/images/admin/add.png" />
                                <img class="main-topic-dropdown-cascade" src="../resources/images/admin/down-cascade.png"/>
                            </div>
                            <div id="main-topic-dd" class="main-topic-dropdown-list">
                                <?php
                                    require_once("../config.php");
                                    try{
                                        $stmt = Config::get()->prepare("SELECT * FROM `topics`");
                                        $stmt->execute();
                                        
                                        $amount = 0;
                                        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                                        foreach($stmt->fetchAll() as $k=>$v) {
                                            echo "<p id='topic-name-".$amount."'>" .$v["topic-name"]. "</p>";
                                            $amount++;
                                            
                                        }
                                    } catch (PDOException $e) {
                                        echo "Error: " . $e->getMessage();
                                    }
                                    $conn = null;
                                ?>
                            </div>
                            <p>Topics</p>
                            <div class="topics-dropdown">
                                <input name="topics_search" class="choose-topics" placeholder="Enter Topic">
                                <img class="add-new-topics" src="../resources/images/admin/add.png" />
                                <img class="topics-dropdown-cascade" src="../resources/images/admin/down-cascade.png"/>
                            </div>
                            <div id="topics-dd" class="topics-dropdown-list">
                            <?php
                                require_once("../config.php");
                                try{
                                    $stmt = Config::get()->prepare("SELECT * FROM `topics`");
                                    $stmt->execute();
        
                                    $amount = 0;
                                    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                                    foreach($stmt->fetchAll() as $k=>$v) {
                                        echo "<div class='topics-block'>";
                                        echo "<input type='checkbox' id='topic-name" .$amount. "' name='topic-name-" .$amount. "' data='" .$v["topic-name"]. "'/>";
                                        echo "<label id='topic-label" .$amount. "' for='topic-name" .$amount. "'><span></span>" .$v["topic-name"]. "</label>";
                                        
                                        
                                        echo "</div>";
                                        $amount++;
            
                                    }
                                } catch (PDOException $e) {
                                    echo "Error: " . $e->getMessage();
                                }
                                $conn = null;
                            ?>
                            </div>
                            <p></p>
                        </div>

                        <div class="publish-photo-gallery">
                            <p> Photo Gallery </p>
                            <div class="publish-photo-gallery-images">
                            </div>
                            <div id="publish-upload-photo" class="publish-upload-photo">
                                <img src="../resources/images/admin/upload-photo.png" />
                                <div class="publish-upload-photo-text">
                                    <p class="choose-gallery-main"> Upload Images </p>
                                    <input type="file" class="choose-gallery">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
			</div>
		</div>

        </div>
    </body>

</html>
