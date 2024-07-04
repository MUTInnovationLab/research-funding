<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="styles.css" />
    <title>Research Funding Application</title>
    <link rel="icon" href="/research.png" type="image/png">
<meta name="description" content="Our platform facilitates research funding by providing an easy-to-use application process for individuals and organizations seeking financial support for their projects. We aim to streamline the funding application process, making it more accessible and efficient for researchers to obtain the necessary resources to advance their work.">

    <style>
        body {
            background-color: lightcoral;
            font-family: 'Arial', sans-serif;
            background-size: cover; 
            background-image: url('img/view2.jpg');
            /* background-position: center; */
         
            height: 100vh; 

        }

        input,
        select {
            /* width:49.75%; */
            width: 100%;
            border: 2px solid #aaa;
            border-radius: 7px;
            margin-top: 10px;
            display: inline;
            outline: none;
            padding: 8px;
            box-sizing: border-box;
            transition: .3s;
        }

        .inputSelect:focus {
          width: auto; /* or any fixed width you prefer */
           }
        h6 {
            /* width:19000px; */
            /* border:2px solid #aaa; */
            /* border-radius:7px; */
            margin-bottom: -15px;
            /* display: inline; */
            /* outline:none; */
            padding: 8px;
            /* box-sizing:border-box; */
            /* transition:.3s; */
            color:white;
        }
      
        h4,h2{
            color:white;
        }
        summary{
            color:lightgray
        }
        details{
            background-color: rgba(128, 0, 0, 1); 
            border-radius: 10px;
        }

        .btn:hover {
            background-color: lightskyblue
        }

        .btn:active {
            background-color: lightskyblue;
            box-shadow: 0 5px #666;
            transform: translateY(4px);
        }

        input:focus {
            border-color: dodgerBlue;
            box-shadow: 0 0 8px 0 dodgerBlue;
        }

        .btn {
            height: 40px;
            width: 100%;
            display: inline;
            margin-top: 10px;
            margin-bottom: 10px;
            border: none;
            border-radius: 10px;
            background-color: gray;
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

        @media only screen and (max-width: 300px) {
            #page-content-wrapper {
                width: 100%;
                padding: 10px 15px;
            }
            .field input {
                font-size: 14px;
            }
            .content {
                width: 100%;
            }
            .container-fluid.px-4 {
                padding: 1px;
            }
            form {
                width: 100%;
            }
        }

        @media only screen and (max-width: 1024px) {

            #page-content-wrapper {
                width: 100%;
                padding: 40px 30px;
            }
            .content {
                width: 100%;
            }
            button{
                font-size: 18px;
            }
            .container-fluid.px-4 {
                width: 100%;
            }
            form {
                width: 100%;
            }
        }

        @media (max-width: 700px) {
 form {
      margin-top: -60px;
    }
}


    </style>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-transparent py-3 px-3">
                <h2>Application for Funds: Presentations at National Congresses, Conferences, or Symposia</h2>
            </nav>
    <form action="check-apply.php" method="post" enctype="multipart/form-data" autocomplete="off">
        <!-- Page Content -->
        <div id="page-content-wrapper">
           

            <div class="container-fluid px-2">
                <div class="row my-5">

                <details>
<summary>MUT Research Grant:</summary>
<h4 class="fs-4 mb-3">MUT Research Grant: In terms of a decision of Council, depending on the availability of funds, MUT will consider
                        contributing towards the expenses for presentation (oral and poster) at conferences, congresses and symposia. Conference grants
                        are an investment in the research agenda of MUT and applicants are expected to contribute to MUT Research Days and/or Seminar
                        Series before grants will be considered.</h4>
</details>
                   
                    <div class="content" style="border: 1px solid; width: 98%; margin-left: 10px; border-radius: 10px; margin-top: 5px;">
                        <h4 style="text-align: center;">Personal Particulars</h4>
                        <!-- --------------------------------DISPLAY ERROR AND SUCCESS MESSAGE-------------------------------- -->
                        <?php if (isset($_GET['error'])) { ?>
                            <p class="error"><?php echo $_GET['error']; ?></p>
                        <?php } ?>
                        <?php if (isset($_GET['success'])) { ?>
                            <p class="success"><?php echo $_GET['success']; ?></p>
                        <?php } ?>
                        <!-- ------------------------------------------------------------------------------------- -->
                        <select name='title' class='inputSelect'>
                            <option value="Prof">Prof</option>
                            <option value='Dr'>Dr</option>
                            <option value='Mr'>Mr</option>
                            <option value='Mrs'>Mrs</option>
                            <option value='Ms'>Ms</option>
                        </select>

                        <input type="text" name="name" class="input" placeholder="Full Name" Required></input>
                        <input type="number" name="staffNo" class="input" placeholder="Staff Number" Required></input>
                        <input type="text" name="qualification" class="input" placeholder="Highest Qualification" Required></input>
                        <input type="text" name="department" class="input" placeholder="Department" Required></input>
                        <input type="email" name="email" class="input" placeholder="Email" Required></input>
                        <input type="number" name="tel" class="input" placeholder="Tel (Office)" Required></input>
                        <input type="number" name="cell" class="input" style="margin-bottom: 10px;" placeholder="Cell Number" Required></input>
                    </div>
                    <!-- ----------------------------------------------------------------------------------------------- -->
                    <div class="content" style="border: 1px solid; width: 98%; margin-left: 10px; border-radius: 10px; margin-top: 5px;">
                        <h4 style="text-align: center;">Congress / Conference / Symposium Information</h4>
                        <input type="text" class="input" name="subject" placeholder="Name / Subject of Congress" Required></input>
                        <input type="text" class="input" name="venue" placeholder="Venue" Required></input>
                        <input type="text" class="input" name="host" placeholder="Host to Congress" Required></input>
                        <input type="text" class="input" name="duration" placeholder="Duration (Dates)" Required></input>
                        <input type="text" class="input" name="titleOfPaper" placeholder="Title of paper to be delivered" Required></input>
                        <input type="text" class="input" name="coAuthers" placeholder="Name(s) of co-author(s)" Required></input>
                        <input type="text" class="input" name="otherFinancial" placeholder="Other financial sources (e.g. NRF)" Required></input>
                        <input type="number" class="input" name="amtReceived" style="margin-bottom: 10px;" placeholder="Amt. received (other sources)" Required></input>
                    </div>
                    <!-- ----------------------------------------------------------------------------------------------- -->
                    <div class="content" style="border: 1px solid; width: 98%; margin-left: 10px; border-radius: 10px; margin-top: 5px;">
                        <h4 style="text-align: center;">Budget</h4>
                        <h6>Air ticket (return)</h6>
                        <input type="number" class="input" name="ticket" placeholder="Air ticket (return)" Required></input>
                        <!-- <input type="text" class="input" name="ticketComment" placeholder="Comment(s)" Required></input> -->
                        <h6>Ground transportation / car hire</h6>
                        <input type="number" class="input" name="transportation" placeholder="Ground transportation / car hire" Required></input>
                        <!-- <input type="text" class="input" name="transportationComment" placeholder="Comment(s)" Required></input> -->
                        <h6>Registration Fee</h6>
                        <input type="number" class="input" name="registration" placeholder="Registration Fee" Required></input>
                        <!-- <input type="text" class="input" name="registrationComment" placeholder="Comment(s)" Required></input> -->
                        <h6>Accommodation</h6>
                        <input type="number" class="input" name="accommodation" placeholder="Accommodation" Required></input>
                        <!-- <input type="text" class="input" name="accommodationComment" placeholder="Comment(s)" Required></input> -->
                        <h6>Subsistence</h6>
                        <input type="number" class="input" name="subsistence" placeholder="Subsistence" Required></input>
                        <!-- <input type="text" class="input" name="subsistenceComment" placeholder="Comment(s)" Required></input> -->
                        <h6>Other costs (specify)</h6>
                        <input type="number" class="input" name="otherCosts" placeholder="Other costs (specify)" Required></input></br></br>
                        <!-- <input type="text" class="input" name="otherCostsComment" style="margin-bottom: 10px;" placeholder="Comment(s)" Required></input> -->
                        <!-- <h6>Welcome</h6> -->
                    </div>
                    <!-- ----------------------------------------------------------------------------------------------- -->
                    <div class="content" style="border: 1px solid; width: 98%; margin-left: 10px; border-radius: 10px; margin-top: 5px;">


                        <!-- <h6>Announcement of or invitation to congress</h6>
                    <input style="border:none; width:20%;" type="file" name="file1" required accept=".pdf"/><br> -->

                        <!-- <h6>Copy of the full paper to be presented at International Conference</h6>
                    <input style="border:none; width:20%;" type="file" name="file2" required accept=".pdf"/><br> -->

                        <!-- <h6>Documentary proof of acceptance of the paper to be presented</h6>
                    <input style="border:none; width:20%;" type="file" name="file3"  required accept=".pdf"/><br> -->

                        <!-- <h6>Details of official programme of congress</h6>
                    <input style="border:none; width:20%;" type="file" name="file4"  required accept=".pdf"/><br> -->

                        <!-- <h6>A detailed itinerary for the period from date of departure to date of return</h6>
                    <input style="border:none; width:20%;" type="file" name="file5"  required accept=".pdf"/><br> -->

                        <!-- <h6>Travelling Costs: (a) Written quotation from a recognised travel agency indicating the economy and return air fare</h6>
                    <input style="border:none; width: 20%;" type="file" name="file6"  required accept=".pdf"/><br> -->

                        <!-- <h6>Travelling Costs: (b) Documentary evidence of Visa costs</h6>
                    <input style="border:none; width:20%;" type="file" name="file7"  required accept=".pdf"/><br> -->

                        <!-- <h6>Documentary evidence of accommodation costs</h6>
                    <input style="border:none; width:20%;" type="file" name="file8"  required accept=".pdf"/><br> -->

                        <!-- <h6>Documentary evidence of the registration fee involved</h6>
                    <input style="border:none; width:20%;" type="file" name="file9"  required accept=".pdf"/><br> -->

                        <!-- <h6>Proof of DHET approved output since the previous conference grant</h6>
                    <input style="border:none; width:20%;" type="file" name="file10"  required accept=".pdf"/><br> -->

                        <!-- <h6>Proof of application for external funding</h6>
                    <input style="border:none; width:20%;" type="file" name="file11"  required accept=".pdf"/><br> -->



                        <!-- <div class="row my-5"> -->
                        <!-- <h4 style="text-align: center;">Supporting Documents</h4> -->
                        <?php
                        // echo "<hr style='margin-top:20px;'>";
                        echo "<h4 style='width:100%; text-align:center; margin-bottom:20px;'>Supporting Documents</h4>";

                        echo "<table class='table bg-white rounded shadow-sm  table-hover'>";
                        echo "<thead>";
                        echo "<tr>";
                        echo "<th scope='col'>Description</th>";
                        echo "<th scope='col'>Upload</th>";
                        echo "</tr>";
                        echo "</thead>";
                        echo "<tbody>";

                        echo "<tr><th scope='row'>Announcement of or invitation to congress</th>";
                        echo "<th scope='row'><input style='border:none; width:100%; margin-top:-40px; margin-bottom:-40px;' type='file' name='file1' required accept='.pdf'/></th></tr>";
                        echo "<tr><th scope='row'>Copy of the full paper to be presented at International Conference</th>";
                        echo "<th scope='row'><input style='border:none; width:100%; margin-top:-40px; margin-bottom:-40px;' type='file' name='file2' required accept='.pdf'/></th></tr>";
                        echo "<tr><th scope='row'>Documentary proof of acceptance of the paper to be presented</th>";
                        echo "<th scope='row'><input style='border:none; width:100%; margin-top:-40px; margin-bottom:-40px;' type='file' name='file3' required accept='.pdf'/></th></tr>";
                        echo "<tr><th scope='row'>Details of official programme of congress</th>";
                        echo "<th scope='row'><input style='border:none; width:100%; margin-top:-40px; margin-bottom:-40px;' type='file' name='file4' required accept='.pdf'/></th></tr>";
                        echo "<tr><th scope='row'>A detailed itinerary for the period from date of departure to date of return</th>";
                        echo "<th scope='row'><input style='border:none; width:100%; margin-top:-40px; margin-bottom:-40px;' type='file' name='file5' required accept='.pdf'/></th></tr>";
                        echo "<tr><th scope='row'>Travelling Costs: (a) Written quotation from a recognised travel agency indicating the economy and return air fare</th>";
                        echo "<th scope='row'><input style='border:none; width:100%; margin-top:-40px; margin-bottom:-40px;' type='file' name='file6' required accept='.pdf'/></th></tr>";
                        echo "<tr><th scope='row'>Travelling Costs: (b) Documentary evidence of Visa costs</th>";
                        echo "<th scope='row'><input style='border:none; width:100%; margin-top:-40px; margin-bottom:-40px;' type='file' name='file7' required accept='.pdf'/></th></tr>";
                        echo "<tr><th scope='row'>Documentary evidence of accommodation costs</th>";
                        echo "<th scope='row'><input style='border:none; width:100%; margin-top:-40px; margin-bottom:-40px;' type='file' name='file8' required accept='.pdf'/></th></tr>";
                        echo "<tr><th scope='row'>Documentary evidence of the registration fee involved</th>";
                        echo "<th scope='row'><input style='border:none; width:100%; margin-top:-40px; margin-bottom:-40px;' type='file' name='file9' required accept='.pdf'/></th></tr>";
                        echo "<tr><th scope='row'>Proof of DHET approved output since the previous conference grant</th>";
                        echo "<th scope='row'><input style='border:none; width:100%; margin-top:-40px; margin-bottom:-40px;' type='file' name='file10' required accept='.pdf'/></th></tr>";
                        echo "<tr><th scope='row'>Proof of application for external funding</th>";
                        echo "<th scope='row'><input style='border:none; width:100%; margin-top:-40px; margin-bottom:-40px;' type='file' name='file11' required accept='.pdf'/></th></tr>";

                        echo "</tbody>";
                        echo "<table>";
                        // echo "</div>";
                        ?>
                    </div>
                    <button type="submit" class="btn">Submit</button>
                </div>
            </div>
        </div>
        </div>
        </div>
        <!-- /#page-content-wrapper -->
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
        <script>
            // var el = document.getElementById("wrapper");
            // var toggleButton = document.getElementById("menu-toggle");

            // toggleButton.onclick = function() {
            //     el.classList.toggle("toggled");
            // };
        </script>
    </form>
</body>

</html>