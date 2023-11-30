<?php
session_start(); 
include "conn.php";

//FINDING CURRENT DATE AND TIME
$date = date("Y/m/d");
$time = date("h:i:sa");
// echo $date_time;
  
//CHECK IF ALL INPUT BOXES ARE VALID
if (isset($_POST['select-branch']) && isset($_POST['messagee']) ){
    
    //Method to validate data
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    //RETRIVE AND VALIDATE INPUT FROM TEXTBOXES
    $branch = validate($_POST['select-branch']);
	$message = validate($_POST['messagee']);

    //IF IT EMPTY, DISPLAY ERROR MESSAGE
    if (empty($branch) || empty($message)){
		header("Location:  officer-post-announcements.php?error=Something Went Wrong !!! Please Try Again."); exit();  
		// exit(); 
	} 
    else{
        	// RETRIEVING BRANCH ID
			$sql1 = "SELECT * FROM branch WHERE branchName='$branch'";
			$result1 = $conn-> query($sql1);
			if ($result1-> num_rows > 0){	while($row = $result1-> fetch_assoc()){	$branchID = $row['branchID'];	}	}

            //ADD ANNOUNCEMENTS
			$sql2 = "INSERT INTO announcements (message, date, time, branchID)
			VALUES('$message', '$date', '$time', '$branchID')";
            $result2 = mysqli_query($conn, $sql2);
			//if(mysqli_query($conn, $sql2)) $last_id = mysqli_insert_id($conn); //OBTAINING LAST INSERTED ID

        if ($result2) 
            { 
                header("Location:  officer-post-announcements.php?success=Announcement Added Successfully."); 
                exit();  
            }
        else { header("Location:  officer-post-announcements.php?error=Something Went Wrong !!! Please Try Again."); exit(); }
    }
    // header("Location: officer-post-announcements.php"); exit();
}
else{  
	// header("Location: customer-add.php");  
	// exit(); 
	// mysqli_insert_id($conn)
}
