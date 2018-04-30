<?php
    require_once './DatabaseInterface.php';
    
    $databaseObj = new DatabaseInterface();

    /* Start session if none */
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    /* Check if the user already logged in */
    if(isset($_SESSION["user"]))
    {
        Header("Location: ./main.php");
    }

    $error_message = null;
    $success_message = null;

    if(isset($_POST['r_password']) && isset($_POST['r_username']))
    {
        $password   = $_POST['r_password'];
        $username   = $_POST['r_username'];
        $return_array = $databaseObj->Register($username,$password);

        if ($return_array["success"] == false)
        {
            $error_message = $return_array["data"];
        }
        else
        {
            $success_message = $return_array["data"];
        }

    }
    else if(isset($_POST['l_password']) && isset($_POST['l_username']))
    {
        $password   = $_POST['l_password'];
        $username   = $_POST['l_username'];

        $return_array = $databaseObj->Login($username, $password);

        if ($return_array["success"] == false)
        {
            $error_message = $return_array["data"];
        }
        else
        {
            /* set session */
            $_SESSION["user"]    = $return_array["data"]["username"];
            $_SESSION["userid"]  = $return_array["data"]["id"];

            /* set cookie */
            die(Header("Location: ./main.php"));
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login/Regsiter</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <script src="./assets/js/jquery.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="well">
                <h1>Forum</h1>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">Login

                </div>
                <div class="panel-body" id="login-panel">
                    <form action="#" method="POST">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input id="l_email" type="text" class="form-control" name="l_username" placeholder="username">
                        </div>
                        <br>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input id="l_password" type="password" class="form-control" name="l_password" placeholder="password">
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary btn-block">login</button>
                        <a href="#" id="register"><i class="glyphicon glyphicon-info-sign"></i>register</a>
                        <?php
                            if (isset($error_message))
                            {
                                echo "<div class='alert alert-danger'><strong>Error:</strong>".$error_message."</div>";
                            }
                            else if (isset($success_message))
                            {
                                echo "<div class='alert alert-success'><strong>Note:</strong>".$success_message."</div>";
                            }
                        ?>
                    </form>
                </div>
                <div class="panel-body" id="register-panel" hidden>
                    <form action="#" method="POST">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input id="r_username" type="text" class="form-control" name="r_username" placeholder="username">
                        </div>
                        <br>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input id="r_password" type="password" class="form-control" name="r_password" placeholder="password">
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary btn-block">register</button>
                        <a href="#" id="login"><i class="glyphicon glyphicon-info-sign"></i>login</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="./assets/pages/index.js"></script>
</body>
</html>