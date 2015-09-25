<?php
function save_view($data){
?>


<?php
}
if($_SESSION['userid']==0){
include 'login/login.php';
}else{
$mezok=array("id","ikon","image","fejlec" ,"intro","kepalairas","link");
$adat_tomb=array();
$adat_tomb=ADAT::postbol_datatomb($mezok,$adat_tomb); //lehet tomb és sztring param
print_r($adat_tomb);
$beszurt_id=ADAT::beszur_tombbol(feedek,$adat_tomb,$mezok);
GOB::$tartalom= $data["image"];
GOB::$tartalom=GOB::$tartalom."sgbhsfgfsgfsdhsd";
 }
?>
