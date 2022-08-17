<?php
//deletephp.php
	$id = $_POST["id"];
	
	// Check connection
		$conn = mysqli_connect("localhost", "root", "", "project3ajax");   
        if($conn === false){
            die("ERROR: Could not connect. "
                . mysqli_connect_error());
        } 
		
	//delete query execution
		$sql = "DELETE FROM records where id = $id";
		
		if(mysqli_query($conn, $sql)){			
			echo "1 Row Successufully Deleted";			
        } else{
			die("Error Not Deleted");
        }
		
    // Close connection
        mysqli_close($conn);
	
?>