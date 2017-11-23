<?php
ob_start();
?>

<div class="container">
	<div id="noty"></div>

	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<form action="" method="post" role="form" name="form" id="form" enctype="multipart/form-data">
				<div class="form-group">
					<label for="ih-url"></label>
					<input type="url" class="form-control" name="ih-url" id="ih-url" placeholder="<?php _e('put your url her!','ihvidw'); ?>">
				</div>
				<button name="submit" id="submit" type="submit" class="btn btn-primary"><?php _e('Run','ihvidw'); ?></button>
			</form>
		</div>
	</div>
    <div id="info"></div>
</div>
<?php
$vidw_front = ob_get_clean();
?>