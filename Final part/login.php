<?php
session_start();

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="assets/css/reset.css" />
        <link rel="stylesheet" href="assets/css/style.css" />
    </head>
    <body>
        <div class="container text-center mt-5">
        <h1>Login Form</h1>
    </div>
    <div class="container">
        <form action = "./index.php" method = "post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" name = "email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" name = "password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Remember Me</label>
            </div>
            <input type="submit" class = "submit_Btn">
        </form>
		<?php
			// Database Connection
			include 'connection.php';

			$email = $password = " ";
			
			if($_SERVER['REQUEST_METHOD'] == 'POST')
			{
				$email = $_POST['email'];
				$password = $_POST['password'];
				$_SESSION['LoginUserId'] = GetId($email);
				
				function Extract_hash()
				{
					include 'connection.php';
					// Fetching Query
					$sql = 'select password from users_passwords';
					$query = mysqli_query($conn , $sql);
					$row = mysqli_fetch_assoc($query);

						return $row['password'];
				}
				$hash = Extract_hash(); // Extracting Hash password from database
				$verify = password_verify($password, $hash);
				
				// verifying Email
				$sql = 'select student_email from users_info';
				$query = mysqli_query($conn , $sql);
				$row = mysqli_fetch_assoc($query);
					 
					if($row['student_email'] == $email && $verify == true)
					{
						echo '<script>location.replace("index.php");</script>';
					}
				
			}


		?>
    </div>

    </body>
</html>