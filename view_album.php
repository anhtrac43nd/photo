<?php include'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<table border="1px">
		<tr>
			<td>Id</td>
			<td>Name Album</td>
			<td>Ngày tạo</td>
			<td><a href="add_album.php">Add</a></td>
		</tr>
		<?php 
			session_start();
			$id = $_SESSION['id'];
			$result = $conn->query("select * from album where id_user = $id ");
			if ($result->num_rows> 0 ){
				while ($row = $result->fetch_assoc()){ ?>
				<tr>
					<td><?php echo $row['id']; ?></td> 
					<td><?php echo $row['name']; ?></td> 
					<td><?php echo $row['created_date']; ?></td> 
					<td>
						<a href ="view_photo.php?id_album=<?php echo $row['id'] ?>">Xem ảnh</a>
						<a href ="add_photo.php?id_album=<?php echo $row['id'] ?>">Thêm ảnh</a>
						
						
					</td>
				</tr>
			<?php 	
				}
			}
		?>
	</table>
</body>
</html>