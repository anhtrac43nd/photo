<?php include'db.php'; ?>
<?php
	session_start();
	if (!isset($_SESSION['username'])){
		header('location:login.php');
	}else {
		$id = $_SESSION['id'];
	}

 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php include'header.php'; ?>
	<!-- <div class="clear"></div> -->
	<div id="content">
		<div id="left"></div>
		<div id="right">
			<h4>Upload ảnh</h4>
			<a href="view_album.php">Tạo Album</a><br>
 			<?php

				// $sql = "select p.url from photo as p , album as a , user_details as u where p.id_album = a.id and u.id = a.id_user and id_user = $id  " ;
 			   $sql = "SELECT DISTINCT photo.url FROM `user_details`,`photo`,`album`,`follow` 
				WHERE 
				( user_details.id = $id AND album.id_user=user_details.id AND photo.id_album = album.id)
				OR 
				(follow.id_user= $id AND album.id_user=follow.follow_id AND photo.id_album = album.id) " ;
				$result = $conn->query($sql);
				if ($result->num_rows > 0 ){
					while ($row = $result->fetch_assoc()){ ?>
						<img width="500px;" src="img/<?php echo $row['url']; ?>" /><br>
					<?php }
				}
			 ?> 
		</div>
	</div>
	<div class="clear"></div> 
	<div id="footer"></div>
	
</body>

</html>