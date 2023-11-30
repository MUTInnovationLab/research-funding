<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="styles.css" />
    <title>Officer Post Services</title>
    <style>
        .input{
            height: 40px; 
            width: 49%; 
            margin-left: 10px; 
            display: inline;
            border: none; 
            border-radius: 10px;
        }
    </style>
</head>

<body>
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
                <a style="margin-top: -25px;" href="#" class="list-group-item list-group-item-action bg-transparent second-text active"><i
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
                <a style="margin-top: -25px;" href="officer-view-branch.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                    ></i>View Branches</a>
                <!-- CHURCH SERVICES -->
                <a style="margin-top: -25px;" href="officer-add-service.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                    ></i>Church Service</a>
                <a style="margin-top: -25px;" href="officer-view-service.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                    ></i>View Church Service</a>
                                
                <!-- ------------------------------------------------------------------------------------------ -->
                <a href="#" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i
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
                                <i class="fas fa-user me-2"></i>Admin Admin
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Profile</a></li>
                                <li><a class="dropdown-item" href="#">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="container-fluid px-4">
                <div class="row g-3 my-2">
                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">121</h3>
                                <p class="fs-5">Services</p>
                            </div>
                            <i class="fas fa-chart-line fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">37</h3>
                                <p class="fs-5">Branches</p>
                            </div>
                            <i class="fas fa-chart-line fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">4</h3>
                                <p class="fs-5">Countries</p>
                            </div>
                            <i class="fas fa-chart-line fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">16</h3>
                                <p class="fs-5">Cities</p>
                            </div>
                            <i class="fas fa-chart-line fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>
                </div>

                <div class="row my-5">
                    <h3 class="fs-4 mb-3">Post Services</h3>

                    <select id="select" class="table bg-white rounded shadow-sm  table-hover"  
                    style="height: 40px; width: 98%; margin-left: 10px;">
                        <option value="select">Select Branch</option>
                        <option value="select">All Branches</option>
                        <option value="select">Branch 1</option>
                        <option value="select">Branch 2</option>
                    </select>

                    <input type="text" class="input" placeholder="Branch Name"></input>
                    <input type="text" class="input" placeholder="Branch Name"></input>
                    <input type="text" class="input" placeholder="Branch Name"></input>
                    <input type="text" class="input" placeholder="Branch Name"></input>

                    <textarea type="text" id="textarea" rows="5" cols="50" class="table bg-white rounded shadow-sm  table-hover"  
                    style="width: 98%; margin-left: 10px;" placeholder="Message"></textarea>

                    <button type="submit" class="table bg-white rounded shadow-sm  table-hover"  
                    style="width: 98%; margin-left: 10px; height: 40px; border: none; border-radius: 500px;">Submit</button>

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
</body>

</html>