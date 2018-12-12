<?php
/** User Class **/
  
  if (!defined("_VALID_PHP"))
      die('Direct access to this location is not allowed.');

  class Users
  {
	  private $uTable = "users";
	  public $logged_in = null;
	  public $uid = 0;
	  public $userid = 0;
      public $username;
	  public $sesid;
	  public $name;
	  public $access = null;
	  private $lastlogin = "NOW()";
      

      /**
       * Users::__construct()
       * 
       * @return
       */
      function __construct()
      {
		  $this->getUserId();
		  $this->startSession();
      }

	  /**
	   * Users::getUserId()
	   * 
	   * @return
	   */
	  private function getUserId()
	  {
	  	  global $core, $DEBUG;
		  if (isset($_GET['userid'])) {
			  $userid = (is_numeric($_GET['userid']) && $_GET['userid'] > -1) ? intval($_GET['userid']) : false;
			  $userid = sanitize($userid);
			  
			  if ($userid == false) {
				  $DEBUG == true ? $core->error("You have selected an Invalid Id", "Users::getUserId()") : $core->ooops();
			  } else
				  return $this->userid = $userid;
		  }
	  }  

      /**
       * Users::startSession()
       * 
       * @return
       */
      private function startSession()
      {
		if (strlen(session_id()) < 1)
			session_start();
	  
		$this->logged_in = $this->loginCheck();
		
		if (!$this->logged_in) {
			$this->username = $_SESSION['username'] = "Guest";
			$this->sesid = sha1(session_id());
			$this->userlevel = 0;
			
		}
      }

	  /**
	   * Users::loginCheck()
	   * 
	   * @return
	   */
	  private function loginCheck()
	  {
          if (isset($_SESSION['username']) && $_SESSION['username'] != "Guest") {
              
              $row = $this->getUserInfo($_SESSION['username']);
			  $this->uid = $row['id'];
			  $this->username = $row['username'];
			  $this->fname = $row['fname'];
			  $this->lname = $row['lname'];
			  $this->sesid = sha1(session_id());

              return true;
          } else {
              return false;
          }  
	  }

	  /**
	   * Users::login()
	   * 
	   * @param mixed $username
	   * @param mixed $password
	   * @return
	   */
	  public function login($username, $password)
	  {
		  global $db, $core;
		  
			if ($username == "" && $password == "") {
				$e = "Username or Password missing";
			} else {
				$status = $this->checkStatus($username, $password);
			}	
			if ($status["number"] == 0) {
				$e = $status["msg"];
			} 
		  if (empty($e) && $status["number"] == 1) {
			  $row = $this->getUserInfo($username);
			  $this->uid = $_SESSION['uid'] = $row['id'];
			  $this->username = $_SESSION['username'] = $row['username'];

			  $data = array(
					'lastlogin' => $this->lastlogin, 
					'lastip' => sanitize($_SERVER['REMOTE_ADDR'])
			  );
			  $db->update($this->uTable, $data, "username='" . $this->username . "'");
					$res["success"] = "1";
					$res["msg"] = "success";
					
			  echo json_encode($res,true);
		  } else {
			  $res["success"] = "0";
			  $res["msg"] = $e;
			  echo json_encode($res,true);
		  }
	  }

      /**
       * Users::logout()
       * 
       * @return
       */
      public function logout()
      {
          unset($_SESSION['email']);
		  unset($_SESSION['email']);
		  unset($_SESSION['name']);
          unset($_SESSION['uid']);
          session_destroy();
		  session_regenerate_id();
          
          $this->logged_in = false;
          $this->email = "Guest";
          $this->userlevel = 0;
      }

	  /**
	   * Users::getUserInfo()
	   * 
	   * @param mixed $username
	   * @return
	   */
	  private function getUserInfo($username)
	  {
		  global $db;
		  $username = sanitize($username);
		  $username = $db->escape($username);
		  
		  $sql = "SELECT * FROM " . $this->uTable . " WHERE username = '" . $username . "'";
		  $row = $db->first($sql);
		  if (!$username)
			  return false;
		  
		  return ($row) ? $row : 0;
	  }
	  
	  /**
	   * Users::checkStatus()
	   * 
	   * @param mixed $username
	   * @param mixed $password
	   * @return
	   */
	  public function checkStatus($username, $password)
	  {
		  global $db;
		  
		  $username = sanitize($username);
		  $username = $db->escape($username);
		  $password = sanitize($password);
		  
          $sql = "SELECT password FROM " . $this->uTable
		  . "\n WHERE username = '".$username."'";
          $result = $db->query($sql);

		  $row = $db->fetch($result);
		  $entered_pass = sha1($password);
          
		  if ($db->numrows($result) == 0) {
			  $data["number"] = 0;
			  $data["msg"] = "No such username & password";
		  } else 
		  
		  if ($entered_pass != $row["password"]) {
			  $data["number"] = 0;
			  $data["msg"] = "Password is incorrect.";			
		  }  else 
		  if ($entered_pass == $row["password"]) {
			  $data["number"] = 1;
			  $data["msg"] = "Successfully logged in.";			
		  } 
		  return $data;
	  }

	  
	  /**
	   * Users::getUniqueCode()
	   * 
	   * @param string $length
	   * @return
	   */
	  private function getUniqueCode($length = "")
	  {
		  $code = md5(uniqid(rand(), true));
		  if ($length != "") {
			  return substr($code, 0, $length);
		  } else
			  return $code;
	  }

	  /**
	   * Users::generateRandID()
	   * 
	   * @return
	   */
	  private function generateRandID()
	  {
		  return sha1($this->getUniqueCode(24));
	  }
	  /**
	   * User::emailExists()
	   * 
	   * @param mixed $email
	   * @return
	   */
	  private function emailExists($email)
	  {
		  global $db;
		  
		  $sql = $db->query("SELECT email" 
		  . "\n FROM users" 
		  . "\n WHERE email = '" . sanitize($email) . "'" 
		  . "\n LIMIT 1");
		  
		  if ($db->numrows($sql) == 1) {
			  return true;
		  } else
			  return false;
	  }
	  /**
	   * User::isValidEmail()
	   * 
	   * @param mixed $email
	   * @return
	   */
	  private function isValidEmail($email)
	  {
		  if (function_exists('filter_var')) {
			  if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
				  return true;
			  } else
				  return false;
		  } else
			  return preg_match('/^[a-zA-Z0-9._+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/', $email);
	  } 	

      /**
       * User::AddUser()
       * 
       * @return
       */
	  public function AddUser()
	  {
		  global $db, $core;
			
			$check = $db->first("SELECT * FROM users WHERE username = '".$_POST["username"]."'");

			if ($check) {
				$result["success"] = "0";
				$result["msg"] = "Selline kasutaja on juba olemas";
			} else {
				$pass = sha1($_POST["password"]);
				$data = array(
					"fname" => $_POST["fname"],
					"lname" => $_POST["lname"],
					"username" => $_POST["username"],
					"password" => $pass,
					"level" => $_POST["level"]
				);			
				$db->insert("users",$data);
				$result["success"] = "1";
				$result["msg"] = "Jee tehtud";
			}
			
			echo json_encode($result,true);
	  }
      /**
       * User::DeleteUser()
       * 
       * @return
       */
	  public function DeleteUser()
	  {
		  global $db, $core;

			if ($_POST["uid"] == $this->uid) {
				$result["success"] = "0";
				$result["msg"] = "Sa ei saa enda kasutajat kustutada";
			} else {
				$db->delete("users","id = '".$_POST["uid"]."'");
				$result["success"] = "1";	
				$result["msg"] = "Jee done!";			
			}
			echo json_encode($result,true);
	  }
      /**
       * User::ChangePWD()
       * 
       * @return
       */
	  public function ChangePWD()
	  {
		  global $db, $core;

			$pass = sha1($_POST["password"]);
			
			$data = array("password" => $pass);
			
			$db->update($this->uTable, $data, "id='" . $_POST["uid"] . "'");

			$result["success"] = $_POST["uid"];	
			$result["msg"] = "Kasutaja parool edukalt uuendatud!";			

			echo json_encode($result,true);
	  }
      /**
       * User::ChangeData()
       * 
       * @return
       */
	  public function ChangeData()
	  {
		  global $db, $core;
			
			$check = $db->first("SELECT * FROM users WHERE username = '".$_POST["username"]."'");
			if ($check && $_POST["username"] != $this->username) {
				$result["success"] = "0";
				$result["msg"] = "Selline kasutaja on juba olemas!";
			} else {
				$data = array(
					"fname" => $_POST["fname"],
					"lname" => $_POST["lname"],
					"username" => $_POST["username"],
					"level" => $_POST["level"]
				);
				$db->update($this->uTable, $data, "id='" . $_POST["uid"] . "'");
				
				$result["success"] = "1";
				$result["msg"] = "Kasutaja andmed uuendatud!";
			}
			echo json_encode($result,true);
	  }
      /**
       * User::UserList()
       * 
       * @return
       */
	  public function UserList()
	  {
		  global $db, $core;
		  
		  $lists = $db->fetch_all("SELECT * FROM users");
		  
		  foreach ($lists as $list):

			if ($list["level"] == "1")  { $level = '<span class="label label-primary">Admin</span>'; }
			if ($list["level"] == "2")  { $level = '<span class="label label-info">Tava kasutaja</span>'; }
			
			$data["list"][$list["id"]]["id"] = $list["id"];
			$data["list"][$list["id"]]["name"] = $list["fname"] . " " . $list["lname"];
			$data["list"][$list["id"]]["username"] = $list["username"];
			$data["list"][$list["id"]]["level"] = $level;
		  
		  endforeach;
		  
			$data["count"] = count($lists);
			echo json_encode($data,true);
	  }
      /**
       * User::GetUserData()
       * 
       * @return
       */
	  public function GetUserData()
	  {
		  global $db, $core;
		  
		  $udata = $db->first("SELECT * FROM users WHERE id = '".$_GET["uid"]."'");
		  
		
			$data["id"] = $udata["id"];
			$data["fname"] = $udata["fname"];
			$data["lname"] = $udata["lname"];
			$data["username"] = $udata["username"];
			$data["level"] = $udata["level"];
			echo json_encode($data,true);
	  }
      /**
       * User::AddEQ()
       * 
       * @return
       */
	  public function AddEQ()
	  {
		  global $db, $core;
			
				$data = array(
					"name" => $_POST["name"],
					"about" => nl2br($_POST["about"])
					);
				$eqid = $db->insert("eq",$data);
				$result["eqid"] = $eqid;
				$result["success"] = "1";
				$result["msg"] = "Kasutaja andmed uuendatud!";
			echo json_encode($result,true);
	  }
      /**
       * User::ChangeEqData()
       * 
       * @return
       */
	  public function ChangeEqData()
	  {
		  global $db, $core;
		
		if (isset($_FILES["picture"]) && !empty($_FILES["picture"]["tmp_name"])) {
			$validextensions = array("jpeg", "jpg", "png");
			$temporary = explode(".", $_FILES["picture"]["name"]);
			$file_extension = end($temporary);
			if ((($_FILES["picture"]["type"] == "image/png")
			|| ($_FILES["picture"]["type"] == "image/jpg")
			|| ($_FILES["picture"]["type"] == "image/jpeg"))
			&& ($_FILES["picture"]["size"] < 2097152)){
			} else {
				$e = 'Profile picture must be png,jpg or jpeg and smaller than 2mb.';  
			}
			} 
		if (!isset($e) && empty($e) && isset($_FILES["picture"]) && !empty($_FILES["picture"]["tmp_name"])) {
				$location = $core->site_dir.'uploads/eq/'; 
				$location_url = $core->site_url.'uploads/eq/';
				if (!is_dir($location)){
					mkdir($location, 0777, true);
				} 
				$filename = uniqid().".".$file_extension;
				if (move_uploaded_file($_FILES["picture"]["tmp_name"],$location . $filename)) {	
					$picture = $location_url . $filename;
				} else {
					$e = "Something goes wrong, please try again!";
				}
				}
					if ($_POST["new"] == "1") {
						if (!isset($_POST["eqstatus"])) {
							$e = "Staatus on puudu";
						} else {
						$status = $_POST["eqstatus"];							
						}
					} else {
						$status = 0;
					}				
				if (!isset($e)) {
					if (!isset($picture)) {
						if ($_POST["new"] == "0") {
							$picture = getValue("picture","eq","id",$_POST["eqid"]);
						} else {
							$picture = "";
						}
					}
					
				$data = array(
					"user_id" => $this->uid,
					"name" => $_POST["name"],
					"def" => $_POST["def"],
					"company" => $_POST["company"],
					"serial" => $_POST["serial"],
					"category_id" => $_POST["category"],
					"location" => $_POST["eqlocation"],
					"about" => nl2br($_POST["about"]),
					"picture" => $picture,
					"status_id" => $status
					);
					if ($_POST["new"] == "0") {
						$db->update("eq", $data, "id='" . $_POST["eqid"] . "'");
						$result["eid"] = $_POST["eqid"];
					} else {
						$id = $db->insert("eq",$data);
						$result["eid"] = $id;
					}
				$result["success"] = "1";
				$result["msg"] = "Seadme andmed uuendatud!";
				$result["eqnew"] = $_POST["new"];
				} else {
				$result["success"] = "0";
				$result["msg"] = $e;
				}
			echo json_encode($result,true);
	  }
      /**
       * User::ChangeEqStatus()
       * 
       * @return
       */
	  public function ChangeEqStatus()
	  {
		  global $db, $core;
				$ns = $db->first("SELECT * FROM eq WHERE id = '".$_POST["eqid"]."'");
				$data = array(
				"count" => "minus(1)"
				);
				$db->update("eq_status", $data, "id='" . $ns["status_id"] . "'");

				$data = array(
				"count" => "inc(1)"
				);
				$db->update("eq_status", $data, "id='" . $_POST["eqstatus"] . "'");
				
				
				$data = array(
					"status_id" => $_POST["eqstatus"],
					);
					$db->update("eq", $data, "id='" . $_POST["eqid"] . "'");
					
					if (isset($_POST["comment"])) {
						$comment = $_POST["comment"];
					} else {
						$comment = "";
					}
				$data = array(
					"user_id" => $this->uid,
					"eq_id" => $_POST["eqid"],
					"status_id" => $_POST["eqstatus"],
					"comment" => $comment,
					"datetime" => "NOW()"
				);				
				$db->insert("eq_history",$data);
				
				$result["eid"] = $_POST["eqid"];
				$result["success"] = "1";
				$result["msg"] = "Seadme staatus uuendatud!";

				echo json_encode($result,true);
	  }
      /**
       * User::EqList()
       * 
       * @return
       */
	  public function EqList()
	  {
		  global $db, $core;
		  
		  $lists = $db->fetch_all("SELECT * FROM eq");
		  
		  foreach ($lists as $list):
			$data["list"][$list["id"]]["id"] = $list["id"];
			$data["list"][$list["id"]]["name"] = $list["name"];
			$data["list"][$list["id"]]["about"] = br2nl($list["about"]);
		  endforeach;
		  
			$data["count"] = count($lists);
			echo json_encode($data,true);
	  }

      /**
       * User::eqHistory()
       * 
       * @return
       */
	  public function eqHistory()
	  {
		  global $db, $core;
			
			$his = $db->fetch_all("
			SELECT 
			a.user_id,a.eq_id,a.status_id,a.comment,a.datetime,
			b.username,b.fname,b.lname,
			c.name as status_name,c.label as status_label
			FROM eq_history as a
			LEFT JOIN users as b ON b.id = a.user_id
			LEFT JOIN eq_status as c ON c.id = a.status_id
			WHERE a.eq_id = '".$_GET["id"]."'");
			$i=0;
			foreach ($his as $h):
				$data["data"][$i]["Nimi"] = $h["fname"]." ".$h["lname"];
				$data["data"][$i]["Staatus"] = "<label class='label label-".$h["status_label"]."'>".$h["status_name"]."</label>";
				$data["data"][$i]["Kommentaar"] = $h["comment"];
				$data["data"][$i]["Aeg"] = date('Y-m-d', strtotime($h["datetime"]));
				
			$i++;	
			endforeach;
			
			
			echo json_encode($data,true);
	  }
      /**
       * User::GetEqData()
       * 
       * @return
       */
	  public function GetEqData()
	  {
		  global $db, $core;
			
			$eq = $db->first("SELECT * FROM eq WHERE id = '".$_GET["eid"]."'");
			$status = $db->first("SELECT * FROM eq_status WHERE id = '".$eq["status_id"]."'");
			$cat = $db->first("SELECT * FROM eq_category WHERE id = '".$eq["category_id"]."'");
			
			$result["name"] = $eq["name"];
			$result["def"] = $eq["def"];
			$result["company"] = $eq["company"];
			$result["serial"] = $eq["serial"];
			$result["location"] = $eq["location"];
			$result["id"] = $eq["id"];
			$result["about"] = $eq["about"];
			$result["picture"] = $eq["picture"];
			$result["category"] = $cat["name"];
			$result["status"] = $status["name"];
			$result["status_label"] = $status["label"];
			
			echo json_encode($result,true);
	  }
     /**
       * User::AddNewStatus()
       * 
       * @return
       */
	  public function AddNewStatus()
	  {
		  global $db, $core;
				$data = array(
					"name" => $_POST["eqstatus"],
					"label" => $_POST["label"]
				);
				$db->insert("eq_status",$data);
				$result["success"] = "1";
				$result["msg"] = "Tehtud";
			echo json_encode($result,true);
	  }
    /**
       * User::AddNewCategory()
       * 
       * @return
       */
	  public function AddNewCategory()
	  {
		  global $db, $core;
				$data = array(
					"name" => $_POST["category"]
				);
				$db->insert("eq_category",$data);
				$result["success"] = "1";
				$result["msg"] = "Tehtud";
			echo json_encode($result,true);
	  }

	  }	
?>