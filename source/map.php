<?php
include "antet.php";
include "func.php";

include 'page.header.php';
?>

<div class="container" style="height: 400px;">
    <table class="q_table">
        <tr>
            <td class="td_content" id="content" align="left" valign="top"></td>
        </tr>
    </table>
</div>

<script src="func.js"></script>
<?php
if (isset($_GET["x"], $_GET["y"])) {$x=clean($_GET["x"]); $y=clean($_GET["y"]);}
else if (isset($_POST["x"], $_POST["y"])) {$x=clean($_POST["x"]); $y=clean($_POST["y"]);}
else if (isset($_SESSION["user"][0]))
{
 $towns=towns($_SESSION["user"][0]); $loc=town_xy($towns[0][0]);
 $x=$loc[0]; $y=$loc[1];
}
else {$x=rand(0, $m); $y=rand(0, $n);}
echo "<script type='text/javascript'> template('map_.php', 'x=".$x."&y=".$y."'); </script>";

include 'page.footer.php';
?>
