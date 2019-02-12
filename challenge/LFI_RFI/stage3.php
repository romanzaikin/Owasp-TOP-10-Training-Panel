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
					<li class='active'><a class="brand" href="../" ><i class='icon-book'></i>SSRF Challenges</a></li>
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
                        $data = fopen($_GET['file'], 'rb');
						if (isset($data)){
							
							while(!feof($data)) {
								echo fgets($data) . "<br>";
							}
							
							fclose($data);
						}
					}
				?>
				</pre>
				<hr/>
				<p>
					<b>Rules: </b><kbd>SSRF: try to access "/challenge/LFI&RFI/tryme.php" on the local system and get the password of the right user</kbd>
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
			window.location="/challenge/LFI_RFI/stage3.php?file=test.txt";
	}
</script>
</body>
</html>
