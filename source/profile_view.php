<?php
include "antet.php";
include "func.php";

if (isset($_GET["id"]))
{
 $_GET["id"]=clean($_GET["id"]);
 $_GET["id"]=clean($_GET["id"]);
 check_d($_GET["id"]);
 $del=get_d($_GET["id"]);
 $usr=user($_GET["id"]);
 if (isset($usr[10])) $faction=faction($usr[10]); else $faction=array(0, 0, 0, 0);
 $towns=towns($_GET["id"]);
 if ($usr[11]) $alliance=alliance($usr[11]);
 $twnCount=count($towns); $population=0; $capital=array();
 for ($i=0; $i<$twnCount; $i++)
 {
  if ($towns[$i][4]) $capital=town_xy($towns[$i][0]);
  $population+=$towns[$i][3];
 }
} else header('Location: index.php');

include 'page.header.php';
?>

<div class="container">
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
            <h2><?php echo $usr[1]; ?></h2>

            <div class="panel panel-default">
                <div class="panel-body">
                    <form class="form-horizontal" action="profile_edit.php" method="post">
                        <div class="form-group">
                            <label class="col-sm-4 control-label"><?php echo $lang['faction'] ?></label>
                            <div class="col-sm-8">
                                <p class="form-control-static"><?php echo $faction[1]; ?></p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label"><?php echo $lang['ally'] ?></label>
                            <div class="col-sm-8">
                                <p class="form-control-static">
                                    <?php
                                    echo ($usr[11]) ? "<a href=\"a_view.php?id={$alliance[0]}\">{$alliance[1]}</a>" : '-';
                                    ?>
                                </p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label"><?php echo $lang['towns'] ?></label>
                            <div class="col-sm-8">
                                <p class="form-control-static"><?php echo $twnCount; ?></p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label"><?php echo $lang['population'] ?></label>
                            <div class="col-sm-8">
                                <p class="form-control-static"><?php echo $population; ?></p>
                            </div>
                        </div>

                        <?php if (isset($_SESSION['user'][1]) && $_SESSION['user'][1] == $usr[1]): ?>
                            <div class="form-group">
                                <label for="email" class="col-sm-4 control-label"><?php echo $lang['email'] ?></label>
                                <div class="col-sm-8">
                                    <input type="email" class="form-control" name="email" id="email" value="<?php echo $usr[3]; ?>">
                                </div>
                            </div>
                        <?php endif; ?>

                        <div class="form-group">
                            <label for="description" class="col-sm-4 control-label"><?php echo $lang['description'] ?></label>
                            <div class="col-sm-8">
                                <?php if (isset($_SESSION['user'][1]) && $_SESSION['user'][1] == $usr[1]): ?>
                                    <textarea class="form-control" rows="5" name="desc" id="description"><?php echo $usr[9]; ?></textarea>
                                <?php else: ?>
                                    <?php echo $usr[9]; ?>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label"><?php echo $lang['points'] ?></label>
                            <div class="col-sm-8">
                                <p class="form-control-static"><?php echo $usr[7]; ?></p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label"><?php echo $lang['regDate'] ?></label>
                            <div class="col-sm-8">
                                <p class="form-control-static"><?php echo $usr[5]; ?></p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label"><?php echo $lang['lastVisit'] ?></label>
                            <div class="col-sm-8">
                                <p class="form-control-static"><?php echo $usr[6]; ?></p>
                            </div>
                        </div>

                        <?php if (isset($_SESSION['user'][1]) && $_SESSION['user'][1] == $usr[1]): ?>
                            <div class="form-group">
                                <label for="sitter" class="col-sm-4 control-label"><?php echo $lang['sitter'] ?></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="sitter" id="sitter" value="<?php echo $usr[12]; ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="grpath" class="col-sm-4 control-label"><?php echo $lang['graphPackPath'] ?></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="grpath" id="grpath" value="<?php echo $usr[13]; ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="language" class="col-sm-4 control-label"><?php echo $lang['language'] ?></label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="lang" id="language">
                                        <?php
                                        $dir = dir('language/');

                                        while ($filename = $dir->read()) {
                                            if ($filename[0] != '.') {
                                                echo "<option value=\"{$filename}\"" . ($_SESSION['user'][16] == $filename ? ' selected' : '') . ">{$filename}</option>";
                                            }
                                        }

                                        $dir->close();
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password" class="col-sm-4 control-label"><?php echo $lang['enterPass'] ?></label>
                                <div class="col-sm-8">
                                    <input type="password" class="form-control" name="pass" id="password" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-4 col-sm-8">
                                    <button type="submit" class="btn btn-primary"><?php echo $lang['save']; ?></button>
                                </div>
                            </div>
                        <?php endif; ?>
                    </form>

                    <?php if (isset($_SESSION['user'][1]) && $_SESSION['user'][1] == $usr[1]): ?>
                        <form class="form-horizontal" action="pass.php" method="post">
                            <div class="form-group">
                                <label for="oldpass" class="col-sm-4 control-label"><?php echo $lang['oldPass'] ?></label>
                                <div class="col-sm-8">
                                    <input type="password" class="form-control" name="pass" id="oldpass" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="newpass" class="col-sm-4 control-label"><?php echo $lang['newPass'] ?></label>
                                <div class="col-sm-8">
                                    <input type="password" class="form-control" name="pass_" id="newpass" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="retypepass" class="col-sm-4 control-label"><?php echo $lang['retypePass'] ?></label>
                                <div class="col-sm-8">
                                    <input type="password" class="form-control" name="pass__" id="retypepass" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-4 col-sm-8">
                                    <button type="submit" class="btn btn-primary"><?php echo $lang['save']; ?></button>
                                </div>
                            </div>
                        </form>

                        <form class="form-horizontal" action="delacc.php" method="post">
                            <div class="form-group">
                                <label for="delpass" class="col-sm-4 control-label"><?php echo $lang['enterPass'] ?></label>
                                <div class="col-sm-8">
                                    <input type="password" class="form-control" name="pass" id="delpass" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-4 col-sm-8">
                                    <button type="submit" class="btn btn-danger"><?php echo $lang['delAcc']; ?></button>

                                    <?php if ($del): ?>
                                        <p class="form-control-static">
                                            <span id="1"><?php echo $del; ?></span>
                                            <?php echo $lang['toDel']; ?>
                                            [<a href="cancel_d.php">cancel</a>]

                                            <script type="text/javascript">
                                            var id = new Array(50);
                                            timer('1', 'profile_view.php?id=<?php echo $_SESSION['user'][0]; ?>');
                                            </script>
                                        </p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </form>
                    <?php endif; ?>
                </div>
            </div>

            <?php if (isset($_SESSION['user'][1]) && $_SESSION['user'][1] == $usr[1]): ?>
                <div class="panel panel-default">
                    <div class="panel-heading"><?php echo $lang['towns']; ?></div>

                    <table class="table">
                        <thead>
                            <tr>
                                <th><?php echo ucfirst($lang['townName'])?></th>
                                <th><?php echo $lang['population'] ?></th>
                                <th><?php echo $lang['coords'] ?></th>
                                <th><?php echo $lang['description'] ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            for ($i = 0; $i < $twnCount; $i++):
                                $town = town_xy($towns[$i][0]);
                            ?>
                                <tr>
                                    <td><a href="<?php echo "map.php?x={$town[0]}&y={$town[1]}"; ?>"><?php echo $towns[$i][2]; ?></a></td>
                                    <td><?php echo $towns[$i][3]; ?></td>
                                    <td><?php echo "({$town[0]}, {$town[1]})"; ?></td>
                                    <td><a href="msg.php?msg=<?php echo str_replace("'", "\"", str_replace("\n", '<br>', $towns[$i][14])); ?>">view</a></td>
                                </tr>
                            <?php endfor; ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <div class="col-sm-offset-4 col-sm-4">
        <div class="btn-group btn-group-justified">
            <?php if (isset($capital[0])): ?>
                <a class="btn btn-info" href="<?php echo "map.php?x={$capital[0]}&y={$capital[1]}" ?>"><?php echo $lang['centerMap'] ?></a>
            <?php endif; ?>
            <a class="btn btn-info" href="writemsg.php?name=<?php echo $usr[1]; ?>"><?php echo $lang['writeMsg'] ?></a>
        </div>
    </div>
</div>

<?php
include 'page.footer.php';
?>
