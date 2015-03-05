<!DOCTYPE html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Validation Form</title>
<style type="text/css">
.Error{color:#F36;}
</style>
</head>

<body>
<?php
//variable declarations
$name= $email= $website=$comment=$gender="";
$nameErr =$emailErr = $websiteErr = $commentErr = $genderErr ="";

if($_SERVER['REQUEST_METHOD']=="POST"){
if(empty($_POST['name'])){
	$nameErr ="Name is required";
	}else
	{
		$name = test_data($_POST['name']);
		//checke valid name convention 
		if(!preg_match("/^[a-zA-Z]*$/", $name)){
			$nameErr = "Only letters are allowed";
			
			}
		}
if(empty($_POST['email'])){
	$emailErr ="Email required ";
	
	}else
	{
	$email = test_data($_POST['email']);	
	//checking for email correct email format
	if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
		
		$emailErr = "Valid email required";
		}
		}
if(empty($_POST['gender'])){
	$gender = "Gender Reqired";			
				
				}else
				{
					
				$gender = test_data($_POST['gender']);	
					}
if(empty($_POST['comment'])){
	$comment = "";
	
	}else
	{
		
	$comment = test_data($_POST['comment']);	
		}
if(empty($_POST['website'])){
				
				$website="";
				}else
				{
					
				$website = test_data($_POST['website']);
					
					}
}
					
function test_data($data){
	$data = trim($data);
	$data = htmlspecialchars($data);
	$data = stripslashes($data);
	return $data;
	}
?>
<h2>PHP Form Validation </h2>
<form  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post"> 
<p><span class="Error">* Required Field mark with * </span></p>
Name : <input type="text" name="name" value="<?php echo $name; ?>"/> <span class="Error">* <?php echo $nameErr; ?> </span><br /><br />
Email: <input type="text" name="email" value="<?php echo $email;?>" /><span class="Error">*<?php echo $emailErr; ?></span><br /><br />
website: <input type="text" name="website" value="<?php echo $website; ?>"/><br /><br />
comment:<textarea name="comment" rows="20" cols="50"><?php echo $comment; ?></textarea><br /><br />
Gender: <input type="radio" name="gender"<?php if(isset($gender)&& $gender=="male") echo "checked";?> value="male"/>Male
<input type="radio" name="gender"<?php if(isset($gender)&& $gender=="female") echo "checked";?> value="female" />Female
<span class="Error">* <?php echo $genderErr; ?></span>


<br /><br />
<input type="submit" name="submit" value="Submit" />
</form>

<?php 

	echo "Your inputs are : ";
	echo $name;
	echo "<br/>";
	echo $email;
	echo "<br/>";
	echo $website;
	echo "<br/>";
	echo $comment;
	echo "<br/>";
	echo $gender;
	echo "<br/>";
	
	

?>

</body>
</html>
