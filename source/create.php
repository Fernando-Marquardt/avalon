<?php
include "antet.php";
include "func.php";

if (isset($_SESSION["user"][0])) {
    $land = get_land();
    $xy = $land[rand(0, count($land) - 1)];
    $towns = towns($_SESSION["user"][0]);

    if (count($towns)) {
        $is_cap = 0;
        $data = explode("-", $towns[0][8]);
        $army = explode("-", $towns[0][7]);

        if ($data[7] < 10) {
            msg($lang['needCastle'], 'warning');
        }

        if ($army[11] < 10) {
            msg($lang['needColonists'], 'warning');
        }
    } else {
        $is_cap = 1;
    }
} else {
    header('Location: login.php');
    die();
}

include 'page.header.php';
?>

<div class="container">
    <div class="row">
        <div class="col-sm-offset-3 col-sm-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <?php echo $lang['createTown']; ?>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" action="create_.php?is_cap=<?php echo $is_cap; ?>" method="post">
                        <div class="form-group">
                            <label for="x" class="col-sm-4 control-label"><?php echo $lang['desCoord'] ?></label>
                            <div class="col-sm-2">
                                <input type="number" class="form-control" name="x" id="x" value="<?php echo $xy[0]; ?>" required>
                            </div>
                            <div class="col-sm-2">
                                <input type="number" class="form-control" name="y" id="y" value="<?php echo $xy[1]; ?>" required>
                            </div>
                            <div class="col-sm-4 form-control-static">
                                [<a href="javascript:go('create.php');"><?php echo $lang['random'] ?></a>]
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label"><?php echo $lang['desCapName'] ?></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="name" id="name" value="town_of_<?php echo $_SESSION["user"][1]; ?>" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-8">
                                <button type="submit" class="btn btn-primary"><?php echo $lang['create'] ?></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="func.js"></script>

<?php
include 'page.footer.php';
?>
