<?php
  define("_VALID_PHP", true);
  require_once("init.php");
?>
<?php 
if ($user->logged_in) {
	require "backend/users.php";
} else {
	redirect_to("login.php"); 	
}
?>