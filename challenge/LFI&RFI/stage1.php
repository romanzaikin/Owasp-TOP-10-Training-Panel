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
					<li class='active'><a class="brand " href="#" ><i class='icon-book'></i>LFI/RFI Challenges</a></li>
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
			<h4>This is just a test</h4>
				<pre><?php
					if(isset($_GET["file"]))
					{
						include($_GET["file"]);
					}
				?>
				</pre>
				<hr/>
				<p>
					<b>Rules: </b><kbd>LFI: load some system file</kbd>
					<br/>
					<b>Rules: </b><kbd>RFI: execute shell command</kbd>
				</p>
			</form>
		</div>
	</div>
</div>
<script>
	var url = new URL(window.location.href);
	var url_data = url.searchParams.get("file");
	if (url_data === null)
	{
			window.location="/challenge/LFI&RFI/stage1.php?file=test.txt";
	}
</script>
</body>
</html>
