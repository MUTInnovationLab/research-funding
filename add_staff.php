<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="style.css" />
    <title>Add Staff</title>
    <link rel="icon" href="research.png" type="image/png">
<!-- <meta name="description" content="Our platform facilitates research funding by providing an easy-to-use application process for individuals and organizations seeking financial support for their projects. We aim to streamline the funding application process, making it more accessible and efficient for researchers to obtain the necessary resources to advance their work."> -->

    <style>

        body{
            font-family: 'Roboto', sans-serif;
            font-size: 16px;
            color: #333;
        }
        .input, .inputSelect {
            display: block;
            border: 2px solid #ccc;
            width: 95%;
            padding: 10px;
            margin-left: 10px;
            margin-right: 10px;
            height: 44px;
            border-radius: 5px;
        }
        label {
            font-size: 16px;
            margin-left: 10px;
        }

        .btn1 {
            float: right;
            background: #555;
            padding: 10px 15px;
            color: #fff;
            border-radius: 5px;
            margin-right: 10px;
            width: 50px;
            margin-top: 10px;
            margin-bottom: 10px;
            border: none;
            text-align: center;
        }

        .btn2 {
            float: right;
            background: #555;
            color: #fff;
            border-radius: 5px;
            width: 100%;
            border: none;
            height: 35px;
        }

        .btn {
            float: right;
            background: #555;
    
            color: #fff;
            border-radius: 5px;
            margin-right: 10px;
            width: 80px;
            margin-top: 10px;
            margin-bottom: 10px;
            border: none;
            text-align:center ;
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
        .inputSelect:focus {
            width:auto ;
        }
        .fullpage{
            height:100% !important;

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
 $c_email = $_SESSION['c_email'];


 if(isset($_POST['btn_submit'])){
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
        
    $name = validate($_POST['name']);							
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);
    $cpassword = validate($_POST['cpassword']);
    $role = validate($_POST['role']);
    // $snumber = validate($_POST['snumber']);

    
    
    //IF IT EMPTY, DISPLAY ERROR MESSAGE
     $sql1 = "SELECT * FROM login_details WHERE email='$email'";
     $result1 = $conn-> query($sql1);
     if ($result1-> num_rows > 0){	
        header("Location: admin.php?error=User Already Exist!!!."); exit(); 
        header("Location: add_staff.php?error=All Fields Are Required !!! Please Try Again."); exit();   
     }else{
        if (empty($name) || empty($email) || empty($password) || empty($cpassword) || empty($role)){
            header("Location: add_staff.php?error=User Already Exist!!!."); exit();  
        }else if($password != $cpassword){
            header("Location: add_staff.php?error=Staff Number Does Not Match !!! Please Try Again."); exit(); 
        }else{
            $otp = rand();
            $_SESSION['staff_name'] = $name;
            $_SESSION['staff_email'] = $email;
            $_SESSION['staff_password'] = $password;
            $_SESSION['staff_role'] = $role;
            $_SESSION['staff_otp'] = $otp;
            $_SESSION['location'] = "<script>location.href = 'add_staff_otp.php?'</script>";

            $_SESSION['email_subject'] = "OTP Activation Code";
            $_SESSION['email_email'] = $email;
            $_SESSION['email_body'] = "Your OTP activation code is - $otp<br><br>Kindly Regards<br>Research Fund System.";

            echo"<script>location.href = 'send_email.php?'</script>";
        }
        }
     }
    
     if(isset($_POST['btn_update'])){
        $_SESSION['update_id'] = $_POST['btn_update'];
        echo"<script>location.href = 'update_role.php?'</script>";
    }
    
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
                <a style="margin-top: -25px;" href="applications2.php" class="list-group-item list-group-item-action bg-transparent second-text"><i
                    ></i>Applications</a>
                <a style="margin-top: -25px;" href="#" class="list-group-item list-group-item-action bg-transparent second-text"><i
                    ></i>Application Details</a>
                <a style="margin-top: -25px;" href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold active"><i
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
                    $sql = "SELECT * FROM login_details WHERE email!='$c_email'";
                    $result = $conn-> query($sql);
                    echo "<h4 style='text-align:center; margin-bottom:20px;'>Existing Staff Members</h4>";
                    if ($result-> num_rows > 0){	
                        echo "<div class='table-container scrollable-table'>";
                        echo "<table class='table bg-white rounded shadow-sm  table-hover'>";
                        echo "<thead>";
                        echo "<tr>";
                        echo "<th scope='col' width='50'>No</th>";
                        echo "<th scope='col'>Full Name</th>";
                        echo "<th scope='col'>Email Address</th>";
                        echo "<th scope='col'>Role</th>";
                        echo "<th scope='col'>Status</th>";
                        echo "<th scope='col'>Update Role</th>";
                        echo "</tr>";
                        echo "</thead>";
                        echo "<tbody>";
                        $count = 0;
                        while($row = $result-> fetch_assoc()){
                            $name = $row['name'];
                            $status = $row['statuss'];
                            $email = $row['email'];
                            $role_status = $row['role'];
                            $count = $count + 1;
                            if($role_status == "1") $role = "Stage 1";
                            else if($role_status == "2") $role = "Stage 2";
                            else if($role_status == "3") $role = "Stage 3 - Admin";

                            echo "<tr>";  echo "<th scope='row'>$count</th>";  echo "<td><b>$name</b></td>"; 
                            echo "<th scope='row'>$email</th>";
                            echo "<th scope='row'>$role</th>";
                            echo "<th scope='row'>$status</th>";
                            echo "<td><button type='submit' class='btn2' value='$email' name='btn_update'>Update</button></td>";
                            echo "</tr>";   
                            }
                            echo "</tbody>";   echo "</table>";   echo "</div>";  echo "</div>";
                        } else{
                            echo "<div class='content' style='border: 1px solid; border-radius: 10px;'>";
                            echo "<p class='error' style='margin-top: 10px' >No Records Found!!!</p>";
                            echo "</div>";
                        }
                        ?>
                <h3 class="fs-4 mb-3">Add Staff Member</h3>
                <div class="content" style="border: 1px solid; width: 98%; margin-left: 10px; border-radius: 10px; margin-top: 5px;"><br>
                <!-- --------------------------------DISPLAY ERROR AND SUCCESS MESSAGE-------------------------------- -->
                <?php if (isset($_GET['error'])) { ?>
                    <p class="error"><?php echo $_GET['error']; ?></p>
                <?php } ?>
                <?php if (isset($_GET['success'])) { ?>
                    <p class="success"><?php echo $_GET['success']; ?></p>
                <?php } ?>

                <label style="margin-top: 10px;"><b>Full Name(s)</b></label>
                <input type="text" class="input" name="name" placeholder="Full Name(s)"></input>
                <label style="margin-top: 10px;"><b>Email Address</b></label>
                <input type="email" class="input" name="email" placeholder="Email Address"></input>
                <label style="margin-top: 10px;"><b>Staff Number</b></label>
                <input type="password" class="input" name="password" placeholder="Staff Number"></input>
                <label style="margin-top: 10px;"><b>Confirm Staff Number</b></label>
                <input type="password" class="input" name="cpassword" placeholder="Confirm Staff Number"></input>
                <label style="margin-top: 10px;"><b>Role</b></label>
                <select name='role' class='inputSelect'>
                <option value='1'>Stage 1</option> <option value='2'>Stage 2</option>   <option value="3">Admin</option>
                </select>
                <label></label>
                <br>
                
                <!-- <a type="submit" class="btn" href="dashboard.php">Back</a> -->
                </div>
                <button type="submit" class="btn" name="btn_submit">Submit</button>
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