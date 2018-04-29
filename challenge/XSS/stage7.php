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
                <form method="get" action="stage7.php">
                    <h4>What is your favorite number:</h4>
                    <input type=range min=0 max=100 class=input-block-level name="_" id=input value=<?php
						if(isset($_GET['_'])){
							echo htmlspecialchars($_GET['_'], ENT_QUOTES, 'UTF-8');
						}else{
							echo 0;
						}
					?>>
                    <br>
                    <b><span id='notification'><?php
    if(isset($_GET['_'])){
        echo "you selected ".htmlspecialchars($_GET['_'], ENT_QUOTES, 'UTF-8');
    }
?></span></b>
                    <center><input type="submit" class="btn btn-primary" id="search" value = "&larr; Go &rarr;" style="margin-top:20px;"/></center>
                    <hr/>
                    <p><b>Rules: </b><kbd>Inject alert command.</kbd></p>
                </form>
            </div>
        </div>
	</div>
</body>
<script>

    //override alert
    var _old_alert = window.alert;

    window.alert = function() {
        $("#notification").html("<a href='stage8.php'>Good job stage8 go go go!</a>");
        _old_alert.apply(window, arguments);
    };

</script>
</html>
