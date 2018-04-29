<?php 
	$xmlfile = file_get_contents('php://input'); 
	
	$dom = new DOMDocument(); 
	//XXE  LIBXML_NOENT | LIBXML_DTDLOAD
	$dom->loadXML($xmlfile, LIBXML_NOENT | LIBXML_DTDLOAD); 
	
	$creds = simplexml_import_dom($dom); 
	$user = $creds->user; 
	$pass = $creds->pass;
		
	if (strpos($_SERVER['HTTP_REFERER'] , 'stage1') !== false)
	{
		echo "Login successfully, Welcome $user";
	}
	else if (strpos($_SERVER['HTTP_REFERER'] , 'stage2') !== false)
	{
		echo "Login successfully, Welcome";
	}
	
?>