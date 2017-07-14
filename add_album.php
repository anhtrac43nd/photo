<?php include'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php 
		session_start();
		if(isset($_POST['submit'])){
			$name = $_POST['name'];
			$id_user = $_SESSION['id'];
			$created_date = date("Y-m-d H:i:s");
			if ($name == ""){
				echo "Bạn chưa nhập tên album";
			}else{
				$sql = "insert into album(`name`,`id_user`,`created_date`) values ('$name','$id_user', '$created_date' )";
				$result = $conn->query($sql);			
				header('location:view_album.php');			
			}
		}
	?>
	<form action="add_album.php" method="post">
		Tên Album:<input type="text" name="name">
		<input type="submit" name="submit">		
	</form>
</body>
</html>