<?php
include "config.php";

$FARS = new FARS();

$FARS->is_login();

include_once "header.php";

if (!$FARS->has_authority(1)) {
	echo ("no authority");
	include_once "footer.php";
	exit();
}
?>

<?php
include_once "footer.php";
?>