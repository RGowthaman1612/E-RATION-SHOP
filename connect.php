<?php
	$firstName = $_POST['firstName'];
	
	$password = $_POST['password'];
$cardtype=$_POST['cardtype'];
	

	// Database connection
	$conn = new mysqli('localhost','root','','test');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(firstName,password,cardtype) values(?, ?,?)");
		$stmt->bind_param("sss", $firstName,$password,$cardtype);
		$execval = $stmt->execute();
		
		echo ("<script LANGUAGE='JavaScript'>
    window.alert('Registrated Succesfully ');
    window.location.href='http://localhost/e%20ration%20shop/login.html';
    </script>");
$stmt->close();
		$conn->close();
	}
?>