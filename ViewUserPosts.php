<?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);

    echo "<title>View Posts</title>";

    $myDB = new mysqli("mysql.eecs.ku.edu", "jzarif", "P@$\$word123", "jzarif");
    $user = $_POST["user_list"];
    //var_dump($user);

    if($myDB->connect_errno)
    {
        printf("Connection failed: %s\n", $myDB->connect_error);
        exit();
    }

    $query = "SELECT post_id, content FROM Posts WHERE Posts.author_id='".$user."' ORDER BY post_id";
    //echo $query;
    $result = $myDB->query($query);
    //var_dump($result);

    if($result->num_rows != 0)
    {
        echo "<center><table border='1'>";
        echo "<tr><td><h4>Post ID</h4></td><td><h4>Post</h4></td></tr>";
        while($row = $result->fetch_assoc())
        {
            echo "<tr><td>".$row["post_id"]."</td><td>".$row["content"]."</td></tr>";
        }
        echo "</table></center>";
    }
    else
    {
        echo "<center><h3>Select Query Failed. No Posts in database.</h3></center>";
    }

    $myDB->close();

    echo "<center><br><br><a href=\"AdminHome.html\">Click Here to go back to Admin Home</a></center>";
?>