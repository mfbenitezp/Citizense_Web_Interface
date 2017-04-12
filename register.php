


<?php
$connection = new PDO('mysql:host=localhost;dbname=college', "root", ""); // Establishing connection with server..
//$db = mysql_select_db("college", $connection); // Selecting Database.
$name=$_POST['name1']; // Fetching Values from URL.
$email=$_POST['email1'];
$password= sha1($_POST['password1']); // Password Encryption, If you like you can also leave sha1.
// Check if e-mail address syntax is valid or not
$email = filter_var($email, FILTER_SANITIZE_EMAIL); // Sanitizing email(Remove unexpected symbol like <,>,?,#,!, etc.)
if (!filter_var($email, FILTER_VALIDATE_EMAIL))
{
	echo "Invalid Email.......";
}
else
{
	$result = $connection->query("SELECT * FROM registration WHERE email='$email'");
	$count=0;
	if ($result->fetchColumn() > 0)
	{
		$sql = "SELECT * FROM registration WHERE email='$email'";
		foreach ($connection->query($sql) as $row) {
			   
			   $count = $count + 1;
			 }
	}
	else
	{
		echo "No rows matched the query.";
	}



	if(($count)==0)
	{
		$query = $connection->query("insert into registration(name, email, password) values ('$name', '$email', '$password')"); // Insert query
		if($query){
		echo "You have Successfully Registered.....";
		}else
		{
		echo "Error....!!";
		}
	}
	else
	{
		echo "This email is already registered, Please try another email...";
	}
}
//mysql_close ($connection);
?>

