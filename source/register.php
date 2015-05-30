<?php
include "antet.php";
include "func.php";

$config = config();

if (!$config[3][1]) {
	msg($lang['regClosed'], 'warning');
}

$factions = factions();
$_SESSION["code"] = rand(1000, 9999);

include 'page.header.php';
?>

<div class="container">
	<div class="row">
		<div class="col-sm-6 col-sm-offset-3">
			<div class="panel panel-primary">
				<div class="panel-heading"><?php echo $lang['register']; ?></div>
				<div class="panel-body">
					<form class="form-horizontal" action="register_.php" method="post">
						<div class="form-group">
							<label for="username" class="col-sm-4 control-label"><?php echo $lang['username'] ?></label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="name" id="username">
							</div>
						</div>

						<div class="form-group">
							<label for="password" class="col-sm-4 control-label"><?php echo $lang['password'] ?></label>
							<div class="col-sm-8">
								<input type="password" class="form-control" name="pass" id="password">
							</div>
						</div>

						<div class="form-group">
							<label for="password_repeat" class="col-sm-4 control-label"><?php echo $lang['retypePass'] ?></label>
							<div class="col-sm-8">
								<input type="password" class="form-control" name="pass_" id="password_repeat">
							</div>
						</div>

						<div class="form-group">
							<label for="email" class="col-sm-4 control-label"><?php echo $lang['validEmail'] ?></label>
							<div class="col-sm-8">
								<input type="email" class="form-control" name="email" id="email">
							</div>
						</div>

						<div class="form-group">
							<label for="faction" class="col-sm-4 control-label"><?php echo $lang['faction'] ?></label>
							<div class="col-sm-8">
								<select class="form-control" name="faction" id="faction">
									<?php
									for ($i = 0; $i < count($factions); $i++) {
										echo "<option value=\"{$i}\">{$factions[$i][1]}</option>";
									}
									?>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label for="code" class="col-sm-4 control-label"><?php echo $lang['typeCode'] ?></label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="code" id="code">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-4 col-sm-8">
								<img src="captcha.php">
							</div>
						</div>

						<div class="form-group">
							<div class="col-sm-offset-4 col-sm-8">
								<button type="submit" class="btn btn-primary"><?php echo $lang['submit'] ?></button>
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
