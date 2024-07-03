<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="tableScroll.css" />
    <title>Applications</title>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            font-size: 16px;
            color: #333;
           
        }

        h2 {
            color: #555;
        }

        .input {
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

        .btn:hover,
        .btn1:hover {
            opacity: .7;
        }

        .error {
            background: #F2DEDE;
            color: #A94442;
            padding: 10px;
            width: 100%;
            border-radius: 5px;
            margin-top: 0px;
        }

        .success {
            background: #D4EDDA;
            color: #40754C;
            padding: 10px;
            width: 100%;
            border-radius: 5px;
            margin-top: 0px;
        }

        .table-container,
        .table-container2 {
            height: auto;
            overflow-x: scroll;
        }
        .fullpage{
            height:100% !important;

        }
        #sidebar-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.7);
            z-index: 2;
        }
        .table-container,.table-container2{
          max-height: 450px;
        }
    </style>
</head>
<?php
session_start();
include "conn.php";
 // Redirect to login if not logged in or session timed out
if (!isset($_SESSION['currentUser']) || (time() - $_SESSION['last_activity']) > 1800) {
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit();
}

$_SESSION['last_activity'] = time(); // Update last activity time

// Page content...
$currentUser = $_SESSION['currentUser'];
if (empty($currentUser)) $currentUser = "Default User";

?>

<body>
    <form action="#" method="post" enctype="multipart/form-data" autocomplete="off">
        <div  class="fullpage d-flex" id="wrapper">
            <!-- Sidebar -->
            <div class="bg-white" id="sidebar-wrapper">
            <!-- <button id="close-button"><i class="fas fa-times"></i></button> -->

                <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom">
                    <img src="img/mut.png" style="width:200px; height:100px;">
                </div>
                <div class="list-group list-group-flush my-3">
                    <a style="margin-top: -25px;" href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold active"><i></i>Applications</a>
                    <a style="margin-top: -25px;" href="#" class="list-group-item list-group-item-action bg-transparent second-text"><i></i>Application Details</a>
                    <a href="login.php" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i class="fas fa-power-off me-2"></i>Logout</a>
                </div>
            </div>

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
                        if (isset($_POST['btn_view'])) {
                            $application_id = $_POST['btn_view'];
                            $_SESSION['application_id'] = $application_id;
                            echo "<script>location.href = 'application_details1.php?'</script>";
                        }

                        $c_date = date("Y/m/d");
                        $c_time = date("h:i:sa");

                        include "conn.php";
                        $sql = "SELECT * FROM applications WHERE statuss='Accepted By HOD. Waiting For Sfiso Approval'";
                        $result = $conn->query($sql);
                        echo "<h4 style='text-align:center; margin-bottom:20px;'>Applications Waiting For Your Approval</h4>";
                        if ($result->num_rows > 0) {
                            echo "<div class='table-container scrollable-table'>"; // new
                            echo "<table class='table bg-white rounded shadow-sm  table-hover'>";
                            echo "<thead>";
                            echo "<tr>";
                            echo "<th scope='col' width='50'>No</th>";
                            echo "<th scope='col'>Full Name</th>";
                            echo "<th scope='col'>Email Address</th>";
                            echo "<th scope='col'>Department</th>";
                            echo "<th scope='col'>View Application</th>";
                            echo "</tr>";
                            echo "</thead>";
                            echo "<tbody>";
                            $count = 0;
                            while ($row = $result->fetch_assoc()) {
                                $name = $row['names'];
                                $email = $row['email'];
                                $sql9 = "SELECT department FROM personal_details WHERE email='$email'";
                                $result9 = $conn->query($sql9);
                                while ($row9 = $result9->fetch_assoc()) {
                                    $department = $row9['department'];
                                }
                                $count = $count + 1;

                                $doc = "supporting_documents/303600654-AWS Lambda Foundations.pdf";
                                echo "<tr>";
                                echo "<th scope='row'>$count</th>";
                                echo "<td><b>$name</b></td>";
                                echo "<th scope='row'>$email</th>";
                                echo "<th scope='row'>$department</th>";
                                echo "<td><button type='submit' class='btn' value='$email' name='btn_view'>View</button></td>";
                                echo "</tr>";
                            }
                            echo "</tbody>";
                            echo "</table>";
                            echo "</div>";
                        } else {
                            echo "<div class='content' style='border: 1px solid; border-radius: 10px;'>";
                            echo "<p class='error' style='margin-top: 10px' >No Records Found!!!</p>";
                            echo "</div>";
                        }

                        $sql = "SELECT * FROM applications WHERE statuss='Waiting For Final Approval'";
                        $result = $conn->query($sql);
                        echo "<hr style='margin-top:20px;'>";
                        echo "<h4 style='text-align:center; margin-bottom:20px;'>Accepted Applications Waiting For Next Approval</h4>";
                        if ($result->num_rows > 0) {
                            echo "<div class='table-container2 scrollable-table'>"; // new	
                            echo "<table class='table bg-white rounded shadow-sm  table-hover'>";
                            echo "<thead>";
                            echo "<tr>";
                            echo "<th scope='col' width='50'>No</th>";
                            echo "<th scope='col'>Full Name</th>";
                            echo "<th scope='col'>Email Address</th>";
                            echo "<th scope='col'>Department</th>";
                            echo "<th scope='col'>Status</th>";
                            echo "</tr>";
                            echo "</thead>";
                            echo "<tbody>";
                            $count = 0;
                            while ($row = $result->fetch_assoc()) {
                                $name = $row['names'];
                                $email = $row['email'];
                                $status = $row['statuss'];
                                if ($status == "Waiting For Final Approval") {
                                    $status = "Waiting For Final Approval";
                                }
                                $sql9 = "SELECT department FROM personal_details WHERE email='$email'";
                                $result9 = $conn->query($sql9);
                                while ($row9 = $result9->fetch_assoc()) {
                                    $department = $row9['department'];
                                }
                                $count = $count + 1;

                                $doc = "supporting_documents/303600654-AWS Lambda Foundations.pdf";
                                echo "<tr>";
                                echo "<th scope='row'>$count</th>";
                                echo "<td><b>$name</b></td>";
                                echo "<th scope='row'>$email</th>";
                                echo "<th scope='row'>$department</th>";
                                echo "<th scope='row'>$status</th>";
                                echo "</tr>";
                            }
                            echo "</tbody>";
                            echo "</table>";
                            echo "</div>";
                        } else {
                            echo "<div class='content' style='border: 1px solid; border-radius: 10px;'>";
                            echo "<p class='error' style='margin-top: 10px' >No Records Found!!!</p>";
                            echo "</div>";
                        }
                        $conn->close();
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
       <!-- //closing menu when you click a body (menu) must be the same name you wrote in the id. -->
       <script>
    var el = document.getElementById("wrapper");
    var toggleButton = document.getElementById("menu");

    toggleButton.onclick = function() {
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


<!-- <div id="sidebar-overlay"></div> -->
    </form>
</body>

</html>
