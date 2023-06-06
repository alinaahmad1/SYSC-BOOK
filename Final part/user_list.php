<?php
session_start();
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>View Details</title>
	<link rel="stylesheet" href="assets/css/reset.css" />
    <link rel="stylesheet" href="assets/css/style.css" />
	
</head>

<body>
    <div class="container text-center mt-5">
        <h1>All Details</h1>
    </div>
    <!-- Detail Table -->
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Student ID</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Program</th>
                </tr>
            </thead>
            <?php
					include 'connection.php';
                    $sql = "select * from users_info";
                    $query = mysqli_query($conn , $sql);
                    while($row = mysqli_fetch_assoc($query))
                    {
                        echo'
                        <tbody>
                        <tr>
                          <th scope="row">'.$row['student_id'].'</th>
                          <td>'.$row['first_name'].'</td>
                          <td>'.$row['last_name'].'</td>
                          <td>'.$row['student_email'].'</td>
                          <td>'.$row['program'].'</td>
                        </tr>
                        </tbody>
                        ';
                    }
            ?>

        </table>
    </div>
</body>

</html>