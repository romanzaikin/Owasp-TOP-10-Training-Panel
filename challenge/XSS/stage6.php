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
                <form method="post" action="stage6.php">
                    <h4>Search for your favorite food:</h4>
                    <input type="text" class="input-block-level" placeholder="Apple" name="_" id="input" value="<?php
    if(isset($_POST['_'])){
        echo htmlspecialchars($_POST['_'],ENT_IGNORE);
    }
?>">
                    <br>
                    <b><span id='notification'><?php
    if(isset($_POST['_'])){
        echo "no result for your query";
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
        $("#notification").html("<a href='stage7.php'>Good job stage7 go go go!</a>");
        _old_alert.apply(window, arguments);
    };

</script>
</html>
