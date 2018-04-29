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
					<li class='active'><a class="brand " href="#" ><i class='icon-book'></i>XXE Challenges</a></li>
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
				USERNAME: <input type="text" class="input-block-level" placeholder="roman" id="username">
				<br>
				PASSWORD: <input type="text" class="input-block-level" placeholder="roman" id="password">
				<br/>
                <b><span id='notification'></span></b>
                <center><input class="btn btn-primary" id="search" value = "&larr; Go &rarr;" style="margin-top:20px;"/></center>
                <hr/>
                <p><b>Rules: </b><kbd>get the source code of stage2.php</kbd></p>
            </div>
        </div>
	</div>
<script>
    $("#search").click(function () {
        $.ajax({
            url: "api.php",
            type: "POST",
            data: "<creds><user>"+username.value+"</user><pass>"+password.value+"</pass></creds>",
            success: function(data)
            {
                $("#notification").html(data);
            }
        });
    });
</script>
</body>
</html>
