<?php
include "antet.php";
include "func.php";

if (isset($_SESSION["user"][0])) {
    $towns = towns($_SESSION["user"][0]);
    $twnCount = count($towns);
} else {
    header('Location: login.php');
    die();
}

include 'page.header.php';
?>

<div class="container">
    <div class="row">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <table class="table">
                    <thead>
                        <tr>
                            <th><?php echo $lang['townName'] ?></th>
                            <th><?php echo $lang['population'] ?></th>
                            <th><?php echo $lang['coords'] ?></th>
                            <th><?php echo $lang['abandon'] ?></th>
                            <th><?php echo $lang['purge'] ?></th>
                            <th>flash</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        for ($i = 0; $i < $twnCount; $i++):
                            $town = town_xy($towns[$i][0]);
                        ?>
                            <tr>
                                <td><a href="town.php?town=<?php echo $towns[$i][0]; ?>"><?php echo $towns[$i][2]; ?></a></td>
                                <td><?php echo $towns[$i][3]; ?></td>
                                <td><a href="<?php echo "map.php?x={$town[0]}&y={$town[1]}"; ?>"><?php echo "({$town[0]}, {$town[1]})"; ?></a></td>
                                <td>[<a href="abandon.php?town=<?php echo $towns[$i][0]; ?>"><?php echo $lang['abandon']; ?></a>]</td>
                                <td>[<a href="purge.php?town=<?php echo $towns[$i][0]; ?>"><?php echo $lang['purge']; ?></a>]</td>
                                <td><a href="town.php?town=<?php echo $towns[$i][0]; ?>">flash</a></td>
                            </tr>
                        <?php
                        endfor;
                        ?>
                    </tbody>
                </table>

                <div class="panel-footer">
                    [<a href="create.php"><?php echo $lang['createTown']; ?></a>]
                    [<a href="ch_capital.php"><?php echo $lang['changeCap']; ?></a>]
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include 'page.footer.php';
?>
