<?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);

    echo "<title>Create Posts</title>";

    $user_id = $_POST["user_id"];
    $post = $_POST["post"];
    $myDB = new mysqli("mysql.eecs.ku.edu", "jzarif", "P@$\$word123", "jzarif");

    if($myDB->connect_errno)
    {
        printf("Connection failed: %s\n", $myDB->connect_error);
        exit();
    }

    if($post=="")
    {
        echo "<center>You didn't enter anything<br>";
        echo "<a href = 'CreatePosts.html'>Click Here</a> to go back</center>";
    }
    else
    {
        $query = "SELECT Users.user_id FROM Users WHERE user_id='".$user_id."'";
        $result = $myDB->query($query);

        if($result->num_rows == 0)
        {
            echo "<center>INVALID USER ID<br>";
            echo "<a href = 'CreateUser.html'>Click Here</a> to sign up a user ID<br>";
            echo "<a href = 'CreatePosts.html'>Click Here</a> to go back</center>";
            $result->free();
        }
        else
        {
            $query = "SELECT content, author_id FROM Posts WHERE content='".$post."'"." AND author_id='".$user_id."'";
            $result = $myDB->query($query);

            if($result->num_rows == 0)
            {
                $add_post = "INSERT INTO Posts(content, author_id) VALUES ('".$post."', '".$user_id."')";
                $result = $myDB->query($add_post);

                if($result)
                {
                    echo "<center>Post successfully added<br>";
                    echo "<a href = 'CreatePosts.html'>Click Here</a> to go back</center>";
                }
                else
                {
                    echo "<center>Post addition unsuccessful<br>";
                    echo "<a href = 'CreatePosts.html'>Click Here</a> to go back</center>";
                }
            }
            else
            {
                echo "<center>Post already exists<br>";
                echo "<a href = 'CreatePosts.html'>Click Here</a> to go back</center>";
            }
        }
    }

    $myDB->close();
?>