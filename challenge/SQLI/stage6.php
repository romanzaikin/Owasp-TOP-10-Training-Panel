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
                <h4>Cats:</h4>
				CATS!!! <input type="range" class="input-block-level" id="cats_id" min="1" max="10" value="1">
				<br>
                <img class="img-responsive" id="cats_img" src="cats/1.jpg">
                <hr/>
                <p>
				<b>Task 1: </b>get the secret from the cat with the role admin by using <kbd><b>union based!</b></kbd> SQL Injection<br/>
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

    $("#cats_id").click(function () {
        $.ajax({
            url: "api2.php",
            type: "POST",
            data: "id="+cats_id.value,
            success: function(data)
            {
				if (isJson(data))
				{
					cats_img.src =JSON.parse(data)["path"]+".jpg";
				}
            }
        });
    });
</script>
</body>
</html>
