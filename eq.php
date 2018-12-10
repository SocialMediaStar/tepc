<?php
  define("_VALID_PHP", true);
  require_once("init.php");
?>
<?php 
if ($user->logged_in) {

if (isset($_GET["id"])) {
	$eq = $db->first("SELECT * FROM eq WHERE id = '".$_GET["id"]."'");
require "html/eq.php"; 	
} else {
redirect_to("equipments.php");
}
	
} else {
require "html/login.php"; 	
}
?>