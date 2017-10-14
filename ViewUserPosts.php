<?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);

    $myDB = new mysqli("mysql.eecs.ku.edu", "jzarif", "P@$\$word123", "jzarif");
    $user = $_POST["user_list"];
    //var_dump($user);

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
        echo "Select Query Failed";
    }
?>