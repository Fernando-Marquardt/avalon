<?php
require "antet.php";
require "func.php";

$gen_stats = gen_stats(48);

include 'page.header.php';
?>

<div class="container">
    <div class="page-content">
        <div class="announcement"><?php echo $announcement; ?></div>

        <div class="players-registered">
            <?php echo "{$lang['weHave']} {$gen_stats[0][0]} {$lang['users']}.<br>{$gen_stats[1][0]} {$lang['activeUsers']}"; ?>
        </div>
    </div>
</div>

<?php
include 'page.footer.php';
?>
