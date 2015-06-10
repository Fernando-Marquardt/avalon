<?php
include "antet.php";
include "func.php";

include 'page.header.php';
?>

<div class="container">
	<div class="row">
		<div class="col-sm-offset-3 col-sm-6">
			<div class="panel panel-default">
				<div class="panel-heading">
					<?php echo $lang['changeCap']; ?>
				</div>
				<div class="panel-body">
					<form class="form-horizontal" action="ch_capital_.php" method="post">
						<div class="form-group">
							<label for="name" class="col-sm-5 control-label"><?php echo $lang['becomeCap'] ?></label>
							<div class="col-sm-7">
								<input type="text" class="form-control" name="name" id="name" required>
							</div>
						</div>

						<div class="form-group">
							<label for="password" class="col-sm-5 control-label"><?php echo $lang['yourPass'] ?></label>
							<div class="col-sm-7">
								<input type="password" class="form-control" name="pass" id="password" required>
							</div>
						</div>

						<div class="form-group">
							<div class="col-sm-offset-5 col-sm-7">
								<button type="submit" class="btn btn-primary"><?php echo $lang['change'] ?></button>
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
