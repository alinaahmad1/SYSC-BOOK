<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head >
	<meta charset="utf-8">
	<title>Update SYSCBOOK profile</title>
	<link rel="stylesheet" href="assets/css/reset.css">
	<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
   <header>
      <h1>SYSCBOOK</h1>
      <p>Social media for SYSC students in Carleton University</p>
   </header>
   <nav id="navBarLeft">
	  <ul>
		<li>
		  <a href="index.php">Home</a>
		</li>
		<li>
		  <a href="profile.php" class="active">Profile</a>
		</li>
		<?php
		  // Check if user is an admin (account_type = 0)
		  if ($_SESSION['account_type'] == 0) {
			echo "<li>";
			  echo "<a href='user_list.php'>User List</a>";
			echo "</li>";
		  }
		?>
		<li>
		  <a href="profile.php?logout=true">Log Out</a>
		</li>
	  </ul>
	</nav>

   <main>
      <section>
         <h2>Update Profile information</h2>
         <!-- solution as a table-->
         <form action = "./profile.php" method = "post">
            <fieldset>
               <legend><span>Personal information</span></legend>
			   <table>
			   <tr>
               <td><p><label> First Name:</label>
               <input type="text" name="first_name"/></p></td>
			
               <td><p><label> Last Name:</label>
               <input type="text" name="last_name"/></p></td>
			   
               <td><p><label> DOB:</label>
               <input type="text" name="DOB" placeholder="yyy-mm-dd"/></p></td>
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
               <td><p><label>Province:</label>
               <input type="text" name="province"/></p></td>
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
                  <option>Choose Program</option>
                  <option>Computer Systems Engineering</option>
                  <option>Software Engineering</option>
                  <option>Communications Engineering</option>
				  <option>Biomedical Engineering</option>
				  <option>Electrical Engineering</option>
				  <option>Environmental Engineering</option>
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
                  <input type="submit"/>
                  <input type="reset"/>
               </p></td>
				</tr>
				</table>
            </fieldset>
         </form>
		 <?php
		  if(!isset($_SESSION['student_ID'])){
			header("Location: login.php");
			exit();
		  }

		  include "connection.php";

		  $student_ID = $_SESSION['student_ID'];
		  $sql = "SELECT * FROM users WHERE student_ID = $student_ID";
		  $result = mysqli_query($connection, $sql);

		  if(mysqli_num_rows($result) > 0){
			$row = mysqli_fetch_assoc($result);
			$first_name = $row['first_name'];
			$last_name = $row['last_name'];
			$DOB = $row['DOB'];
			$student_email = $row['student_email'];
			$program = $row['Program'];
			$avatar = $row['avatar'];
			$postal_code = $row['postal_code'];
			$province = $row['province'];
			$city = $row['city'];
			$street_number = $row['street_number'];
			$street_name = $row['street_name'];
		  }
		  else{
			echo "Error: Failed to retrieve user information from the database.";
			exit();
		  }

		  mysqli_close($connection);
		?>

		
      </section>
   </main>
</body>
</html>