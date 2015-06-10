<?php
include "antet.php";
include "func.php";

if (isset($_SESSION["user"][0], $_GET["type"], $_GET["id"])) {
    $_GET["type"] = clean($_GET["type"]);
    $_GET["id"] = clean($_GET["id"]);

    if ($_GET["type"]) {
        $msg = message($_GET["id"]);
    } else {
        $msg = report($_GET["id"]);
    }

    if ($_SESSION["user"][0] != $msg[1 + $_GET["type"]]) {
        header('Location: login.php');
        die();
    }
} else {
    msg($lang['accessDenied'], 'warning');
}

include 'page.header.php';
?>

<div class="container">
    <div class="row">
        <div class="col-sm-offset-3 col-sm-6">
            <?php if ($_GET['type']): $usr = user($msg[1]); ?>
                <p>
                    <b><?php echo $lang['sender']; ?>:</b>
                    <a href="profile_view.php?id=<?php echo $usr[0]; ?>"><?php echo $usr[1]; ?></a>
                    [<a href="writemsg.php?msg=<?php echo $msg[0]; ?>"><?php echo $lang['reply']; ?></a>]
                </p>
            <?php endif; ?>

            <div class="panel panel-default">
                <div class="panel-heading"><?php echo $msg[2 + $_GET["type"]]; ?></div>
                <div class="panel-body">
                    <?php echo str_replace("\n", '<br>', $msg[3 + $_GET['type']]); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
if (strtotime($msg[4 + $_GET['type']]) > strtotime($_SESSION['user'][6])) {
    $_SESSION['user'][6] = $msg[4 + $_GET['type']];
}

include 'page.footer.php';
?>
