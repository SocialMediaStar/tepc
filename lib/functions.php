<?php
  /**
   * Functions
   *
   */
  if (!defined("_VALID_PHP"))
      die('Direct access to this location is not allowed.');
  
  /**
   * redirect_to()
   * 
   * @param mixed $location
   * @return
   */
  function redirect_to($location)
  {
      if (!headers_sent()) {
          header('Location: ' . $location);
		  exit;
	  } else
          echo '<script type="text/javascript">';
          echo 'window.location.href="' . $location . '";';
          echo '</script>';
          echo '<noscript>';
          echo '<meta http-equiv="refresh" content="0;url=' . $location . '" />';
          echo '</noscript>';
  }
  
  /**
   * countEntries()
   * 
   * @param mixed $table
   * @param string $where
   * @param string $what
   * @return
   */
  function countEntries($table, $where = '', $what = '')
  {
      global $db;
      if (!empty($where) && isset($what)) {
          $q = "SELECT COUNT(*) FROM " . $table . "  WHERE " . $where . " = '" . $what . "' LIMIT 1";
      } else
          $q = "SELECT COUNT(*) FROM " . $table . " LIMIT 1";
      
      $record = $db->query($q);
      $total = $db->fetchrow($record);
      return $total[0];
  }
  
  /**
   * countEntries1()
   * 
   * @param mixed $table
   * @param string $where
   * @param string $what
   * @return
   */
  function countEntries1($table, $what = '')
  {
      global $db;
          $q = "SELECT COUNT(*) FROM " . $table . "  WHERE " . $what . " LIMIT 1";      
      $record = $db->query($q);
      $total = $db->fetchrow($record);
      return $total[0];
  }
  /**
   * getChecked()
   * 
   * @param mixed $row
   * @param mixed $status
   * @return
   */
  function getChecked($row, $status)
  {
      if ($row == $status) {
          echo "checked=\"checked\"";
      }
  }
  
  /**
   * post()
   * 
   * @param mixed $var
   * @return
   */
  function post($var)
  {
      if (isset($_POST[$var]))
          return $_POST[$var];
  }
  
  /**
   * get()
   * 
   * @param mixed $var
   * @return
   */
  function get($var)
  {
      if (isset($_GET[$var]))
          return $_GET[$var];
  }
  
  /**
   * sanitize()
   * 
   * @param mixed $string
   * @param bool $trim
   * @return
   */
  function sanitize($string, $trim = false, $int = false, $str = false)
  {
      $string = filter_var($string, FILTER_SANITIZE_STRING);
      $string = trim($string);
      $string = stripslashes($string);
      $string = strip_tags($string);
      $string = str_replace(array('‘', '’', '“', '”'), array("'", "'", '"', '"'), $string);
      
	  if ($trim)
          $string = substr($string, 0, $trim);
      if ($int)
		  $string = preg_replace("/[^0-9\s]/", "", $string);
      if ($str)
		  $string = preg_replace("/[^a-zA-Z\s]/", "", $string);
		  
      return $string;
  }

  /**
   * cleanSanitize()
   * 
   * @param mixed $string
   * @param bool $trim
   * @return
   */
  function cleanSanitize($string, $trim = false,  $end_char = '&#8230;')
  {
	  $string = cleanOut($string);
      $string = filter_var($string, FILTER_SANITIZE_STRING);
      $string = trim($string);
      $string = stripslashes($string);
      $string = strip_tags($string);
      $string = str_replace(array('‘', '’', '“', '”'), array("'", "'", '"', '"'), $string);
      
	  if ($trim) {
        if (strlen($string) < $trim)
        {
            return $string;
        }

        $string = preg_replace("/\s+/", ' ', str_replace(array("\r\n", "\r", "\n"), ' ', $string));

        if (strlen($string) <= $trim)
        {
            return $string;
        }

        $out = "";
        foreach (explode(' ', trim($string)) as $val)
        {
            $out .= $val.' ';

            if (strlen($out) >= $trim)
            {
                $out = trim($out);
                return (strlen($out) == strlen($string)) ? $out : $out.$end_char;
            }       
        }
	  }
      return $string;
  }

  /**
   * character_limiter()
   * 
   * @param mixed $str
   * @param int $n
   * @param mixed $end_char
   * @return
   */
  function character_limiter($str, $n = 100, $end_char = '&#8230;')
  {
	  if (strlen($str) < $n)
	  {
		  return $str;
	  }

	  $str = preg_replace("/\s+/", ' ', str_replace(array("\r\n", "\r", "\n"), ' ', $str));

	  if (strlen($str) <= $n)
	  {
		  return $str;
	  }

	  $out = "";
	  foreach (explode(' ', trim($str)) as $val)
	  {
		  $out .= $val.' ';

		  if (strlen($out) >= $n)
		  {
			  $out = trim($out);
			  return (strlen($out) == strlen($str)) ? $out : $out.$end_char;
		  }       
	  }
  }
 
  /**
   * getValue()
   * 
   * @param mixed $stwhatring
   * @param mixed $table
   * @param mixed $where
   * @return
   */
  function getValue($what, $table, $where)
  {
      global $db;
      $sql = "SELECT $what FROM $table WHERE $where";
      $row = $db->first($sql);
      return $row[$what];
  }  
  /**
   * self()
   * 
   * @return
   */
  function self()
  {
      return htmlspecialchars($_SERVER['PHP_SELF']);
  }
  
  /**
   * tooltip()
   * 
   * @param mixed $tip
   * @return
   */
  function tooltip($tip, $front = false)
  {
	  $url = ($front) ? THEMEURL : ADMINURL;
	  
      return '<img src="' . $url . '/images/info2.png" alt="Tip" class="tooltip" title="' . $tip . '" />';
  }
  
  /**
   * required()
   * 
   * @return
   */
  function required($front = false)
  {
	  $url = ($front) ? THEMEURL : ADMINURL;
      return '<img src="' . $url . '/images/required.png" alt="'._REQ_FIELD.'" class="tooltip" title="'._REQ_FIELD.'" />';
  }

  /**
   * createPageLink()
   * 
   * @param mixed $slug
   * @return
   */
  function createPageLink($slug)
  {
      global $db, $core;
	  
      $sql = "SELECT slug FROM pages WHERE slug = '".sanitize($slug,50)."'";
      $row = $db->first($sql);
      
      if ($core->seo == 1) {
		  $display = $core->site_url . '/' . sanitize($row['slug'],50) . '.html';
      } else {
          $display = $core->site_url . '/content.php?pagename=' . sanitize($row['slug'],50);
      }
      return $display;
  }
  
  /**
   * stripTags()
   * 
   * @param mixed $start
   * @param mixed $end
   * @param mixed $string
   * @return
   */
  function stripTags($start, $end, $string)
  {
	  $string = stristr($string, $start);
	  $doend = stristr($string, $end);
	  return substr($string, strlen($start), -strlen($doend));
  }
  
  /**
   * getTemplates()
   * 
   * @param mixed $dir
   * @param mixed $site
   * @return
   */
  function getTemplates($dir, $site)
  {
      $getDir = dir($dir);
      while (false !== ($templDir = $getDir->read())) {
          if ($templDir != "." && $templDir != ".." && $templDir != "index.php") {
              $selected = ($site == $templDir) ? " selected=\"selected\"" : "";
              echo "<option value=\"{$templDir}\"{$selected}>{$templDir}</option>\n";
          }
      }
      $getDir->close();
  }
  
  /**
   * stripExt()
   * 
   * @param mixed $filename
   * @return
   */ 
  function stripExt($filename)
  {
      if (strpos($filename, ".") === false) {
          return ucwords($filename);
      } else
          return substr(ucwords($filename), 0, strrpos($filename, "."));
  }
  
  /**
   * loadEditor()
   * 
   * @param mixed $field
   * @param mixed $value
   * @param mixed $width
   * @param mixed $height
   * @param mixed $toolbar
   * @param mixed $var
   * @return
   */
  function loadEditor($field, $width = "100%", $height = "450", $var = "oEdit1")
  {
	  print '
		  <script type="text/javascript">
		    // <![CDATA[
			var '.$var.' = new InnovaEditor("'.$var.'");
			'.$var.'.width="'.$width.'";
			'.$var.'.height='.$height.';
			'.$var.'.arrCustomButtons = [
			["CustomName1","modelessDialogShow(\'editor/scripts/youtube_video.htm\',380,110)","Insert Youtube","btnYuytube.gif"],
			["CustomName2","modelessDialogShow(\'editor/scripts/paypal.htm\',350,270)","PayPal Button","btnPayPal.gif"],
			["CustomName3","oUtil.obj.insertHTML(\"<img src=\'images/pagesplit.gif\' style=\'display:block;margin-left:auto;margin-right:auto\' />\")","Page Split","btnPagebreak.gif"]
			]
			'.$var.'.toolbarMode = 2;
			'.$var.'.groups=[
			["grpEdit", "", ["XHTMLSource", "FullScreen", "Preview", "Search", "RemoveFormat", "BRK", "Undo", "Redo", "Cut", "Copy", "Paste", "PasteWord", "PasteText"]],
			["grpFont", "", ["FontName", "FontSize", "Strikethrough", "Superscript", "BRK", "Bold", "Italic", "Underline", "ForeColor", "BackColor"]],
			["grpPara", "", ["Paragraph", "Indent", "Outdent", "Styles", "StyleAndFormatting", "Absolute", "BRK", "JustifyLeft", "JustifyCenter", "JustifyRight", "JustifyFull", "Numbering", "Bullets"]],
			["grpInsert", "", ["Hyperlink", "Bookmark", "BRK", "Image", "Form"]],
			["grpTables", "", ["Table", "BRK", "Guidelines", "Guidelines", "CustomName2"]],
			["grpMedia", "", ["Media", "Flash", "CustomName1", "BRK", "CustomTag", "Characters", "Line"]]
			];
			
			'.$var.'.css="'.THEMEURL.'/css/custom.css";
			'.$var.'.cmdAssetManager = "modalDialogShow(\'editor/filemanager.php\',800,500)";
			'.$var.'.arrCustomTag=[
			["First Last Name","[NAME]"],
			["Username","[USERNAME]"],
			["Site Name","[SITE_NAME]"],
			["Site Url","[URL]"]
			];
			'.$var.'.customColors=["#ff4500","#ffa500","#808000","#4682b4","#1e90ff","#9400d3","#ff1493","#a9a9a9"];
			'.$var.'.mode="XHTMLBody";
			'.$var.'.REPLACE("'.$field.'");
			// ]]>
		  </script>
		  ';
  }

  /**
   * cleanOut()
   * 
   * @param mixed $text
   * @return
   */
  function cleanOut($text) {
	 $text =  strtr($text, array('\r\n' => "", '\r' => "", '\n' => ""));
	 $text = html_entity_decode($text, ENT_QUOTES, 'UTF-8');
	 $text = str_replace('<br>', '<br />', $text);
	 return stripslashes($text);
  }
    
  /**
   * isActive()
   * 
   * @param mixed $id
   * @return
   */
  function isActive($id)
  {
	  if ($id == 1) {
		  $display = '<img src="images/yes.png" alt="" class="tooltip" title="'._PUBLISHED.'"/>';
	  } else {
		  $display = '<img src="images/no.png" alt="" class="tooltip" title="'._NOTPUBLISHED.'"/>';
	  }

      return $display;;
  }

  /**
   * isAdmin()
   * 
   * @param mixed $id
   * @return
   */
  function isAdmin($userlevel)
  {
	  if ($userlevel == 9) {
		  $display = '<img src="images/superadmin.png" alt="" class="tooltip" title="Super Admin"/>';
	  } elseif ($userlevel == 8) {
		  $display = '<img src="images/admin.png" alt="" class="tooltip" title="Admin"/>';
	  } else {
		  $display = '<img src="images/user.png" alt="" class="tooltip" title="User"/>';
	  }

      return $display;;
  }

  /**
   * userStatus()
   * 
   * @param mixed $id
   * @return
   */
  function userStatus($status)
  {
	  switch ($status) {
		  case "y":
			  $display = '<img src="images/u_active.png" alt="" class="tooltip" title="'._USER_A.'"/>';
			  break;
			  
		  case "n":
			  $display = '<img src="images/u_inactive.png" alt="" class="tooltip" title="'._USER_I.'"/>';
			  break;
			  
		  case "t":
			  $display = '<img src="images/u_pending.png" alt="" class="tooltip" title="'._USER_P.'"/>';
			  break;
			  
		  case "b":
			  $display = '<img src="images/u_banned.png" alt="" class="tooltip" title="'._USER_B.'"/>';
			  break;
	  }
	  
      return $display;;
  }
  
  /**
   * delete_directory()
   * 
   * @param mixed $dirname
   * @return
   */ 
	function delete_directory($dirname) {
	   if (is_dir($dirname))
		  $dir_handle = opendir($dirname);
	   if (!$dir_handle)
		  return false;
	   while($file = readdir($dir_handle)) {
		  if ($file != "." && $file != "..") {
			 if (!is_dir($dirname."/".$file))
				@unlink($dirname."/".$file);
			 else
				delete_directory($dirname.'/'.$file);    
		  }
	   }
	   closedir($dir_handle);
	   @rmdir($dirname);
	   return true;
	}

  /**
   * randName()
   * 
   * @return
   */ 
  function randName() {
	  $code = '';
	  for($x = 0; $x<6; $x++) {
		  $code .= '-'.substr(strtoupper(sha1(rand(0,999999999999999))),2,6);
	  }
	  $code = substr($code,1);
	  return $code;
  }
        
  /**
   * checkDir()
   * 
   * @param mixed $dir
   * @return
   */ 
  function checkDir($dir)
  {
      if (!is_dir($dir)) {
          echo "path does not exist<br/>";
          $dirs = explode('/', $dir);
          $tempDir = $dirs[0];
          $check = false;
          
          for ($i = 1; $i < count($dirs); $i++) {
              echo " Checking " . $tempDir . "<br/>";
              if (is_writeable($tempDir)) {
                  $check = true;
              } else {
                  $error = $tempDir;
              }
              
              $tempDir .= '/' . $dirs[$i];
              if (!is_dir($tempDir)) {
                  if ($check) {
                      echo " Creating " . $tempDir . "<br/>";
                      @mkdir($tempDir, 0755);
                      @chmod($tempDir, 0755);
                  }
                  else
                      echo " Not enough permissions";
              }
          }
      }
  }

  /**
   * getSize()
   * 
   * @param mixed $size
   * @param integer $precision
   * @param bool $long_name
   * @param bool $real_size
   * @return
   */
  function getSize($size, $precision = 2, $long_name = false, $real_size = true)
  {
      $base = $real_size ? 1024 : 1000;
      $pos = 0;
      while ($size > $base) {
          $size /= $base;
          $pos++;
      }
      $prefix = _getSizePrefix($pos);
      $size_name = $long_name ? $prefix . "bytes" : $prefix[0] . 'B';
      return round($size, $precision) . ' ' . ucfirst($size_name);
  }

  /**
   * _getSizePrefix()
   * 
   * @param mixed $pos
   * @return
   */  
  function _getSizePrefix($pos)
  {
      switch ($pos) {
          case 00:
              return "";
          case 01:
              return "kilo";
          case 02:
              return "mega";
          case 03:
              return "giga";
          case 04:
              return "tera";
          default:
              return "?-";
      }
  }
  
  /**
   * dodate()
   * 
   * @param mixed $format
   * @param mixed $date
   * @return
   */  
  function dodate($format, $date) {
	  
	return strftime($format, strtotime($date));
  } 
  
  /**
   * getTime()
   * 
   * @return
   */ 
  function getTime() {
	  $timer = explode( ' ', microtime() );
	  $timer = $timer[1] + $timer[0];
	  return $timer;
  }
  /**
   * rand_string()
   * 
   * @return
   */ 
function rand_string( $length ) {

$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
return substr(str_shuffle($chars),0,$length);

}
  /**
   * TimeArr()
   * 
   * @return
   */ 
function TimeArr() {
	$data = array(
	"00:00","00:30","01:00","01:30","02:00","02:30","03:00","03:30","04:00","04:30","05:00","05:30","06:00","06:30","07:00",
	"07:30","08:00","08:30","09:00","09:30","10:00","10:30","11:00","11:30","12:00","12:30","13:00","13:30","14:00",
	"14:30","15:00","15:30","16:00","16:30","17:00","17:30","18:00","18:30","19:00","19:30","20:00","20:30","21:00",
	"21:30","22:00","22:30","23:00","23:30"
	);
	return $data;
}
  /**
   * week_date()
   * 
   * @return
   */ 
  function week_date($week, $year){
    $date = new DateTime();
    $data["first"] = $date->setISODate($year, $week, "1")->format('d.m.Y');
	$data["last"] = $date->setISODate($year, $week, "7")->format('d.m.Y');
		
	return $data; 
}
  /**
   * getWeeks()
   * 
   * @return
   */ 
  function getWeeks(){

	$now = date("Y-m-d");
	$TakeBack = strtotime("-8 week", strtotime($now));
	$AddWeek = strtotime($now);
	$start = date("Y-m-d", $TakeBack);
	$end = date("Y-m-d", $AddWeek);
	$i=0;
	while ($start != $end):
		$s = strtotime("+1 week", strtotime($start));	
		$start = date("Y-m-d", $s);
		
		$data[$i]["week"] = date("W", $s); 
		$data[$i]["year"] = date("Y", $s); 
	$i++;	
	endwhile;
	return $data;
  }
  function br2nl($input) {
    return preg_replace('/<br\\s*?\/??>/i', '', $input);
}
?>