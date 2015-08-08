<?php
include "antet.php";
include "func.php";

$factions=factions();
$_SESSION["code"]=rand(1000, 9999);
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

    <link rel="stylesheet" href="resources/css/material-design-iconic-font.min.css">

    <link rel="stylesheet" href="resources/css/default-theme.css">
    <link rel="stylesheet" href="resources/css/default-style.css">
    <link rel="stylesheet" href="<?php echo $imgs . $fimgs; ?>default.css">

    <title><?php echo $title; ?> - Installation</title>
</head>
<body>

<div class="container">
    <div class="page-logo">
        <?php logo($title); ?>
    </div>
</div>

<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-primary">
				<div class="panel-heading">
					Installation
				</div>
				<div class="panel-body">
					<form class="form-horizontal" method="post" action="install_.php">
						<fieldset>
							<legend>Admin User</legend>

							<div class="form-group">
								<label for="name" class="col-sm-4 control-label">Admin username:</label>
								<div class="col-sm-8">
									<input type="text" name="name" id="name" class="form-control">
								</div>
							</div>

							<div class="form-group">
								<label for="pass" class="col-sm-4 control-label">Admin password:</label>
								<div class="col-sm-8">
									<input type="password" name="pass" id="pass" class="form-control">
								</div>
							</div>

							<div class="form-group">
								<label for="pass_" class="col-sm-4 control-label">Retype password:</label>
								<div class="col-sm-8">
									<input type="password" name="pass_" id="pass_" class="form-control">
								</div>
							</div>

							<div class="form-group">
								<label for="email" class="col-sm-4 control-label">Valid e-mail address:</label>
								<div class="col-sm-8">
									<input type="email" name="email" id="email" class="form-control">
								</div>
							</div>

							<div class="form-group">
								<label for="faction" class="col-sm-4 control-label">Faction:</label>
								<div class="col-sm-8">
									<select name="faction" id="faction" class="form-control">
										<?php for ($i = 0; $i < count($factions); $i++): ?>
											<option value="<?php echo $i; ?>"><?php echo $factions[$i][1]; ?></option>
										<?php endfor; ?>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label for="code" class="col-sm-4 control-label">Type code:</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" name="code" id="code" required>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-4 col-sm-8">
									<img src="captcha.php">
								</div>
							</div>

							<div class="form-group">
								<div class="col-sm-offset-4 col-sm-8">
									<button type="submit" class="btn btn-primary">Submit</button>
								</div>
							</div>
						</fieldset>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container">
    <div class="page-footer">
        <div class="page-footer-about"><?php about(); ?></div>
    </div>
</div>

</body>
</html>
