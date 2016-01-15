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

if (isset($_REQUEST['delete'])) {
	$sql = "delete from `teacher` where `id` = '" . $_REQUEST['teacher_id'] . "' limit 1 ;";
	// echo ($sql);
	$query = mysql_query($sql);
	echo ("affected row " . mysql_affected_rows());
	include_once "footer.php";
	exit();
}

$query = mysql_query('show full fields from `teacher` ;');
$field = array();
while ($res = mysql_fetch_array($query)) {
	$field[$res['Field']] = "";
}

$query = mysql_query('SHOW TABLES');
$table = array();
while ($res = mysql_fetch_array($query)) {
	array_push($table, $res['0']);
}

if (isset($_REQUEST['submit'])) {
	$submit = array();
	foreach ($field as $key => $val) {
		if (strstr($key, 'argu_') !== false) {
			$submit[$key] = @$_REQUEST[$key];
		}
	}

	if (isset($_REQUEST['teacher_id']) && $_REQUEST['teacher_id'] > 0) {
		$affect_value = array();
		foreach ($submit as $key => $val) {
			array_push($affect_value, "`$key` = '$val'");
		}
		$sql = "update `teacher` set " . implode($affect_value, ',') . " where `id` = '" . $_REQUEST['teacher_id'] . "';";
	} else {
		$affect_field = array();
		$affect_value = array();
		foreach ($submit as $key => $val) {
			array_push($affect_value, "'$val'");
			array_push($affect_field, "`$key`");
		}
		$sql = "insert into `teacher` (" . implode($affect_field, ',') . ") values (" . implode($affect_value, ',') . ");";
	}

	mysql_query($sql);

	echo "affected row " . mysql_affected_rows();
	include_once "footer.php";
	exit();

	// echo $sql;
}

?>



<div class="ui grid" style="padding: 0 50px">
	<div class="column">
		<form class="ui form" id="form-info" action="" method="get">

		    <div class="required disabled field">
		        <label>ID</label>
		        <input type="text" name="teacher_id" value="<?=@$_REQUEST['teacher_id']?>" readonly>
		    </div>

<?php

if (isset($_REQUEST['teacher_id'])) {
	$sql  = "select * from `teacher` where `id` = '" . $_REQUEST['teacher_id'] . "' limit 1;";
	$data = mysql_query($sql);
	$res  = mysql_fetch_array($data);
	foreach ($field as $key => $val) {
		$field[$key] = @$res[$key];
	}
}

$query = mysql_query('show full fields from `teacher` ;');

while ($res = mysql_fetch_array($query)) {
	if (strstr($res['Field'], 'argu_') !== false) {
		if (in_array($res['Field'], $table)) {
			?>
					    <div class="inline fields">
		        <label for="fruit">职称</label>
		        <?php
$data = $FARS->get_mysql($res['Field'], '`id`, `name`', '', false, false);
			while ($fie = mysql_fetch_row($data)) {
				?>
		        <div class="field">
		            <div class="ui radio checkbox">
		                <input type="radio" name="<?=$res['Field']?>" value="<?=$fie[0]?>" tabindex="0" class="hidden" <?=$field[$res['Field']] == $fie[0] ? 'checked' : ''?>>
		                <label><?=$fie[1]?></label>
		            </div>
		        </div>
<?php
}
			?>
</div>
<?php
} else {
			?>
		    <div class="required field">
		        <label><?=$res['Comment']?></label>
		        <input type="text" name="<?=$res['Field']?>" value="<?=$field[$res['Field']]?>">
		    </div>
<?php
}
	}
}
?>


		    <button type="submit" class="ui submit button" tabindex="0" value="submit" name="submit">Submit</button>
		</form>


</div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('.ui.dropdown').dropdown();
        $('.ui.radio.checkbox').checkbox();
        $('.ui.checkbox').checkbox();
    });
</script>

<?php
include_once "footer.php";
?>