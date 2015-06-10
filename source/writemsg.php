<?php
include "antet.php";
include "func.php";

if (!isset($_SESSION["user"][0])) {
    header('Location: login.php');
    die();
}

if (isset($_GET["id"])) {
    $usr = user($_GET["id"]);
    $user_name = $usr[1];
} else if (isset($_GET["name"])) {
    $user_name = clean($_GET["name"]);
} else if (isset($_GET["msg"])) {
    $msg = message(clean($_GET["msg"]));
    $usr = user($msg[1]);
    $user_name = $usr[1];
} else {
    $user_name = '';
}

if (isset($_GET["msg"])) {
    $msg = message(clean($_GET["msg"]));
    $subject = "RE: {$msg[3]}";
} else {
    $subject = "no_subject";
}

include 'page.header.php';
?>

<div class="container">
    <div class="row">
        <div class="col-sm-offset-3 col-sm-6">
            <div class="panel panel-primary">
                <div class="panel-heading"><?php echo $lang['writeMsg']; ?></div>

                <div class="panel-body">
                    <form class="form-horizontal" action="writemsg_.php" method="post">
                        <div class="form-group">
                            <label for="recipient" class="col-sm-4 control-label"><?php echo $lang['recipient'] ?></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="recipient" id="recipient" value="<?php echo $user_name; ?>" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="subject" class="col-sm-4 control-label"><?php echo $lang['subject'] ?></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="subject" id="subject" value="<?php echo $subject; ?>" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-8">
                                <textarea class="form-control" name="contents" rows="10" required></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-8">
                                <button type="submit" class="btn btn-primary"><?php echo $lang['send'] ?></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include 'page.footer.php';
?>
