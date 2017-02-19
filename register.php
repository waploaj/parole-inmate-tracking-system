<?php

	require_once("session.php");
	
	require_once("class.user.php");
	$auth_user = new USER();
	
	
	$user_id = $_SESSION['user_session'];
	
	$stmt = $auth_user->runQuery("SELECT * FROM users WHERE user_id=:user_id");
	$stmt->execute(array(":user_id"=>$user_id));
	
	$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen"> 
<link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen"> 
<script type="text/javascript" src="jquery-1.11.3-jquery.min.js"></script>
<link rel="stylesheet" href="style.css" type="text/css"  />
<title>welcome - <?php print($userRow['user_email']); ?></title>
<style type="text/css">
#deceased{
    background-color:#FFF3F5;
  padding-top:10px;
  margin-bottom:10px;
}
.remove_field{
  float:right;  
  cursor:pointer;
  position : absolute;
}
.remove_field:hover{
  text-decoration:none;
}
</style>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="js/jquery-1.12.4.js"></script>
  <script src="js/dcalendar.picker.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>
  <script type='text/javascript'>
  $(function() {
    //calendar call function
    $('.datepicker').dcalendar();
    $('.datepicker').dcalendarpicker();

        var max_fields = 10; //maximum input boxes allowed
        var x = 1; //initlal text box count
    
    $('#add').click(function () {      
      if(x < max_fields){ //max input box allowed
          x++; //text box increment
          $("#addblock").before('<div class="col-md-12 col-sm-12" id="deceased">  <a href="#" class="remove_field" title="Remove">X</a> <div class="form-group col-md-3 col-sm-3">            <label for="name">Name*</label>            <input type="text" class="form-control input-sm" id="name" placeholder="">        </div> <div class="form-group col-md-3 col-sm-3">            <label for="gender">Gender*</label>            <input type="text" class="form-control input-sm" id="gender" placeholder="">        </div> <div class="form-group col-md-3 col-sm-3">            <label for="age">Age*</label>            <input type="text" class="form-control input-sm" id="age" placeholder="">        </div>  <div class="form-group col-md-3 col-sm-3">            <label for="DOB">Date of Birth or Exact Birth Year*</label>            <input type="text" class="form-control input-sm datepicker" id="DOB'+x+'" placeholder="">        </div>  <div class="form-group col-md-3 col-sm-3">            <label for="DOD">Date of Death or Exact Death Year*</label>             <input type="text" class="form-control input-sm datepicker" id="DOD'+x+'" placeholder="">        </div> <div class="form-group col-md-3 col-sm-3">            <label for="mother">Deceased Person\'s Mother Name*</label>            <input type="text" class="form-control input-sm" id="mother" placeholder="">        </div> <div class="form-group col-md-3 col-sm-3">            <label for="father">Deceased Person\'s Father Name*</label>            <input type="text" class="form-control input-sm" id="father" placeholder="">        </div> <div class="form-group col-md-3 col-sm-3">      <label for="photo">Upload Photo*</label>      <input type="file" id="photo">      <p class="help-block">Please upload individual photo. Group photo is not acceptable.</p>  </div></div>');

        $('.datepicker').dcalendarpicker();
      }  else{
        alert("Only 10 Names Allowed");
      }  
    });
    $(document).on('click', '.remove_field', function(e){
            e.preventDefault(); 
      $(this).parent('div').remove(); 
      x--;
    });

    
  });
  </script>
</head>

<body>


<nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">home</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <!--  -->
          <ul class="nav navbar-nav navbar-right">
            
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
			  <span class="glyphicon glyphicon-user"></span>&nbsp;Hi' <?php echo $userRow['user_name']; ?>&nbsp;<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#"><span class="glyphicon glyphicon-user"></span>&nbsp;View Profile</a></li>
                <li><a href="logout.php?logout=true"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

	<div class="clearfix"></div>
	
    <div class="container-fluid" style="margin-top:80px;">
	
<!--     <div class="container">
    
    	<label class="h5">welcome : <?php print($userRow['user_name']); ?></label>
        <hr />
        <head><em>go back to homepage</em></head>
        <h1>
        <a href="home.php"><span class="glyphicon glyphicon-home"></span> home</a> &nbsp; 
        <hr />
   
    </div> -->
    

</div>
  <div class="panel panel-primary" style="margin:20px;">
  <div class="panel-heading">
          <h3 class="panel-title">Registration Form</h3>
  </div>
<div class="panel-body">
    <form>
<div class="col-md-12 col-sm-12">
  <div class="form-group col-md-6 col-sm-6">
            <label for="name">Name* </label>
            <input type="text" class="form-control input-sm" id="name" placeholder="">
        </div>
        <div class="form-group col-md-6 col-sm-6">
            <label for="email">Email*</label>
            <input type="email" class="form-control input-sm" id="email" placeholder="">
        </div>

        <div class="form-group col-md-6 col-sm-6">
            <label for="mobile">Mobile*</label>
            <input type="text" class="form-control input-sm" id="mobile" placeholder="">
        </div>

  <div class="form-group col-md-6 col-sm-6">
        <label for="address">Address*</label>
        <textarea class="form-control input-sm" id="address" rows="3"></textarea>
     </div>
  
  <div class="form-group col-md-6 col-sm-6">
            <label for="city">City*</label>
            <input type="text" class="form-control input-sm" id="city" placeholder="">
        </div>
  
  <div class="form-group col-md-6 col-sm-6">
            <label for="state">State*</label>
            <input type="text" class="form-control input-sm" id="state" placeholder="">
        </div>

  <div class="form-group col-md-6 col-sm-6">
            <label for="country">Country*</label>
            <input type="text" class="form-control input-sm" id="country" placeholder="">
        </div>

  <div class="form-group col-md-6 col-sm-6">
            <label for="pincode">Pincode</label>
            <input type="text" class="form-control input-sm" id="pincode" placeholder="">
        </div>

  <div class = "form-group col-md-6 col-sm-6">
        <label for="years">You should register no. of years a prisoner servers *</label>  
    <span class="help-block">Please choose the no. of years for which you would like to register</span>
     
        <select class="form-control input-sm" id="years">
    <option>-- Select No of Year --</option>
    <option>1</option>
    <option>2</option>
    <option>3</option>
    <option>4</option>
    <option>5</option>
    <option>6</option>
    <option>7</option>
    <option>8</option>
    <option>9</option>
    <option>10</option>
    <option>11</option>
    <option>12</option>
    <option>13</option>
    <option>14</option>
    <option>15</option>
    <option>16</option>
    <option>17</option>
    <option>18</option>
    <option>19</option>
    <option>20</option>
    <option>21</option>
    <option>22</option>
    <option>23</option>
    <option>24</option>
    <option>25</option>
    <option>26</option>
    <option>27</option>
    <option>28</option>
    <option>29</option>
    <option>30</option>
        </select>
  </div>

  <div class = "form-group col-md-6 col-sm-6">
     <label for="years">You should register no. of months a prisoner servers *</label>  
    <span class="help-block">Please choose the no. of months for which you would like to register</span>       
        <select class="form-control input-sm" id="months">
    <option>-- Select No of Month --</option>
    <option>1</option>
    <option>2</option>
    <option>3</option>
    <option>4</option>
    <option>5</option>
    <option>6</option>
    <option>7</option>
    <option>8</option>
    <option>9</option>
    <option>10</option>
        </select>
  </div>

  <div class="form-group col-md-6 col-sm-6" >
            <label for="pincode">pls enter the nation or lencen or tin number code inorder for validation * 
      <input type="checkbox" checked data-toggle="toggle"></label>
      <span class="help-block">if a prisoner doesn't have a national id he/should enter passport number</span>
  </div>

  <div class="form-group col-md-6 col-sm-6">
            <label for="arrival">Arrival Date</label>
            <input type="text" class="form-control input-sm datepicker" id="arrival" placeholder="">
        </div>
</div>
<div class="col-md-12 col-sm-12" id="deceased">
  <div class="form-group col-md-3 col-sm-3">
            <label for="name">Name*</label>
            <input type="text" class="form-control input-sm" id="name" placeholder="">
        </div>
  <div class="form-group col-md-3 col-sm-3">
            <label for="gender">Gender*</label>
            <input type="text" class="form-control input-sm" id="gender" placeholder="">
        </div>
  <div class="form-group col-md-3 col-sm-3">
            <label for="age">Age*</label>
            <input type="text" class="form-control input-sm" id="age" placeholder="">
        </div>
  <div class="form-group col-md-3 col-sm-3">
            <label for="DOB">Date of Birth or Exact Birth Year*</label>
            <input type="text" class="form-control input-sm datepicker" id="DOB" placeholder="">
        </div>
  <div class="form-group col-md-3 col-sm-3">
            <label for="DOD">Date of marriage if he/she is married*</label>
            <input type="text" class="form-control input-sm datepicker" id=" DOD" placeholder="">
        </div>
  <div class="form-group col-md-3 col-sm-3">
            <label for="mother">Deceased Person's Mother Name*</label>
            <input type="text" class="form-control input-sm" id="mother" placeholder="">
        </div>
  <div class="form-group col-md-3 col-sm-3">
            <label for="father">Deceased Person's Father Name*</label>
            <input type="text" class="form-control input-sm" id="father" placeholder="">
        </div>
  <div class="form-group col-md-3 col-sm-3">
      <label for="photo">Photo*</label>
      <input type="file" id="photo">
      <p class="help-block">Please upload individual photo. Group photo is not acceptable.</p>
  </div>
</div>

<div class="col-md-12 col-sm-12" id="addblock">
  <div class="form-group col-md-3 col-sm-3">
    <input type='button' class="btn btn-primary" value="Add" id="add"/>
  </div>
</div>
<div class="col-md-12 col-sm-12" >
  <div class="form-group col-md-3 col-sm-3 pull-right">
    <input type='text' class="form-control input-sm" id="amount" readonly placeholder="register by <?php echo $userRow['user_name']; ?>"</span>
  </div>
</div>
<div class="col-md-12 col-sm-12">
  <div class="form-group col-md-3 col-sm-3 pull-right" >
      <input type="submit" class="btn btn-primary" value="Submit"/>
  </div>
</div>
</form>
</div>

  

<script src="bootstrap/js/bootstrap.min.js"></script>

</body>
</html>