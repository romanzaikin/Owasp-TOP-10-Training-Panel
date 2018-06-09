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
				<p> use parameter "message" in URL </p>
				<script>
                <?php
					$_GET['message'] = addcslashes($_GET['message'], '/"\'');
print <<<EOF
							parent.IMAGE = 1;
							parent.updateDownImage('$_GET[message]');
EOF;
				?>
				</script>
                <hr/>
                <p><b>Rules: </b><kbd>Inject alert command.</kbd></p>
            </div>
        </div>
	</div>
</body>
<script>
    //override alert
    var _old_alert = window.alert;

    window.alert = function() {
        $("#notification").html("<a href='stage2.php'>Good job stage2 go go go!</a>");
        _old_alert.apply(window, arguments);
    };

</script>
</html>
