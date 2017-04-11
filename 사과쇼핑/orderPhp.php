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
 
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET'){
	$orderList = $_GET['orderList'];
	
 $con = mysqli_connect('localhost','wa16s','1','wa16s_db');
 if (!$con) {
     die('Could not connect: ' . mysqli_error($con));
 } else echo "db connected successfully";
	echo "<ul>"+ $orderList +"</ul>";
	
	$id = $_SESSION['id'];

$sql = "INSERT INTO 201121042_OrderList  (memberID, appleID, numOfOrder, Address, date)
VALUES ('$id','$orderList',1, 'Ajou Univ, Woncheon-dong',NOW())";
 if ($con->query($sql) === TRUE) {
	echo "values inserted successfully";
	} else {echo "Error insert values:".$conn->error;}

	
 
}
 ?>
</body>
</html>