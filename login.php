<?php
include "config.php";

$FARS = new FARS();

function user_auth($username, $password) {
	global $FARS;

	$code = $FARS->encrypt($password);
	$res  = mysql_fetch_row($FARS->get_mysql('user', 'count(*)', "`username` = '$username' AND `password` = '$code'", false, true));

	if ('0' !== $res[0]) {
		return true;
	} else {
		return false;
	}

}

$display = "display:none";

if (isset($_REQUEST['submit'])) {
	if (user_auth(@$_REQUEST['username'], @$_REQUEST['password'])) {
		setcookie('username', $_REQUEST['username']);
		header("Location:list.php");
	} else {
		$display = "";
	}
}

include_once "header.php";

?>

<div class="ui middle aligned center aligned grid">
  <div class="column">
    <h2 class="ui blue header">
      <div class="content">
        登入
      </div>
    </h2>
    <form class="ui large form" action="login.php?next=<?php echo urlencode($_SERVER['REQUEST_URI']); ?>" method="post">
      <div class="ui stacked segment">
        <div class="field">
          <div class="ui left icon input">
            <i class="user icon"></i>
            <input type="text" name="username" placeholder="用户名">
          </div>
        </div>
        <div class="field">
          <div class="ui left icon input">
            <i class="lock icon"></i>
            <input type="password" name="password" placeholder="密码">
          </div>
        </div>
        <button type="submit" class="ui fluid large blue submit button" name="submit">登入</button>
      </div>

<div class="ui red message" style="<?=$display?>">
  <div class="header">
    登入失败
  </div>
  <ul class="list">
    <li>如忘记密码请联系管理员</li>
  </ul>
</div>

    </form>
  </div>
</div>

<?php
include_once "footer.php";
?>