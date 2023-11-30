<?php 
session_start(); 
include "conn.php";

//RETRIEVING CURRENT COMPANY ID
// $id = 0;
// if(isset($_SESSION['Company_id']) && isset($_SESSION['Company_id'])){
// 	$id = $_SESSION['Company_id'];
// }

//FINDING CURRENT DATE AND TIME
$date_time = date("Y/m/d")."-".date("h:i:sa");
echo $date_time;
  
//CHECK IF ALL INPUT BOXES ARE VALID
if (isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['phone']) && isset($_POST['email'])
&& isset($_POST['select-status'])  && isset($_POST['select-branch'])  && isset($_POST['select-occupation'])
&& isset($_POST['address']) && isset($_POST['country']) && isset($_POST['province']) && isset($_POST['city']) 
&& isset($_POST['zipcode']) && isset($_POST['password']) && isset($_POST['confirm'])){

	//METHOD TO VALIDATE DATA
	function validate($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	
	//RETRIVE AND VALIDATE INPUT FROM TEXTBOXES
    $name = validate($_POST['name']);								$surname = validate($_POST['surname']);
	$phone = validate($_POST['phone']);								$email = validate($_POST['email']);
	$status = validate($_POST['select-status']);					$branch = validate($_POST['select-branch']);
	$occupation = validate($_POST['select-occupation']);			$phone = validate($_POST['phone']);
	$address = validate($_POST['address']);							$country = validate($_POST['country']);
	$province = validate($_POST['province']);						$city = validate($_POST['city']);
	$zipcode = validate($_POST['zipcode']);							$password = validate($_POST['password']);
	$confirm = validate($_POST['confirm']);
    
	//IF IT EMPTY, DISPLAY ERROR MESSAGE
    if (empty($name) || empty($phone) || strlen($phone)!=10 || empty($email) || empty($status) || empty($branch) 
	|| empty($occupation) || empty($address) || empty($country) || empty($province) || empty($city)
	|| empty($zipcode) || empty($password) || empty($confirm)){
		header("Location:  officer-create-users.php?error=Something Went Wrong !!! Please Try Again."); exit();  
		// exit(); 
	} 
	else if ($status == "Select"){ header("Location:  officer-create-users.php?error=Please Select Membership Status"); exit(); }
	else if ($branch == "Select"){ header("Location:  officer-create-users.php?error=Please Select Branch"); exit(); }
	else if ($occupation == "Select"){ header("Location:  officer-create-users.php?error=Please Select Occupation"); exit(); }
	else if ($password != $confirm){ header("Location:  officer-create-users.php?error=Passwords Does Not Match !!!"); exit(); }
    else{
		// CHECK IF USER IS ALREADY REGISTERED USING THE SAME EMAIL ADDRESS
	    $sql = "SELECT * FROM userinfo WHERE userID='$email'";
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) > 0) {	header("Location:  officer-create-users.php?error=User Already Exist !!!."); exit(); }
		else {
            //   -----------------------------------------------------------------------------------------------------------------
			// RETRIEVING BRANCH ID
			$sql1 = "SELECT * FROM branch WHERE branchName='$branch'";
			$result1 = $conn-> query($sql1);
			if ($result1-> num_rows > 0){	while($row = $result1-> fetch_assoc()){	$branchID = $row['branchID'];	}	}

			// RETRIEVING OCCUPATION ID
			$sql2 = "SELECT * FROM occupation WHERE occupationName='$occupation'";
			$result2 = $conn-> query($sql2);
			if ($result2-> num_rows > 0){	while($row = $result2-> fetch_assoc()){	$occupationID = $row['occupationID'];	}	}

			// RETRIEVING MEMBERSHIP STATUS ID
			$sql3 = "SELECT * FROM membershipstatus WHERE statuss='$status'";
			$result3 = $conn-> query($sql3);
			if ($result3-> num_rows > 0){	while($row = $result3-> fetch_assoc()){	$statusID = $row['statusID'];	}	}

			//   -----------------------------------------------------------------------------------------------------------------
			//ADD ADDRESS
			$sql4 = "INSERT INTO addresss (country, street, city, province, zipCode)
			VALUES('$country', '$address', '$city', '$province', '$zipcode')";
			if(mysqli_query($conn, $sql4)) $last_id = mysqli_insert_id($conn); //OBTAINING LAST INSERTED ID

		   // REGISTER CUSTOMER IF EMAIL ADDRESS DOESN'T EXIST 
		   $sql5 = "INSERT INTO userinfo (namee, surname, email, phoneNo, addressID, branchID, occupationID, statusID)
		   VALUES('$name', '$surname', '$email', '$phone', '$last_id', '$branchID', '$occupationID', '$statusID')";
           $result5 = mysqli_query($conn, $sql5);

		   // RETRIEVING USER ID
			$sql6 = "SELECT * FROM userinfo WHERE email='$email'";
			$result6 = $conn-> query($sql6);
			if ($result6-> num_rows > 0){	while($row = $result6-> fetch_assoc()){	$userID = $row['userID'];	}	}

		   	//ADD LOGIN DETAILS
			$sql7 = "INSERT INTO userlogin (userID, email, passwords)
			VALUES('$userID', '$email', '$password')";
			$result7 = mysqli_query($conn, $sql7);
		   
           if ($result7) { header("Location:  officer-create-users.php?success=User Registered Successfully."); exit();  }
           else { header("Location:  officer-create-users.php?error=Something Went Wrong !!! Please Try Again."); exit(); }
 		}
     }
	//  header("Location: officer-create-users.php"); exit();
}else{  
	// header("Location: customer-add.php");  
	// exit(); 
	// mysqli_insert_id($conn)
}
