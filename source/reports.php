<?php
include "antet.php";
include "func.php";

if (isset($_SESSION["user"][0])) {
    $reports = reports($_SESSION["user"][0]);

    $page = max(clean($_GET["page"]), 1);
    $first_index = ($page - 1) * 10;
    $how_many = min($first_index + 10, count($reports));
} else {
    header('Location: login.php');
    die();
}

include 'page.header.php';
?>

<div class="container">
    <div class="row">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-primary">
                <div class="panel-heading"><?php echo $lang['reports'] ?></div>

                <table class="table">
                    <thead>
                        <tr>
                            <th><?php echo $lang['subject'] ?></th>
                            <th><?php echo $lang['sentAt'] ?></th>
                            <th><?php echo $lang['delete'] ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for ($i = $first_index; $i < $how_many; $i++): ?>
                            <tr>
                                <td>
                                    <?php echo ($reports[$i][5]) ? '[new]' : ''; ?>
                                    <a href="msg_view.php?type=0&id=<?php echo $reports[$i][0]; ?>"><?php echo $reports[$i][2]; ?></a>
                                </td>
                                <td><?php echo $reports[$i][4]; ?></td>
                                <td>
                                    <a href="delrep.php?id=<?php echo $reports[$i][0]; ?>">x</a>
                                </td>
                            </tr>
                        <?php endfor; ?>
                    </tbody>
                </table>

                <div class="panel-footer">
                    <a href="delallrep.php"><?php echo $lang['deleteAll']; ?></a>
                </div>
            </div>

            <nav>
                <ul class="pagination">
                    <?php for ($i = max($page - 5, 1); $i <= min($page + 5, ceil(count($reports) / 10)); $i++): ?>
                        <li class="<?php echo ($page == $i) ? 'active' : ''; ?>"><a href="reports.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                    <?php endfor; ?>
                </ul>
            </nav>
        </div>
    </div>
</div>

<?php
include 'page.footer.php';
?>
