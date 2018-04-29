<?php 
	if (isset($_COOKIE["name"]))
	{
		echo "Edit user profile for the user " . $_COOKIE["name"];
	}
	else
	{
		echo "Please login";
	}
?>