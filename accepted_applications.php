<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="style.css" />
    <title>Accepted Applications</title>
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
            color: #fff;
            border-radius: 5px;
            margin-right: 10px;
            width: 100%;
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
 $email = $_SESSION['accepted_id'];
?>

<body>
<form action="#" method="post" enctype="multipart/form-data" autocomplete="off">
    <div class="fullpage d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom">
            <img src="img/mut.png" style="width:200px; height:100px;"></i></div>
            <div class="list-group list-group-flush my-3">
                <!-- ------------------------------------------------------------------------------------------ -->
                <a style="margin-top: -25px;" href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold active"><i
                    ></i>Applications</a>
                <a style="margin-top: -25px;" href="#" class="list-group-item list-group-item-action bg-transparent second-text"><i
                    ></i>Application Details</a>
                <a style="margin-top: -25px;" href="add_staff.php" class="list-group-item list-group-item-action bg-transparent second-text"><i
                    ></i>Add Staff</a>
                <!-- ------------------------------------------------------------------------------------------ -->
                <a href="login.php" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i
                        class="fas fa-power-off me-2"></i>Logout</a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Dashboard</h2>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
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
                        $comments = $_POST['textarea'];
                        if(empty($comments)) $comments = "No Comments.";
                        $status = "Approved";
                        $sql_update = "UPDATE applications SET statuss = '$status', comments3 = '$comments' WHERE email = '$email' ";
                        $sql_result = mysqli_query($conn, $sql_update);
                        if ($sql_result) {	
                            $_SESSION['msg1'] = "Thank You!";
                            $_SESSION['msg2'] = "Application has been approved successfully.";
                            $_SESSION['msg3'] = "<script>location.href = 'applications2.php?'</script>";
                            echo"<script>location.href = 'thankyou.php?'</script>";
                          }
                    }

                    if(isset($_POST['btn_partial'])){
                        $comments = $_POST['textarea'];
                        if(empty($comments)) $comments = "No Comments.";
                        $status = "Partially Approved";
                        $sql_update = "UPDATE applications SET statuss = '$status', comments3 = '$comments' WHERE email = '$email' ";
                        $sql_result = mysqli_query($conn, $sql_update);
                        if ($sql_result) {	
                            $_SESSION['msg1'] = "Thank You!";
                            $_SESSION['msg2'] = "Application has been partially approved successfully.";
                            $_SESSION['msg3'] = "<script>location.href = 'applications2.php?'</script>";
                            echo"<script>location.href = 'thankyou.php?'</script>";
                          }
                    }

                    if(isset($_POST['btn_deferred'])){
                        $comments = $_POST['textarea'];
                        if(empty($comments)) $comments = "No Comments.";
                        $status = "Deferred";
                        $sql_update = "UPDATE applications SET statuss = '$status', comments3 = '$comments' WHERE email = '$email' ";
                        $sql_result = mysqli_query($conn, $sql_update);
                        if ($sql_result) {	
                            $_SESSION['msg1'] = "Thank You!";
                            $_SESSION['msg2'] = "Application has been deferred successfully.";
                            $_SESSION['msg3'] = "<script>location.href = 'applications2.php?'</script>";
                            echo"<script>location.href = 'thankyou.php?'</script>";
                          }
                    }



                    if(isset($_POST['btn_back'])){
                        echo"<script>location.href = 'applications2.php?'</script>";
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

                            $sql5 = "SELECT * FROM applications WHERE email='$email'";
                            $result5 = $conn-> query($sql5);
                            if ($result5-> num_rows > 0){	
                                while($row5 = $result5-> fetch_assoc()){
                                    $comments = $row5['comments'];
                                    $comments2 = $row5['comments2'];
                                    $comments3 = $row5['comments3'];
                                    // exit;
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

                            $description4 = "HOD Comments\t\t\t\t\t\t: $comments\nMr Qwabe Comments\t\t\t\t\t: $comments2\nFinal Comments\t\t\t\t\t\t: $comments3";

                            echo "<div class='content' style='border: 1px solid; border-radius: 10px; margin-bottom:10px;'>";
                            echo "<h4 style='text-align:center; margin-top:10px;'>Application Details</h4>";
                            echo "<textarea type='text' id='textarea' rows='33' cols='50' class='table bg-white rounded shadow-sm  table-hover'
                            style='width: 100%; margin-top: 10px; display: inline;' placeholder='$description1\n\n$description2\n\n$description3 
                            \n$description4' disabled></textarea>";

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

                            $doc = "supporting_documents/303600654-AWS Lambda Foundations.pdf";

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
                                                        
                            echo "<button type='submit' name='btn_back' class='btn'  
                            style='height: 40px; border: none; width:28%; margin-right:20px;'>Back</button>";
                            echo "<br>";
                            echo "<br>";
                            echo "<br>";
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
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };

        document.body.addEventListener('click', function(event) {
        var menu = document.getElementById('menu-toggle'); // Assuming your menu has an id 'menu'

        // Check if the click target is outside the menu and the menu is currently open
        if (!menu.contains(event.target) && el.classList.contains("toggled")) {
            el.classList.remove("toggled"); // Close the menu
        }
    });
    </script>
    </form>
</body>

</html>