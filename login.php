

<?php
$connection = new PDO('mysql:host=localhost;dbname=college', "root", ""); // Establishing connection with server..
//$db = mysql_select_db("college", $connection); // Selecting Database.
$email=$_POST['email1']; // Fetching Values from URL.
$password= sha1($_POST['password1']); // Password Encryption, If you like you can also leave sha1.
// check if e-mail address syntax is valid or not
$email = filter_var($email, FILTER_SANITIZE_EMAIL); // sanitizing email(Remove unexpected symbol like <,>,?,#,!, etc.)
if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
echo "Invalid Email.......";
}else{
// Matching user input email and password with stored email and password in database.
$result = $connection->query("SELECT * FROM registration WHERE email='$email' AND password='$password'");
//$row_number = $result->fetchColumn();
//echo $row_number;

$count=0;

if ($result->fetchColumn() > 0)
{
	$sql = "SELECT * FROM registration WHERE email='$email' AND password='$password'";
	foreach ($connection->query($sql) as $row) {
           //print "Name: " .  $row['name'] . "\n";
		   $count = $count + 1;
         }
}
else{
	//print "No rows matched the query.";
}

//echo $count;
if($count==1)
	{
		echo "Successfully";
	}
else
	{
		echo "Email or Password is wrong";
	}



/*while ($row = $result->fetch())
{
    echo $row['name'] . "\n";
}*/
}
//mysql_close ($connection); // Connection Closed.
?>

