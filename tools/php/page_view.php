<?php

if (session_status() == PHP_SESSION_NONE) 
{
	session_start();
	
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
			$_SESSION["page_view"]++;
			echo $_SESSION["page_view"]; 
		?>
		Times
		</h1>
   </body>
</html>
