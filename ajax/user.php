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
  /* ChangeEqData */
  if (isset($_POST['ChangeEqData']))
      : if (intval($_POST['ChangeEqData']) == 0 || empty($_POST['ChangeEqData']))
      : redirect_to("../index.php");
  endif;
 $user->ChangeEqData();
  endif;
?>
<?php
  /* ChangeEqStatus */
  if (isset($_POST['ChangeEqStatus']))
      : if (intval($_POST['ChangeEqStatus']) == 0 || empty($_POST['ChangeEqStatus']))
      : redirect_to("../index.php");
  endif;
 $user->ChangeEqStatus();
  endif;
?>
<?php
  /* AddNewStatus */
  if (isset($_POST['AddNewStatus']))
      : if (intval($_POST['AddNewStatus']) == 0 || empty($_POST['AddNewStatus']))
      : redirect_to("../index.php");
  endif;
 $user->AddNewStatus();
  endif;
?>
<?php
  /* AddNewCategory */
  if (isset($_POST['AddNewCategory']))
      : if (intval($_POST['AddNewCategory']) == 0 || empty($_POST['AddNewCategory']))
      : redirect_to("../index.php");
  endif;
 $user->AddNewCategory();
  endif;
?>
<?php
  /* eqHistory */
  if (isset($_GET['eqHistory']))
      : if (intval($_GET['eqHistory']) == 0 || empty($_GET['eqHistory']))
      : redirect_to("../index.php");
  endif;
 $user->eqHistory();
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
<?php
  /* GetEqData */
  if (isset($_GET['GetEqData']))
      : if (intval($_GET['GetEqData']) == 0 || empty($_GET['GetEqData']))
      : redirect_to("../index.php");
  endif;
 $user->GetEqData();
  endif;
?>
