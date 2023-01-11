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
					<li class='active'><a class="brand" href="../" ><i class='icon-book'></i>SQL Injection Challenges</a></li>
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
                    <h4>Secret! Shhhh...</h4>
                    <input type="text" class="input-block-level" id="secret" placeholder="Tell me your secret">
                    <br>
                    <b><span id='notification'></span></b>
                    <center><input class="btn btn-primary" id="get_secret" value = "&larr; Go &rarr;" style="margin-top:20px;"/></center>
                    <hr/>
                    <p><b>Rules: </b><kbd>get the secret from user id 7</kbd></p>
                </div>
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

    $("#get_secret").click(function () {
        $.ajax({
            url: "api2.php",
            type: "POST",
            data: "id=7&secret="+secret.value,
            success: function(data)
            {
				if (isJson(data))
				{
					alert(data["data"]);
				}
            }
        });
    });
</script>
</body>
</html>
