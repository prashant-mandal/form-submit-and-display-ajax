<!DOCTYPE html>
<html>
	<head>
		<title> Ajax </title>
		<meta name="content" description="Designed by github.com/prashant-mandal">
		<link rel="stylesheet" href="mystyle.css">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"> </script>
		<script src="myscript.js" type="text/javascript"> </script>
	<head>
	<body>

		<div class="finput">
			<form id="submitdisplay" action="" method="post" name="submitdisplay">
				<h1> Enter Details </h1>
				
				<label for="fname">Name:</label>
				<input type="name" id="fname" name="fname" required> </br>			
				</br>
				<label for="femail">Email:</label>
				<input type="email" id="femail" name="femail" required> </br>			
				</br>
				<label for="fage">Age:</label>
				<input type="number" id="fage" name="fage" min="1" max="121" required> </br>
				</br>
				
				<input type="submit" value="Add" class="submit">
			</form>
		</div>
		
		<div class="displaytable" id="result_table">
		</div>
		
	<p id="message"> </p>
	</body>
</html>