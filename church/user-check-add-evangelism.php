<?php
session_start(); 
include "conn.php";
$branchID = $_SESSION['branchID'];
$userID = $_SESSION['userID'];

//FINDING CURRENT DATE AND TIME
$date = date("Y/m/d");
$time = date("h:i:sa");

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

	$message = validate($_POST['messagee']);

    //IF IT EMPTY, DISPLAY ERROR MESSAGE
    if (empty($message)){
		header("Location:  officer-report-evangelism.php?error=Something Went Wrong !!! Please Try Again."); exit();  
		// exit(); 
	} 
    else{
        //ADD ANNOUNCEMENTS
        $sql = "INSERT INTO evangelism (report, branchID, userID)
        VALUES('$message', '$branchID', '$userID')";
        $result = mysqli_query($conn, $sql);

        if ($result) 
            { 
                header("Location:  officer-report-evangelism.php?success=Added Successfully."); 
                exit();  
            }
        else { header("Location:  officer-report-evangelism.php?error=Something Went Wrong !!! Please Try Again."); exit(); }
    }
    // header("Location: officer-report-evangelism.php"); exit();