<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="styles.css" />
    <title>View Branch</title>
    <style>
        .input{
            height: 35px; 
            width: 49.7%; 
            display: inline;
            margin-top: 10px;
            margin-bottom: 10px;
            border: none; 
            border-radius: 10px;
            font-weight: bold;
        }
        .lebel{
            margin-top: 10px;
            border: none; 
            font-weight: bold;
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
        .select{
            height: 40px; 
            width: 98%; 
            display: inline;
            margin-left: 10px;
            margin-bottom: 10px;
            border: none; 
            border-radius: 10px;
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
    </style>
</head>
<?php
 session_start(); 
 include "conn.php";
 $name = $_SESSION['currentUser_name'];
 $surname = $_SESSION['currentUser_surname'];
 $currentUser = $name .' '. $surname;
?>
 <!-- -------------------------COUNT ACTIVE USERS---------------------------------- -->
 <?php          
    include "conn.php";                     $user_count = 0;
    $sql = "SELECT * FROM userinfo";        $result = $conn-> query($sql);
    if($result-> num_rows > 0){    while($row = $result-> fetch_assoc()){  $user_count++;  }  }
    $conn-> close();
?>
 <!-- -------------------------COUNT BRANCHES---------------------------------- -->
 <?php          
    include "conn.php";                     $count_branch = 0;
    $sql = "SELECT * FROM branch";        $result = $conn-> query($sql);
    if($result-> num_rows > 0){    while($row = $result-> fetch_assoc()){  $count_branch++;  }  }
    $conn-> close();
?>
<body>
<form method="post" enctype="multipart/form-data" autocomplete="off">
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom">
            <img src="img/logo.png" style="width:50px; height:50px;"></i><br>Inqola</div>
            <div class="list-group list-group-flush my-3">
                <!-- ACTIVE USERS -->
                <a href="officer-active-users.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                    ></i>Active Users</a>
                <a style="margin-top: -25px;" href="officer-create-users.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                    ></i>Create Users</a>
                <!-- ANNOUNCEMENTS -->
                <a style="margin-top: -25px;" href="officer-post-announcements.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                    ></i>Post Announcements</a>
                <a style="margin-top: -25px;" href="officer-view-announcements.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                    ></i>View Announcements</a>
                <!-- PREVIOS VIDEOS -->
                <a style="margin-top: -25px;" href="officer-upload-videos.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                    ></i>Upload Videos</a>
                <a style="margin-top: -25px;" href="officer-view-videos.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                    ></i>View Videos</a>
                <!-- BRANCHES -->
                <a style="margin-top: -25px;" href="officer-add-branch.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                    ></i>Add Branches</a>
                <a style="margin-top: -25px;" href="#" class="list-group-item list-group-item-action bg-transparent second-text active"><i
                    ></i>View Branches</a>
                <!-- CHURCH SERVICES -->
                <a style="margin-top: -25px;" href="officer-add-service.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                    ></i>Church Service</a>
                <a style="margin-top: -25px;" href="officer-view-service.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                    ></i>View Church Service</a>
                                
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
                            <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user me-2"></i><?php echo $currentUser  ?>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Profile</a></li>
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
                                <h3 class="fs-2">There Are <?php echo $user_count  ?> Active Users</h3>
                                <!-- <p class="fs-5">Users</p> -->
                            </div>
                            <i class="fas fa-chart-line fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>
                    <div class="col-md-3" style="width:50%;">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">There Are <?php echo $count_branch  ?> Branches</h3>
                                <!-- <p class="fs-5">Branches</p> -->
                            </div>
                            <i class="fas fa-chart-line fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>
                </div>

                <div class="row my-5">
                    <h3 class="fs-4 mb-3">View Branch</h3>

                    <!-- --------------------------------DISPLAY ERROR AND SUCCESS MESSAGE-------------------------------- -->
                    <?php if (isset($_GET['error'])) { ?>
                        <p class="error"><?php echo $_GET['error']; ?></p>
                    <?php } ?>
                    <?php if (isset($_GET['success'])) { ?>
                        <p class="success"><?php echo $_GET['success']; ?></p>
                    <?php } ?>

                    <?php
                        if(isset($_POST['btn_update'])) {
                            // session_start();
                            include "conn.php";
                            $_SESSION['update_addressID'] = $_POST['btn_update'];
                            // header("Location: officer-update-branch.php"); exit();
                            // echo "<a href='Location: officer-update-branch.php'>Visit W3Schools.com!</a>";
                        }

                        if(isset($_POST['btn_delete'])) {
                            include "conn.php";
                            $id = $_POST['btn_delete'];
                            $sql = "DELETE FROM branch WHERE addressID=$id";
                            if ($conn->query($sql) === TRUE) {
                                $sql = "DELETE FROM addresss WHERE addressID=$id";
                                if ($conn->query($sql) === TRUE) { header("Location: officer-view-branch.php?success=Record Deleted Successfully"); exit(); }
                                $conn->close();
                            } else { header("Location: officer-view-branch.php?error=Somthing Went Wrong!!! Please Try Again."); exit(); }
                            $conn->close();
                        }

                        include "conn.php";
                        $sql = "SELECT * FROM branch";
                        $result = $conn-> query($sql);
                        echo "<select name='select-branch' class='input' style='width: 88%; height: 40px; margin-left:10px; margin-bottom:10px; border-radius:5px;'>";
                        echo "<option value disabled selected>Select Leader</option>";
                        if($result-> num_rows > 0){
                                while($row = $result-> fetch_assoc()){
                                    $userID = $row['userID'];     
                                    // RETRIEVE BRANCH ADDRESS
                                    $sql1 = "SELECT * FROM userinfo WHERE userID='$userID'";
                                    $result1 = $conn-> query($sql1);
                                    if($result1-> num_rows > 0){
                                        while($row = $result1-> fetch_assoc()){
                                            $name = $row['namee']; $surname = $row['surname'];
                                            $data = $name." ".$surname;
                                        }
                                    }
                                        echo "<option value='$userID'>$data</option>";
                                }
                            echo "</select>";
                        }
                        $conn-> close();
                    ?>
                    <button type="submit" style="width: 10%; height: 40px; margin-top:10px; margin-left:10px;" class="btn" name="btn_search">Search</button>

                    <!-- SEARCH -->
                    <!-- <div class="content" style="border: 1px solid; width: 98%; margin-left: 10px; border-radius: 10px; margin-top: 5px;"> -->
                    <!-- <select id="select" class="select">
                        <option value="select">All Leaders</option>
                        <option value="select">Leader 1</option>
                        <option value="select">Leader 2</option>
                    </select> -->
                    <!-- </div> -->


                    <div class="col">
                    <table class="table bg-white rounded shadow-sm  table-hover">
                        <thead>
                            <tr>
                                <th scope="col" width="50">#</th>
                                <th scope="col">BRANCH NAME</th>
                                <th scope="col">COUNTRY</th>
                                <th scope="col">PROVINCE</th>
                                <th scope="col">ADDRESS</th>
                                <th scope="col">LEADER NAME</th>
                                <th scope="col">EDIT</th>
                                <th scope="col">DELETE</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            // RETRIEVING USER NAME AND SURNAME
                            include "conn.php";
                            $count = 0;
                            $sql = "SELECT * FROM branch";
                            $result = $conn-> query($sql);
                            if ($result-> num_rows > 0){	
                                while($row = $result-> fetch_assoc()){
                                    $name = $row['branchName'];
                                    $addressID = $row['addressID'];
                                    $leaderID = $row['userID'];
                                    $count++;

                                    // RETRIEVING NAME OF THE LEADER
                                    if($leaderID == 0){
                                        $branch_leader = "No Leader Assigned";
                                    }else{
                                        $sql2 = "SELECT * FROM userinfo WHERE userID='$leaderID'";
                                        $result2 = $conn-> query($sql2);
                                        if ($result2-> num_rows > 0){	
                                            while($row = $result2-> fetch_assoc()){	$leaderName = $row['namee']; $leaderSurname = $row['surname']; }
                                            $branch_leader = $leaderName." ".$leaderSurname;	
                                        }
                                    }
                                    
            
                                    // RETRIEVING ADDRESS INFO
                                    $sql1 = "SELECT * FROM addresss WHERE addressID='$addressID'";
                                    $result1 = $conn-> query($sql1);
                                    if ($result1-> num_rows > 0){	
                                        while($row = $result1-> fetch_assoc()){	
                                            $country = $row['country'];	
                                            $street = $row['street'];	
                                            $city = $row['city'];	
                                            $province = $row['province'];	
                                            $zipcode = $row['zipCode'];
                                        }	
                                    }

                                    //DISPLAYING
                                    echo "<tr>";
                                    echo "<th scope='row'>$count</th>";
                                    echo "<td>$name</td>";
                                    echo "<td>$country</td>";
                                    echo "<td>$province</td>";
                                    echo "<td>$street, $city</td>";
                                    echo "<td>$branch_leader</td>";
                                    echo "<td><button type='submit' style='border-radius:10px; height:35px; width:70px; font-weight:bold; background-color:lightgreen;' name='btn_update' value='$addressID'>EDIT</button></td>";
                                    echo "<td><button type='submit' style='border-radius:10px; height:35px; width:70px; font-weight:bold; background-color:red;' name='btn_delete' value='$addressID'>DELETE</button></td>";
                                    echo "</tr>";
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
</form>
</body>

</html>