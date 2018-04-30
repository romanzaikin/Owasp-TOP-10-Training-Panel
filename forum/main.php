<?php
    require_once "permissions.php";

    $user     = $_SESSION["user"];
    $userid   = $_SESSION["userid"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Forum</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/custom.css">

    <script src="./assets/js/jquery.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">FORUM</a>
        </div>
        <ul class="nav navbar-nav" style="float: right">
            <li><a href="#" id="logout">Logout</a></li>
        </ul>
    </div>
</nav>

<div class="container">
    <div class="row" id="page" hidden>
        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading">Account Info</div>
                <div class="panel-body">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <p>
                                <kbd>username:</kbd>
                                <span style="float:right;">
                                    <?php echo htmlentities(strip_tags($user), ENT_QUOTES, "UTF-8"); ?>
                                </span>
                            </p>
                        </li>
                        <li class="list-group-item">
                            <p>
                                <kbd>ip address</kbd>
                                <span style="float:right;">
                                    <?php echo $_SERVER["REMOTE_ADDR"];?>
                                </span>
                            </p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Chat History
                </div>
                <div class="panel-body">
                    <ul class="list-group" id="post_history">
                        <li class="speech-bubble-left">
                            <h2>roman</h2>
                            <p>this is my text nothing special</p>
                        </li>
                        <li class="speech-bubble-right">
                            <h2>roman2</h2>
                            <p>this is my text nothing special</p>
                        </li>
                        <li class="speech-bubble-left">
                            <h2>roman</h2>
                            <p>
                                this is my text nothing special
                            </p>
                            <input name="post_id" value="10" hidden>
                        </li>
                    </ul>
                </div>
            </div>
            <form>
                <div class="input-group">
                    <input id="msg" type="text" class="form-control" name="msg" placeholder="Write your message here...">
                    <span class="input-group-addon"><button id="send_post">Send</button></span>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="./assets/pages/helper.js"></script>
<script src="./assets/pages/main.js"></script>
</body>
</html>
