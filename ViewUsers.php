<?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);

    $myDB = new mysqli("mysql.eecs.ku.edu", "jzarif", "P@$\$word123", "jzarif");

    if($myDB->connect_errno)
    {
        printf("Connection failed: %s\n", $myDB->connect_error);
        exit();
    }

    $query = "SELECT user_id FROM Users ORDER BY user_id ASC";
    $result = $myDB->query($query);

    if($result)
    {
        echo "<center><table border='1'>";
        echo "<tr><td><h4>No\.</h4></td><td><h4>Users</h4></td></tr>";
        $count = 1;
        while($row = $result->fetch_assoc())
        {
            echo "<tr><td>".$count."</td><td>".$row["user_id"]."</td></tr>";
            $count++;
        }
        echo "</table></center>";
    }
    else
    {
        echo "Select Query Failed";
    }
?>