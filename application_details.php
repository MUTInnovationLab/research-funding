<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="style.css" />
    <title>Application Details</title>
    <style>
        .input{
            height: 35px; 
            width: 29%; 
            display: inline;
            margin-top: 10px;
            margin-bottom: 10px;
            border: none; 
            border-radius: 10px;
            font-weight: bold;
        }

        .btn {
            float: right;
            background: #555;
            padding: 10px 15px;
            color: #fff;
            border-radius: 5px;
            margin-right: 10px;
            width: 20%;
            margin-top: 10px;
            margin-bottom: 10px;
            border: none;
        }

        .btn:hover, .btn1:hover{
            opacity: .7;
        }
        .error {
        background: #F2DEDE;
        color: #A94442;
        padding: 10px;
        width: 100%;
        border-radius: 5px;
        /* margin: 20px auto; */
        margin-top: 0px;
        }

        .success {
        background: #D4EDDA;
        color: #40754C;
        padding: 10px;
        width: 100%;
        border-radius: 5px;
        /* margin: 20px auto; */
        margin-top: 0px;
        }

        .table-container {
            height: auto;
            overflow-x: scroll;
            /* Enable vertical scrollbar */
        }

        .table-container2 {
            height: auto;
            overflow-x: scroll;
            /* Enable vertical scrollbar for the second table */
        }
        #sidebar-overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(255, 255, 255, 0.7); /* Semi-transparent white overlay */
        z-index: 2; /* Ensure the overlay is on top of the content */
    }
    .fullpage{
            height:100vh !important;

        }
    </style>
</head>
<?php
 session_start(); 
 include "conn.php";
 $currentUser = $_SESSION['currentUser'];
 if(empty($currentUser)) $currentUser = "Default User";
 $email = $_SESSION['application_id'];
?>

<body>
<form action="#" method="post" enctype="multipart/form-data" autocomplete="off">
    <div class="fullpage  d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-white" id="sidebar-wrapper">
            <!-- <button id="close-button"><i class="fas fa-times"></i></button> -->

                <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom">
                    <img src="img/mut.png" style="width:200px; height:100px;">
                </div>
                <div class="list-group list-group-flush my-3">

                    <a style="margin-top: -25px;" href="#" class="list-group-item list-group-item-action bg-transparent second-text"><i></i>Applications</a>
                    <a style="margin-top: -25px;" href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold active"><i>Application Details</i></a>
                    <a href="login.php" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i class="fas fa-power-off me-2"></i>Logout</a>
                </div>
            </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-align-left primary-text fs-4 me-3" id="menu"></i>
                        <h2 class="fs-2 m-0">Dashboard</h2>
                    </div>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item dropdown">
                                <i class="fas fa-user me-2"></i><b><?php echo $currentUser  ?></b>
                            </li>
                        </ul>
                    </div>
                </nav>

            <div class="container-fluid px-4">

                <div class="row my-5">
                    <?php
                    include "conn.php";
                    if(isset($_POST['btn_accept'])){
                        // ----------------------------------------------------------
                        function validate($data){
                            $data = trim($data);
                            $data = stripslashes($data);
                            $data = htmlspecialchars($data);
                            return $data;
                        }

                        $select1 = validate($_POST['select1']);     $select2 = validate($_POST['select2']);
                        $select3 = validate($_POST['select3']);     $select4 = validate($_POST['select4']);
                        $select5 = validate($_POST['select5']);     $select6 = validate($_POST['select6']);

                        $comment1 = validate($_POST['comment1']);       $comment2 = validate($_POST['comment2']);
                        $comment3 = validate($_POST['comment3']);       $comment4 = validate($_POST['comment4']);
                        $comment5 = validate($_POST['comment5']);       $comment6 = validate($_POST['comment6']);

                        if(empty($comment1)) $comment1 = "None";        if(empty($comment2)) $comment2 = "None";
                        if(empty($comment3)) $comment3 = "None";        if(empty($comment4)) $comment4 = "None";
                        if(empty($comment5)) $comment5 = "None";        if(empty($comment6)) $comment6 = "None";

                        $amount1 = validate($_POST['amount1']);       $amount2 = validate($_POST['amount2']);
                        $amount3 = validate($_POST['amount3']);       $amount4 = validate($_POST['amount4']);
                        $amount5 = validate($_POST['amount5']);       $amount6 = validate($_POST['amount6']);

                        if ($select1 == "No" || $select2 == "No" || $select3 == "No" || $select4 == "No" || $select5 == "No" || $select6 == "No")
		                {
                            //Display error message
                            // header("Location:  application_details.php?error=Something Went Wrong !!! Please Try Again"); exit();
                            echo "<script>alert('Please Accept All The Ammounts')</script>";
                        }else{
                            $sql3 = "SELECT * FROM budget_details WHERE email='$email'";
                              $result3 = $conn-> query($sql3);
                              if ($result3-> num_rows > 0){	
                                  while($row3 = $result3-> fetch_assoc()){
                                      $ticket = $row3['ticket'];
                                      $ticketComment = $row3['ticketComment'];
                                      $transportation = $row3['transportation'];
                                      $transportationComment = $row3['transportationComment'];
                                      $registration = $row3['registration'];
                                      $registrationComment = $row3['registrationComment'];
                                      $accommodation = $row3['accommodation'];
                                      $accommodationComment = $row3['accommodationComment'];
                                      $subsistence = $row3['subsistence'];
                                      $subsistenceComment = $row3['subsistenceComment'];
                                      $otherCosts = $row3['otherCosts'];
                                      $otherCostsComment = $row3['otherCostsComment'];
                                      $totalCost = $row3['totalCost'];
                                  }
                              }
                              //UPDATE BUDGET AND COMMENTS
                              if(empty($amount1)) $amount1 = $ticket;             if(empty($amount2)) $amount2 = $transportation;
                              if(empty($amount3)) $amount3 = $registration;       if(empty($amount4)) $amount4 = $accommodation;
                              if(empty($amount5)) $amount5 = $subsistence;        if(empty($amount6)) $amount6 = $otherCosts;
                              
                              $sql_update_budget = "UPDATE budget_details SET ticket = '$amount1', ticketComment = '$comment1',
                              transportation = '$amount2', transportationComment = '$comment2',
                              registration = '$amount3', registrationComment = '$comment3',
                              accommodation = '$amount4', accommodationComment = '$comment4',
                              subsistence = '$amount5', subsistenceComment = '$comment5',
                              otherCosts = '$amount6', otherCostsComment = '$comment6'
                               WHERE email = '$email' ";
                              $sql_result_budget = mysqli_query($conn, $sql_update_budget);
  
                              

                            $comments = $_POST['textarea'];
                            if(empty($comments)) $comments = "No Comments.";
                            $status = "Accepted By HOD. Waiting For Sfiso Approval";
                            $sql_update = "UPDATE applications SET statuss = '$status', comments = '$comments' WHERE email = '$email' ";
                            $sql_result = mysqli_query($conn, $sql_update);
                            if ($sql_result) {	
                                $sql = "SELECT * FROM personal_details WHERE email='$email'";
                                $result = $conn-> query($sql);
                                if ($result-> num_rows > 0){	
                                    if($row = $result-> fetch_assoc()){
                                        $title = $row['title'];
                                        $name = $title." ".$row['names'];
                                    }
                                }

                                $sql5 = "SELECT * FROM login_details WHERE role='2' AND statuss='Active'";
                                $result5 = $conn-> query($sql5);
                                if ($result5-> num_rows > 0){	
                                    while($row5 = $result5-> fetch_assoc()){
                                        $next_email = $row5['email'];
                                        $next_name = $row5['name'];
                                    }
                                }

                                $_SESSION['email_subject'] = "Research Funding Application";
                                $_SESSION['email_email'] = $next_email;
                                $_SESSION['email_body'] = "Dear $next_name<br><br>You have a new research funding application from $name, waiting for your recommendation.
                                <br><br>To view the application, please <a href='https://www.mut.ac.za/'>Click Here</a>
                                <br><br>Regards,<br>Research Funding Team";
                                $_SESSION['location'] = "<script>location.href = 'thankyou.php?'</script>";
                                // echo"<script>location.href = 'send_email.php?'</script>";
                                $_SESSION['msg1'] = "Thank You!";
                                $_SESSION['msg2'] = "Application has been recommended successfully.";
                                $_SESSION['msg3'] = "<script>location.href = 'applications.php?'</script>";
                                echo"<script>location.href = 'send_email.php?'</script>";
                            }
            // -------------------------------------------------------
                        }
                    }

                    if(isset($_POST['btn_reject'])){
                        $comments = $_POST['textarea'];
                        if(empty($comments)) $comments = "No Comments.";
                        $status = "Rejected On Stage 1";
                        $sql_update = "UPDATE applications SET statuss = '$status', comments3 = '$comments' WHERE email = '$email' ";
                        $sql_result = mysqli_query($conn, $sql_update);
                        if ($sql_result) {	
                            $sql = "SELECT * FROM personal_details WHERE email='$email'";
                            $result = $conn-> query($sql);
                            if ($result-> num_rows > 0){	
                                if($row = $result-> fetch_assoc()){
                                    $title = $row['title'];
                                    $name = $title." ".$row['names'];
                                }
                            }

                            $_SESSION['email_subject'] = "Research Funding Application";
                            $_SESSION['email_email'] = $email;
                            $_SESSION['email_body'] = "Dear $name<br><br>Thank you for taking your time to apply for research funding. 
                            Our team reviewed your application and reject to inform you that your application was unsuccessful.
                            However, further communication will be received from the research office.
                            <br><br>Comment made by our team:-<br>Comment: $comments
                            <br><br>Regards,<br>Research Funding Team";
                            $_SESSION['location'] = "<script>location.href = 'thankyou.php?'</script>";
                            // echo"<script>location.href = 'send_email.php?'</script>";
                            $_SESSION['msg1'] = "Thank You!";
                            $_SESSION['msg2'] = "Application has been rejected successfully.";
                            $_SESSION['msg3'] = "<script>location.href = 'applications.php?'</script>";
                            echo"<script>location.href = 'send_email.php?'</script>";
                          }
                    }

                    if(isset($_POST['btn_back'])){
                        echo"<script>location.href = 'applications.php?'</script>";
                    }

                    //FINDING CURRENT DATE AND TIME
                    $c_date = date("Y/m/d");
                    $c_time = date("h:i:sa");

                    include "conn.php";
                    $sql = "SELECT * FROM personal_details WHERE email='$email'";
                    $result = $conn-> query($sql);
                    if ($result-> num_rows > 0){	
                        if($row = $result-> fetch_assoc()){

                            $title = $row['title'];
                            $name = $title." ".$row['names'];
                            $staffNo = $row['staffNo'];
                            $qualification = $row['qualification'];
                            $email = $row['email'];
                            $tel = $row['tel'];
                            $cell = $row['cell'];
                            $department = $row['department'];

                            $sql2 = "SELECT * FROM conference_details WHERE email='$email'";
                            $result2 = $conn-> query($sql2);
                            if ($result2-> num_rows > 0){	
                                while($row2 = $result2-> fetch_assoc()){
                                    $subjects = $row2['subjects'];
                                    $venue = $row2['venue'];
                                    $host = $row2['host'];
                                    $duration = $row2['duration'];
                                    $titleOfPaper = $row2['titleOfPaper'];
                                    $coAuthers = $row2['coAuthers'];
                                    $otherFinancial = $row2['otherFinancial'];
                                    $amtReceived = $row2['amtReceived'];
                                }
                            }

                            

                            $sql3 = "SELECT * FROM budget_details WHERE email='$email'";
                            $result3 = $conn-> query($sql3);
                            if ($result3-> num_rows > 0){	
                                while($row3 = $result3-> fetch_assoc()){
                                    $ticket = $row3['ticket'];
                                    $ticketComment = $row3['ticketComment'];
                                    $transportation = $row3['transportation'];
                                    $transportationComment = $row3['transportationComment'];
                                    $registration = $row3['registration'];
                                    $registrationComment = $row3['registrationComment'];
                                    $accommodation = $row3['accommodation'];
                                    $accommodationComment = $row3['accommodationComment'];
                                    $subsistence = $row3['subsistence'];
                                    $subsistenceComment = $row3['subsistenceComment'];
                                    $otherCosts = $row3['otherCosts'];
                                    $otherCostsComment = $row3['otherCostsComment'];
                                    $totalCost = $row3['totalCost'];
                                }
                            }

                            $sql4 = "SELECT * FROM supporting_documents WHERE email='$email'";
                            $result4 = $conn-> query($sql4);
                            if ($result4-> num_rows > 0){	
                                while($row4 = $result4-> fetch_assoc()){
                                    $doc1 = $row4['invitation'];
                                    $doc2 = $row4['full_paper'];
                                    $doc3 = $row4['proof_of_acceptance'];
                                    $doc4 = $row4['official_programme'];
                                    $doc5 = $row4['period_date'];
                                    $doc6 = $row4['travelling_quotation'];
                                    $doc7 = $row4['visa_cost'];
                                    $doc8 = $row4['accommodation_costs'];
                                    $doc9 = $row4['registration_fee'];
                                    $doc10 = $row4['proof_of_dhet'];
                                    $doc11 = $row4['proof_of_application'];
                                }
                            }

                            $description1 = "Full Name\t\t\t\t\t\t\t: $name \nStaff Number\t\t\t\t\t\t\t: $staffNo \nHighest Qualification\t\t\t\t\t: $qualification".
                            "\nEmail Address\t\t\t\t\t\t\t: $email\nTel (Office)\t\t\t\t\t\t\t: $tel\nCell Number\t\t\t\t\t\t\t: $cell\nDepartment\t\t\t\t\t\t\t: $department";

                            $description2 = "Name / Subject of Congress\t\t\t\t: $subjects \nVenue\t\t\t\t\t\t\t\t: $venue \nHost of Congress\t\t\t\t\t\t: $host".
                            "\nDuration (Dates)\t\t\t\t\t\t: $duration\nTitle of Paper To Be Delivered\t\t\t\t: $titleOfPaper\nName(s) of Co-Auther(s)\t\t\t\t\t: $coAuthers".
                            "\nOther Financial Sources (e.g. NRF)\t\t\t: $otherFinancial\nAmt Received (Other Sources)\t\t\t: R$amtReceived";

                            $description3 = "Air Ticket (Return)\t\t\t\t\t\t: R$ticket ($ticketComment) \nGroup Transportation / Car Hire\t\t\t: R$transportation ($transportationComment)".
                            "\nRegistration Fee\t\t\t\t\t\t: R$registration ($registrationComment)\nAccommodation\t\t\t\t\t\t: R$accommodation ($accommodationComment)\nSubsistence\t\t\t\t\t\t\t: R$subsistence ($subsistenceComment)".
                            "\nOther Costs (Specify)\t\t\t\t\t: R$otherCosts ($otherCostsComment)\nTotal Costs\t\t\t\t\t\t\t: R$totalCost";

                            echo "<div class='content' style='border: 1px solid; border-radius: 10px; margin-bottom:10px;'>";
                            echo "<h4 style='text-align:center; margin-top:10px;'>Application Details</h4>";
                            echo "<textarea type='text' id='textarea' rows='18' cols='50' class='table bg-white rounded shadow-sm  table-hover'
                            style='width: 100%; margin-top: 10px; display: inline;' placeholder='$description1\n\n$description2' disabled></textarea>";

                            // ------------------------------------------------------------
                            echo "<h4 style='text-align:center; margin-bottom:20px;'>Budget</h4>";
                            echo "<div class='table-container scrollable-table'>";
                            // if (isset($_GET['error'])) {  echo "<p class='error'>Please Accept All The Ammounts</p>"; }
                            echo "<table class='table bg-white rounded shadow-sm  table-hover'>";
                            echo "<thead>";
                            echo "<tr>";
                            echo "<th scope='col' width='50'>No</th>";
                            echo "<th scope='col'>Description</th>";
                            echo "<th scope='col'>Amount</th>";
                            echo "<th scope='col'>Update Amount</th>";
                            echo "<th scope='col'>Comment</th>";
                            echo "<th scope='col'>Accept Amount</th>";
                            echo "</tr>";
                            echo "</thead>";
                            echo "<tbody>";

                            echo "<tr>";  echo "<th scope='row'>1</th>";  echo "<td>Air Ticket (Return)</td>"; 
                            echo "<td>R$ticket</td>"; 
                            echo "<td><input type='number' name='amount1' style='width:50%; height:25px;' placeholder='$ticket'></td>";
                            echo "<td><input type='text' name='comment1' style='width:100%; height:25px;'></td>";
                            echo "<td><select name='select1' style='width:100%;'><option value='No'>No</option>  <option value='Yes'>Yes</option></select></td>";

                            echo "<tr>";  echo "<th scope='row'>2</th>";  echo "<td>Group Transportation / Car Hire</td>"; 
                            echo "<td>R$transportation</td>"; 
                            echo "<td><input type='number' name='amount2' style='width:50%; height:25px;' placeholder='$transportation'></td>";
                            echo "<td><input type='text' name='comment2' style='width:100%; height:25px;'></td>";
                            echo "<td><select name='select2' style='width:100%;'><option value='No'>No</option>  <option value='Yes'>Yes</option></select></td>";

                            echo "<tr>";  echo "<th scope='row'>3</th>";  echo "<td>Registration Fee</td>"; 
                            echo "<td>R$registration</td>"; 
                            echo "<td><input type='number' name='amount3' style='width:50%; height:25px;' placeholder='$registration'></td>";
                            echo "<td><input type='text' name='comment3' style='width:100%; height:25px;'></td>";
                            echo "<td><select name='select3' style='width:100%;'><option value='No'>No</option>  <option value='Yes'>Yes</option></select></td>"; 

                            echo "<tr>";  echo "<th scope='row'>4</th>";  echo "<td>Accommodation</td>"; 
                            echo "<td>R$accommodation</td>"; 
                            echo "<td><input type='number' name='amount4' style='width:50%; height:25px;' placeholder='$accommodation'></td>";
                            echo "<td><input type='text' name='comment4' style='width:100%; height:25px;'></td>";
                            echo "<td><select name='select4' style='width:100%;'><option value='No'>No</option>  <option value='Yes'>Yes</option></select></td>"; 
                            
                            echo "<tr>";  echo "<th scope='row'>5</th>";  echo "<td>Subsistence</td>"; 
                            echo "<td>R$subsistence</td>"; 
                            echo "<td><input type='number' name='amount5' style='width:50%; height:25px;' placeholder='$subsistence'></td>";
                            echo "<td><input type='text' name='comment5' style='width:100%; height:25px;'></td>";
                            echo "<td><select name='select5' style='width:100%;'><option value='No'>No</option>  <option value='Yes'>Yes</option></select></td>"; 

                            echo "<tr>";  echo "<th scope='row'>6</th>";  echo "<td>Other Costs (Specify)</td>"; 
                            echo "<td>R$otherCosts</td>"; 
                            echo "<td><input type='number' name='amount6' style='width:50%; height:25px;' placeholder='$otherCosts'></td>";
                            echo "<td><input type='text' name='comment6' style='width:100%; height:25px;'></td>";
                            echo "<td><select name='select6' style='width:100%;'><option value='No'>No</option>  <option value='Yes'>Yes</option></select></td>"; 

                            echo "<tr>";  echo "<th scope='row'>7</th>";  echo "<td>Total Costs</td>"; 
                            echo "<td>R$totalCost</td>"; 
                            echo "<td><input type='number' name='amount' style='width:50%; height:25px;' placeholder='None' disabled></td>";
                            echo "<td><input type='text' name='comment' style='width:100%; height:25px;' placeholder='None' disabled></td>";
                            echo "<td><input type='text' name='comment' style='width:100%; height:25px;' placeholder='None' disabled></td>";
                            // echo "<td><select name='select7' style='width:100%;'><option value='No'>No</option>  <option value='Yes'>Yes</option></select></td>"; 


                            echo "</tr>";
                            echo "</tbody>";
                            echo "</table>";
                            echo "</div>";
                            // ------------------------------------------------------------
                            echo "</div>";




                            echo "<h4 style='text-align:center; margin-bottom:20px;'>Supporting Documents</h4>";
                            echo "<table class='table bg-white rounded shadow-sm  table-hover'>";
                            echo "<thead>";
                            echo "<tr>";
                            echo "<th scope='col' width='50'>No</th>";
                            echo "<th scope='col'>Document Title</th>";
                            echo "<th scope='col'>View Document</th>";
                            echo "</tr>";
                            echo "</thead>";
                            echo "<tbody>";

                            echo "<tr>";  echo "<th scope='row'>1</th>";  echo "<td>Announcement of or invitation to congress</td>"; 
                            echo "<td><a href='$doc1' target='_blank';'>Download</td>";

                            echo "<tr>";  echo "<th scope='row'>2</th>";  echo "<td>Copy of the full paper to be presented at International Conference</td>"; 
                            echo "<td><a href='$doc2' target='_blank';'>Download</td>";

                            echo "<tr>";  echo "<th scope='row'>3</th>";  echo "<td>Documentary proof of acceptance of the paper to be presented</td>"; 
                            echo "<td><a href='$doc3' target='_blank';'>Download</td>";

                            echo "<tr>";  echo "<th scope='row'>4</th>";  echo "<td>Details of official programme of congress</td>"; 
                            echo "<td><a href='$doc4' target='_blank';'>Download</td>";

                            echo "<tr>";  echo "<th scope='row'>5</th>";  echo "<td>A detailed itinerary for the period from date of departure to date of return</td>"; 
                            echo "<td><a href='$doc5' target='_blank';'>Download</td>";

                            echo "<tr>";  echo "<th scope='row'>6</th>";  echo "<td>Travelling Costs: (a) Written quotation from a recognised travel agency indicating the economy and return air fare</td>"; 
                            echo "<td><a href='$doc6' target='_blank';'>Download</td>";

                            echo "<tr>";  echo "<th scope='row'>7</th>";  echo "<td>Travelling Costs: (b) Documentary evidence of Visa costs</td>"; 
                            echo "<td><a href='$doc7' target='_blank';'>Download</td>";

                            echo "<tr>";  echo "<th scope='row'>8</th>";  echo "<td>Documentary evidence of accommodation costs</td>"; 
                            echo "<td><a href='$doc8' target='_blank';'>Download</td>";

                            echo "<tr>";  echo "<th scope='row'>9</th>";  echo "<td>Documentary evidence of the registration fee involved</td>"; 
                            echo "<td><a href='$doc9' target='_blank';'>Download</td>";

                            echo "<tr>";  echo "<th scope='row'>10</th>";  echo "<td>Proof of DHET approved output since the previous conference grant</td>"; 
                            echo "<td><a href='$doc10' target='_blank';'>Download</td>";

                            echo "<tr>";  echo "<th scope='row'>11</th>";  echo "<td>Proof of application for external funding</td>"; 
                            echo "<td><a href='$doc11' target='_blank';'>Download</td>";

                            echo "</tr>";
                            echo "</tbody>";
                            echo "<table>";

                            echo "<textarea type='text' name='textarea' rows='5' cols='50' class='table bg-white rounded shadow-sm  table-hover'
                            style='width: 100%; margin-top: 10px; display: inline;' placeholder='Recommendations / Comments'></textarea>";

                            echo "<button type='submit' value='videoID' name='btn_accept' class='btn'  
                            style='height: 40px; border: none; width:32%; margin-right:15px;'>Recommend</button>";
                            echo "<button type='submit' value='videoID' name='btn_reject' class='btn'  
                            style='height: 40px; border: none; width:32%; margin-right:15px;'>Reject</button>";
                            echo "<button type='submit' name='btn_back' class='btn'  
                            style='height: 40px; border: none; width:32%; margin-right:11px;'>Back</button>";
                            echo "</div>";
                            }	
                        } else{
                            echo "<div class='content' style='border: 1px solid; border-radius: 10px;'>";
                            echo "<p class='error' style='margin-top: 10px' >No Record Found!!!</p>";
                            echo "</div>";
                        }
                        $conn-> close();
                    ?>
                </div>
            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };

        document.body.addEventListener('click', function(event) {
        var menu = document.getElementById('menu'); // Assuming your menu has an id 'menu'

        // Check if the click target is outside the menu and the menu is currently open
        if (!menu.contains(event.target) && el.classList.contains("toggled")) {
            el.classList.remove("toggled"); // Close the menu
        }
    });
    </script>
    </form>
</body>

</html>