<?php
	if (session_status() == PHP_SESSION_NONE) 
	{
		session_start();
		
		if (!isset($_SESSION["likes"]))
		{
			$_SESSION["likes"] = 0;
		}
		if ($_GET["action"] == "like")
		{
			$_SESSION["likes"]++;
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Likes</title>
</head>
<body>
	<p>
		LIKES:
		<?php
			echo $_SESSION["likes"]; 
		?>
	</p>
	<form>
		<input type="submit" value="like" name="action">
	</form>
</body>
</html>