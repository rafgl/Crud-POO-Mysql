<?php 
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'crud');

	// initialize variables
	$name = "";
	$address = "";
	$id = 0;
	$update = false;

	if (isset($_POST['save'])) {
		$name = $_POST['name'];
		$email = $_POST['email'];

		mysqli_query($db, "INSERT INTO info (name, email) VALUES ('$name', '$email')"); 
		$_SESSION['message'] = "Email saved"; 
		header('location: index.php');
	}

if (isset($_POST['update'])) {
	$id = $_POST['id'];
	$name = $_POST['name'];
	$email = $_POST['email'];

	mysqli_query($db, "UPDATE info SET name='$name', email='$email' WHERE id=$id");
	$_SESSION['message'] = "Email updated!"; 
	header('location: index.php');
}

if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($db, "DELETE FROM info WHERE id=$id");
	$_SESSION['message'] = "Email deleted!"; 
	header('location: index.php');
}

?>