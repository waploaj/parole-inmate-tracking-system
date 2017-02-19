<?php
session_start();
require_once("class.user.php");
$login = new USER();

if($login->is_loggedin()!="")
{
	$login->redirect('home.php');
}

if(isset($_POST['btn-login']))
{
	$uname = strip_tags($_POST['txt_uname_email']);
	$umail = strip_tags($_POST['txt_uname_email']);
	$upass = strip_tags($_POST['txt_password']);
		
	if($login->doLogin($uname,$umail,$upass))
	{
		$login->redirect('home.php');
	}
	else
	{
		$error = "The Login is invalid !";
	}	
}
?>
<!DOCTYPE html >
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>GR-9 : Login</title>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen">
<link rel="stylesheet" href="style.css" type="text/css"  />
</head>
<body>

<div class="signin-form">

	<div class="container">
     
        
       <form class="form-signin" method="post" id="login-form">
      
        <h2 class="form-signin-heading">GR-9 Login system.</h2><hr />
        
        <div id="error">
        <?php
			if(isset($error))
			{
				?>
                <div class="alert alert-danger">
                   <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?> !
                </div>
                <?php
			}
		?>
        </div>
        
        <div class="form-group">
        <input type="text" class="form-control" name="txt_uname_email" placeholder="Username or E mail ID" required autofocus/>
        <span id="check-e"></span>
        </div>
        
        <div class="form-group">
        <input type="password" class="form-control" name="txt_password" placeholder="Your Password" />
        </div>
       
     	<hr />
        
        <div class="form-group">
            <button type="submit" name="btn-login" class="btn btn-default">
                	<i class="glyphicon glyphicon-log-in"></i> &nbsp; SIGN IN
            </button>
        </div>  
      	<br />
            <label>Don't have account yet ! <a href="sign-up.php">Register</a></label>
      </form>

    </div>
    
</div>
  
<script src="https://www.gstatic.com/firebasejs/3.6.9/firebase.js"></script>
<script>
  // Initialize Firebase
  var config = {
    apiKey: "AIzaSyCs7_-5UUDXqbbhj1V0f9Tv4yG8rkp2RTo",
    authDomain: "gr-9-5e94a.firebaseapp.com",
    databaseURL: "https://gr-9-5e94a.firebaseio.com",
    storageBucket: "gr-9-5e94a.appspot.com",
    messagingSenderId: "422406031537"
  };
  firebase.initializeApp(config);
</script>
</body>
</html>