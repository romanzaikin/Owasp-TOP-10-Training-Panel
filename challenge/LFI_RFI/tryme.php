<!DOCTYPE html>
<html>
<head>
<title>Let's See If You Can</title>
</head>
<body>

<h1>
<?php 

	if(isset($_GET['username']))
	{
		if ($_GET['username'] == 'leet')
		{
			echo 'your password is 1337, well done!';
		}
		else
		{
			echo 'wrong username';
		}
	}
	else
	{
		echo 'parameter missing';
	}
?>
</h1>

</body>
</html>