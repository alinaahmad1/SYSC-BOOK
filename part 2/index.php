<?php session_start()?>
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
			<li><a>Log out</a></li>
        </ul>
    </div>
   </nav>
   <main>
      <section>
         <td id="post">
	  
         <form method="post" action="">
            <fieldset>
               <legend><span>New Post</span></legend>
			   <table>
			   <tr>
			   <td><textarea maxlength="500" name="post" placeholder="What's on your mind? (max 500 char)"></textarea></td>
			   </tr>
			   <tr>
			   <td><p><input type="submit" value="post" name="post"><input type="reset"></p><td>
			   </tr>
			   </table>
            </fieldset>
         </form>
         </td>
		
         <details>
         <summary>Post 1</summary>
         <p>I would like to get a JOB before March 2023</p>
         </details>
         <details>
         <summary>Post 2</summary>
         <p>WHY IS ENGINEERING SO HARD?</p>
         </details>
         <details>
         <summary>Post 3</summary>
         <p>I love my cat CHEETO</p>
         </details>
      
		 
      </section>
   </main>

   <?php
         if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["post"])) {
               // connect to database
               $servername = "localhost";
               $username = "root";
               $password = "";
               $dbname = "alina_ahmad_syscbook";
               $conn = new mysqli($servername, $username, $password, $dbname);
               if($conn->connect_error){
                  die("Please re-check connection as there is an error" .$conn->connect_error);
               }
                  echo "Connection is Successful";

               $new_post = $_POST["post"];

               $student_ID = $_SESSION["student_ID"];

               $sql_usr_post = "INSERT INTO users_posts (student_ID, post) VALUES ('$student_ID','$post');"; 
               $conn->query($sql_usr_post);
               

               $conn -> close();
            }
         }
      ?>
</body>
</html>