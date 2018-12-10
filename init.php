<?php
  /**
   * Init
   *
   */
  if (!defined("_VALID_PHP"))
      die('Direct access to this location is not allowed.');
?>
<?php error_reporting(E_ALL);

  // Magic Quotes Fix
  if (ini_get('magic_quotes_gpc')) {
      function clean($data)
      {
          if (is_array($data)) {
              foreach ($data as $key => $value) {
                  $data[clean($key)] = clean($value);
              }
          } else {
              $data = stripslashes($data);
          }
          
          return $data;
      }
      
      $_GET = clean($_GET);
      $_POST = clean($_POST);
      $_COOKIE = clean($_COOKIE);
  }
  
  $tepcomp = str_replace("init.php", "", realpath(__FILE__));
  define("tepcomp", $tepcomp);
  
  $configFile = tepcomp . "lib/config.ini.php";
  if (file_exists($configFile)) {
      require_once($configFile);
  } else {
      header("Location: setup/");
  }

  require_once(tepcomp . "lib/class_db.php");
  $db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE);
  $db->connect();
  
  //Include Functions
  require_once(tepcomp . "lib/functions.php");
  
   //Start Core Class 
  require_once(tepcomp . "lib/class_core.php");
  $core = new Core();
 
  //StartUser Class 
  require_once(tepcomp . "lib/class_user.php");
  $user = new Users();
?>