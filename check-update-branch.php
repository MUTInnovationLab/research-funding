
<?php
session_start(); 
include "conn.php";
    
    //Method to validate data
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    if(isset($_POST['btn_cancel'])) {
        header("Location:  officer-view-branch.php"); exit(); 
    }

    if(isset($_POST['btn_submit'])) {
    //RETRIVE AND VALIDATE INPUT FROM TEXTBOXES
    $name = validate($_POST['branch-name']);
	$address = validate($_POST['branch-address']);
    $country = validate($_POST['branch-country']);
    $province = validate($_POST['branch-province']);
    $city = validate($_POST['branch-city']);
    $zipcode = validate($_POST['branch-zipcode']);
    $leader = validate($_POST['select-leader']);

    $btn_cancel = validate($_POST['btn-cancel']);

    //IF IT EMPTY, DISPLAY ERROR MESSAGE
    if (empty($name) || empty($address) || empty($country) || empty($province) || empty($zipcode) || empty($city)){
		header("Location:  officer-Update-branch.php?error=Something Went Wrong !!! Please Try Again."); exit();  
	}else if($btn_cancel == "1"){
        header("Location:  officer-view-branch.php"); exit(); 
    }else if (empty($leader)){
		header("Location:  officer-Update-branch.php?error=Please Assign A Leader."); exit();  
	}
    else{
        $addressID = $_SESSION['update_addressID'];
        $sql = "UPDATE addresss SET country='$country', street='$address', city='$city', province='$province', zipCode='$zipcode' 
        WHERE addressID = $addressID";
        if ($conn->query($sql) === TRUE) { 
            $sql1 = "UPDATE branch SET branchName='$name', userID='$leader' WHERE addressID = $addressID";
            if ($conn->query($sql1) === TRUE) {
                header("Location: officer-view-branch.php?success=Record Updated Successfully."); exit();
            } else {  header("Location: officer-update-branch.php?error=Something Went Wrong!!!"); exit();  }
        } else {  header("Location: officer-update-branch.php?error=Something Went Wrong!!!"); exit();  }
    } 
    // header("Location: officer-update-branch.php"); exit();
}
    ?>