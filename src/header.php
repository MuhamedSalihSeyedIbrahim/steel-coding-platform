<?php
echo "<div id='wrapper'>

    <!-- Navigation -->
    <nav class='navbar navbar-inverse ' role='navigation'>
        <div class='navbar-header'>
            <text class='navbar-brand' href='#'>Steel-Platform</text>
        </div>
        <!-- Top Navigation: Left Menu -->
        <ul class='nav navbar-nav navbar-left navbar-top-links'>
            <li><a href='./dash_board.php'><i class='fa fa-home fa-fw'></i> Dash-Board</a></li>
        </ul><ul class='nav navbar-nav navbar-left navbar-top-links'>";

              if($_SESSION['role']==='admin')
                echo  "<li><a href='./codeadmin.php'><i class='fa fa-code'>
                </i>Code-Adminstration</a></li>";
                else {}
          echo "
        </ul>

        <ul class='nav navbar-nav navbar-left navbar-top-links'>
            <li><a href='./daily_challenge.php'><i class='fa fa-clock-o' aria-hidden='true'></i> DailyChallenge </a></li>
      </ul>

        <ul class='nav navbar-nav navbar-left navbar-top-links'>
            <li><a href='./leader_board.php'><i class='fa fa-pie-chart' aria-hidden='true'></i> Leaderboard </a></li>
      </ul>

        <!-- Top Navigation: Right Menu -->
        <ul class='nav navbar-right navbar-top-links' style=' margin-right: 0px;'>
            <li class='dropdown navbar-inverse'>
                 <!--   <a class='dropdown-toggle' data-toggle='dropdown' href='#'>
                    <i class='fa fa-bell fa-fw'></i> <b class='caret'></b>
                </a>
            <ul class='dropdown-menu dropdown-alerts'>
                    <li>
                        <a href='#'>
                            <div>
                                <i class='fa fa-comment fa-fw'></i> New Comment
                                <span class='pull-right text-muted small'>4 minutes ago</span>
                            </div>
                        </a>
                    </li>
                    <li class='divider'></li>
                    <li>
                        <a class='text-center' href='#'>
                            <strong>See All Alerts</strong>
                            <i class='fa fa-angle-right'></i>
                        </a>
                    </li>
                </ul>
            </li>-->
            <li class='dropdown' >
                <a style=' color:gray;' class='dropdown-toggle' onMouseOver='this.style.color=\"white\"'  onMouseOut='this.style.color=\"gray\"'data-toggle='dropdown' href='#'>
                 <img id='photo' src=  ' ". $_SESSION['photo']."'>
                ".$_SESSION['name']."
                 <b class='caret'></b>
                </a>

        <ul class='dropdown-menu dropdown-user'>
                    <!--<li><a href='#'><i class='fa fa-user fa-fw'></i> User Profile</a>
                    </li>
                    <li id='settings'><a href='#'><i class='fa fa-gear fa-fw'></i> Settings</a>
                    </li>
                    <li class='divider'></li>-->
                    <li id='logout'   onclick='googleSignout();'><a><i class='fa fa-sign-out fa-fw'></i> Logout</a>
                    </li>
                </ul>
            </li>
        </ul>
  </nav>";
?>
