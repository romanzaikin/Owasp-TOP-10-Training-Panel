<?php
class Person
{
    public $name = '';
    public $age = 0;

    public function __toString()
    {
        return "Name: " . $this->name . "<br>Age: " . $this->age;
    }
}

$data = "";
if(isset($_GET["name"]) && isset($_GET["age"]))
{
    $p = new Person();
    $p->name=$_GET["name"];
    $p->age=$_GET["age"];

    $data =  serialize($p);
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
					<li class='active'><a class="brand" href="../" ><i class='icon-book'></i>Object Injection Challenges</a></li>
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
                <h4>Save Your Data:</h4>
                <form action="" method="get">
                    Name: <input type="text" class="input-block-level" placeholder="roman" name="name">
                    <br>
                    Age: <input type="text" class="input-block-level" placeholder="28" name="age">
                    <br/>
                    <b><span id='notification'><?php if($data) echo $data;?></span></b>
                    <hr/>
                    <input class="btn btn-danger" type="submit" value="Save">
                    <input class="btn btn-primary" id="search" value="Load"/>
					<a href="api.code" class="btn btn-primary" id="search">Code</a>
                </form>
                <hr/>
                <p><b>Rules: </b><kbd>Try to read secret.log file by using object injection</kbd></p>
            </div>
        </div>
	</div>
<script>
    $("#search").click(function () {
        $.ajax({
            url: "api.php",
            type: "GET",
            data: {"s":$("#notification").html()},
            success: function(data)
            {
                $("#notification").html(data);
            }
        });
    });
</script>
</body>
</html>
