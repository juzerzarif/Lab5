<?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    
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
            echo "Post ID number ".$value." was deleted successfully<br>";
        }
        else
        {
            echo "Post ID number ".$value." deletion unsuccessful<br>";
        }
    }

    $myDB->close();
?>