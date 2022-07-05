<?php 

session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//read from database
			$query = "select * from users where user_name = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: index.php");
						die;
					}
				}
			}
			
			echo "wrong username or password!";
		}else
		{
			echo "wrong username or password!";
		}
	}

?>


<!DOCTYPE html>
<head>
    <title>Please Login</title>
    
    
       
   
    <link rel="stylesheet" href="styles/login-page.css">
    
    
	
</head>
<body>
		
<div class="ScriptTop">
    <div class="rt-container">
        <div class="col-rt-4" id="float-right">
 
        
        </div>
        <div class="col-rt-2">
            <ul>
                <li></li>
            </ul>
        </div>
    </div>
</div>

<header class="ScriptHeader">
    <div class="rt-container">
    	<div class="col-rt-12">
        	<div class="rt-heading">
            	<br>
				<br>
				<br>
				<br>
				<br>
            </div>
        </div>
    </div>
</header>

<section>
    <div class="rt-container">
          <div class="col-rt-12">
              <div class="Scriptcontent">
              
                <form class="codehim-form" method="post">
        <div class="form-title">
            
     <h2> Login</h2>
	 
            </div>
    
        <input type="email" id="email" class="cm-input" name="user_name" placeholder="Email">
        
        
        
        <input id="pass" type="password" class="cm-input" name="password" placeholder="Password">
        <button type="submit" class="btn-login  gr-bg"value="Login">Login</button>
		<br>
		<h5> Forgot <a href="ForgotPassword.php">Password? </a> </h5> 
		<br>
		<h5> Don't Have an Account? <a href="signup.php">Sign Up </a> </h5> 
		
    </form>
             
    		
    		</div>
		</div>
    </div>
</section>
     

	</body>
</html>