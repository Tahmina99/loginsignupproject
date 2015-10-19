<?php 
ob_start();
session_start();
/*if($_SESSION['name']!='signupproject')
{
	header('location:signup.php');
}*/
?>
<?php 
include('config.php');
if (isset($_POST['form1']))
{

  try{
     $u_fname=$_POST['fname'];
	 $u_lname=$_POST['lname'];
	 $u_name=$_POST['name'];
      $u_email=$_POST['email'];
	  $u_password=$_POST['password'];
	  $u_country=$_POST['country'];
	  $u_birthday=$_POST['birthday'];
	  $u_age=$_POST['age'];
	  $u_gendar=$_POST['gendar'];
	  $u_phone=$_POST['phone'];
	  
	  $valid=1;
	  $msg="";
		if(empty($u_fname))
		{
		  $valid=0;
		  $msg.="First name can not be empty<br>";
		   //throw new Exception("first name can not be empty");
		   //echo "<div class='error'>First name can not be empty</div><br>";
		}
		if(empty($u_lname))
		{
		   $valid=0;
		   $msg.="Last name can not be empty<br>";
		   //throw new Exception("Last name can not be empty");
		   //echo "<div class='error'>Last name can not be empty</div><br>";
		}
		if(empty($u_name))
		{
		   $valid=0;
		   $msg.="user name can not be empty<br>";
		   //throw new Exception("Last name can not be empty");
		   //echo "<div class='error'>Last name can not be empty</div><br>";
		}
		if(empty($u_email))
		{
		   $valid=0;
		   $msg.="Email name can not be empty<br>";
		   //throw new Exception("Email name can not be empty");
		   //echo "<div class='error'>Email name can not be empty</div><br>";
		}
		if(empty($u_password))
		{
		   $valid=0;
		   $msg.="Password name can not be empty<br>";
		   //throw new Exception("Password name can not be empty");
		   //echo "<div class='error'>Password name can not be empty</div><br>";
		}
	
		if(empty($u_country))
		{
		   $valid=0;
		   $msg.="Country name can not be empty<br>";
		   //throw new Exception("Country name can not be empty");
		   //echo "<div class='error'>Country name can not be empty</div><br>";
		}
		if(empty($u_birthday))
		{
		   $valid=0;
		   $msg.="Birthday date can not be empty<br>";
		   //throw new Exception("Birthday date can not be empty");
		   //echo "<div class='error'>Birthday date can not be empty</div><br>";
		}	
		if(empty($u_age))
		{
		   $valid=0;
		   $msg.="age name can not be empty<br>";
		   //throw new Exception("Last name can not be empty");
		   //echo "<div class='error'>Last name can not be empty</div><br>";
		}
		if(empty($u_gendar))
		{
		   $valid=0;
		   $msg.="gender can not be empty<br>";
		   //throw new Exception("gender can not be empty");
		   //echo "<div class='error'>gender can not be empty</div><br>";
		}
		if(empty($u_phone))
		{
		   $valid=0;
		   $msg.="phone number can not be empty<br>";
		   //throw new Exception("gender can not be empty");
		   //echo "<div class='error'>gender can not be empty</div><br>";
		}
		if(!(preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/", $u_email)))
		{
		  $valid=0;
		  $msg.="Please Enter a valid Email Address<br>";
		  //echo "<div class='error'>Please Enter a valid Email Address</div><br>";
		}
		if(!(preg_match("/^[A-Za-z][A-Za-z]{2,21}$/",$u_fname)))
		{ 
		  $valid=0;
		  $msg.="Please Enter a valid First Name(length between 3 and 22)<br>";
		  //echo "<div class='error'>Please Enter a valid First Name(length between 3 and 22)</div><br>";
		}
			if(!(preg_match("/^[A-Za-z][A-Za-z]{2,21}$/",$u_lname)))
		{ 
		  $valid=0;
		  $msg.="Please Enter a valid Last Name(length between 3 and 22)<br>";
		 // echo "<div class='error'>Please Enter a valid Last Name(length between 3 and 22)</div><br>";
		}
	
	if($valid==1)
	{
		echo"success";
	}
	else
	{
		echo "<div class='error'>".$msg."</div>";
	}
		  $password=md5($_POST['password']);

		  $result=$db->prepare("insert into userinfo(first_name,last_name,user_name,email,password,country,birthday,age,gender,phone) 
		  values(?,?,?,?,?,?,?,?,?,?)");
		  $result->execute(array($_POST['fname'],$_POST['lname'],$_POST['name'],$_POST['email'],$password,$_POST['country'],$_POST['birthday'],$_POST['age'],
		  $_POST['gendar'],$_POST['phone']));
			$success_message='Data has been successfully inserted';
		}
	
	catch(Exception $e)
	{
	  $error_message=$e->getMessage();   
	}
}
?>
<!doctype html>
<html>
<head>
<title>sign up form</title>
<link rel="stylesheet" type="text/css" href="styles/style1.css"/>
</head>
<body>
	<!-- Sign-Up Form -->
	<div class="signup">
		<form action="" method="post">
      
        <h1>Sign Up</h1>
        <?php  
		if(isset($error_message)) {echo $error_message;}
		if(isset($success_message)) {echo $success_message;}
		?>
        <fieldset>
          <legend><span class="number">1</span>Your basic information</legend>
          <label for="name">First Name : </label>
          <input type="text"  name="fname">
          
          <label for="name">Last Name : </label>
          <input type="text"  name="lname">
          
          <label for="name">Username : </label>
          <input type="text"  name="name">
		  
		  <label for="mail">Email : </label>
          <input type="email"  name="email">
         
		  <label for="name">Password : </label>
          <input type="password"  name="password">
		  
		  <label for="name">country : </label>
          <input type="text"  name="country">
		  
          <label for="name">Birthday : </label>
          <input type="date"  name="birthday">
		  
		  <label for="name">Age : </label>
          <input type="text"  name="age">
		  
		  <label for="name">Gender : </label>
          <input type="text"  name="gendar">
		  <label for="name">phone_number : </label>
          <input type="text"  name="phone">
		  
        </fieldset>
        
        <button type="submit" name="form1">Sign Up</button>
      </form>
	</div>
	<a href="index.php">back to previous page</a>

</body>
</html>