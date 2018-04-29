<?php
    if(isset($_GET['_'])){
        echo $_GET['_'];
        die();
    }
	//CSP challenge
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
					<li class='active'><a class="brand " href="#" ><i class='icon-book'></i>XSS Challenges</a></li>
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
			<h4>Search for your favorite food:</h4>
			<input type="text" class="input-block-level" placeholder="Apple" id="input">
			<form action="api.php" method="POST" enctype="multipart/form-data">
				<input type="file" name="file_upload" id="file" accept=".jpg"/>
				<input type="submit" value="upload" />
			</form>
			<br>
			<b><span id='notification'></span></b>
			<center><input class="btn btn-primary" id="search" value = "&larr; Go &rarr;" style="margin-top:20px;"/></center>
			<hr/>
			<p><b>Rules: </b><kbd>Inject alert command.</kbd></p>
		</div>
	</div>
</div>
<script src="../assets/js/stage10.js"></script>
</body>
</html>
