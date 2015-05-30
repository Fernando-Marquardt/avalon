<?php
session_start();
if (isset($_SESSION["user"][0])) include "./language/".$_SESSION["user"][16];
else if (isset($_SESSION["lang"])) include "./language/".$_SESSION["lang"];
else include "./language/en.php";
$title=$lang['title']; $announcement=$lang['announc']; $m=49; $n=49;
$db_host="localhost"; $db_user="root"; $db_pass=""; $db_name="devana";
$bottom_text="Devana originally created by <a href='http://devana.eu'>Busuioc Andrei</a>. Avalon created by <a href=\"https://github.com/Fernando-Marquardt/avalon\">Fernando Marquardt</a>.";

function logo($title) {
    echo "<img src=\"resources/images/logo.png\" title=\"{$title}\" alt=\"{$title}\">";
}

function menu_up() {
    global $lang;

    if (isset($_SESSION["user"][1], $_GET["town"])) {
        $_GET["town"] = clean($_GET["town"]);
        $loc = town_xy($_GET["town"]);
        $map_lnk = "<a href='map.php?x={$loc[0]}&y={$loc[1]}'>{$lang['map']}</a>";
    } else {
        $map_lnk = "<a href='map.php?x=0&y=0'>{$lang['map']}</a>";
    }

    echo "<li><a href='index.php'>{$lang['home']}</a></li>";

    if (!isset($_SESSION["user"][1])) {
        echo "<li><a href='login.php'>{$lang['login']}</a></li>";
        echo "<li><a href='register.php'>{$lang['register']}</a></li>";
    } else {
        echo "<li><a href='logout.php'>{$lang['logout']}</a></li>";
    }

    echo "<li>{$map_lnk}</li><li><a href='/forum' target='blank'>{$lang['forum']}</a></li>";
    echo "<li><a href='help.php'>{$lang['about']}</a></li>";

    if (isset($_SESSION["user"][1])) {
        echo "<li><a href='profile_view.php?id={$_SESSION["user"][0]}'>{$lang['profile']}</a></li>";
        echo "<li><a href='towns.php'>{$lang['towns']}</a></li>";
    }
}

function menu_down() {
    global $lang;

    if (isset($_SESSION["user"][0], $_GET["town"])) {
    	$_GET["town"] = clean($_GET["town"]);
        echo "<li><a href='town.php?town={$_GET["town"]}'>{$lang['townCenter']}</a></li>";
        echo "<li><a href='town_stats.php?town={$_GET["town"]}'>{$lang['statistics']}</a></li>";
    }

    if (isset($_SESSION["user"][0])) {
        $alert = msg_rep_alert($_SESSION["user"][0]);

        $alert[0] = ($alert[0][0]) ? "<font color='red'>{$alert[0][0]}</font>" : "";
        $alert[1] = ($alert[1][0]) ? "<font color='red'>{$alert[1][0]}</font>" : "";
    } else {
        $alert = array(0, 0);
    }

    if (isset($_SESSION["user"][1])) {
        echo "<li><a href='reports.php?page=0'>{$alert[0]} {$lang['reports']}</a></li>";
        echo "<li><a href='messages.php?page=0'>{$alert[1]} {$lang['messages']}</a></li>";
        echo "<li><a href='chat.php'>{$lang['chat']}</a></li>";
    }

    if ((isset($_SESSION["user"][4])) && ($_SESSION["user"][4]>3)) {
        echo "<li><a href='apanel.php'>{$lang['adminPanel']}</a></li>";
    }
}

function about() {
    global $bottom_text;
    echo $bottom_text;
}

$system=array();
$system[0]=5;//chat message life, in minutes
$system[1]=5;//chat refresh time, in seconds
?>
