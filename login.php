	<?php
	   ob_start();
	   session_start();
	   require 'connect.php';
	?>

	


	<html lang = "en">
	   
	   <head>
	      <title>Admin Login</title>
	     
	       <link rel="stylesheet" type="text/css" title="substyle" href="style3.css">
	      
	        <style>
.form-signin .form-control {
              position: relative;
              height: auto;
              width: 100%;
 
              padding: 2px;
              font-size: 15px;
           }
      </style>  
	         
	         
	         
	     
	      
	   </head>
		
	   <body>
	      
	      <h1>Admin Panel</h1> 
	      <center><h2>Show Booking List</h2></center>
	      <div class = "container form-signin">
	         
	         <?php
	            $msg = '';
	            
	            if (isset($_POST['login']) && !empty($_POST['username']) 
	               && !empty($_POST['password'])) {
					
	               if ($_POST['username'] == 'admin' && 
	                  $_POST['password'] == 'php123') {
	                  $_SESSION['valid'] = true;
	                  $_SESSION['timeout'] = time();
	                  $_SESSION['username'] = 'admin';

	                  header('Location: status.php');
	                  //echo 'You have entered valid use name and password';
	               }else {
	                  $msg = 'Wrong username or password';
	               }
	            }
	         ?>
	      </div> <!-- /container -->
	      
	      <div class = "container">
	      
	         <form class = "form-signin" role = "form" 
	            action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method = "POST">
	            <h4 class = "form-signin-heading"><?php echo $msg; ?></h4>
	            <input type = "username" class = "form-control" 
	               name = "username" placeholder = "username = admin" 
	               required ></br>
	            <input type = "password" class = "form-control"
	               name = "password" placeholder = "password = php123" required>
	               <br><br>
	            <input class = "form-control"  type="submit"
	               name = "login" value = "Login"></input>

	         </form>
			
	         


	      </div> 
	      
	   </body>
	</html>