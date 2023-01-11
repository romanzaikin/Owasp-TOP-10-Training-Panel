<?php
	$MySQLdb = new PDO("mysql:host=127.0.0.1;dbname=sqli", "root", "");
	$MySQLdb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	if (!isset($_REQUEST["id"]))
	{
		die("Please insert an id");
	}

    $id = preg_replace('/[^\da-z\.\(\),_]/i', '', $_POST["id"]);

	try
	{
        if (strpos($_SERVER['HTTP_REFERER'] , 'stage5') !== false)
        {
            $data = substr($_POST["secret"], 0 ,50);
            $cursor = $MySQLdb->prepare("SELECT * FROM cats WHERE id=7 and secret='$data'");
            $cursor->execute();
        }
        else{
            $cursor = $MySQLdb->prepare("SELECT * FROM cats WHERE id=$id");
            $cursor->execute();
        }
	}
	catch(PDOException $e) 
	{

		if (strpos($_SERVER['HTTP_REFERER'] , 'stage6') !== false)
		{
			die("Security Error: Blocked by the Web Application Firewall");
		}

		elseif (strpos($_SERVER['HTTP_REFERER'] , 'stage7') !== false)
		{
			die($e->getMessage());
		}

		die($e->getMessage());
	}

	if($cursor->rowCount())
	{
		$cursor->setFetchMode(PDO::FETCH_ASSOC);
        if (strpos($_SERVER['HTTP_REFERER'] , 'stage5') !== false)
        {
           if ($cursor->fetch()["secret"] == "SQL_Injection Master_!")
           {
               die(json_encode(array("data"=>"You are a real ninja! the secret is SQL_Injection Master_!")));
           }
           elseif  ($cursor->fetch()["id"] != 7)
           {
               die(json_encode(array("data"=>"You on the right way, I told you id 7")));
           }
           else
           {
               die(json_encode(array("data"=>"Something wrong!")));
           }
        }

		elseif (strpos($_SERVER['HTTP_REFERER'] , 'stage8') !== false)
		{
		    switch ($cursor->fetch()["path"]){
                case "cats/1": die(json_encode(array("path"=>"cats/1")));
                case "cats/2": die(json_encode(array("path"=>"cats/2")));
                case "cats/3": die(json_encode(array("path"=>"cats/3")));
                case "cats/4": die(json_encode(array("path"=>"cats/4")));
                case "cats/5": die(json_encode(array("path"=>"cats/5")));
                case "cats/6": die(json_encode(array("path"=>"cats/6")));
                case "cats/7": die(json_encode(array("path"=>"cats/7")));
                case "cats/8": die(json_encode(array("path"=>"cats/8")));
                case "cats/9": die(json_encode(array("path"=>"cats/9")));
                case "cats/10": die(json_encode(array("path"=>"cats/10")));
                default: die("login failed 2");
            }
		}

		die(json_encode(array("path"=>$cursor->fetch()["path"])));
	}
	else
	{
		die("nothing to show");
	}
?>