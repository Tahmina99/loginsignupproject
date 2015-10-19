<?php
require_once('config.php');
if(isset($_POST["login_form"]))
{
   $u_email=$_POST['email'];
   try{
		   if(empty($u_email)||empty($_POST['password']))
		   {
			 throw new Exception("No field can't be empty<br>");
			 }
			 if(!(preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/", $u_email)))
		    {
			 throw new Exception("Please Enter a valid Email Address<br>");
			  //echo "<div class='error'>Please Enter a valid Email Address</div><br>";
		    }
			$password=md5($_POST['password']);
			$num=0;
			$result=$db->prepare("Select user_id from userinfo where email=? and password=?");
			$result->execute(array($_POST['email'],$password));
			$num=$result->rowCount();
            if($num>0)
            {
                session_start();
				//$value=mysql_result($result,0,'user_id');
				$tmp=$result->fetch(PDO::FETCH_ASSOC);
				$value=$tmp['user_id'];
				$_SESSION['name']=$value;
				header('location: view.php');
             }
            else
            {
               throw new Exception("Invalid Username/password");
               header('location: signin.php');			   
             }			   
		 }
	catch(Exception $e)
     {
     echo ($e->getMessage());
	 }  
}

?>

<!doctype html>
<html>
<head>
<title>login page</title>
<link rel="stylesheet" type="text/css" href="styles/style1.css"/>
</head>
<body>
<!-- Login form-->
<form method="post" action="">
<h1>Login</h1>
<div class="signup">
 <fieldset>
          <legend><span class="number">1</span>Your basic information</legend>
			<label for="mail">User email : </label>
          <input type="email"  name="email">
         
		  <label for="name">Password : </label>
          <input type="password"  name="password">
		  
		 
    
		  
        </fieldset>
        
        <button type="submit" name="login_form">Login</button>
      </form>

</div>

</body>
</html>