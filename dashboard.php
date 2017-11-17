<?php
    error_reporting(0);
    session_start();
    if( !isset($_SESSION["id"]) || empty($_SESSION["id"]) ) header("Location: index.php");
    else { 
        $_SESSION["callupdate"] = true; 
        unset($_SESSION["ts"]);
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Capstone Work</title>
        <link rel="stylesheet" href="css/dashboard.css" >
    </head>
    <body>
        <input type="button" value="Logout" onclick="logout()" class="button logout-btn">
        <ul>
            <li>Welcome <?php echo $_SESSION["name"]; ?> !</li>
            <li><a href="mailto:<?php echo $_SESSION['email']; ?>"><?php echo $_SESSION['email']; ?></a></li>
        </ul>
        <table style="width: 100%" border="0" cellspacing="3">
            <tr>
                <td style="width: 15%"><h3>Recorded Data</h3></td>
                <td><input type="button" class="button" onclick="update()" value="Update"></td>
                <td id="loading" style="display: none; padding: 15px"><img src="images/loading.gif" alt="loading..."></img></td>
                <td><h5 id="timestamp">Last updated at --:--:--</h5></td>
                <td><h5 class="updates"><span id="updatecount">--</span> new updates !</h5></td>
                <td>
                    <h5 style="display: inline-block">Set Refresh Interval : </h5>
                    <div class="styled-select blue semi-square" style="display: inline-block; vertical-align: middle;">
                      <select id="interval" onchange="setUpdateInterval()">
                        <option selected="selected" value="manual">Manual</option>
                        <option value="5">5 Sec(Optimal)</option>
                        <option value="1">1 Sec(Extremely fast)</option>
                        <option value="3">3 Sec(Fast connection)</option>
                        <option value="10">10 Sec(Slow Connection)</option>
                      </select>
                    </div>
                </td>
            </tr>
        </table>
        <input type="hidden" id="recordcount" value="-1">
        <table class="responstable" id="records">
          <tr>
            <!--<th>ID</th>-->
            <th>Day Dream</th>
            <th>Time</th>
          </tr>
        </table>
        
        <script type="text/javascript" src="js/custom.js"></script>
		<script type="text/javascript" src="js/jquery.min.js"></script>
        <?php
            if( !isset($_SESSION["ts"]) || (isset($_SESSION["callupdate"]) && $_SESSION["callupdate"]==true) ) {
                if( $_SESSION["callupdate"] ) $_SESSION["callupdate"]=false;
                echo '<script type="text/javascript">$(document).ready(function(){ update(); });</script>';
            }
        ?>

    </body>
</html>