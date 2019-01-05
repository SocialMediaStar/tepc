<?php
  define("_VALID_PHP", true);
  require_once("init.php");
?>
<?php 
if ($user->logged_in) {

if (isset($_GET["eq_id"])) {
require "backend/eq.php"; 	
} else {
redirect_to("equipments.php"); 	
}
} else {
redirect_to("index.php"); 	
}
?>