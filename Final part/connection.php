<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "alina_ahmad_syscbook";

    // ---< CONNECTING DATABASE>-----
        $conn = mysqli_connect($servername , $username , $password , $database);
        if(!$conn)
        {
            echo 'database has not been created due to the following error____'. mysqli_connect_error($conn);
        }
        
        

?>
