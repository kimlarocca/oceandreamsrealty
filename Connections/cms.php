<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_cms = "localhost";
$database_cms = "kim_4site";
$username_cms = "kim_larocca";
$password_cms = "Lotus18641864!";
$cms = mysqli_connect($hostname_cms, $username_cms, $password_cms, $database_cms) or trigger_error(mysqli_error(),E_USER_ERROR);
$websiteID = 17;
$idxLink = 'http://fl.living.net/idxfirm/1029621';
$homePage = 108;
$aboutmePage = 109;
$listingsPage = 110;
$contactPage = 112;
$localinfoPage = 100;
$searchPage = 111;
$meetOurTeamPage = 133;
$careersPage = 134;
$resourcesPage = 139;
?>
