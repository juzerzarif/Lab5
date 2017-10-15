<?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    
    echo "<title>Delete Posts</title>";

    if(isset($_POST["delete_check"])) $posts = ($_POST['delete_check']);
    else 
    {
        echo "Empty Set";
        exit();
    }

    $myDB = new mysqli("mysql.eecs.ku.edu", "jzarif", "P@$\$word123", "jzarif");

    if($myDB->connect_errno)
    {
        printf("Connection failed: %s\n", $myDB->connect_error);
        exit();
    }

    foreach($posts as $value)
    {
        $query = "DELETE FROM Posts WHERE post_id='".$value."'";
        $result = $myDB->query($query);

        if($result)
        {
            echo "<center><h3>Post ID number ".$value." was deleted successfully</h3></center><br>";
        }
        else
        {
            echo "<center><h3>  Post ID number ".$value." deletion unsuccessful</h3></center><br>";
        }
    }

    $myDB->close();

    echo "<center><br><br><a href=\"AdminHome.html\">Click Here to go back to Admin Home</a></center>";
?>