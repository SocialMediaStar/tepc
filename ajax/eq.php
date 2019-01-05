<?php
/**	Eq **/
  define("_VALID_PHP", true);
  require_once("../init.php");
?>
<?php
  /* eqList */
  if (isset($_GET['eqList']))
      : if (intval($_GET['eqList']) == 0 || empty($_GET['eqList']))
      : redirect_to("../index.php");
  endif;
 $eq->eqList();
  endif;
?>
<?php
  /* GetAllServices */
  if (isset($_GET['GetAllServices']))
      : if (intval($_GET['GetAllServices']) == 0 || empty($_GET['GetAllServices']))
      : redirect_to("../index.php");
  endif;
 $eq->GetAllServices();
  endif;
?>
<?php
  /* NewEq */
  if (isset($_POST['NewEq']))
      : if (intval($_POST['NewEq']) == 0 || empty($_POST['NewEq']))
      : redirect_to("../index.php");
  endif;
	$eq->NewEq();
  endif;
?>
<?php
  /* NewCategory */
  if (isset($_POST['NewCategory']))
      : if (intval($_POST['NewCategory']) == 0 || empty($_POST['NewCategory']))
      : redirect_to("../index.php");
  endif;
	$eq->NewCategory();
  endif;
?>
<?php
  /* ChangeEqData */
  if (isset($_POST['ChangeEqData']))
      : if (intval($_POST['ChangeEqData']) == 0 || empty($_POST['ChangeEqData']))
      : redirect_to("../index.php");
  endif;
	$eq->ChangeEqData();
  endif;
?>
<?php
  /* ChangeEqData */
  if (isset($_POST['ChangeEqData']))
      : if (intval($_POST['ChangeEqData']) == 0 || empty($_POST['ChangeEqData']))
      : redirect_to("../index.php");
  endif;
	$eq->ChangeEqData();
  endif;
?>
<?php
  /* UploadEqPicture */
  if (isset($_POST['UploadEqPicture']))
      : if (intval($_POST['UploadEqPicture']) == 0 || empty($_POST['UploadEqPicture']))
      : redirect_to("../index.php");
  endif;
	$eq->UploadEqPicture();
  endif;
?>
<?php
  /* GetCategoriesList */
  if (isset($_GET['GetCategoriesList']))
      : if (intval($_GET['GetCategoriesList']) == 0 || empty($_GET['GetCategoriesList']))
      : redirect_to("../index.php");
  endif;
	$eq->GetCategoriesList();
  endif;
?>
<?php
  /* GetStatusList */
  if (isset($_GET['GetStatusList']))
      : if (intval($_GET['GetStatusList']) == 0 || empty($_GET['GetStatusList']))
      : redirect_to("../index.php");
  endif;
	$eq->GetStatusList();
  endif;
?>
<?php
  /* GetEqTechData */
  if (isset($_GET['GetEqTechData']))
      : if (intval($_GET['GetEqTechData']) == 0 || empty($_GET['GetEqTechData']))
      : redirect_to("../index.php");
  endif;
	$eq->GetEqTechData();
  endif;
?>
<?php
  /* GetEqFiles */
  if (isset($_GET['GetEqFiles']))
      : if (intval($_GET['GetEqFiles']) == 0 || empty($_GET['GetEqFiles']))
      : redirect_to("../index.php");
  endif;
	$eq->GetEqFiles();
  endif;
?>
<?php
  /* ViewEqFiles */
  if (isset($_GET['ViewEqFile']))
      : if (intval($_GET['ViewEqFile']) == 0 || empty($_GET['ViewEqFile']))
      : redirect_to("../index.php");
  endif;
	$eq->ViewEqFile();
  endif;
?>
<?php
  /* GetEqParts */
  if (isset($_GET['GetEqParts']))
      : if (intval($_GET['GetEqParts']) == 0 || empty($_GET['GetEqParts']))
      : redirect_to("../index.php");
  endif;
	$eq->GetEqParts();
  endif;
?>
<?php
  /* EqPartsData */
  if (isset($_GET['EqPartsData']))
      : if (intval($_GET['EqPartsData']) == 0 || empty($_GET['EqPartsData']))
      : redirect_to("../index.php");
  endif;
	$eq->EqPartsData();
  endif;
?>
<?php
  /* EqPartsDataSelect2 */
  if (isset($_GET['EqPartsDataSelect2']))
      : if (intval($_GET['EqPartsDataSelect2']) == 0 || empty($_GET['EqPartsDataSelect2']))
      : redirect_to("../index.php");
  endif;
	$eq->EqPartsDataSelect2();
  endif;
?>
<?php
  /* LoadEqServiceStatuses */
  if (isset($_GET['LoadEqServiceStatuses']))
      : if (intval($_GET['LoadEqServiceStatuses']) == 0 || empty($_GET['LoadEqServiceStatuses']))
      : redirect_to("../index.php");
  endif;
	$eq->LoadEqServiceStatuses();
  endif;
?>
<?php
  /* GetServiceDates */
  if (isset($_GET['GetServiceDates']))
      : if (intval($_GET['GetServiceDates']) == 0 || empty($_GET['GetServiceDates']))
      : redirect_to("../index.php");
  endif;
	$eq->GetServiceDates();
  endif;
?>
<?php
  /* GetServiceDateData */
  if (isset($_GET['GetServiceDateData']))
      : if (intval($_GET['GetServiceDateData']) == 0 || empty($_GET['GetServiceDateData']))
      : redirect_to("../index.php");
  endif;
	$eq->GetServiceDateData();
  endif;
?>
<?php
  /* EditEqParts */
  if (isset($_POST['EditEqParts']))
      : if (intval($_POST['EditEqParts']) == 0 || empty($_POST['EditEqParts']))
      : redirect_to("../index.php");
  endif;
	$eq->EditEqParts();
  endif;
?>
<?php
  /* AddEqParts */
  if (isset($_POST['AddEqParts']))
      : if (intval($_POST['AddEqParts']) == 0 || empty($_POST['AddEqParts']))
      : redirect_to("../index.php");
  endif;
	$eq->AddEqParts();
  endif;
?>
<?php
  /* ChangeEqTech */
  if (isset($_POST['ChangeEqTech']))
      : if (intval($_POST['ChangeEqTech']) == 0 || empty($_POST['ChangeEqTech']))
      : redirect_to("../index.php");
  endif;
	$eq->ChangeEqTech();
  endif;
?>
<?php
  /* DeleteEqFile */
  if (isset($_POST['DeleteEqFile']))
      : if (intval($_POST['DeleteEqFile']) == 0 || empty($_POST['DeleteEqFile']))
      : redirect_to("../index.php");
  endif;
	$eq->DeleteEqFile();
  endif;
?>
<?php
  /* AddEqFile */
  if (isset($_POST['AddEqFile']))
      : if (intval($_POST['AddEqFile']) == 0 || empty($_POST['AddEqFile']))
      : redirect_to("../index.php");
  endif;
	$eq->AddEqFile();
  endif;
?>
<?php
  /* DeleteEqParts */
  if (isset($_POST['DeleteEqParts']))
      : if (intval($_POST['DeleteEqParts']) == 0 || empty($_POST['DeleteEqParts']))
      : redirect_to("../index.php");
  endif;
	$eq->DeleteEqParts();
  endif;
?>
<?php
  /* AddEqServiceStatus */
  if (isset($_POST['AddEqServiceStatus']))
      : if (intval($_POST['AddEqServiceStatus']) == 0 || empty($_POST['AddEqServiceStatus']))
      : redirect_to("../index.php");
  endif;
	$eq->AddEqServiceStatus();
  endif;
?>
<?php
  /* RemoveEqServiceStatus */
  if (isset($_POST['RemoveEqServiceStatus']))
      : if (intval($_POST['RemoveEqServiceStatus']) == 0 || empty($_POST['RemoveEqServiceStatus']))
      : redirect_to("../index.php");
  endif;
	$eq->RemoveEqServiceStatus();
  endif;
?>
<?php
  /* AddNewEqService */
  if (isset($_POST['AddNewEqService']))
      : if (intval($_POST['AddNewEqService']) == 0 || empty($_POST['AddNewEqService']))
      : redirect_to("../index.php");
  endif;
	$eq->AddNewEqService();
  endif;
?>
<?php
  /* ChangeEqServiceStatus */
  if (isset($_POST['ChangeEqServiceStatus']))
      : if (intval($_POST['ChangeEqServiceStatus']) == 0 || empty($_POST['ChangeEqServiceStatus']))
      : redirect_to("../index.php");
  endif;
	$eq->ChangeEqService();
  endif;
?>
<?php
  /* DeleteCategory */
  if (isset($_POST['DeleteCategory']))
      : if (intval($_POST['DeleteCategory']) == 0 || empty($_POST['DeleteCategory']))
      : redirect_to("../index.php");
  endif;
	$eq->DeleteCategory();
  endif;
?>
<?php
  /* NewStatus */
  if (isset($_POST['NewStatus']))
      : if (intval($_POST['NewStatus']) == 0 || empty($_POST['NewStatus']))
      : redirect_to("../index.php");
  endif;
	$eq->AddStatus();
  endif;
?>
<?php
  /* DeleteStatus */
  if (isset($_POST['DeleteStatus']))
      : if (intval($_POST['DeleteStatus']) == 0 || empty($_POST['DeleteStatus']))
      : redirect_to("../index.php");
  endif;
	$eq->DeleteStatus();
  endif;
?>
<?php
  /* DeleteEq */
  if (isset($_POST['DeleteEq']))
      : if (intval($_POST['DeleteEq']) == 0 || empty($_POST['DeleteEq']))
      : redirect_to("../index.php");
  endif;
	$eq->DeleteEq();
  endif;
?>
