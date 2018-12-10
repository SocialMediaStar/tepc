<?php
/** Core Class **/
  
  if (!defined("_VALID_PHP"))
      die('Direct access to this location is not allowed.');
  
  class Core
  {
      
	  public $msgs = array();
	  public $showMsg;
	  private $sTable = "settings";
	  public $action = null;
	  public $maction = null;
	  public $paction = null;
	  public $do = null;
      public $year = null;
      public $month = null;
      public $day = null;	  
	  
      /**
       * Core::__construct()
       * 
       * @return
       */
      public function __construct()
      {
          $this->getSettings();
		  
		  
          $this->year = (get('year')) ? get('year') : strftime('%Y');
          $this->month = (get('month')) ? get('month') : strftime('%m');
          $this->day = (get('day')) ? get('day') : strftime('%d');
          
          return mktime(0, 0, 0, $this->month, $this->day, $this->year);
      }
      
      /**
       * Core::getSettings()
       *
       * @return
       */
      private function getSettings()
      {
          global $db;
          $sql = "SELECT * FROM " . $this->sTable;
          $row = $db->first($sql);
          
		  $this->site_url = $row["site_url"];
		  $this->site_dir = $row["site_dir"];

		  
		  $this->smtp_host = "";
		  $this->smtp_user = "";
		  $this->smtp_pass = "";
		  $this->smtp_port = "";
		  $this->is_ssl = "";
		  $this->sendmail = "SMAIL";
		  $this->mailer = "0";
		  }

	    	  	   	  	  
      /**
       * Core::getShortDate()
       * 
       * @return
       */ 
      public function getShortDate()
	  {
		  $arr = array(
				 '%m-%d-%Y' => '12-21-2009 (MM-DD-YYYY)',
				 '%e-%m-%Y' => '21-12-2009 (D-MM-YYYY)',
				 '%m-%e-%y' => '12-21-09 (MM-D-YY)',
				 '%e-%m-%y' => '21-12-09 (D-MM-YY)',
				 '%b %d %Y' => 'Dec 21 2009'
		  );
		  
		  $shortdate = '';
		  foreach ($arr as $key => $val) {
              if ($key == $this->short_date) {
                  $shortdate .= "<option selected=\"selected\" value=\"" . $key . "\">" . $val . "</option>\n";
              } else
                  $shortdate .= "<option value=\"" . $key . "\">" . $val . "</option>\n";
          }
          unset($val);
          return $shortdate;
      }
	  
      /**
       * Core::getLongDate()
       * 
       * @return
       */ 	  
      public function getLongDate()
	  {
		  $arr = array(
				'%B %d, %Y' => 'December 21, 2009',
				'%d %B %Y %H:%M' => '21 December 2009 19:00',
				'%B %d, %Y %I:%M %p' => 'December 21, 2009 4:00 am',
				'%A %d %B, %Y' => 'Monday 21 December, 2009',
				'%A %d %B, %Y %H:%M' => 'Monday 21 December 2009 07:00',
				'%a %d, %B' => 'Mon. 12, December'
		  );
		  
		  $longdate = '';
		  foreach ($arr as $key => $val) {
              if ($key == $this->long_date) {
                  $longdate .= "<option selected=\"selected\" value=\"" . $key . "\">" . $val . "</option>\n";
              } else
                  $longdate .= "<option value=\"" . $key . "\">" . $val . "</option>\n";
          }
          unset($val);
          return $longdate;
      }

      /**
       * Core::monthList()
       * 
       * @return
       */ 	  
      public function monthList()
	  {
		  $selected = is_null(get('month')) ? strftime('%m') : get('month');
		  
		  $arr = array(
				'01' => _JAN,
				'02' => _FEB,
				'03' => _MAR,
				'04' => _APR,
				'05' => _MAY,
				'06' => _JUN,
				'07' => _JUL,
				'08' => _AUG,
				'09' => _SEP,
				'10' => _OCT,
				'11' => _NOV,
				'12' => _DEC
		  );
		  
		  $monthlist = '';
		  foreach ($arr as $key => $val) {
			  $monthlist .= "<option value=\"$key\"";
			  $monthlist .= ($key == $selected) ? ' selected="selected"' : '';
			  $monthlist .= ">$val</option>\n";
          }
          unset($val);
          return $monthlist;
      }

      /**
       * Core::weekList()
       * 
       * @return
       */ 	  
      public function weekList()
	  {
		  $arr = array(
		        '1' => _SUNDAY,
				'2' => _MONDAY,
				'3' => _TUESDAY,
				'4' => _WEDNESDAY,
				'5' => _THURSDAY,
				'6' => _FRIDAY,
				'7' => _SATURDAY
		  );
		  
		  $weeklist = '';
		  foreach ($arr as $key => $val) {
              if ($key == $this->weekstart) {
                  $weeklist .= "<option selected=\"selected\" value=\"" . $key . "\">" . $val . "</option>\n";
              } else
                  $weeklist .= "<option value=\"" . $key . "\">" . $val . "</option>\n";
          }
          unset($val);
          return $weeklist;
      }
	  
      /**
       * Core::yearList()
	   *
       * @param mixed $start_year
       * @param mixed $end_year
       * @return
       */
	  function yearList($start_year, $end_year)
	  {
		  $selected = is_null(get('year')) ? date('Y') : get('year');
		  $r = range($start_year, $end_year);
		  
		  $select = '';
		  foreach ($r as $year) {
			  $select .= "<option value=\"$year\"";
			  $select .= ($year == $selected) ? ' selected="selected"' : '';
			  $select .= ">$year</option>\n";
		  }
		  return $select;
	  }
	  	  
      /**
       * Core::monthlyStats()
       * 
       * @return
       */ 	  
      public function monthlyStats()
	  {
          global $db;
          $sql = "SELECT id, SUM(pageviews) as views, SUM(uniquevisitors) as visits," 
		  . "\n (SELECT COUNT(id) FROM stats WHERE MONTH(day) = " . $this->month . " AND  YEAR(day) = " . $this->year . "  ) as total"
		  . "\n FROM stats" 
		  . "\n WHERE day > '" . $this->year . "-" . $this->month . "-01'" 
		  . "\n AND day < '" . $this->year . "-" . $this->month . "-31 23:59:59' GROUP BY MONTH(day)";
          
          $row = $db->first($sql);
          
		  return ($row['total'] > 0) ? $row : false;
      }
	  
      /**
       * Core::getStats()
       * 
       * @return
       */ 	  
      public function getStats()
	  {
          global $db;
          $sql = "SELECT *, SUM(pageviews) as views, SUM(uniquevisitors) as visits FROM stats" 
		  . "\n WHERE YEAR(day) = '" . $this->year . "'"
		  . "\n AND MONTH(day) = '" . $this->month . "' GROUP BY DATE(day)"; 
          
          $row = $db->fetch_all($sql);
          
          return ($row) ? $row : 0;
      }
	    
      /**
       * Core::getVisitors()
       * 
       * @return
       */
	  function getVisitors()
	  {
		  global $db;
		  if (@getenv("HTTP_CLIENT_IP")) {
			  $vInfo['ip'] = getenv("HTTP_CLIENT_IP");
		  } elseif (@getenv("HTTP_X_FORWARDED_FOR")) {
			  $vInfo['ip'] = getenv('HTTP_X_FORWARDED_FOR');
		  } elseif (@getenv('REMOTE_ADDR')) {
			  $vInfo['ip'] = getenv('REMOTE_ADDR');
		  } elseif (isset($_SERVER['REMOTE_ADDR'])) {
			  $vInfo['ip'] = $_SERVER['REMOTE_ADDR'];
		  } else {
			  $vInfo['ip'] = "Unknown";
		  }
		  
		  if (!preg_match("/^[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}$/i", $vInfo['ip']) && $vInfo['ip'] != "Unknown") {
			  $pos = strpos($vInfo['ip'], ",");
			  $vInfo['ip'] = substr($vInfo['ip'], 0, $pos);
			  if ($vInfo['ip'] == "")
				  $vInfo['ip'] = "Unknown";
		  }
		  
		  $vInfo['ip'] = str_replace("[^0-9\.]", "", $vInfo['ip']);
		  setcookie("hitcookie", time(), time() + 3600);
		  $vCookie['is_cookie'] = (isset($_COOKIE['hitcookie'])) ? 1 : 0;
		  $date = date('Y-m-d');
		  
		  $sql = "SELECT * FROM stats WHERE day='" . $date . "'";
		  $row = $db->first($sql);
		  if ($row) {
			  $hid = intval($row['id']);
			  $pageviews = $row['pageviews'];
			  $unique = $row['uniquevisitors'];
			  
			  $stats['pageviews'] = "INC(1)";
			  
			  $db->update("stats", $stats, "id='" . $hid . "'");
			  
			  if (!isset($_COOKIE['unique']) && $vCookie['is_cookie']) {
				  setcookie("unique", time(), time() + 3600);
				  
				  $stats['uniquevisitors'] = "INC(1)";
				  
				  $db->update("stats", $stats, "id='" . $hid . "'");
			  }
		  } else {
			  $istats['id'] = "null";
			  $istats['day'] = $date;
			  $istats['pageviews'] = 1;
			  $istats['uniquevisitors'] = 1;
			  $db->insert("stats", $istats);
		  }
	  }

      /**
       * Core::getTimezones()
       * 
       * @return
       */
	  public function getTimezones()
	  {
		  $data = '';
		  $tzone = DateTimeZone::listIdentifiers();
		  $data .='<select name="dtz" style="width:200px" class="custombox">';
		  foreach ($tzone as $zone) {
			  $selected = ($zone == $this->dtz) ? ' selected="selected"' : '';
			  $data .= '<option value="' . $zone . '"' . $selected . '>' . $zone . '</option>';
		  }
		  $data .='</select>';
		  return $data;
	  }

      /**
       * getRowById()
       * 
       * @param mixed $table
       * @param mixed $id
       * @param bool $and
       * @param bool $is_admin
       * @return
       */
      public function getRowById($table, $id, $and = false, $is_admin = true)
      {
          global $db;
		  $id = sanitize($id, 8, true);
		  if ($and) {
			  $sql = "SELECT * FROM " . (string)$table . " WHERE id = '" . $db->escape((int)$id) . "' AND " . $db->escape($and) . "";
		  } else
			  $sql = "SELECT * FROM " . (string)$table . " WHERE id = '" . $db->escape((int)$id) . "'";
		  
          $row = $db->first($sql);
          
		  if ($row) {
			  return $row;
		  } else {
			  if ($is_admin)
				  $this->error("You have selected an Invalid Id - #".$id, "Core::getRowById()");
		  }
	  }
  	  	  
  
      /**
       * Core::error()
       * 
	   * @param mixed $msg
	   * @param mixed $source
       * @return
       */
      public function error($msg, $source)
      {

          $the_error = "<div class=\"msgError\">";
          $the_error .= "<span>System ERROR!</span><br />";
          $the_error .= "DB Error: ".$msg." <br /> More Information: <br />";
          $the_error .= "<ul>";
          $the_error .= "<li> Date : " . date("F j, Y, g:i a") . "</li>";
		  $the_error .= "<li> Function: " . $source . "</li>";
          $the_error .= "<li> Script: " . $_SERVER['REQUEST_URI'] . "</li>";
		  $the_error .= "<li>&lsaquo; <a href=\"javascript:history.go(-1)\"><strong>Go Back to previous page</strong></a></li>";
          $the_error .= '</ul>';
          $the_error .= '</div>';
          print $the_error;
          die();
      }
  
  }
?>