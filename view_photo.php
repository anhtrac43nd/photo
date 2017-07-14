<?php include'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php 

?>
	<table border="1px">
		<tr>
			<td>Id</td>
			<td>Img</td>			
			<td>Ngày tạo</td>
			
		</tr>
		<?php 
			session_start();
			if (isset($_GET['id_album'])){
			$id_album = $_GET['id_album'];
			$result = $conn->query("select * from photo where id_album = $id_album ");
			if ($result->num_rows > 0 ){
				while ($row = $result->fetch_assoc()){ ?>
				<tr>
					<td><?php echo $row['id']; ?></td>
					<td><img style="width:150px;" src="img/<?php echo $row['url']; ?>" /></td>  
					<td><?php echo $row['created_date']; ?></td> 
				</tr>
			<?php 	
					}
				}
			}
		?>
	</table>
</body>
</html>