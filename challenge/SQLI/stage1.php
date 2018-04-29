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
					<li class='active'><a class="brand " href="#" ><i class='icon-book'></i>SQL Injection Challenges</a></li>
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
                <h4>Please Login:</h4>
				USERNAME: <input type="text" class="input-block-level" placeholder="username" id="username">
				<br>
				PASSWORD: <input type="text" class="input-block-level" placeholder="password" id="password">
				<br/>
                <b><span id='notification'></span></b>
                <center><input class="btn btn-primary" id="search" value = "&larr; Go &rarr;" style="margin-top:20px;"/></center>
                <hr/>
                <p>
				<b>Task 1: </b><kbd>try to login to the user leet by using SQLi</kbd><br/>
				<b>Task 2: </b><kbd>Dump all the database manually</kbd><br/>
				<b>Task 3: </b><kbd>Dump all the database using sqlmap</kbd><br/>
				</p>
            </div>
        </div>
	</div>
<script>
	function isJson(str) {
		try {
			JSON.parse(str);
		} catch (e) {
			return false;
		}
		return true;
	}

    $("#search").click(function () {
        $.ajax({
            url: "api.php",
            type: "POST",
            data: "username="+username.value+"&password="+password.value,
            success: function(data)
            {
				if (isJson(data))
				{
					$("#notification").html("welcome: "+JSON.parse(data)["username"]);
				}
				else
				{
					$("#notification").html(data);
				}
            }
        });
    });
</script>
</body>
</html>
