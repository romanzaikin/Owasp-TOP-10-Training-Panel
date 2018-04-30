<?php

    function return_error($error_message)
    {
        header('HTTP/1.1 403 Forbidden', true, 403);
        header('Content-Type: application/json');
        die(json_encode(array("success" => false, "data" => $error_message)));
    }

    function return_success($success_message)
    {
        header('HTTP/1.1 200 OK', true, 200);
        header('Content-Type: application/json');
        die(json_encode(array("success" => true, "data" => $success_message)));
    }
?>