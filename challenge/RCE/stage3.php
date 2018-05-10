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
					<li class='active'><a class="brand " href="#" ><i class='icon-book'></i>RCE Challenges</a></li>
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
			<h4>let's check your server connectivity, insert your IP</h4>
			<form action="" method="get">
				<input type="text" class="input-block-level" placeholder="8.8.8.8" id="input" name="ping">
				<br>
				<b>
				<pre>
				<?php
					if(isset($_GET["ping"]))
					{
						$output = system("ping -n 1 ".$_GET["ping"]);
						echo $output;
					}
				?>
				</pre>
				</b>
				<center><input type="submit" class="btn btn-primary" id="search" value = "&larr; Go &rarr;" style="margin-top:20px;"/></center>
				<hr/>
				<p><b>Rules: </b><kbd>Run dir command.</kbd></p>
			</form>
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
