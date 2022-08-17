<?php
//updatephp.php

	$id = $_POST["id"];
	$name = $_POST["name"];
	$email = $_POST["email"];
	$age = $_POST["age"];
	
	$flag = "true";
	
	//server side validation
	$errName=$errEmail=$errAge=$errEmailFound="";
		
	if($age<1 || $age>120){
		$errAge = "Age: Not Valid. <br>&emsp;Only Natural Numbers allowed <br>";
		$flag = "false";
	}
	if(!preg_match("/^[a-z A-z]+$/", $name) || strlen($name)<3){
		$errName = "Name: Not Valid. <br>&emsp;Only alphabets and whitespace are allowed <br>&emsp; length atleast 3 characters. <br>";
		$flag = "false";
	}
	$pattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})+$^"; 
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
		$emailcheck = "SELECT id FROM records WHERE email='$email'";
		$result = $conn->query($emailcheck);
		if(mysqli_query($conn, $emailcheck)){		
			if ($result->num_rows > 1) {	
				$errEmailFound = "Data Invalid <br>&emsp;Email already present in database<br>";
				$flag = "false";
			}
			if($result->num_rows ==1){
				$row = mysqli_fetch_array($result);
				if($id != $row["id"]){
					$errEmailFound = "Data Invalid <br>&emsp;Email already present in database<br>";
					$flag = "false";
				}
			}
		}
		
	if($flag == "true"){

        //insert query execution
		$sql = "UPDATE records SET name='$name',email='$email',age='$age' WHERE id=$id";
        
        if(mysqli_query($conn, $sql)){	
			echo "Successufully Updated";
			echo "<script>display_record()</script>";
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