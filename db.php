<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "photo_album";
    $conn = new mysqli($servername, $username, $password ,$database);

	// Kiểm tra kết nối có hoạt động không
	// if ($conn->connect_error) {
	// 	die("Connection failed: " . $conn->connect_error);
	// }
	// else {
	// 	echo "Connected successfully";
	// }
?>
