<?php
include "antet.php";
include "func.php";

if (isset($_SESSION["user"][0])) {
    $messages = messages($_SESSION["user"][0]);

    $page = max(clean($_GET["page"]), 1);
    $first_index = ($page - 1) * 10;
    $how_many = min($first_index + 10, count($messages));
} else {
    header('Location: login.php');
    die();
}

include 'page.header.php';
?>

<div class="container">
    <div class="row">
        <div class="col-sm-offset-5 col-sm-2">
            <div class="btn-group btn-group-justified">
                <a class="btn btn-info" href="writemsg.php"><?php echo $lang['write'] ?></a>
            </div>
        </div>

        <div class="col-sm-offset-2 col-sm-8">
            <p class="text-center">

            </p>

            <div class="panel panel-primary">
                <div class="panel-heading"><?php echo $lang['messages'] ?></div>

                <table class="table">
                    <thead>
                        <tr>
                            <th><?php echo $lang['subject'] ?></th>
                            <th><?php echo $lang['sender'] ?></th>
                            <th><?php echo $lang['sentAt'] ?></th>
                            <th><?php echo $lang['delete'] ?></th>
                            <th><?php echo $lang['reply'] ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for ($i = $first_index; $i < $how_many; $i++): $usr = user($messages[$i][1]); ?>
                            <tr>
                                <td>
                                    <?php echo ($messages[$i][6]) ? '[new]' : ''; ?>
                                    <a href="msg_view.php?type=1&id=<?php echo $messages[$i][0]; ?>"><?php echo $messages[$i][3]; ?></a>
                                </td>
                                <td>
                                    <a href="profile_view.php?id=<?php echo $usr[0]; ?>"><?php echo $usr[1]; ?></a>
                                </td>
                                <td><?php echo $messages[$i][5]; ?></td>
                                <td>
                                    <a href="delmsg.php?id=<?php echo $messages[$i][0]; ?>">x</a>
                                </td>
                                <td>
                                    <a href="writemsg.php?msg=<?php echo $messages[$i][0]; ?>"><?php echo $lang['reply']; ?></a>
                                </td>
                            </tr>
                        <?php endfor; ?>
                    </tbody>
                </table>

                <div class="panel-footer">
                    <a href="delallmsg.php"><?php echo $lang['deleteAll']; ?></a>
                </div>
            </div>

            <nav>
                <ul class="pagination">
                    <?php for ($i = max($page - 5, 1); $i <= min($page + 5, ceil(count($messages) / 10)); $i++): ?>
                        <li class="<?php echo ($page == $i) ? 'active' : ''; ?>"><a href="messages.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                    <?php endfor; ?>
                </ul>
            </nav>
        </div>
    </div>
</div>

<?php
include 'page.footer.php';
?>
