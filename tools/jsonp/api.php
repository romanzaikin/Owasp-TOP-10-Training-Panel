<?php

	header('Content-Type: application/javascript');
	
	echo $_GET['cb'] . '({"name":"roman"})';