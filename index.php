<?php
include('./includes/config.inc.php');

 $keres = null;
	include('./includes/config.inc.php');
	$oldal = $_SERVER['QUERY_STRING'];
        
        if(str_contains($oldal,"edituser")) 
			{
				include("./templates/pages/edituser.tpl.php");
		} 
		elseif(str_contains($oldal,"deleteuser")) 
			{
        include("./templates/pages/deleteuser.tpl.php");
		}
	elseif ($oldal!="") {
		if (isset($oldalak[$oldal]) && file_exists("./templates/pages/{$oldalak[$oldal]['fajl']}.tpl.php")) {
			$keres = $oldalak[$oldal];
		}
		else { 
			$keres = $hiba_oldal;
			header("HTTP/1.0 404 Not Found");
		}
	}
	else $keres = $oldalak['/'];
	include('./templates/index.tpl.php'); 
?>