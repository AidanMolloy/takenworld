<?php
session_start();
include("header.php");
if(!isset($_SESSION['uid'])){
    echo "You must be logged in to view this page!";
}else{
    ?>
    <center><h2>Rankings</h2></center>
    <br /><div id="ranking">
    <table cellpadding="2" cellspacing="2">
        <tr>
            <td width="50px"><b>Position</b></td>
            <td width="150px"><b>Username</b></td>
            <td width="200px"><b>Rank</b></td>
        </tr>
        <?php
        $get_users = mysql_query("SELECT `id`,`overall` FROM `ranking` WHERE `overall`>'0' ORDER BY `overall` ASC") or die(mysql_error());
        while($row = mysql_fetch_assoc($get_users)){
            echo "<tr>";
            echo "<td>" . $row['overall'] . "</td>";
            $get_user = mysql_query("SELECT `username` FROM `user` WHERE `id`='".$row['id']."'") or die(mysql_error());
            $user_name = mysql_fetch_assoc($get_user);
            echo "<td><a href=\"stats.php?id=" .$row['id']."\">" . $user_name['username'] . "</a></td>";
            $get_rank = mysql_query("SELECT `rank` FROM `ranking` WHERE `id`='".$row['id']."'") or die(mysql_error());
            $rank_name = mysql_fetch_assoc($get_rank);
            echo "<td>" .$rank_name['rank']. "</td>";
        }
        ?>
    </table></div>
    <?php
}
include("footer.php");
?>