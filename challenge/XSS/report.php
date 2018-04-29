<?php
	$log = " URL: " .  $_SERVER["HTTP_REFERER"]."\n";
	file_put_contents("log.log", $log , FILE_APPEND);
?>