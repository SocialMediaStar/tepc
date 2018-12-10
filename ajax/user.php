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
  if (isset($_POST['AddUser']))
      : if (intval($_POST['AddUser']) == 0 || empty($_POST['AddUser']))
      : redirect_to("../index.php");
  endif;
 $user->AddUser();
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
  if (isset($_GET['UserList']))
      : if (intval($_GET['UserList']) == 0 || empty($_GET['UserList']))
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
  /* ChangeData */
  if (isset($_POST['ChangeData']))
      : if (intval($_POST['ChangeData']) == 0 || empty($_POST['ChangeData']))
      : redirect_to("../index.php");
  endif;
 $user->ChangeData();
  endif;
?>
<?php
  /* AddEQ */
  if (isset($_POST['AddEQ']))
      : if (intval($_POST['AddEQ']) == 0 || empty($_POST['AddEQ']))
      : redirect_to("../index.php");
  endif;
 $user->AddEQ();
  endif;
?>
<?php
  /* ChangeAbout */
  if (isset($_POST['ChangeAbout']))
      : if (intval($_POST['ChangeAbout']) == 0 || empty($_POST['ChangeAbout']))
      : redirect_to("../index.php");
  endif;
 $user->ChangeAbout();
  endif;
?>
<?php
  /* EqList */
  if (isset($_GET['EqList']))
      : if (intval($_GET['EqList']) == 0 || empty($_GET['EqList']))
      : redirect_to("../index.php");
  endif;
 $user->EqList();
  endif;
?>
