<?php 
session_start(); 
include "conn.php";

	//METHOD TO VALIDATE DATA
	function validate($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	
	//RETRIVE AND VALIDATE INPUT FROM TEXTBOXES
    $date = validate($_POST['date']);
	$time = validate($_POST['time']);
	$link = validate($_POST['link']);
    $description = validate($_POST['description']);
	$branchID = validate($_POST['select-branch']);
    
	//IF IT EMPTY, DISPLAY ERROR MESSAGE
    if (empty($date) || empty($time) || empty($link) || empty($description)){
		header("Location:  officer-add-service.php?error=Something Went Wrong !!! Please Try Again."); exit();  
	}else if (empty($branchID)){ header("Location:  officer-add-service.php?error=Please Select Branch."); exit(); }
    else if (empty($date) == "yyyy/mm/dd"){ header("Location:  officer-add-service.php?error=Please Select date."); exit(); }
    else if (empty($time) == "--:--"){ header("Location:  officer-add-service.php?error=Please Select Time."); exit(); }
    else{
		// CHECK IF USER IS ALREADY REGISTERED USING THE SAME EMAIL ADDRESS
	    $sql = "SELECT * FROM churchservice WHERE branchID='$branchID' AND date='$date'";
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) > 0) {	header("Location:  officer-add-service.php?error=Ooops! There Is Service A Service Already Scheduled For This Date."); exit(); }
		else {
			//ADD CHURCH SERVICE
			$sql2 = "INSERT INTO churchservice (date, time, link, branchID, description)
			VALUES('$date', '$time', '$link', '$branchID', '$description')";
            $result2 = mysqli_query($conn, $sql2);
           if ($result2) { header("Location:  officer-add-service.php?success=Service Successfully Added."); exit();  }
           else { header("Location:  officer-add-service?error=Something Went Wrong !!! Please Try Again."); exit(); }
 		}
     }
	//  header("Location: officer-add-service.php"); exit();
