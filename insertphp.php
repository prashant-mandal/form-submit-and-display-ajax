<?php
//insertphp.php

	$name = $_POST['fname'];
	$email = $_POST['femail'];
	$age = $_POST['fage'];
	$flag = "true";
	
	//server side validation
	$errName=$errEmail=$errAge=$errEmailFound="";
		
	if($age<1 || $age>120){
		$errAge = "Age: Not Valid. <br>&emsp;Only Natural Numbers allowed <br>";
		$flag = "false";
	}
	if(!preg_match("/^[a-z A-z]*$/", $name) || strlen($name)<3){
		$errName = "Name: Not Valid. <br>&emsp;Only alphabets and whitespace are allowed <br>&emsp; length atleast 3 characters. <br>";
		$flag = "false";
	}
	$pattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^"; 
	if (!preg_match ($pattern, $email) ){
		$errEmail = "Email: Not Valid. <br>&emsp;Valid format( address@domail.com )<br>";
		$flag = "false";
	}
	
		// Check connection
		$conn = mysqli_connect("localhost", "root", "", "project3ajax");   
        if($conn === false){
            die("ERROR: Could not connect. "
                . mysqli_connect_error());
        } 
        //check for email already present
		$emailcheck = "SELECT name FROM records WHERE email='$email'";
		$result = $conn->query($emailcheck);
		if(mysqli_query($conn, $emailcheck)){		
			if ($result->num_rows > 0) {	
				$errEmailFound = "Data Invalid <br>&emsp;Email already present in database<br>";
				$flag = "false";
			}
		}
		
	if($flag == "true"){
        //insert query execution
		$sql = "INSERT INTO records(name,email,age) VALUES('$name','$email','$age')";
        
        if(mysqli_query($conn, $sql)){	
			echo "Successufully added";
			echo "<script>clear_input()</script>";
        } else{
			die("Error");
        }     
	}
	else{
		echo "<u>Errors:</u><br>".$errName.$errEmail.$errAge.$errEmailFound;
	}
	
	// Close connection
        mysqli_close($conn);

?>
