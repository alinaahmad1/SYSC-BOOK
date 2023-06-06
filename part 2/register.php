<?php session_start()?>

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
			<li><a>Log out</a></li>
        </ul>
    </div>

   </nav>
      <main>
         <h2>Register a new profile</h2>
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
               <td><p>
                  <input type= "submit" name="register" value="Register"/>
                  <input type="Reset"/>
               </p></td>
			   </tr>
			   </table>
            </fieldset>
         </form>
      
		   <?php
				
				if ($_SERVER["REQUEST_METHOD"] == "POST") {
					if (isset($_POST["register"])) {	
                  // connect to database
                  $servername = "localhost";
                  $username = "root";
                  $password = "";
                  $dbname = "alina_ahmad_syscbook";
                  $conn = new mysqli($servername, $username, $password, $dbname);
                  // Check connection
                  if($conn === false){
                     die("ERROR: Could not connect. ". mysqli_connect_error());
                  }
                  // retrieve form data
                  $first_name =  $_POST['first_name'];
                  $last_name = $_POST['last_name'];
                  $DOB = $_POST['DOB'];
                  $student_email =  $_POST['student_email'];
                  $program = $_POST['Program'];
                  // inserting information into different tables because most of them share column names
                  $sql_user_info = "INSERT INTO users_info (student_email, first_name, last_name, DOB) VALUES ('$student_email', '$first_name', '$last_name', '$dob');"; 
                  $conn->query($sql_user_info);
                  //echo "$res";
                 if ($conn->query($sql_user_info) === TRUE) {
                     echo "New record created successfully";
                 } else {
                     echo "Error: " . $sql_user_info . "<br>" . $conn->error;
                 }


                  $sql_user_avatar = "INSERT INTO users_avatar (student_ID, avatar) VALUES (LAST_INSERT_ID(), '0');"; 
                  $conn->query($sql_user_avatar);   
                  if ($conn->query($sql_user_avatar) === TRUE) {
                     echo "New record created successfully";
                 } else {
                     echo "Error: " . $sql_user_avatar . "<br>" . $conn->error;
                 }

                  $sql_user_program = "INSERT INTO users_program (student_ID, Program) VALUES (LAST_INSERT_ID(), '$program');"; 
                  $conn->query($sql_user_program);
                  if ($conn->query($sql_user_program) === TRUE) {
                     echo "New record created successfully";
                 } else {
                     echo "Error: " . $sql_user_program . "<br>" . $conn->error;
                 }
                  

                  $sql_user_address = "INSERT INTO users_address (student_ID, street_number, street_name, city, province, postal_code) VALUES (LAST_INSERT_ID(),'0', 'NULL', 'NULL', 'NULL', 'NULL');"; 
                  $conn->query($sql_user_address);
                  if ($conn->query($sql_user_address) === TRUE) {
                     echo "New record created successfully";
                 } else {
                     echo "Error: " . $sql_user_address . "<br>" . $conn->error;
                 }

                  //close connection to database
                  echo "<h4>Connection was successful! :)</h4>";

                  
                  $conn->close();
               }
            }
               
		   ?>

   </main>
			

</body>
</html>
