<?php
	$user = $_POST['user'];
	$mdp = $_POST['mdp'];
	$tel = $_POST['tel'];
	$email = $_POST['email'];

	// Database connection
	$conn = new mysqli('localhost','root','','test');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into inscription(user, mdp, tel, email) values(?, ?, ?, ?)");
		$stmt->bind_param("ssis", $user, $mdp, $tel, $email);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>