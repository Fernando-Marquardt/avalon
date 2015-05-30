<?php
include "antet.php";
include "func.php";

$msg_type = 'info';

if (isset($_GET['type'])) {
	switch (clean($_GET['type'])) {
		case 'error':
			$msg_type = 'danger';
			break;
		default:
			$msg_type = clean($_GET['type']);
			break;
	}
}

include 'page.header.php';
?>

<div class="container">
	<div class="alert alert-<?php echo $msg_type; ?>"><?php echo clean($_GET['msg']); ?></div>
</div>

<?php
include 'page.footer.php';
?>
