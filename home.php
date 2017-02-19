<?php

	require_once("session.php");
	
	require_once("class.user.php");
	$auth_user = new USER();
	
	
	$user_id = $_SESSION['user_session'];
	
	$stmt = $auth_user->runQuery("SELECT * FROM users WHERE user_id=:user_id");
	$stmt->execute(array(":user_id"=>$user_id));
	
	$userRow=$stmt->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html >
<html>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen">
<script type="text/javascript" src="jquery-1.11.3-jquery.min.js"></script>
<link rel="stylesheet" href="style.css" type="text/css"  />
<!-- <title>welcome - <?php print($userRow['user_name']); ?></title> -->
<style>
    /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
    .row.content {height: 1500px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 150px;
      }
      .row.content {height: auto;} 
    }
  </style>

</head>

<body>

<nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <!-- <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button> -->
          <a class="navbar-brand" href="#"></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <!-- put  -->
          <ul class="nav navbar-nav navbar-right">
            
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
			  <span class="glyphicon glyphicon-user"></span>&nbsp;<strong>LOGIN AS</strong>' <?php echo $userRow['user_name']; ?>&nbsp;<span class="caret"></span></a>
              <ul class="dropdown-menu">
                
                <li><a href="logout.php?logout=true"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>


    <div class="clearfix"></div>
    	
    
<div class="container-fluid" style="margin-top:80px;">
	
  <!--   <div class="container">
    
    	<label class="h5">welcome  <?php print($userRow['user_name']); ?></label>
        <hr />
        
        <h1>
        <a href="#"><span class="#"></span></a> &nbsp; 
        <a href="product.php"><span class="glyphicon glyphicon-shopping-cart"></span> product</a></h1>
       	<hr />
        
        <p class="h4"></p> 
       
        
    <p class="#" style="margin-top:200px;">
    <br /><br />
    <a href="#"></a>
    </p>
    
    </div> -->
    <div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav">
      <h4>Parole-inmate</h4>
      <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href="#section1">Prison officer</a></li>
        <li><a href="register.php">Register prisoner</a></li>
        <li><a href="#section3">View prisoner details</a></li>
        <li><a href="#section3">Parole officer site</a></li>
      </ul><br>
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search for prisoner..">
        <span class="input-group-btn">
          <button class="btn btn-default" type="button">
            <span class="glyphicon glyphicon-search"></span>
          </button>
        </span>
      </div>
    </div>

    <div class="col-sm-9">
     
      <h2>WELCOME TO PiTS</h2>
      <h5><span class="glyphicon glyphicon-time"></span> dear <?php echo $userRow['user_name']; ?>.</h5>
      <h5><span class="label label-danger">ipsum</span> <span class="label label-primary">Ipsum</span></h5><br>
     <P>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
     tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
     quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
     consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
     cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
     proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
     tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
     quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
     consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
     cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
     proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</P>
      <br><br>

</div>
 



<script src="bootstrap/js/bootstrap.min.js"></script>


</body>
</html>