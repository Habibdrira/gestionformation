<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login-ELIteam</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/loginStyle.css">
	<link rel="icon" href="logo_iteam.png">
</head>
<body class="body-login">
    <div class="black-fill"><br /> <br />
    	<div class="d-flex justify-content-center align-items-center flex-column">
    	<form class="login" 
    	      method="post"
    	      action="req/log.php">

    		<div class="text-center">
    			<img src="logo_iteam.png"
    			     width="300">
    		</div>
    		<h3>LOGIN</h3>

    		<?php if (isset($_GET['error'])) { ?>

    		<div class="alert alert-danger" role="alert">
			  <?=$_GET['error']?>
			</div>
			<?php } ?>
			
		  <div class="mb-3">
		    <label class="form-label">Username</label>
		    <input type="text" 
		           class="form-control"
		           name="uname">
		  </div>
		  
		  <div class="mb-3">
		    <label class="form-label">Password</label>
		    <input type="password" 
		           class="form-control"
		           name="pass">
		  </div>

		  <div class="mb-3">
		    <label class="form-label">Login As</label>
		    <select class="form-control"
		            name="role">
		    	<option value="1">Admin</option>
		    	<option value="2">former</option>
		    	<option value="3">Student</option>
		    </select>
		  </div>

		  <button type="submit" class="btn btn-primary">Login</button>
          <button type="button" onclick="window.location.href='index.php'" class="btn btn-primary">Home</button>
          <button type="button" onclick="window.location.href='signup.php'" class="btn btn-primary">Sign Up</button>

		</form>
        
        <br /><br />
        <div class="text-center text-light">
        	Copyright &copy; 2024 ELIteam . All rights reserved.
        </div>

    	</div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>	
</body>
</html>