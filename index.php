<?php
session_start();
ob_start();
//8388500*173
// GodMode.{ED7BA470-8E54-465E-825C-99712043E01C}    új mappa és erre átnevezni
//error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
error_reporting(E_ERROR | E_WARNING | E_PARSE);

include_once 'definial.php';
include_once 'lib/lang.php';
if(MoConfig::$offline=='igen'){ //offline módban kikapcsolja a weblapot
				if($jogok_gt['stat']!='admin'){die(MoConfig::$offline_message);
				return false;
				}
}

// adatbázis elérés------------------------------------------------------
include_once DB_FGV;  //adatbázis
$db=DB::connect();
include_once JOGOK; // azzonosítás jogosultságok

//azonosítás jogok--------------------------------------------------
$azonosit= new Azonosit; //session-be írja az useridet vagy nullát

//$_SESSION['userid']=62;
include_once ALTALANOS_FGV;

//tartalom előállítás--------------------------------------
switch ($_POST['task']){
	case 'save':
	include 'save.php';
		break;
	case 'vment':
		vment($adatok);
		break;			
	default: 
	include 'listaz.php';
	}
//template becsatolás (alap,json stb) tartalom keret stb kiírás----------------
if($_POST['tmpl']!=null){GOB::$tmpl['alap']=$_POST['tmpl'];}
if($_GET['tmpl']!=null){GOB::$tmpl['alap']=$_GET['tmpl'];}

include'view/'.GOB::$tmpl['alap'].".php";
ob_end_flush();
?>