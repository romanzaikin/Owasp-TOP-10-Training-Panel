<?php

if (session_status() == PHP_SESSION_NONE) 
{
	session_start(); 							// copy all the data to $_SESSION parameter (account takeovr)
		
	if (isset($_GET["PHPSESSID"]))
	{
		// change session id to the session from the url
		session_id($_GET["PHPSESSID"]);						// just change the session id nothing more
	}
	
	//session_start(); 						    // session fixation
	
	if (!isset($_SESSION["page_view"]))
	{
		$_SESSION["page_view"] = 0;
	}
}
?>
<html>
<head>
      <title>Page Counter</title>
   </head>
   <body>
		<h1> You visit this page for 
		<?php 
			$_SESSION["page_view"] = $_SESSION["page_view"]+1;
			
			echo $_SESSION["page_view"]; 
		?>
		Times
		</h1>
		
		<a href="page_view.php?<?php echo session_name().'='.session_id(); ?>">use session from URL</a>
   </body>
</html>