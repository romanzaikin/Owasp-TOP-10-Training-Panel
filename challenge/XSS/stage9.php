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
					<li class='active'><a class="brand" href="../" ><i class='icon-book'></i>XSS Challenges</a></li>
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
			<h4>Start The Challenge By Pressing start:</h4>
			<br>
			<b><span id='notification'></span></b>
			<a href="./redirect.php?url=<?php echo (isset($_GET["callback"]) ? $_GET["callback"] : "stage9_real_challenge.php"); ?>">START</a>
			<hr/>
			<p><b>Rules: </b><kbd>insert in the url callback=stage9_real_challenge.php and press start</kbd></p>
		</div>
	</div>
</div>
</body>
</html>
