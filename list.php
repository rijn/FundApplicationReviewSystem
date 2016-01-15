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

$_table = @$_REQUEST['table'];
if ('teacher' !== $_table && 'project' !== $_table) {
	$_table = "teacher";
}

$query = mysql_query("show full fields from `$_table` ;");
$field = array();
while ($res = mysql_fetch_array($query)) {
	$field[$res['0']] = $res['Comment'];
}

$query = mysql_query('SHOW TABLES');
$table = array();
while ($res = mysql_fetch_array($query)) {
	array_push($table, $res['0']);
}

?>

<table class="ui celled padded table">
  <thead>
    <tr>
<?php
foreach ($field as $key => $value) {
	echo '<th class="single line">' . $value . "</th>";
}
echo '<th class="single line">Action</th>';

?>
    </tr>
  </thead>
  <tbody>
<?php
$sql   = "select * from `$_table` order by `id` asc ;";
$query = mysql_query($sql);
while ($data = mysql_fetch_array($query)) {
	echo '<tr data-id="' . $data['id'] . '">';
	foreach ($field as $key => $value) {
		echo '<th class="single line">' . @$data[$key] . "</th>";
	}
	?>
<th class="single line">

<div class="ui small basic icon buttons">
  <button class="ui button button-edit"><i class="edit icon"></i>Edit</button>
  <button class="ui red basic button button-delete"><i class="trash outline icon"></i>Delete</button>

</div>

</th>
  <?php
echo '</tr>';
}
?>
</tbody>
</table>

<script type="text/javascript">
  $(document).ready(function() {
    $('.button-edit').click(function() {
      var id = $(this).parents('tr').data('id');
      window.location.href = "teacher.php?teacher_id=" + id;
    });
    $('.button-delete').click(function() {
      var id = $(this).parents('tr').data('id');
      window.location.href = "teacher.php?delete=true&teacher_id=" + id;
    });
  });
</script>

<?php
include_once "footer.php";
?>