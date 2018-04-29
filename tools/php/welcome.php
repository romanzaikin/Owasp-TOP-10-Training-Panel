<?php

$user = $_GET["username_field"];
$pass = $_GET["password_field"];

if (isset($user) && isset($pass))
{
	if ($user == "roman" && $pass == "123456")
	{
		echo "Welcome Admin <br/>";
	}
	else
	{
		echo "Welcome $user <br/>";
	}
		
	echo "Your IP Address is " . $_SERVER["REMOTE_ADDR"];
}
else
{
	echo "wrong parameter specified";
}
?>
