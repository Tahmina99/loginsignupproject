<?php 
ob_start();
session_start();
include('config.php');
 if(isset($_SESSION['name'])&&!empty($_SESSION['name']))
 {
 echo "Your are logged in";
 }
 else
 {
  header('location:login.php');
 }
 $id=$_SESSION['name'];
 
 $result=$db->prepare("select * from userinfo where user_id=?");
 $result->execute(array($id));
 $value=$result->fetchAll(PDO::FETCH_ASSOC);
 foreach($value as $row)
{
    $u_fname=$row['first_name'];
	$u_lname=$row['last_name'];
	$u_name=$row['user_name'];
	$u_email=$row['email'];
	$u_country=$row['country'];
	$u_birthday=$row['birthday'];
	$u_age=$row['age'];
	$u_gendar=$row['gender'];
	$u_phone=$row['phone'];
  }
?>

<!doctype html>
<html lang="en">
<meta charset="UTF-8">
<head>
<title>showing information </title>

<link rel="stylesheet" type="text/css" href="view.css"/>
</head>
<body>
<h2>show all information from database</h2>
<?php 
//if(isset($error_message)){echo $error_message;}
//if(isset($success_megs)){echo $success_megs;}

?>
<br>
<table border="1" cellspacing="0" cellpadding="4">
	<tr>
	<th>First name</th>
	<th>Last name</th>
	<th>User name</th>
	<th>User email</th>
	<th>User birthday</th>
	<th>User country</th>
	<th>User age</th>
	<th>User gender</th>
	<th>User number</th>
	</tr>
        <tr>    
         
            <td><?php echo $u_fname;  ?></td>
            <td><?php echo $u_lname;  ?></td>
            <td><?php echo $u_name;  ?></td>
            <td><?php echo $u_email;  ?></td>
            <td><?php echo $u_birthday;  ?></td>
            <td><?php echo $u_country;  ?></td>  
			 <td><?php echo $u_age;  ?></td>  
			<td><?php echo $u_gendar;  ?></td>
			 <td><?php echo $u_phone;  ?></td>  
        </tr>  
        

</table>
<a href="index.php">back to previous page</a>
<br>
</body>

</html>