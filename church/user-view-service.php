<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="styles.css" />
    <title>View Service</title>
    <style>
        .input{
            height: 40px; 
            width: 48%; 
            margin-left: 10px; 
            display: inline;
            margin-top: 10px;
            border: none; 
            border-radius: 10px;
            font-weight: bold;
        }
        .lebel{
            margin-top: 10px;
            border: none; 
            font-weight: bold;
        }
        .error {
        background: #F2DEDE;
        color: #A94442;
        padding: 10px;
        width: 95%;
        border-radius: 5px;
        margin: 20px auto;
        }
        .success {
        background: #D4EDDA;
        color: #40754C;
        padding: 10px;
        width: 95%;
        border-radius: 5px;
        margin: 20px auto;
        }
        .btn{
            height: 35px; 
            width: 11%; 
            display: inline;
            margin-bottom: 10px;
            border: none; 
            border-radius: 10px;
            font-weight: bold;
            background-color: white;
        }
    </style>
</head>
<?php
 session_start(); 
 include "conn.php";
 $name = $_SESSION['currentUser_name'];
 $surname = $_SESSION['currentUser_surname'];
 $branchID = $_SESSION['branchID'];
 $currentUser = $name .' '. $surname;
?>
 <!-- -------------------------COUNT ACTIVE USERS---------------------------------- -->
 <?php          
    include "conn.php";                          $user_count = 0;
    $sql = "SELECT * FROM churchservice WHERE branchID='$branchID'";        $result = $conn-> query($sql);
    if($result-> num_rows > 0){    while($row = $result-> fetch_assoc()){  $user_count++;  }  }
    $conn-> close();
?>
 <!-- -------------------------COUNT BRANCHES---------------------------------- -->
 <?php          
    include "conn.php";                     $count_branch = 0;
    $sql = "SELECT * FROM branch WHERE branchID='$branchID'";        $result = $conn-> query($sql);
    if($result-> num_rows > 0){    while($row = $result-> fetch_assoc()){  $branchName = $row['branchName'];  }  }
    $conn-> close();
?>
<body>
<form action="#" method="post" enctype="multipart/form-data" autocomplete="off">
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom">
            <img src="img/logo.png" style="width:50px; height:50px;"></i><br>Inqola</div>
            <div class="list-group list-group-flush my-3">
                <a style="margin-top: -25px;" href="user-view-announcements.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                    ></i>View Announcements</a>
                <a style="margin-top: -25px;" href="user-view-videos.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                    ></i>View Videos</a>
                <a style="margin-top: -25px;" href="#" class="list-group-item list-group-item-action bg-transparent second-text active"><i
                    ></i>View Church Service</a>
                <a style="margin-top: -25px;" href="user-report-evangelism.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                    ></i>Report On Evangelism</a>
                                
                <!-- ------------------------------------------------------------------------------------------ -->
                <a href="login.php" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i
                        class="fas fa-power-off me-2"></i>Logout</a>
            </div>
        </div>

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
                            <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user me-2"></i><?php echo $currentUser  ?>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <!-- <li><a class="dropdown-item" href="#">Profile</a></li> -->
                                <li><a class="dropdown-item" href="login.php">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="container-fluid px-4">
                <div class="row g-3 my-2">
                    <div class="col-md-3" style="width:50%;">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2"><?php echo $user_count  ?> Services Found</h3>
                                <!-- <p class="fs-5">Users</p> -->
                            </div>
                            <i class="fas fa-chart-line fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>
                    <div class="col-md-3" style="width:50%;">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2"><?php echo $branchName  ?></h3>
                                <!-- <p class="fs-5">Branches</p> -->
                            </div>
                            <i class="fas fa-chart-line fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>
                </div>

                <div class="row my-5">
                    <!----------------------------Display error and success message------------------------------>
                    <?php if (isset($_GET['error'])) { ?>
                        <p class="error"><?php echo $_GET['error']; ?></p>
                    <?php } ?>
                    <?php if (isset($_GET['success'])) { ?>
                        <p class="success"><?php echo $_GET['success']; ?></p>
                    <?php } ?>

                    <h3 class="fs-4 mb-3">View Service</h3>
                    <!-- -------------------------SELECT BRANCH---------------------------------- -->
                    <?php    
                    
                    if(isset($_POST['btn_join'])) {
                        $url = $_POST['btn_join'];
                        echo "<a href='https://www.w3schools.com/'>Visit W3Schools.com!</a>";
                    }
                    // SEARCH BY BRANCH
                    if(isset($_POST['btn_delete'])) {
                        include "conn.php";
                        $id = $_POST['btn_delete'];
                        $sql = "DELETE FROM churchservice WHERE serviceID=$id";
                        if ($conn->query($sql) === TRUE) {
                            $sql = "DELETE FROM videos WHERE serviceID=$id";
                            if ($conn->query($sql) === TRUE) { echo "<p class='success' style='width: 98%; margin-left:10px; margin-top:0px; margin-bottom:10px;'>Service Deleted Successfully</p>";  }  
                        }else  echo "<p class='error' style='width: 98%; margin-left:10px; margin-top:0px; margin-bottom:10px;'>Somthing Went Wrong!!!</p>";
                            $conn->close();
                        }

                    $check = "0";
                    $sql = "SELECT * FROM churchservice WHERE branchID='$branchID'";
                    ?>
                    <div class="col">
                    <table class="table bg-white rounded shadow-sm  table-hover" style="margin-top:10px;">
                        <thead>
                            <tr>
                                <th scope="col" width="50">#</th>
                                <th scope="col">BRANCH NAME</th>
                                <th scope="col">DATE</th>
                                <th scope="col">TIME</th>
                                <th scope="col">DESCRIPTION</th>
                                <th scope="col">JOIN NOW</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            // RETRIEVING USER NAME AND SURNAME
                            if($check == "0"){
                                include "conn.php";
                            $count = 0;
                            // $sql = "SELECT * FROM churchservice";
                            $result = $conn-> query($sql);
                            if ($result-> num_rows > 0){	
                                while($row = $result-> fetch_assoc()){
                                    $date = $row['date'];
                                    $time = $row['time'];
                                    $branchID = $row['branchID'];
                                    $serviceID = $row['serviceID'];
                                    $description = $row['description'];
                                    $link = $row['link'];
                                    $count++;

                                    $sql2 = "SELECT * FROM branch WHERE branchID='$branchID'";
                                    $result2 = $conn-> query($sql2);
                                    if ($result2-> num_rows > 0){	
                                        while($row = $result2-> fetch_assoc()){	$branchName = $row['branchName']; }	
                                    }

                                    //DISPLAYING
                                    echo "<tr>";
                                    echo "<th scope='row'>$count</th>";
                                    echo "<td>$branchName</td>";
                                    echo "<td>$date</td>";
                                    echo "<td>$time</td>";
                                    echo "<td>$description</td>";
                                    echo "<td><button type='submit' style='border-radius:10px; height:35px; width:120px; font-weight:bold; background-color:lightgreen;' name='btn_join' href='$link' value='$link'>
                                    <a href='$link'>JOIN NOW</a></td>";
                                    echo "</tr>";
                                }	
                            }
                            }
                            
                        ?>
                        </tbody>
                    </table>
                        </div>
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
    </script>
    </div>
</body>

</html>