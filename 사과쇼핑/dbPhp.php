<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="ko">
<head>
 <meta http-equiv="Content-Type" Content="text/html; charset=utf-8" />
 <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<style>

</style>
</head>
 <body>
 <h1>Test</h1>
    <form action="dbPhp.php" method="post">
		test1: <input type="text" name="name1"><br>
	<input type="submit" value="Submit">
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	echo "php opened";
 $con = mysqli_connect('localhost','wa16s','1','wa16s_db');
 if (!$con) {
     die('Could not connect: ' . mysqli_error($con));
 } else echo "db connected successfully";
	

$id = $_POST["user_id"];
$password = $_POST["user_pass"];
$name = $_POST["user_name"];
$address = $_POST["user_address"];
$email = $_POST["user_email"];



echo $id;
echo $password;
echo $name;
echo $address;
echo $email;

$sql="SELECT id, password FROM 201121042_Seller";
$result = mysqli_query($con,$sql);	
while($row = mysqli_fetch_array($result)) {
     if($id == $row['id'] && $password == $row['password']){
		 $_SESSION["login"] = true;
		 $_SESSION["id"] = $id;
		 $_SESSION["password"] = $password;
		 $_SESSION["isSeller"] = true;
	 }else {
		 $_SESSION["id"] = $id;
		 $_SESSION["password"] = $password;
	 }
 }
 
 $sql="SELECT id, password FROM 201121042_Member";
$result = mysqli_query($con,$sql);	
while($row = mysqli_fetch_array($result)) {
     if($id == $row['id'] && $password == $row['password']){
		 $_SESSION["login"] = true;
		 $_SESSION["id"] = $id;
		 $_SESSION["password"] = $password;
		 $_SESSION["isSeller"] = false;
		 $_SESSION["name"] = $row['name'];
		 $_SESSION["address"] = $row['Address'];
		 $_SESSION["email"] = $row['email'];
	 }else {
		 $_SESSION["id"] = $id;
		 $_SESSION["password"] = $password;
	 }
 }
 
 if($_POST["submit"]=="가입하기"){
$sql = "INSERT INTO 201121042_Member (id, password, name, Address, email, point)
VALUES ('$id','$password','$name', '$address', '$email', 1000)";
 if ($con->query($sql) === TRUE) {
	echo "values inserted successfully";
	} else {echo "Error insert values:".$conn->error;}
 }
 
 
 
 echo "login: ".$_SESSION["login"];
 echo "id: ".$_SESSION["id"];
 echo "password: ".$_SESSION["password"];
 echo "isSeller: ".$_SESSION["isSeller"];

 
 if($_SESSION["login"] == true){
	
	echo "<script>self.close();</script>";
 }
 
 
	echo "<ul>Apple</ul>";
$sql="SELECT * FROM 201121042_Apple";
$result = mysqli_query($con,$sql);	
while($row = mysqli_fetch_array($result)) {
     echo "<ul>".$row['id']."   ";
	 echo $row['type']."   ";
	 echo $row['stock']."   ";
	 echo $row['price']."</ul>";
 }
 
	echo "<ul>Member</ul>";
$sql="SELECT * FROM 201121042_Member";
$result = mysqli_query($con,$sql);	
while($row = mysqli_fetch_array($result)) {
     echo "<ul>".$row['id']."   ";
	 echo $row['password']."   ";
	 echo $row['name']."   ";
	 echo $row['Address']."   ";
   	 echo $row['email']."   ";
	 echo $row['point']."</ul>";
 }
	echo "<ul>Seller</ul>";
$sql="SELECT * FROM 201121042_Seller";
$result = mysqli_query($con,$sql);	
while($row = mysqli_fetch_array($result)) {
     echo "<ul>".$row['id']."   ";
	 echo $row['password']."   ";
	 echo $row['name']."   ";
   	 echo $row['email']."</ul>";
 }
 
	echo "<ul>CartList</ul>";
$sql="SELECT * FROM 201121042_CartList";
$result = mysqli_query($con,$sql);	
while($row = mysqli_fetch_array($result)) {
     echo "<ul>".$row['memberID']."   ";
	 echo $row['appleID']."</ul>";
 }
 
	echo "<ul>OrderList</ul>";
$sql="SELECT * FROM 201121042_OrderList ";
$result = mysqli_query($con,$sql);	
while($row = mysqli_fetch_array($result)) {
     echo "<ul>".$row['memberID']."   ";
	 echo $row['appleID']."   ";
	 echo $row['numOfOrder']."   ";
	 echo $row['Address']."   ";
	 echo $row['date']."</ul>";
 }
	
 }
 ?>
</body>
</html>