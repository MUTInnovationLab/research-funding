<?php 
session_start(); 
include "conn.php";

//FINDING CURRENT DATE AND TIME
$date_time = date("Y/m/d")."-".date("h:i:sa");
// echo $date_time;

//METHOD TO VALIDATE DATA
function validate($data){
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

//RETRIVE AND VALIDATE INPUT FROM TEXTBOXES
$title = validate($_POST['title']);								$ticketComment = validate($_POST['ticketComment']);								
$name = validate($_POST['name']);								$transportation = validate($_POST['transportation']);				
$staffNo = $_POST['staffNo'];									$transportationComment = validate($_POST['transportationComment']);					
$qualification = $_POST['qualification'];						$registration = validate($_POST['registration']);
$email = validate($_POST['email']);								$registrationComment = validate($_POST['registrationComment']);
$tel = validate($_POST['tel']);									$accommodation = validate($_POST['accommodation']);
$cell = validate($_POST['cell']);								$ticket = $_POST['ticket'];
$department = validate($_POST['department']);					$accommodationComment = validate($_POST['accommodationComment']);
$subject = validate($_POST['subject']);							$subsistence = validate($_POST['subsistence']);
$venue = validate($_POST['venue']);								$subsistenceComment = validate($_POST['subsistenceComment']);
$host = validate($_POST['host']);								$otherCosts = validate($_POST['otherCosts']);
$duration = $_POST['duration'];									$otherCostsComment = validate($_POST['otherCostsComment']);
$titleOfPaper = validate($_POST['titleOfPaper']);				
$coAuthers = validate($_POST['coAuthers']);						
$otherFinancial = validate($_POST['otherFinancial']);			
$amtReceived = validate($_POST['amtReceived']);					


//IF IT EMPTY, DISPLAY ERROR MESSAGE
// if (empty($title) || empty($name) || strlen($tel)!=10 || empty($tel) || empty($staffNo) || empty($qualification) || empty($email)
// || empty($subject) || empty($venue) || empty($host) || empty($duration) || empty($titleOfPaper) || empty($coAuthers) || empty($otherFinancial)
// || empty($amtReceived) || empty($ticket) || empty($ticketComment) || empty($transportation) || empty($transportationComment) 
// || empty($registration) || empty($registrationComment) || empty($accommodation) || empty($accommodationComment) || empty($subsistence) 
// || empty($subsistenceComment) || empty($otherCosts) || empty($otherCostsComment) || strlen($cell)!=10 || empty($cell) || empty($department)){
// 	header("Location: apply.php?error=Something Went Wrong !!! Please Try Again."); exit();  

if (empty($title) || empty($name) || strlen($tel)!=10 || empty($tel) || empty($staffNo) || empty($qualification) || empty($email)
|| empty($subject) || empty($venue) || empty($host) || empty($duration) || empty($titleOfPaper) || empty($coAuthers) || empty($otherFinancial)
|| empty($amtReceived) || empty($ticket) || empty($transportation)
|| empty($registration) || empty($accommodation) || empty($subsistence) 
|| empty($otherCosts) || strlen($cell)!=10 || empty($cell) || empty($department)){
header("Location: apply.php?error=Something Went Wrong !!! Please Try Again1."); exit(); 
}else{
	// CHECK IF USER IS ALREADY REGISTERED USING THE SAME EMAIL ADDRESS
	$sql = "SELECT * FROM applications WHERE email='$email'";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {	header("Location:  apply.php?error=You Already Applied For This Funding !!!."); exit(); }
	else {
		$totalCost = $ticket + $transportation + $registration + $accommodation + $subsistence + $otherCosts; 

		$sql1 = "INSERT INTO personal_details(title, names, staffNo, qualification, email, tel, cell, department)
		VALUES('$title', '$name', '$staffNo', '$qualification', '$email', '$tel', '$cell', '$department')";
		$result1 = mysqli_query($conn, $sql1);

		$sql2 = "INSERT INTO conference_details(email, subjects, venue, host, duration, titleOfPaper, coAuthers, otherFinancial, amtReceived)
		VALUES('$email', '$subject', '$venue', '$host', '$duration', '$titleOfPaper', '$coAuthers', '$otherFinancial', '$amtReceived')";
		$result2 = mysqli_query($conn, $sql2);

		// $sql3 = "INSERT INTO budget_details(email, ticket, ticketComment, transportation, transportationComment, registration, 
		// registrationComment, accommodation, accommodationComment, subsistence, subsistenceComment, otherCosts, otherCostsComment, totalCost)
		// VALUES('$email', '$ticket', '$ticketComment', '$transportation', '$transportationComment', '$registration', '$registrationComment', 
		// '$accommodation', '$accommodationComment', '$subsistence', '$subsistenceComment', '$otherCosts', '$otherCostsComment', '$totalCost')";
		// $result3 = mysqli_query($conn, $sql3);
		$sql3 = "INSERT INTO budget_details(email, ticket, ticketComment, transportation, transportationComment, registration, 
		registrationComment, accommodation, accommodationComment, subsistence, subsistenceComment, otherCosts, otherCostsComment, totalCost)
		VALUES('$email', '$ticket', 'None', '$transportation', 'None', '$registration', 'None', 
		'$accommodation', 'None', '$subsistence', 'None', '$otherCosts', 'None', '$totalCost')";
		$result3 = mysqli_query($conn, $sql3);

		//PDF DOCUMENTS		
		if (isset($_FILES['file1']['name']) && isset($_FILES['file2']['name']) && isset($_FILES['file3']['name']) && isset($_FILES['file4']['name'])
		&& isset($_FILES['file5']['name']) && isset($_FILES['file6']['name']) && isset($_FILES['file7']['name']) && isset($_FILES['file8']['name'])
		&& isset($_FILES['file9']['name']) && isset($_FILES['file10']['name']) && isset($_FILES['file11']['name']))
		{
			// $file_name1 =  rand()."-".$_FILES['file1']['name']; $file_tmp1 = $_FILES['file1']['tmp_name1'];
			// move_uploaded_file($file_tmp1,'documents/' .$file_name1);

			$target_dir = "documents/"; $file = $_FILES['file1']['name'];  $path = pathinfo($file);  $filename = rand()."-".$path['filename'];
			$ext = $path['extension']; $temp_name = $_FILES['file1']['tmp_name'];
			$path_filename_ext1 = $target_dir.$filename.".".$ext;
			move_uploaded_file($temp_name,$path_filename_ext1);

			// $file_name2 =  rand()."-".$_FILES['file2']['name']; $file_tmp2 = $_FILES['file2']['tmp_name2'];
			// move_uploaded_file($file_tmp2, $file_name2);

			$target_dir = "documents/"; $file = $_FILES['file2']['name'];  $path = pathinfo($file);  $filename = rand()."-".$path['filename'];
			$ext = $path['extension']; $temp_name = $_FILES['file2']['tmp_name'];
			$path_filename_ext2 = $target_dir.$filename.".".$ext;
			move_uploaded_file($temp_name,$path_filename_ext2);

			// $file_name3 =  rand()."-".$_FILES['file3']['name']; $file_tmp3 = $_FILES['file3']['tmp_name3'];
			// move_uploaded_file($file_tmp3,'./documents/'.$file_name3);

			$target_dir = "documents/"; $file = $_FILES['file3']['name'];  $path = pathinfo($file);  $filename = rand()."-".$path['filename'];
			$ext = $path['extension']; $temp_name = $_FILES['file3']['tmp_name'];
			$path_filename_ext3 = $target_dir.$filename.".".$ext;
			move_uploaded_file($temp_name,$path_filename_ext3);

			// $file_name4 =  rand()."-".$_FILES['file4']['name']; $file_tmp4 = $_FILES['file4']['tmp_name4'];
			// move_uploaded_file($file_tmp4,"./supporting_documents/".$file_name4);

			$target_dir = "documents/"; $file = $_FILES['file4']['name'];  $path = pathinfo($file);  $filename = rand()."-".$path['filename'];
			$ext = $path['extension']; $temp_name = $_FILES['file4']['tmp_name'];
			$path_filename_ext4 = $target_dir.$filename.".".$ext;
			move_uploaded_file($temp_name,$path_filename_ext4);

			// $file_name5 =  rand()."-".$_FILES['file5']['name']; $file_tmp1 = $_FILES['file5']['tmp_name5'];
			// move_uploaded_file($file_tmp5,"./supporting_documents/".$file_name5);

			$target_dir = "documents/"; $file = $_FILES['file5']['name'];  $path = pathinfo($file);  $filename = rand()."-".$path['filename'];
			$ext = $path['extension']; $temp_name = $_FILES['file5']['tmp_name'];
			$path_filename_ext5 = $target_dir.$filename.".".$ext;
			move_uploaded_file($temp_name,$path_filename_ext5);

			// $file_name6 =  rand()."-".$_FILES['file6']['name']; $file_tmp6 = $_FILES['file6']['tmp_name6'];
			// move_uploaded_file($file_tmp6,"./documents/".$file_name6);

			$target_dir = "documents/"; $file = $_FILES['file6']['name'];  $path = pathinfo($file);  $filename = rand()."-".$path['filename'];
			$ext = $path['extension']; $temp_name = $_FILES['file6']['tmp_name'];
			$path_filename_ext6 = $target_dir.$filename.".".$ext;
			move_uploaded_file($temp_name,$path_filename_ext6);

			// $file_name7 =  rand()."-".$_FILES['file7']['name']; $file_tmp7 = $_FILES['file7']['tmp_name7'];
			// move_uploaded_file($file_tmp7,"./documents/".$file_name7);

			$target_dir = "documents/"; $file = $_FILES['file7']['name'];  $path = pathinfo($file);  $filename = rand()."-".$path['filename'];
			$ext = $path['extension']; $temp_name = $_FILES['file7']['tmp_name'];
			$path_filename_ext7 = $target_dir.$filename.".".$ext;
			move_uploaded_file($temp_name,$path_filename_ext7);

			// $file_name8 =  rand()."-".$_FILES['file8']['name']; $file_tmp8 = $_FILES['file8']['tmp_name8'];
			// move_uploaded_file($file_tmp8,"./documents/".$file_name8);

			$target_dir = "documents/"; $file = $_FILES['file8']['name'];  $path = pathinfo($file);  $filename = rand()."-".$path['filename'];
			$ext = $path['extension']; $temp_name = $_FILES['file8']['tmp_name'];
			$path_filename_ext8 = $target_dir.$filename.".".$ext;
			move_uploaded_file($temp_name,$path_filename_ext8);

			// $file_name9 =  rand()."-".$_FILES['file9']['name']; $file_tmp9 = $_FILES['file9']['tmp_name9'];
			// move_uploaded_file($file_tmp9,"./documents/".$file_name9);

			$target_dir = "documents/"; $file = $_FILES['file9']['name'];  $path = pathinfo($file);  $filename = rand()."-".$path['filename'];
			$ext = $path['extension']; $temp_name = $_FILES['file9']['tmp_name'];
			$path_filename_ext9 = $target_dir.$filename.".".$ext;
			move_uploaded_file($temp_name,$path_filename_ext9);

			// $file_name10 =  rand()."-".$_FILES['file10']['name']; $file_tmp10 = $_FILES['file10']['tmp_name10'];
			// move_uploaded_file($file_tmp10,"./documents/".$file_name10);

			$target_dir = "documents/"; $file = $_FILES['file10']['name'];  $path = pathinfo($file);  $filename = rand()."-".$path['filename'];
			$ext = $path['extension']; $temp_name = $_FILES['file10']['tmp_name'];
			$path_filename_ext10 = $target_dir.$filename.".".$ext;
			move_uploaded_file($temp_name,$path_filename_ext10);

			// $file_name11 =  rand()."-".$_FILES['file11']['name']; $file_tmp11 = $_FILES['file11']['tmp_name11'];
			// move_uploaded_file($file_tmp11,"./documents/".$file_name11);

			$target_dir = "documents/"; $file = $_FILES['file11']['name'];  $path = pathinfo($file);  $filename = rand()."-".$path['filename'];
			$ext = $path['extension']; $temp_name = $_FILES['file11']['tmp_name'];
			$path_filename_ext11 = $target_dir.$filename.".".$ext;
			move_uploaded_file($temp_name,$path_filename_ext11);

			$sql4 = "INSERT INTO supporting_documents(email, invitation, full_paper, proof_of_acceptance, official_programme, 
			period_date, travelling_quotation, visa_cost, accommodation_costs, registration_fee, proof_of_dhet, proof_of_application) 
			VALUES('$email','$path_filename_ext1','$path_filename_ext2','$path_filename_ext3','$path_filename_ext4','$path_filename_ext5',
			'$path_filename_ext6','$path_filename_ext7','$path_filename_ext8','$path_filename_ext9','$path_filename_ext10','$path_filename_ext11')";
			$result4 = mysqli_query($conn, $sql4);
		}

		$status = "Waiting For HOD Approval";
		$sql5 = "INSERT INTO applications(names, email, statuss)
		VALUES('$name', '$email', '$status')";     $result5 = mysqli_query($conn, $sql5);

		if ($result1 && $result2 && $result3 && $result4 && $result5) { 
			$_SESSION['msg1'] = "Thank You!";
			$_SESSION['msg2'] = "Your application has been submitted successfully.";
			$_SESSION['msg3'] = "<script>location.href = 'apply.php?'</script>";
			echo"<script>location.href = 'thankyou.php?'</script>";
		}
		else { header("Location:  apply.php?error=Something Went Wrong !!! Please Try Again2"); exit(); }
	}
}

