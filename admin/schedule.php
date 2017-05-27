<?php
    session_start();
?>
<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name=viewport content="width=device-width, initial-scale=1">
		<title>Autosoul - Schedule</title>
		<!-- Main CSS -->
        <link rel="stylesheet" type="text/css" href="../resources/css/main.css"/>
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">

		<!-- Javascript Link -->
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript" charset="utf-8"></script>
        <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
        <script src="../resources/js/admin-article.js" type="text/javascript" charset="utf-8"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js" type="text/javascript" charset="utf-8"></script>

        <script type="text/javascript">
            $(function() {
                var schedule = document.getElementById('schedule');
                $('.admin-article-action-schedule').click(function() {
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
                    <div class="publish-content">
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
                        <div class="publish-options">
                            <ul>
                                <li> <a href="/autosoul/admin/publish"> Publish  </a> </li>
                                <li> <a href="/autosoul/admin/drafts"> Drafts  </a> </li>
                                <li class="publish-active"> <a href="/autosoul/admin/schedule"> Schedule  </a> </li>
                                <li> <a href="/autosoul/admin/history"> History  </a> </li>
                            </ul>
                        </div>

                        <div class="admin-article-overview-box">
                            <div class="admin-article-action-bar">
                                <div class="admin-article-action-actions">
                                    <p class="admin-article-action-actions-p"> Actions </p>
                                    <div class="admin-article-action-drop-cancel">
                                        <p class="admin-article-action-publish"> Publish </p>
                                        <p class="admin-article-action-schedule"> Schedule </p>
                                        <p class="admin-article-action-cancel"> Cancel Schedule </p>
                                        <p class="admin-article-action-delete"> Delete </p>
                                    </div>
                                </div>
                            </div>
                            <div class="admin-article-info-bar">
                                <input type="checkbox" id="admin-article-all" name="admin-article-all" />
                                <label id="admin-article-all" for="admin-article-all"><span></span></label>
                                <p class="admin-article-info-posts"> Posts </p>
                                <p class="admin-article-info-date"> Scheduled (UTC+1) </p>
                            </div>
                            <?php
                                
                                require_once("../resources/lib/core.php");
                                
                                $core = Core::GetInstance();
                                $query = $core->conn->prepare("SELECT * FROM `articles` WHERE author = 0 and status = 1");
                                $query->execute();
                                
                                foreach($query->fetchAll() as $k=>$v) {
                                    if ($v['status'] != 1)
                                        continue;
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
