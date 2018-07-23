<?php
	$input = json_decode(file_get_contents('php://input'),true);
	
	if ( isset($input["codes1"]) && isset($input["codes2"]))
    {
       if (($input["codes1"] == [20,69,20,68,87,65,82,68,9,16,83,78,79,87,68,69,78]) && ($input["codes2"] < 6000))
       {						 
			die('{"msg":"Welcome Edward Snowden","success":true}');
       }
	   else
	   {
			die('{"msg":"I don\'t know you","success":false}');
	   }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>TOP SECRET</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap.min.css">
    <script src="jquery.min.js"></script>
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>-->
    <script src="bootstrap.min.js"></script>
    <script src="md5.min.js"></script>
</head>
<body>

<!-- The Modal -->
<div class="modal fade" id="MessageModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Notice:</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <span id="msg">error message</span>.
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="location.reload();">Close</button>
            </div>

        </div>
    </div>
</div>

<div class="container">
    <h2>Login to System</h2>
    <form>
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" class="form-control" id="username" placeholder="Enter username">
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" placeholder="Enter password">
        </div>
    </form>
</div>

<script src="challenge.js"></script>
</body>
</html>
