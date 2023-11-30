<?php
session_start(); 
include "conn.php";

//FINDING CURRENT DATE AND TIME
$date = date("Y/m/d");
$time = date("h:i:sa");

//CHECK IF ALL INPUT BOXES ARE VALID
if (!isset($_POST['select-branch'])){ header("Location:  officer-upload-videos.php?error=Please Select Branch"); exit(); }
else if (!isset($_POST['select-service'])){ header("Location:  officer-upload-videos.php?error=Please Select Service"); exit(); }
else{
	//METHOD TO VALIDATE DATA
	function validate($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	
	//RETRIVE AND VALIDATE INPUT FROM TEXTBOXES
   $description = validate($_POST['description']);
   $branchID = validate($_POST['select-branch']);
   $service = validate($_POST['select-service']);
    
	//IF IT EMPTY, DISPLAY ERROR MESSAGE
   if ($branchID == ""){ header("Location:  officer-upload-videos.php?error=Please Select Branch"); exit(); }
	else if ($service == "Select Service"){ header("Location:  officer-upload-videos.php?error=Please Select Service"); exit(); }
   else{
      	// RETRIEVING USER ID
			$sql1 = "SELECT * FROM churchservice WHERE date='$service'";
			$result1 = $conn-> query($sql1);
			if ($result1-> num_rows > 0){	while($row = $result1-> fetch_assoc()){	$serviceID = $row['serviceID'];	}	}

// if(isset($_POST['but_upload'])){
   $maxsize = 5242880; // 5MB
   if(isset($_FILES['file']['name']) && $_FILES['file']['name'] != ''){
       $name = $_FILES['file']['name'];
       $target_dir = "videos/";
       $target_file = $target_dir . $_FILES["file"]["name"];

       // Select file type
       $extension = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
       $extensions_arr = array("mp4","avi","3gp","mov","mpeg");
       if(in_array($extension,$extensions_arr) ){
 
          // Check file size
          if(($_FILES['file']['size'] >= $maxsize) || ($_FILES["file"]["size"] == 0)) {
             header("Location:  officer-upload-videos.php?error=File too large. File must be less than 5MB."); exit(); 
          }else{
             if(move_uploaded_file($_FILES['file']['tmp_name'],$target_file)){
               $sql = "INSERT INTO videos(date, time, serviceID, location, description, branchID) 
               VALUES('".$date."','".$time."','".$serviceID."','".$target_file."','".$description."','".$branchID."')";
               $result = mysqli_query($conn,$sql);
               if($result) { header("Location:  officer-upload-videos.php?success=Upload Successfully"); exit(); }
              else { header("Location:  officer-upload-videos.php?error=Something Went Wrong. Please Try Again."); exit(); }
             }
          }
       }else{ header("Location:  officer-upload-videos.php?error=Invalid File Extension."); exit(); }
   }else{ header("Location:  officer-upload-videos.php?error=Please Select A File"); exit(); }
 } header("Location:  officer-upload-videos.php"); exit(); 
}
?>