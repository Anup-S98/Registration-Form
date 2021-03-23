<?php
	
    $email = $_POST['email'];
    $number = $_POST['number'];
	$password = $_POST['password'];
	$confirm= $_POST['confirm'];
    $city = $_POST['city'];

	function function_alert($message){

		echo "<script> alert(`$message`);</script>";
	   
	  }

	// Database connection
	$conn = new mysqli('localhost','root','','form');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into regform(email, number, password, confirm, city) values(?, ?, ?, ?,? )");
		$stmt->bind_param("sisss", $email, $number, $password, $confirm, $city);
		$execval = $stmt->execute();
	
	    function_alert("Registration Successfuly Done....");
		$stmt->close();
		$conn->close();
	}

	if(isset($_POST['submit'])){
		$email1=$_POST['email'];
		$phone1=$_POST['number'];
	  
		$to="anupshaha4@gmail.com";
		$subject="Form Submission";
		$message="Email : ".$email1."\n"."Phone : ".$phone1." ";
		$headers="From: $email1";
		
		if(mail($to,$subject,$message,$headers))
		{
			echo "<h1>Sent Successfully! "." ".$email1."Thank You, For Registering with us. ";
		}
		else
		{
			echo "Something went Wrong! ";
		}
		
	  }

?>