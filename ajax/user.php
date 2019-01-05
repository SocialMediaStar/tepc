<?php
/**	User **/
  define("_VALID_PHP", true);
  require_once("../init.php");
?>
<?php
  /* LoginForm */
  if (isset($_POST['LoginForm']))
      : if (intval($_POST['LoginForm']) == 0 || empty($_POST['LoginForm']))
      : redirect_to("../index.php");
  endif;
  $username = sanitize($_POST["username"]);
  $password = sanitize($_POST["password"]);
  $user->login($username,$password);
  endif;
?>
<?php
  /* AddUser */
  if (isset($_POST['NewUser']))
      : if (intval($_POST['NewUser']) == 0 || empty($_POST['NewUser']))
      : redirect_to("../index.php");
  endif;
 $user->NewUser();
  endif;
?>
<?php
  /* DeleteUser */
  if (isset($_POST['DeleteUser']))
      : if (intval($_POST['DeleteUser']) == 0 || empty($_POST['DeleteUser']))
      : redirect_to("../index.php");
  endif;
 $user->DeleteUser();
  endif;
?>
<?php
  /* ChangePWD */
  if (isset($_POST['ChangePWD']))
      : if (intval($_POST['ChangePWD']) == 0 || empty($_POST['ChangePWD']))
      : redirect_to("../index.php");
  endif;
 $user->ChangePWD();
  endif;
?>
<?php
  /* UserList */
  if (isset($_GET['userList']))
      : if (intval($_GET['userList']) == 0 || empty($_GET['userList']))
      : redirect_to("../index.php");
  endif;
 $user->UserList();
  endif;
?>
<?php
  /* GetUserData */
  if (isset($_GET['GetUserData']))
      : if (intval($_GET['GetUserData']) == 0 || empty($_GET['GetUserData']))
      : redirect_to("../index.php");
  endif;
 $user->GetUserData();
  endif;
?>
<?php
  /* EditUser */
  if (isset($_POST['EditUser']))
      : if (intval($_POST['EditUser']) == 0 || empty($_POST['EditUser']))
      : redirect_to("../index.php");
  endif;
 $user->EditUser();
  endif;
?>
