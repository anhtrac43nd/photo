<?php include'db.php'; 
	session_start();
	$id = $_SESSION['id'];
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php 
	if(isset($_POST['submit'])){
		 $follow_id = $_POST['aaa'];
		 $id_user = $id;
		 $date_follow = date("d-m-y H:i:s");
		 $sql = "insert into follow (`follow_id`,`id_user`,`date_follow`) values ('$follow_id','$id_user','$date_follow')";
		 $result = $conn->query($sql);
	}

?>
<?php 
	if (isset($_GET['idUnFollow'])){
		$idUnFollow = $_GET['idUnFollow'];
		$sql3 = "delete from follow where id = $idUnFollow "; 
		$result3 = $conn->query($sql3);
		header('location:list_user.php');
	}
?>
	
	<table border="1">
		<tr>
			<td>Id</td>
			<td>User</td>
			<td></td>
			
		</tr>
		<?php
			$sql = "select * from user_details where id != $id ";
			$result = $conn->query($sql);
			if ($result->num_rows > 0){
				while ($row = $result->fetch_assoc()){ ?>
					<form action="list_user.php" method="post">
						<tr>
							<td><?php echo $row['id'] ?></td>
							<input type="hidden" value="<?php echo $row['id'] ?>" name="aaa" />
							<td><?php echo $row['user_name'] ?></td>
							<td>
								<?php 
									$sql1 = " select id from follow where follow_id = ".$row['id']." and id_user = $id ";
									$result2 = $conn->query($sql1);
									$row2 = $result2->fetch_assoc();
									
									if ($result2->num_rows > 0){ ?>
										<a href="list_user.php?idUnFollow=<?php echo $row2['id']?>">Unfollow</a>
									<?php 
									} else { ?> 
										<input type="submit" name="submit" value="Follow" />
									<?php 
									}
								?>

								
								
							</td>
						</tr>
					</form>
				<?php }
			}
		 ?>

	</table>
	<table>
		<tr>
			<td></td>
		</tr>
	</table>
</body>
</html>