<?php
session_start(); 
include "conn.php";

//FINDING CURRENT DATE AND TIME
$date = date("Y/m/d");
$time = date("h:i:sa");
// echo $date_time;
    
    //Method to validate data
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    //RETRIVE AND VALIDATE INPUT FROM TEXTBOXES
    $name = validate($_POST['name']);
	$address = validate($_POST['address']);
    $country = validate($_POST['country']);
    $province = validate($_POST['province']);
    $city = validate($_POST['city']);
    $zipcode = validate($_POST['zipcode']);

    //IF IT EMPTY, DISPLAY ERROR MESSAGE
    if (empty($name) || empty($address) || empty($country) || empty($province) || empty($zipcode) || empty($city)){
		header("Location:  officer-add-branch.php?error=Something Went Wrong !!! Please Try Again."); exit();  
		// exit(); 
	} 
    else{
            //ADD ADDRESS
			$sql = "INSERT INTO addresss (country, street, city, province, zipCode)
			VALUES('$country', '$address', '$city', '$province', '$zipcode')";
            $result = mysqli_query($conn, $sql);
			// if(mysqli_query($conn, $sql)) $last_id = mysqli_insert_id($conn); //OBTAINING LAST INSERTED ID

            // RETRIEVING ADDRESS ID
			$sql1 = "SELECT * FROM addresss WHERE street='$address' AND zipCode='$zipcode'";
			$result1 = $conn-> query($sql1); $addressID = null;
			if ($result1-> num_rows > 0){	while($row = $result1-> fetch_assoc()){	$addressID = $row['addressID'];	}	}

        if ($result){
            if($addressID != null){
                 //ADD ADDRESS
                 $sql2 = "INSERT INTO branch (branchName, addressID, userID) VALUES('$name', '$addressID', '0')";
                 $result2 = mysqli_query($conn, $sql2);
                 header("Location:  officer-add-branch.php?success=Branch Added Successfully."); 
                 exit(); 
            }else { header("Location:  officer-add-branch.php?error=Something Went Wrong !!! Please Try Again."); exit(); }
            }else { header("Location:  officer-add-branch.php?error=Something Went Wrong !!! Please Try Again."); exit(); }
    } 
    // header("Location: officer-add-branch.php"); exit();
