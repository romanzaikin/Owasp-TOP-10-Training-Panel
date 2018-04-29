<?php
	$MySQLdb = new PDO("mysql:host=127.0.0.1;dbname=sqli", "root", "");
	$MySQLdb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	if (!isset($_REQUEST["username"]) && !isset($_REQUEST["password"]))
	{
		die("Please insert username and password");
	}

	// stage1
	if (strpos($_SERVER['HTTP_REFERER'] , 'stage1') !== false)
	{
		$username = $_POST["username"];
	}
		
	// stage2
	else if (strpos($_SERVER['HTTP_REFERER'] , 'stage2') !== false)
	{
		$username = str_replace(" ","",$_POST["username"]);
	}
	
	// stage4
	else if (strpos($_SERVER['HTTP_REFERER'] , 'stage4') !== false)
	{
		$username = $_POST["username"];
	}
	
	// stage3
	else
	{
		if (strpos($_GET["username"],"user_") !== FALSE)
		{
			$username = str_replace("user_","",$_GET["username"]);
		}
		else
		{
			die("wrong username parameter");
		}
	}
	
	$password = $_REQUEST["password"];
	
	try
	{
		$cursor = $MySQLdb->prepare("SELECT * FROM users WHERE username='$username' AND password=:password");
		$cursor->execute(array(":password"=>$password));
	}
	catch(PDOException $e) 
	{
		// stage4 - blind
		if (strpos($_SERVER['HTTP_REFERER'] , 'stage4') !== false)
		{
			die("database error");
		}
		
		die( $e->getMessage());
	}

	if($cursor->rowCount())
	{
		$cursor->setFetchMode(PDO::FETCH_ASSOC);
		
		// stage4 - blind
		if (strpos($_SERVER['HTTP_REFERER'] , 'stage4') !== false)
		{
			die("login successful");
		}
		
		die(json_encode($cursor->fetch()));
	}
	else
	{
		die("Wrong username or password");
	}
?>