<?php
   $fnametxt = $_POST['fnametxt'];
   $lnametxt = $_POST['lnametxt'];
   $agetxt = $_POST['agetxt'];
   $file = $_FILES['FileUpload'];
   $filename = $file['name'];
   $filepath = $file['tmp_name'];

	// Database connection
	$conn = new mysqli('localhost','root','','try');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		if($fnametxt != ""){
			$dimgfile = 'upload/'.$filename;
			//echo "$dimgfile";
			move_uploaded_file($filepath, $dimgfile);
			$stmt = $conn->prepare("insert into addpost(fname, lname, age, img) values(?, ?, ?, ?)");
			$stmt->bind_param("ssis", $fnametxt, $lnametxt, $agetxt, $dimgfile);
			$execval = $stmt->execute();
			$stmt->close();
			$conn->close();
			header("Refresh:0; url=Addpost.php");
		}else{
			header("Refresh:0; url=Addpost.php");
		}
		
	}
?>


