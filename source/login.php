<?php
include "antet.php";
include "func.php";

$_SESSION = array();
session_destroy();

include 'page.header.php';
?>

<div class="container">
	<div class="page-content">
		<div class="row">
			<div class="col-md-4 col-md-offset-2">
				<div class="panel panel-primary">
					<div class="panel-heading"><?php echo $lang['userLogin']; ?></div>
					<div class="panel-body">
						<form class="form-horizontal" action="login_.php" method="post">
							<div class="form-group">
								<label for="name" class="col-sm-4 control-label"><?php echo $lang['username']; ?></label>
								<div class="col-sm-8">
									<input type="text" class="form-control" name="name" id="name">
								</div>
							</div>

							<div class="form-group">
								<label for="password" class="col-sm-4 control-label"><?php echo $lang['password'] ?></label>
								<div class="col-sm-8">
									<input type="password" class="form-control" name="pass" id="password">
								</div>
							</div>

							<div class="form-group">
								<div class="col-sm-offset-4 col-sm-8">
									<button type="submit" class="btn btn-primary"><?php echo $lang['login'] ?></button><br>
									<a href="javascript:forgot();"><?php echo $lang['emailPass'] ?></a>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>

			<div class="col-md-4">
				<div class="panel panel-default">
					<div class="panel-heading"><?php echo $lang['sitterLogin'] ?></div>
					<div class="panel-body">
						<form class="form-horizontal" action="sit.php" method="post">
							<div class="form-group">
								<label for="sitter-account" class="col-sm-4 col-md-5 control-label"><?php echo $lang['accToSit'] ?></label>
								<div class="col-sm-8 col-md-7">
									<input type="text" class="form-control" name="account" id="sitter-account">
								</div>
							</div>

							<div class="form-group">
								<label for="sitter-username" class="col-sm-4 col-md-5 control-label"><?php echo $lang['yourUsername'] ?></label>
								<div class="col-sm-8 col-md-7">
									<input type="text" class="form-control" name="name" id="sitter-username">
								</div>
							</div>

							<div class="form-group">
								<label for="sitter-password" class="col-sm-4 col-md-5 control-label"><?php echo $lang['yourPass'] ?></label>
								<div class="col-sm-8 col-md-7">
									<input type="password" class="form-control" name="pass" id="sitter-password">
								</div>
							</div>

							<div class="form-group">
								<div class="col-sm-offset-4 col-md-offset-5 col-sm-8 col-md-7">
									<button type="submit" class="btn btn-default"><?php echo $lang['login'] ?></button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="func.js" type="text/javascript"></script>

<?php
include 'page.footer.php';
?>
