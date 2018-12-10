<?php
  define("_VALID_PHP", true);
  require_once("init.php");
?>
<?php 
if ($user->logged_in) {
require "html/index.php"; 	
	
} else {
require "html/login.php"; 	
}
?>