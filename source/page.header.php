<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

    <link rel="stylesheet" href="resources/css/default-theme.css">
    <link rel="stylesheet" href="resources/css/default-style.css">
    <link rel="stylesheet" href="<?php echo $imgs . $fimgs; ?>default.css">

    <title><?php echo $title; ?></title>
</head>
<body>

<div class="navbar navbar-inverse navbar-static-top">
    <div class="container">
        <ul class="nav navbar-nav">
            <li><a href="ch_lang.php?lang=en.php"><img src="resources/images/flags/flag_great_britain.png"></a></li>
            <li><a href="ch_lang.php?lang=ro.php"><img src="resources/images/flags/flag_romania.png"></a></li>
            <li><a href="ch_lang.php?lang=de.php"><img src="resources/images/flags/flag_germany.png"></a></li>
            <li><a href="ch_lang.php?lang=it.php"><img src="resources/images/flags/flag_italy.png"></a></li>
            <li><a href="ch_lang.php?lang=nl.php"><img src="resources/images/flags/flag_netherlands.png"></a></li>
            <li><a href="ch_lang.php?lang=fr.php"><img src="resources/images/flags/flag_france.png"></a></li>
        </ul>
    </div>
</div>

<div class="container">
    <div class="page-logo">
        <?php logo($title); ?>
    </div>

    <div class="navbar navbar-default">
        <ul class="nav navbar-nav">
            <?php menu_up(); ?>
        </ul>
    </div>
</div>
