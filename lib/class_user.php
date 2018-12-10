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
       * User::ChangeAbout()
       * 
       * @return
       */
	  public function ChangeAbout()
	  {
		  global $db, $core;
			
				$data = array(
					"name" => $_POST["name"],
					"about" => nl2br($_POST["about"])
					);
				$db->update("eq", $data, "id='" . $_POST["eqid"] . "'");

				$result["success"] = "1";
				$result["msg"] = "Seadme andmed uuendatud!";
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


	  }	
?>