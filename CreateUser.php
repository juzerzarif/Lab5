<?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);

    echo "<title>User Creation</title>";

    $user_id = $_POST["user_id"];
    $myDB = new mysqli("mysql.eecs.ku.edu", "jzarif", "P@$\$word123", "jzarif");

    if($myDB->connect_errno)
    {
        printf("Connection failed: %s\n", $myDB->connect_error);
        exit();
    }

    if($user_id=="") 
    {
        echo "<center>You didn't enter anything<br>";
        echo "<a href = 'CreateUser.html'>Click Here</a> to go back</center>";
    }
    else
    {
        $query = "SELECT user_id FROM Users WHERE user_id='".$user_id."'";
        //echo $query."<br>";
        $result = $myDB->query($query);
        //var_dump($result);
        if($result->num_rows == 0)
        {
            $add_user = "INSERT INTO Users (user_id) VALUES ('".$user_id."')";
            $result = $myDB->query($add_user);
            //var_dump($result);
            if($result)
            {
                echo "<center>User ID successfully added!<br>";
                echo "<a href = 'CreateUser.html'>Click Here</a> to go back</center>";
            }
            else
            {
                echo "<center>User ID addition unsuccessful.<br>";
                echo "<a href = 'CreateUser.html'>Click Here</a> to go back</center>";
            }
        }
        else
        {
            echo "<center>User ID Already Exists.<br>";
            echo "<a href = 'CreateUser.html'>Click Here</a> to go back</center>";
            $result->free();
        }
    }
    $myDB->close();
?>