<?php
    session_start();
?>
<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name=viewport content="width=device-width, initial-scale=1">
		<title>Autosoul - Featured</title>
		<!-- Main CSS -->
        <link rel="stylesheet" type="text/css" href="../resources/css/main.css"/>
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">

		<!-- Javascript Link -->
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript" charset="utf-8"></script>
        <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
        <script src="../resources/js/admin-article.js" type="text/javascript" charset="utf-8"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js" type="text/javascript" charset="utf-8"></script>
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
                    <li class="side-bar-left-button">
                        <div class="publish-img inactive"></div>
                        <a href="/autosoul/admin/publish"> Publish </a>
                    </li>
                    <li class="side-bar-left-button active">
                        <div class="featured-img"></div>
                        <a href="../admin/featured"> Featured </a>
                    </li>
                </ul>
            </nav>
            <div class="content-wrapper">
                <div class="admin-article">
                    <div class="publish-content">
                        <div class="publish-options featured">
                            <ul>
                                <li class="publish-active"> <a href="/autosoul/admin/featured"> Featured  </a> </li>
                                <li> <a href="/autosoul/admin/published"> Published  </a> </li>
                            </ul>
                        </div>

                        <div class="admin-article-overview-box">
                            <div class="admin-article-action-bar">
                                <div class="admin-article-action-actions">
                                    <p class="admin-article-action-actions-p"> Actions </p>
                                    <div class="admin-article-action-drop">
                                        <p class="admin-article-action-unfeature"> Remove </p>
                                    </div>
                                </div>
                            </div>
                            <div class="admin-article-info-bar">
                                <input type="checkbox" id="admin-article-all" name="admin-article-all" />
                                <label id="admin-article-all" for="admin-article-all"><span></span></label>
                                <p class="admin-article-info-posts"> Posts </p>
                                <p class="admin-article-info-date"> Date Featured </p>
                            </div>
                            <?php
                                
                                require_once("../resources/lib/core.php");
                                
                                $core = Core::GetInstance();
                                $query = $core->conn->prepare("SELECT * FROM `articles` WHERE featured = 1");
                                $query->execute();
                                
                                foreach($query->fetchAll() as $k=>$v) {
                                    echo "<div class='admin-article-draft-box'>";
                                        echo "<input type='checkbox' id='article-" .$v['id']. "' name='draft-check' data='" .$v['id']. "'/>";
                                        echo "<label id='article-label-" .$v['id']. "' data='" .$v['id']. "' for='article-" .$v['id']. "'><span></span></label>";
                                        echo "<img src='" . $v['featured-image'] . "' />";
                                        echo "<p class='admin-article-title'>" . $v['title'] . " </p>";
                                        echo "<div class='admin-article-user-data'>";
                                            echo "<p class='admin-article-date'>" . date('j F Y H:i', strtotime($v['date'])) . "</p>";
                                            echo "<p class='admin-article-user'>" . $_SESSION['username'] . "</p>";
                                        echo "</div>";
                                    echo "</div>";
                                }
                            ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        </div>
    </body>

</html>
