<?php 
	if (isset($_POST['logout'])){
		header('location:login.php');
	}
?>
<div id="header" >
	<h3><a href="list_user.php">Danh sách người dùng</a></h3>
	<h4>Xin chào <?php echo $_SESSION['username'];?></h4>
	<div class="clear"></div>
	<form method="post" action="header.php">
		<input type="submit" name="logout" value="Logout">
	</form>
</div>