<?php
  define("_VALID_PHP", true);
  require_once("init.php");
?>
<?php 
if ($user->logged_in) {
require "html/equipments.php"; 	
	
} else {
require "html/login.php"; 	
}
?>