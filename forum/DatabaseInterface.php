<?php

require_once './CommonInterface.php';

class DatabaseInterface
{
    const debug = true;

    public function __construct()
    {
        $this->MySQLdb = new PDO("mysql:host=127.0.0.1;dbname=forum", "root", "");
        $this->MySQLdb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function GetMySQLdb()
    {
        return $this->MySQLdb;
    }

    /*
     * CheckErrors - if debug mode is set we will output the error in the response, if the debug is off we will be redirected to 404.php
     */
    public function CheckErrors($e,$pass = false)
    {
        if ($pass == true) return true;

        if (self::debug){
            die($e->getMessage());
        }
        else
        {
            // return error if there is something strange in the database
            return_error(":)");
        }
    }

    public function GetAllPosts($id)
    {
        try
        {
            $cursor = $this->MySQLdb->prepare("SELECT * FROM posts");
            $cursor->execute();
            $retval = "";

            foreach ($cursor->fetchAll() as $obj)
            {
                if ($obj["user_id"] == $id)
                {
                    $retval.="<li class='speech-bubble-right'><h2>{$obj["user_name"]}</h2><p>{$obj["post_data"]}<a style='float:right;color: white;margin-right: 20px;' href='#' onclick='post_edit(this);'>edit</a></p><input value='{$obj["post_id"]}' hidden></li>";
                }
                else
                {
                    $retval.="<li class='speech-bubble-left'><h2>{$obj["user_name"]}</h2><p>{$obj["post_data"]}</p><input name='post_id' value='{$obj["post_id"]}' hidden></li>";
                }
            }

            return $retval;
        }
        catch(PDOException $e)
        {
            $this->CheckErrors($e);
        }
        return false;
    }

    public function NewPost($id, $data, $name)
    {
        try
        {
            $cursor = $this->MySQLdb->prepare("INSERT INTO posts (user_id,post_data,user_name) value (:id,:post_data,:name)");
            $cursor->execute(array(":id"=>$id, ":post_data"=>$data,":name"=>$name));
            if ($cursor->rowCount()) return true;
        }
        catch(PDOException $e)
        {
            $this->CheckErrors($e);
        }
        return false;
    }

    public function EditPost($id, $data)
    {
        try
        {
            $cursor = $this->MySQLdb->prepare("UPDATE posts SET post_data=:post_data WHERE post_id=:id");
            $cursor->execute(array(":id"=>$id, ":post_data"=>$data));
			if ($cursor->rowCount()) return true;
        }
        catch(PDOException $e)
        {
            $this->CheckErrors($e);
        }
        return false;
    }

    public function Register($username, $password)
    {
        try
        {
            # Check if the username or email is taken
            $cursor = $this->MySQLdb->prepare("SELECT username FROM users WHERE username=:username");
            $cursor->execute( array(":username"=>$username) );
        }
        catch(PDOException $e) {
            $this->CheckErrors($e);
        }

        /* New User */
        if(!($cursor->rowCount())){
            try
            {
                $cursor = $this->MySQLdb->prepare("INSERT INTO users (username, password) value (:username,:password)");
                $cursor->execute(array(":password"=>$password, ":username"=>$username));
                return array("success"=>true,"data"=>"You have successfully registered<br>");
            }
            catch(PDOException $e) {
                $this->CheckErrors($e);
            }
        }
        /* Already exists */
        else
        {
            return array("success"=>false,"data"=>"username already exists in the system<br>");
        }
    }

    public function Login($username, $password)
    {
        try
        {
            $cursor = $this->MySQLdb->prepare("SELECT * FROM users WHERE username='".$username."' AND password='".$password."'");
            $cursor->execute();
        }
        //SQL injection
        catch(PDOException $e) {
            $this->CheckErrors($e);
        }

        if(!$cursor->rowCount())
        {
            return  array("success"=>false,"data"=>"Wrong Username/Password!<br>");
        }
        else
        {
            $cursor->setFetchMode(PDO::FETCH_ASSOC);
            return array("success"=>true,"data"=>$cursor->fetch());
        }
    }
}