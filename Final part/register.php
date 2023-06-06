<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head >
   <meta charset="utf-8">
   <title>Register on SYSCBOOK</title>
   <link rel="stylesheet" href="assets/css/reset.css" />
   <link rel="stylesheet" href="assets/css/style.css" />
</head>
<body>
   <header>
      <h1>SYSCBOOK</h1>
      <p>Social media for SYSC students in Carleton University</p>
   </header>
   <nav>
   <div class="left">
        <ul class="nav">
            <li><a href="index.php">Home</a></li>
            <li><a href="profile.php">Profile</a></li>
			<li><a href="register.php">Register</a></li>
			<li><a href="logout.php">Logout</a></li>
			<li><a href="login.php">Login</a></li>
        </ul>
    </div>

   </nav>
      <main>
         <h2>Register a new profile</h2>
         <form action = "./register.php"  method = "post">
            <fieldset>
               <legend><span>Personal information</span></legend>
			   <table>
			   <tr>
               <td><p><label> First Name:</label>
               <input type="text" name="first_name"/></p></td>
			   
               <td><p><label> Last Name:</label>
               <input type="text" name="last_name"/></p></td>
			   
               <td><p><label> DOB:</label>
               <input type="date" name="DOB" /></p></td>
			   </tr>
			   </table>
			   
               <legend><span>Profile Information</span></legend>
			   <table>
			   <tr>
               <td><p><label>Email address:</label>
               <input type="text" name="student_email"/></p></td>
			   </tr>
               <tr>
               <td><p><label>Program:</label>
				<select name="Program">
                  <option value="cp">Choose Program</option>
                  <option value="CSE">Computer Systems Engineering</option>
                  <option value="SE">Software Engineering</option>
                  <option value="CE">Communications Engineering</option>
                  <option value="BE">Biomedical Engineering</option>
                  <option value="EE">Electrical Engineering</option>
                  <option value="EEe">Environmental Engineering</option>
                     </select></p></td>
			   </tr>
			   <tr>
                  <td>
                    <label>Password: </label>
                    <input type = "password" id = "password" name = "password" required/>
                    <small style = "color:red" id = "passwordError"></small>
                  </td>
               
                </tr>
                <tr>
                  <td>
                    <label>Confirm password: </label>
                    <input type = "password" id = "confirmPassword" name = "confirmPassword" required/>
                  </td>
                </tr>
                <tr>
                  <td>
                    <span>Already have an account? Login </span>
                    <a href = "login.php">here</a>
                  </td>
                </tr>
			   <tr>
               <td><p>
                  <input type= "submit" name="register" value="Register"/>
                  <input type="Reset"/>
               </p></td>
			   </tr>
			   </table>
            </fieldset>
         </form>
		 <script>
		  var password = document.getElementById("password");
		  var confirm_password = document.getElementById("confirmPassword");
		  var password_error = document.getElementById("passwordError");

		  function validatePassword() {
			if (password.value != confirmPassword.value) {
			  password_error.innerHTML = "Passwords do not match";
			  return false;
			} else {
			  password_error.innerHTML = "";
			  return true;
			}
		  }

		  password.onchange = validatePassword;
		  confirm_password.onkeyup = validatePassword;
		</script>
		 <?php
		include 'connection.php';

		$error_message = '';

		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			// Get the user inputs
			$email = $_POST['student_email'];
			$first_name = $_POST['first_name'];
			$last_name = $_POST['last_name'];
			$dob = $_POST['DOB'];
			$program = $_POST['Program'];
			$password = $_POST['password'];
			$confirm_password = $_POST['confirmPassword'];
			

			
			if (empty($email) || empty($first_name) || empty($last_name) || empty($dob) || empty($program) || empty($password) || empty($confirm_password)) {
				$error_message = 'All fields are required.';
			} else {
				
				if ($password !== $confirm_password) {
					$error_message = 'Passwords do not match.';
				} else {
					// Insert the user data into the database
					$sql = "INSERT INTO users_info (student_email, first_name, last_name, DOB) VALUES ('$email', '$first_name', '$last_name', '$dob')";
					$query = mysqli_query($conn, $sql);

					// Get the ID of the newly inserted user
					$user_id = mysqli_insert_id($conn);

					// Insert the user's program data into the database
					$sql = "INSERT INTO users_program (student_ID, Program) VALUES ('$user_id', '$program')";
					$query = mysqli_query($conn, $sql);

					// Insert the user's avatar data into the database
					$sql = "INSERT INTO users_avatar (student_ID, avatar) VALUES ('$user_id', NULL)";
					$query = mysqli_query($conn, $sql);

					// Insert the user's address data into the database
					$sql = "INSERT INTO users_address (student_ID, street_number, street_name, city, province, postal_code) VALUES ('$user_id', NULL, NULL, NULL, NULL, NULL)";
					$query = mysqli_query($conn, $sql);

					// Redirect the user to their profile page
					header('Location: profile.php');
					exit();
				}
			}
			
			// Check if the email address already exists in the database
			function checkEmail($E)
			{
				include 'connection.php';
				// Fetching Query
				$sql = 'select 	student_mail from users_info';
				$query = mysqli_query($conn , $sql);
				while($row = mysqli_fetch_assoc($query))
				{
					if($row['Email'] == $E)
						return true;
				}
				return false;
			}
		}
			
	?>

      
   </main>
			

</body>
</html>
