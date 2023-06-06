<?php
  // Start output buffering
  ob_start();

  // Start or resume a session
  session_start();

  // Redirect user to login page if not logged in
  if(!isset($_SESSION['user_email'])) {
    header("Location: login.php");
    exit();
  }

  // Handle logout request
  if(isset($_GET['logout'])) {
    session_destroy();
    header("Location: logout.php");
    exit();
  }
?>

<!DOCTYPE html>

<html lang="en">
<head >
   <meta charset="utf-8">
   <title>SYSCBOOK - Main</title>
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
			<li><a href="login.php">Login</a></li>
			<li><a href="logout.php">Logout</a></li>
        </ul>
    </div>
   </nav>
   <main>
      <section>
         <td id="post">
	  
         <form action = "./index.php" method = "post">
            <fieldset>
               <legend><span>New Post</span></legend>
			   <table>
			   <tr>
			   <td><textarea maxlength="500" name="post" placeholder="What's on your mind? (max 500 char)"></textarea></td>
			   </tr>
			   <tr>
			   <td><p><input type="submit" value="Post" name="post"><input type="reset"></p><td>
			   </tr>
			   </table>
            </fieldset>
         </form>
		 <?php
			if(isset($_SESSION["student_ID"]) && isset($_POST["Post"])){
			  try {
				include "connection.php";
				$conn = new mysqli($servername, $username, $password, $database);

				$new_post = $_POST["new_post"];
				$student_ID = $_SESSION["student_ID"];

				$sql = "INSERT INTO users_posts (student_ID, new_post, post_date) VALUES ('$student_ID', '$new_post', current_timestamp())";
				$conn->query($sql);

				$sql = "SELECT * FROM users_posts ORDER BY post_ID DESC LIMIT 10;";
				$results = $conn->query($sql);

				while($row = $results->fetch_assoc()) {
				  echo "<details>";
				  echo "<summary><strong>Post ".$row['post_ID']." </strong></summary>";
				  echo "<p>". $row['new_post'] ."</p>";
				  echo "</details>";
				}
				$conn->close();
			  } catch (mysqli_sql_exception $e) {
				echo $e->getMessage();
			  }
			}
			?>

         </td>
		 
      
		 
      </section>
   </main>
   
</body>
</html>