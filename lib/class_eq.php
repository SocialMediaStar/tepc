<?php
/** User Class **/
  
  if (!defined("_VALID_PHP"))
      die('Direct access to this location is not allowed.');

  class Eq
  {
      

      /**
       * Users::__construct()
       * 
       * @return
       */
      function __construct()
      {
		  $this->startEqSession();
      }

	  /**
	   * Users::getEqId()
	   * 
	   * @return
	   */
	  private function getEqId()
	  {
	  	  global $core, $DEBUG;
		  if (isset($_GET['eq_id'])) {
			  $eq_id = $_GET["eq_id"];
			  return $this->eid = $eq_id;
		  } else {
			  $this->eid = "0";
		  }
		  
	  }  

      /**
       * Users::startEqSession()
       * 
       * @return
       */
      private function startEqSession()
      {

		$this->getEqId();
		
		if ($this->eid != "0") {
			$_SESSION["eid"] = $this->eid;
			$this->EqCheck();
		} else {
			$this->eid = $_SESSION["eid"] = "0";
		}
      }

	  /**
	   * Users::EqCheck()
	   * 
	   * @return
	   */
	  private function EqCheck()
	  {
          if (isset($_SESSION['eid']) && $_SESSION['eid'] != "0") {
              
              $row = $this->getEqInfo($_SESSION['eid']);
			  $this->eid = $row['id'];
			  $this->name = $row["name"];
			  $this->def = $row["def"];
			  $this->company = $row["company"];
			  $this->serial = $row["serial"];
			  $this->location = $row["location"];
			  
			  $this->category_id = $row["category_id"];
			  $this->category_name = getValue("name","eq_category","id",$this->category_id);
			  $this->category_count = getValue("count","eq_category","id",$this->category_id);

			  $this->status_id = $row["status_id"];
			  $this->status_name = getValue("name","eq_status","id",$this->status_id);
			  $this->status_label = getValue("label","eq_status","id",$this->status_id);
			  $this->status_count = getValue("count","eq_status","id",$this->status_id);
			  
			  $this->about = $row["about"];
			  $this->who_use = $row["who_use"];
			  $this->picture = $row["picture"];
			  $this->tech_info = $row["tech_info"];
              
			  
			  return true;
          } else {
              return false;
          }  
	  }

	  /**
	   * Users::getEqInfo()
	   * 
	   * @param mixed $username
	   * @return
	   */
	  private function getEqInfo($eq_id)
	  {
		  global $db;
		  $eq_id = sanitize($eq_id);
		  $eq_id = $db->escape($eq_id);
		  
		  $sql = "SELECT * FROM eq WHERE id = '" . $eq_id . "'";
		  $row = $db->first($sql);
		  if (!$eq_id)
			  return false;
		  
		  return ($row) ? $row : 0;
	  }
	  
      /**
       * User::eqList()
       * 
       * @return
       */
	  public function eqList()
	  {
		  global $db, $core;
		  
		  $lists = $db->fetch_all("
		  SELECT 
		  a.id,a.name,a.def,a.company,b.name as catname,c.name as sname, c.label as slabel
		  FROM eq as a 
		  LEFT JOIN eq_category as b ON b.id = a.category_id
		  LEFT JOIN eq_status AS c ON c.id = a.status_id
		  ");
		  

			$i=0;
			foreach ($lists as $list):
				$data["data"][$i]["ID"] = $list["def"];
				$data["data"][$i]["Name"] = $list["name"];
				$data["data"][$i]["Company"] = $list["company"];
				$data["data"][$i]["Category"] = $list["catname"];
				$data["data"][$i]["Status"] = '<label class="label label-'.$list["slabel"].'">'.$list["sname"].'</label>';
				$data["data"][$i]["Action"] = '<button class="btn btn-xs btn-danger" onClick="DeleteEq('.$list["id"].');"><i class="fa fa-times"></i></button> <a href="eq.php?eq_id='.$list["id"].'" class="btn btn-xs btn-primary"><i class="fa fa-eye"></i></a>';
			$i++;
			endforeach;
			echo json_encode($data,true);
	  }

      /**
       * Eq::GetStatuses()
       * 
       * @return
       */
	  public function GetStatuses()
	  {
		  global $db, $core;
			
			$statuses = $db->fetch_all("SELECT * FROM eq_status");
			$i=0;
			foreach ($statuses as $st):

				$data[$i]["id"] = $st["id"];
				$data[$i]["name"] = $st["name"];
				$data[$i]["label"] = $st["label"];
				$data[$i]["count"] = $st["count"];
			
			$i++;	
			endforeach;
			return $data;
	  }
	  
      /**
       * Eq::GetCategories()
       * 
       * @return
       */
	  public function GetCategories()
	  {
		  global $db, $core;
			
			$category = $db->fetch_all("SELECT * FROM eq_category");
			$i=0;
			foreach ($category as $cat):

				$data[$i]["id"] = $cat["id"];
				$data[$i]["name"] = $cat["name"];
				$data[$i]["count"] = $cat["count"];
			
			$i++;	
			endforeach;
			return $data;
	  }
	  
      /**
       * Eq::NewEq()
       * 
       * @return
       */
	  public function NewEq()
	  {
		  global $db, $core;
			$data = array(
				"name" => $_POST["name"],
				"def" => $_POST["def"],
				"company" => $_POST["company"],
				"category_id" => $_POST["category"],
				"status_id" => $_POST["status"]
			);
			$id = $db->insert("eq",$data);
			
			$result["success"] = "1";
			$result["msg"] = "Success";
			$result["eid"] = $id;
			echo json_encode($result,true);
	  }
	  
      /**
       * Eq::NewCategory()
       * 
       * @return
       */
	  public function NewCategory()
	  {
		  global $db, $core;
			$data = array(
				"name" => $_POST["name"]
			);
			$db->insert("eq_category",$data);
			
			$result["success"] = "1";
			$result["msg"] = "Success";
			echo json_encode($result,true);
	  }
      /**
       * Eq::ChangeEqData()
       * 
       * @return
       */
	  public function ChangeEqData()
	  {
		  global $db, $core;
			$data = array(
				"def" => $_POST["def"],
				"name" => $_POST["name"],
				"company" => $_POST["company"],
				"serial" => $_POST["serial"],
				"location" => $_POST["location"],
				"category_id" => $_POST["category"],
				"status_id" => $_POST["status"],
				"about" => $_POST["about"],
				"who_use" => $_POST["who_use"]
			);
			$db->update("eq", $data, "id='" . $this->eid . "'");

			$result["success"] = "1";
			$result["msg"] = "Success";
			echo json_encode($result,true);

	  }
      /**
       * Eq::UploadEqPicture()
       * 
       * @return
       */
	  public function UploadEqPicture()
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
						$data = array("picture" => $picture);
						$db->update("eq", $data, "id='" . $this->eid . "'");
						$l = $_SERVER['HTTP_REFERER'];
						redirect_to($l);
					} else {
						$e = "Something goes wrong, please try again!";
					}
			}
			
	  }
    /**
       * Eq::GetEqTechData()
       * 
       * @return
       */
	  public function GetEqTechData()
	  {
		  global $db, $core;
		  
		  $techs = $db->fetch_all("SELECT * FROM eq_tech WHERE eq_id = '".$this->eid."'");
		  $i = 0;
		  foreach ($techs as $tech):
			$result["data"][$i]["id"] = $tech["id"];
			$result["data"][$i]["label"] = $tech["label"];
			$result["data"][$i]["value"] = $tech["name"];
			$result["data"][$i]["eqid"] = $tech["eq_id"];
			
			$i++;
		  endforeach;
		  $result["more"] = $this->tech_info;
		  
		  echo json_encode($result, true);
	  }
	  
    /**
       * Eq::ChangeEqTech()
       * 
       * @return
       */
	  public function ChangeEqTech()
	  {
		  global $db, $core;
			
			if (isset($_POST["label"])) {
				$db->delete("eq_tech","eq_id = '".$this->eid."'");
				
			foreach ($_POST["label"] as $key => $value):
				if (isset($_POST["name"][$key])) {
					$val = $_POST["name"][$key];
				} else {
					$val = "";
				}
			
				$data = array("label" => $value,"name" => $val,"eq_id" => $this->eid);
				$db->insert("eq_tech",$data);
				
			endforeach;
				$data = array("tech_info" => $_POST["techMore"]);
				$db->update("eq", $data, "id='" . $this->eid . "'");

				$result["eqid"] = $this->eid;
				$result["success"] = "1";
				$result["msg"] = "Success";
				echo json_encode($result,true);
			}
	  }

      /**
       * User::GetEqFiles()
       * 
       * @return
       */
	  public function GetEqFiles()
	  {
		  global $db, $core;
			$his = $db->fetch_all("SELECT * FROM eq_files WHERE eq_id = '".$this->eid."'");
			$i=0;
			foreach ($his as $h):
				$result["files"][$i]["id"] = $h["id"];
				$result["files"][$i]["name"] = $h["name"];
				$filename = "assets/img/filetypes/".$h["file_type"].".png";
				if (file_exists($core->site_dir.$filename)) {
					$result["files"][$i]["img"] = $filename;
				} else {
					$result["files"][$i]["img"] = "assets/img/filetypes/other.png";
				}
			$i++;	
			endforeach;
			if (!isset($result)) {
				$result["success"] = "0";
			} else {
				$result["success"] = "1";
			}
			echo json_encode($result,true);		  
		  
	  }

      /**
       * Eq::DeleteEqFile()
       * 
       * @return
       */
	  public function DeleteEqFile()
	  {
		  global $db, $core;
					

					$db->delete("eq_files","id = '".$_POST["fid"]."'");
					$result["success"] = "1";
					$result["msg"] = "Jee done!";
				echo json_encode($result,true);
	  }
      /**
       * Eq::ViewEqFile()
       * 
       * @return
       */
	  public function ViewEqFile()
	  {
		  global $db, $core;
			$file = $db->first("SELECT * FROM eq_files WHERE id = '".$_GET["fid"]."'");
			
			$result["location"] = $file["file_location"];
			$result["url"] = $file["file_url"];
			$result["type"] = $file["file_type"];
			$result["name"] = $file["name"];
			
			echo json_encode($result,true);		  
		  
	  }
      /**
       * Eq::AddEqFile()
       * 
       * @return
       */
	  public function AddEqFile()
	  {
		  global $db, $core;
				if (isset($_FILES["files"]) && !empty($_FILES["files"]["tmp_name"])) {
					$f = $_FILES["files"];
					$temporary = explode(".", $f["name"]);
					$file_extension = end($temporary);
					$location = $core->site_dir.'uploads/eq/'.$this->eid.'/files/'; 
					$location_url = $core->site_url.'uploads/eq/'.$this->eid.'/files/';

					if (!is_dir($location)){
						mkdir($location, 0777, true);
					} 
					$filename = uniqid().".".$file_extension;
					if (move_uploaded_file($f["tmp_name"],$location . $filename)) {	
						$files = $location_url . $filename;
					}
					$data = array(
						"eq_id" => $this->eid,
						"file_location" => $location,
						"file_url" => $files,
						"file_type" => $file_extension,
						"name" => $_POST["name"]
					);
					$db->insert("eq_files",$data);
					
				$result["eqid"] = $this->eid;				
				$result["msg"] = "aaa";
				$result["success"] = "1";
				echo json_encode($result,true);
			} 			

	  }
      /**
       * Eq::GetEqParts()
       * 
       * @return
       */
	  public function GetEqParts()
	  {
		  global $db, $core;
			
			$his = $db->fetch_all("SELECT * FROM eq_parts WHERE eq_id = '".$this->eid."'");
			$i=0;
			foreach ($his as $h):
				$data["data"][$i]["Code"] = $h["code"];
				$data["data"][$i]["Description"] = $h["description"];
				$data["data"][$i]["Seller"] = $h["company"];
				$data["data"][$i]["Actions"] = "<button class='btn btn-xs btn-danger' onClick='DeleteEqParts(".$h["id"].")'><i class='fa fa-times'></i> <span class='hidden-mobile'>Delete</span></button> <button class='btn btn-xs btn-primary' type='button' data-toggle='modal' data-id='EditEqParts' data-res='".$h['id']."' data-target='#OpenModal'><i class='fa fa-edit'></i> <span class='hidden-mobile'>Edit</span></button>";
 				
			$i++;	
			endforeach;
			
			
			echo json_encode($data,true);
	  }
      /**
       * Eq::GetAllServices()
       * 
       * @return
       */
	  public function GetAllServices()
	  {
		  global $db, $core;
			
			$sd = $db->fetch_all("SELECT * FROM eq_service WHERE service_date >= CURDATE() ORDER BY service_date ASC");
			$i=0;
			foreach ($sd as $s):
				$equ = $db->first("SELECT name FROM eq WHERE id = '".$s["eq_id"]."'");
				$data["data"][$i]["Equipment"] = $equ["name"];
				$data["data"][$i]["Service name"] = $s["name"];
				$data["data"][$i]["Service date"] = $s["service_date"];
				$data["data"][$i]["Action"] = "<a  class='btn btn-xs btn-primary' href='eq.php?eq_id=".$s["eq_id"]."&tab=service'><i class='fa fa-eye'></i> <span class='hidden-mobile'>View</span></a>";
 				
			$i++;	
			endforeach;
			
			
			echo json_encode($data,true);
	  }
	  
      /**
       * Eq::DeleteEqParts()
       * 
       * @return
       */
	  public function DeleteEqParts()
	  {
		  global $db, $core;
					

					$db->delete("eq_parts","id = '".$_POST["pid"]."'");
					$result["success"] = "1";
					$result["msg"] = "Jee done!";
				echo json_encode($result,true);
	  }
      /**
       * Eq::EqPartsData()
       * 
       * @return
       */
	  public function EqPartsData()
	  {
		  global $db, $core;
			
			$parts = $db->first("SELECT * FROM eq_parts WHERE id = '".$_GET["pid"]."'");
				$data["ID"] = $parts["id"];
				$data["Code"] = $parts["code"];
				$data["Description"] = $parts["description"];
				$data["Seller"] = $parts["company"];
			echo json_encode($data,true);
	  }
      /**
       * Eq::EqPartsDataSelect2()
       * 
       * @return
       */
	  public function EqPartsDataSelect2()
	  {
		  global $db, $core;
			
			$his = $db->fetch_all("SELECT * FROM eq_parts WHERE eq_id = '".$this->eid."'");
			$i=0;
			foreach ($his as $h):
				$data[$i]["id"] = $h["id"];
				$data[$i]["text"] = $h["code"];
 				
			$i++;	
			endforeach;
			echo json_encode($data,true);
	  }
      /**
       * Eq::EditEqParts()
       * 
       * @return
       */
	  public function EditEqParts()
	  {
		  global $db, $core;
				
			$data = array(
				"code" => $_POST["code"],
				"description" => $_POST["description"],
				"company" => $_POST["seller"]
			);
			$db->update("eq_parts", $data, "id='" . $_POST["pid"] . "'");
			$result["success"] = "1";

			echo json_encode($result,true);
	  }
      /**
       * Eq::AddEqParts()
       * 
       * @return
       */
	  public function AddEqParts()
	  {
		  global $db, $core;
				
				foreach ($_POST["code"] as $key => $value):
					
					if (isset($_POST["description"][$key])) {
						$desc = $_POST["description"][$key];
					} else {
						$desc = "";
					}
					if (isset($_POST["seller"][$key])) {
						$seller = $_POST["seller"][$key];
					} else {
						$seller = "";
					}
					
					$data = array(
						"eq_id" => $this->eid,
						"code" => $value,
						"description" => $desc,
						"company" => $seller
					);
					
					$db->insert("eq_parts",$data);
					
				endforeach;
				
			$result["success"] = "1";
			echo json_encode($result,true);
	  }
      /**
       * Eq::GetServiceDates()
       * 
       * @return
       */
	  public function GetServiceDates()
	  {
		  global $db, $core;
				
			$dates = $db->fetch_all("SELECT * FROM eq_service WHERE eq_id = '".$this->eid."'");
			$i=0;
			foreach ($dates as $da):
				$result[$i]["date"] = $da["service_date"];
				$result[$i]["badge"] = "true";
				$result[$i]["title"] = $da["name"];
			$i++;
			endforeach;
			if (!isset($result)) {
				$result = "";
			}
			echo json_encode($result,true);
	  }
      /**
       * Eq::GetServiceDateData()
       * 
       * @return
       */
	  public function GetServiceDateData()
	  {
		  global $db, $core;
				
			$d = $db->first("SELECT * FROM eq_service WHERE eq_id = '".$this->eid."' AND service_date = '".$_GET["date"]."'");
			$result["id"] = $d["id"];
			$result["name"] = $d["name"];
			$result["user"] = $d["user"];
			$result["description"] = $d["description"];
			$result["service_date"] = $d["service_date"];
			$result["service_done"] = $d["service_done"];
			$result["status_note"] = $d["status_note"];
			
			if ($d["status"] == "1") { $result["status"] = "Done"; $result["status_label"] = "success";}
			if ($d["status"] == "2") { $result["status"] = "Failed"; $result["status_label"] = "danger"; }
			if ($d["status"] == "3") { $result["status"] = "Pending"; $result["status_label"] = "warning"; }
			
			
			$parts = $db->fetch_all("SELECT * FROM eq_serviceparts WHERE service_id = '".$d["id"]."'");
			
			$i = "0";
			foreach ($parts as $p):
				$pname = $db->first("SELECT * FROM eq_parts WHERE id ='".$p["parts_id"]."'");
				$result["parts"][$i]["id"] = $p["id"];
				$result["parts"][$i]["name"] = $pname["code"];
			$i++;
			endforeach;
			
			echo json_encode($result,true);
	  }
      /**
       * Eq::AddEqServiceStatus()
       * 
       * @return
       */
	  public function AddEqServiceStatus()
	  {
		  global $db, $core;
					

				$data = array(
					"name" => $_POST["name"],
					"label" => $_POST["label"]					
				);
				$db->insert("eq_servicestatus",$data);
					$result["success"] = "1";
					$result["msg"] = "Jee done!";
				echo json_encode($result,true);
	  }
      /**
       * Eq::LoadEqServiceStatuses()
       * 
       * @return
       */
	  public function LoadEqServiceStatuses()
	  {
		  global $db, $core;
					
			$statuses = $db->fetch_all("SELECT * FROM eq_servicestatus");
				foreach($statuses as $s):
					$data[$s["id"]]["id"] = $s["id"];
					$data[$s["id"]]["name"] = $s["name"];
					$data[$s["id"]]["label"] = $s["label"];
				endforeach;
				echo json_encode($data,true);
	  }
      /**
       * Eq::RemoveEqServiceStatus()
       * 
       * @return
       */
	  public function RemoveEqServiceStatus()
	  {
		  global $db, $core;
				$db->delete("eq_servicestatus","id = '".$_POST["status_id"]."'");
					$result["success"] = "1";
					$result["msg"] = "Jee done!";				
				echo json_encode($result,true);
	  }
      /**
       * Eq::AddNewEqService()
       * 
       * @return
       */
	  public function AddNewEqService()
	  {
		  global $db, $core;
		  
			$data = array(
				"eq_id" => $this->eid,
				"name" => $_POST["name"],
				"user" => $_POST["user"],
				"description" => $_POST["description"],
				"service_date" => $_POST["date"],
				"status" => $_POST["status"],
			);
			$id = $db->insert("eq_service",$data);
			foreach ($_POST["parts"] as $p):
				$data = array(
					"eq_id" => $this->eid,
					"service_id" => $id,
					"parts_id" => $p
				);
				$db->insert("eq_serviceparts",$data);
			endforeach;
				
					$result["success"] = "1";
					$result["msg"] = "Jee done!";				
			echo json_encode($result,true);
	  }
      /**
       * Eq::ChangeEqService()
       * 
       * @return
       */
	  public function ChangeEqService()
	  {
		  global $db, $core;
					
				
				$data = array(
					"status" => $_POST["status"],
					"status_note" => $_POST["note"]					
				);
				$db->update("eq_service", $data, "eq_id='" . $this->eid . "' AND id = '".$_POST["ServiceID"]."'");
				
					$result["success"] = "1";
					$result["msg"] = "Jee done!";
				echo json_encode($result,true);
	  }
      /**
       * Eq::GetCategoriesList()
       * 
       * @return
       */
	  public function GetCategoriesList()
	  {
		  global $db, $core;
					
				$cats = $db->fetch_all("SELECT id,name FROM eq_category");
				foreach ($cats as $cat):
					$result[$cat["id"]]["id"] = $cat["id"];
					$result[$cat["id"]]["name"] = $cat["name"];
				endforeach;

				echo json_encode($result,true);
	  }
      /**
       * Eq::DeleteCategory()
       * 
       * @return
       */
	  public function DeleteCategory()
	  {
		  global $db, $core;

				$db->delete("eq_category","id = '".$_POST["cat_id"]."'");

				$result["success"] = "1";
				$result["msg"] = "Jee done!";

				echo json_encode($result,true);
	  }
      /**
       * Eq::GetStatusList()
       * 
       * @return
       */
	  public function GetStatusList()
	  {
		  global $db, $core;
					
				$sats = $db->fetch_all("SELECT id,name,label FROM eq_status");
				foreach ($sats as $sat):
					$result[$sat["id"]]["id"] = $sat["id"];
					$result[$sat["id"]]["name"] = $sat["name"];
					$result[$sat["id"]]["label"] = $sat["label"];
				endforeach;

				echo json_encode($result,true);
	  }
      /**
       * Eq::DeleteStatus()
       * 
       * @return
       */
	  public function DeleteStatus()
	  {
		  global $db, $core;

				$db->delete("eq_status","id = '".$_POST["status_id"]."'");

				$result["success"] = "1";
				$result["msg"] = "Jee done!";

				echo json_encode($result,true);
	  }
      /**
       * Eq::AddStatus()
       * 
       * @return
       */
	  public function AddStatus()
	  {
		  global $db, $core;

				$data = array(
					"name" => $_POST["name"],
					"label" => $_POST["label"]
				);
				$db->insert("eq_status",$data);
				
				$result["success"] = "1";
				$result["msg"] = "Jee done!";

				echo json_encode($result,true);
	  }
      /**
       * Eq::DeleteEq()
       * 
       * @return
       */
	  public function DeleteEq()
	  {
		  global $db, $core;

				$db->delete("eq","id = '".$_POST["eq_id"]."'");

				$result["success"] = "1";
				$result["msg"] = "Jee done!";

				echo json_encode($result,true);
	  }
	  }	
?>