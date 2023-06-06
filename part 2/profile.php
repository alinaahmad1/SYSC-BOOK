<?php session_start()?>
<!DOCTYPE html>
<html lang="en">
<head >
   <meta charset="utf-8">
   <title>Update SYSCBOOK profile</title>
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
			<li><a>Log out</a></li>
        </ul>
    </div>
   </nav>

   <main>
      <section>
         <h2>Update Profile information</h2>
         <form method="post" action="">
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
			   <table>
			   
               <legend>Address</legend>
			   <tr>
               <td><p><label> Street Number:</label>
			   <input type="number" min="1" max="10000" name="street_number"/></p></td>
			   <td><p><label> Street Name:</label>
               <input type="text" name="street_name"/></p></td>
			   </tr>
			   
			   <tr>
               <td><p><label>City:</label> 
               <input type="text" name="city"/></p></td>
               <td><p><label>Provence:</label>
               <input type="text" name="provence"/></p></td>
               <td><p><label>Postal code:</label>
               <input type="text" name="postal_code"/></p></td>
			   </tr>
			   </table>
			   
              
			   <table>
               <legend><span>Profile Information</span></legend>
			   <tr>
               <td><p><label>Email address:</label>
               <input type="text" name="student_email"/></p></td>
			   </tr>
			   <tr>
               <td><p><label><p>Program:</label>
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
               <td><label><p> Choose your Avatar:</label></p>
				<input type="radio" name="avatar" value="small"><img src="images/img_avatar1.png" alt="images/img_avatar1" checked>
				<input type="radio" name="avatar" value="small"><img src="images/img_avatar2.png" alt="images/img_avatar2" checked>
				<input type="radio" name="avatar" value="small"><img src="images/img_avatar3.png" alt="images/img_avatar3" checked>
				<input type="radio" name="avatar" value="small"><img src="images/img_avatar4.png" alt="images/img_avatar4" checked>
				<input type="radio" name="avatar" value="small"><img src="images/img_avatar5.png" alt="images/img_avatar5" checked>
				

				<p>
                  <input type="submit" value="Submit" name="submit"/>
                  <input type="reset"/>
               </p></td>
				</tr>
				</table>
            </fieldset>
         </form>
		 <?php
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				if (isset($_POST["submit"])) {
			
			// connect to database
				$servername = "localhost";
				$username = "root";
				$password = "";
				$dbname = "alina_ahmad_syscbook";
				$conn = new mysqli($servername, $username, $password, $dbname);
			
				if ($conn->connect_error) {
					die("Error: Could not connect. " . $conn->connect_error);
				}
			echo "Connection was Successful";
			echo "<h3>Course record created successfully!!!</h3>";
			$student_ID = $_POST["student_ID"];
			$first_name = $_POST["first_name"];
			$last_name = $_POST["last_name"];
			$DOB = $_POST["DOB"];
			$email = $_POST["email_address"];
			$program = $_POST["program"];
			$street_number = $_POST["street_number"];
			$street_name = $_POST["street_name"];
			$city = $_POST["city"];
			$province = $_POST["province"];
			$postal_code = $_POST["postal_code"];
			$avatar = $_POST["avatar"];


			$sql_user_info = "INSERT INTO users_info (student_email, first_name, last_name, DOB) VALUES ('$email', '$first_name', '$last_name', '$DOB');";
			$conn->query($sql_user_info);
			$student_ID = $_SESSION['student_ID'];

			$sql_avatar = "INSERT INTO users_avatar (student_ID, avatar) VALUES (_'$studentID','$avatar');";
			echo $sql_avatar;
			$conn->query($sql_avatar);

			$sql_address = "INSERT INTO users_address (student_ID, street_number, street_name, city, province, postal_code ) VALUES (LAST_INSERT_ID(), '$street_number','$street_name', '$city', '$province','$postal_code');";
			$conn->query($sql_address);

			$sql_user_prog = "INSERT INTO users_program (student_ID, Program) VALUES (LAST_INSERT_ID(), '$program');"; 
            $conn->query($sql_user_prog);
				}
			}
			$conn-> close();
			?>
      </section>
   </main>
</body>
</html>