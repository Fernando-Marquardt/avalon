<?php
include "antet.php";
include "func.php";

if (isset($_SESSION["user"][0], $_GET["town"])) {
    $_GET["town"] = clean($_GET["town"]);
    $town = town($_GET["town"]);
} else {
    header('Location: login.php');
    die();
}

include 'page.header.php';
?>

<div class="container">
    <div class="row">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="alert alert-warning">
                <?php echo $lang['wishPurge'] ?> "<b><?php echo $town[2]; ?></b>"?

                <a class="btn btn-danger" href="purge_.php?town=<?php echo $town[0]; ?>"><?php echo $lang['yes'] ?></a>
                <a class="btn btn-success" href="towns.php"><?php echo $lang['no'] ?></a>
            </div>
        </div>
    </div>
</div>

<?php
include 'page.footer.php';
?>
