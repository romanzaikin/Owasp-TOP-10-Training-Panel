<?php
    if(isset($_GET['_']) && isset($_GET['__']) ){
        $json = array('_' => htmlspecialchars($_GET['_'], ENT_QUOTES, 'UTF-8'),'__' => $_GET['__']);
        echo json_encode($json,JSON_FORCE_OBJECT);
		//add Json content-type to fix the XSS.
		//header('Content-Type: application/json');
        die();
    }
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
                <h4>Search for your favorite food:</h4>
                <input type="text" class="input-block-level" placeholder="Apple" id="input">
                <select style="width: 100%" id="select">
                    <option value="IL">IL</option>
                    <option value="USA">USA</option>
                </select>
                <br>
                <b><span id='notification'></span></b>
                <center><input class="btn btn-primary" id="search" value = "&larr; Go &rarr;" style="margin-top:20px;"/></center>
                <hr/>
                <p><b>Rules: </b><kbd>Inject alert command.</kbd></p>
            </div>
        </div>
	</div>
</body>
<script>

    $("#search").click(function () {
        $.ajax({
            url: "stage3.php",
            type: "GET",
            data: {"_":$("#input").val(),"__":$("#select").val()},
            success: function(data)
            {
                var obj = jQuery.parseJSON(data);
                $("#notification").html("Couldn't find " +obj._+" in "+obj.__);
            }
        });
    });

    //override alert
    var _old_alert = window.alert;

    window.alert = function() {
        $("#notification").html("<a href='stage4.php'>Good job stage4 go go go!</a>");
        _old_alert.apply(window, arguments);
    };

</script>
</html>
