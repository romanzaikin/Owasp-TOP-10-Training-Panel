<?php
	if (isset($_FILES["file_upload"]))
	{
		$target_file = "uploads/".time(). basename($_FILES["file_upload"]["name"]);
		if (move_uploaded_file($_FILES["file_upload"]["tmp_name"], $target_file)) 
		{
			die(header("Location: stage1.php?image=$target_file"));
		}
	}
?>
<!DOCTYPE html>
<html>
<?php 
	include("../assets/pages/header.php"); 
?>
<body>	<!-- Fixed navbar -->
<div class="navbar navbar-fixed-top navbar-inverse" style='margin-top:-2px;'>
	<div class="navbar-inner">
		<div class="container">
			<div class="nav-collapse collapse">
				<ul class="nav">
					<li class='active'><a class="brand" href="../" ><i class='icon-book'></i>RCE Challenges</a></li>
				</ul>
				<ul class="nav pull-right">
					<li class='active' style='margin-top:2px;'><a href="#" ><i class="icon-user"></i>&nbsp; Login &nbsp; </a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
<!-- end of fixed Nav bar-->

<div class="container">
	<br>
	<div class="row " >
		<div class="span3"></div>
		<div id="login" class="span6 well" style='background :white; border:1px silver solid;'>
			<h4>Upload image of for your favorite food:</h4>
			<form action="stage1.php" method="POST" enctype="multipart/form-data">
				<input type="file" name="file_upload" accept=".jpg" />
				<input type="submit" value="upload" />
			</form>
			<br>
				<?php 
					if (isset($_GET["image"]))
					{
						printf('<hr/><img src="%s" class="img-responsive"/>', $_GET["image"]);
					}
				?>
			<hr/>
			<p><b>Rules: </b><kbd>Run dir command.</kbd></p>
		</div>
	</div>
</div>
<script>
	
	
	//override alert
	var _old_alert = window.alert;

	window.alert = function() {
		$("#notification").html("<a href='stage10.php'>Good job stage10 go go go!</a>");
		_old_alert.apply(window, arguments);
	};
</script>
</body>
</html>
