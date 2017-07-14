<?php include'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php 
   if(isset($_POST)){
   	
   	if (!empty($_FILES['img']['tmp_name'])){
   		foreach ($_FILES['img']['tmp_name'] as $key=>$value) {
   		move_uploaded_file($value,"img/".$_FILES['img']['name'][$key]);
   		}
   	}
   	if (!empty($_FILES['img']['name'])){
   		foreach ($_FILES['img']['name'] as $key => $value) {
   			$id_album = $_GET['id_album'];
			$url = $value; 
			$created_date = date("Y-m-d H:i:s");
			$sql = "insert into photo (`url`,`created_date`,`id_album`) values ('$url','$created_date','$id_album')";
			$result = $conn->query($sql);
			header('location:view_photo.php?id_album='.$id_album);
   		}
   	}

   }


?>
	
	<form id="myForm" method="POST" enctype="multipart/form-data" action="">
				<input type="hidden" name="id_album" value="<?php echo @$_GET['id_album'];?>">
		Add photo <input type="file" name="img[]"  onchange="submitForm();" multiple="">

		<!-- <button type="submit">Gui</button> -->
	</form>
	
	<script type="text/javascript">
		function submitForm(){
			document.getElementById("myForm").submit();
		}
	</script>
</body>
</html>