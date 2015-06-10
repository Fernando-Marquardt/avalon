<?php
include "antet.php";
include "func.php";

$gen_stats=gen_stats(48);

include 'page.header.php';
?>

<div class="container text-center">
    <div class="well well-lg">
        <ul class="list-inline">
            <li><a href="guide.php"><?php echo $lang['guide']; ?></a></li>
            <li><i class="md-more-vert"></i></li>
            <li><a href="faq.php">FAQ</a></li>
            <li><i class="md-more-vert"></i></li>
            <li><a href="credits.php"><?php echo $lang['credits'] ?></a></li>
            <li><i class="md-more-vert"></i></li>
            <li><a href="feats.php"><?php echo $lang['features'] ?></a></li>
        </ul>
    </div>
</div>

<?php
include 'page.footer.php';
?>
