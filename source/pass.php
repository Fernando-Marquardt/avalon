<?php
include "antet.php";
include "func.php";

if (isset($_SESSION["user"][1], $_POST["pass"])) {
    $_POST["pass"] = clean($_POST["pass"]);
    $_POST["pass_"] = clean($_POST["pass_"]);
    $_POST["pass__"] = clean($_POST["pass__"]);

    if ($_SESSION["user"][2] == md5($_POST["pass"])) {
        if ($_POST["pass_"] != "") {
            if ($_POST["pass_"] == $_POST["pass__"]) {
                if ($_SESSION["user"][1] != "guest") {
                    pass($_SESSION["user"][0], md5($_POST["pass_"]));
                    $_SESSION["user"][2] = $_POST["pass_"];
                } else {
                    msg($lang['guestPass'], 'error');
                }
            } else {
                msg($lang['passNotMatch'], 'warning');
            }
        } else {
            msg($lang['passNull'], 'warning');
        }
    } else {
        msg($lang['incorPass'], 'warning');
    }
} else {
    msg($lang['insufData'], 'warning');
}
?>
