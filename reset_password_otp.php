<?php
session_start();

include "conn.php"; // Assuming this file handles database connection

// Retrieve necessary session data
$reset_email = $_SESSION['reset_email'] ?? '';
$reset_password = $_SESSION['reset_password'] ?? '';
$hashed_reset_password = password_hash($reset_password, PASSWORD_DEFAULT);
$reset_otp = $_SESSION['reset_otp'] ?? '';

// Function to validate data
function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Handle form submissions
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['btn_login'])) {
        header("Location: login.php"); // Redirect to login page
        exit();
    }
    
    if(isset($_POST['btn_reset'])) {
        $otp = validate($_POST['otp']);
        
        if (empty($otp)) {
            header("Location: reset_password_otp.php?error=OTP is Required!!!");
            exit();
        } elseif ($otp != $reset_otp) {
            header("Location: reset_password_otp.php?error=Incorrect OTP Code!!!");
            exit();
        } else {
            // Update password in database
            $sql1 = "UPDATE login_details SET passwords='$hashed_reset_password' WHERE email='$reset_email'";
            if ($conn->query($sql1) === TRUE) {
                $_SESSION['msg1'] = "Thank You!";
                $_SESSION['msg2'] = "Your password has been changed successfully.";
                $_SESSION['msg3'] = "<script>location.href = 'login.php'</script>";
                header("Location: thankyou.php");
                exit();
            } else {
                echo "Error updating record: " . $conn->error;
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
  @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');
*{
  margin:0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}

.error {
  background: #F2DEDE;
  color: #A94442;
  padding: 10px;
  width: 95%;
  border-radius: 5px;
  /* margin-top: 10px; */
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

 html{
  /* background: url("img/register-background.jpg"); */
  background-color: #A94442;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  height: 600px;
 }

body{
  display: grid;
  place-items: center;
  text-align: center;
  background-size: cover; 
}

.content{
  width: 700px;
 
  border-radius: 10px;
  padding: 40px 30px;
  margin-top: 100px;
  box-shadow: -3px -3px 9px #aaa9a9a2,
              3px 3px 7px rgba(147, 149, 151, 0.671);
 
}

.content .text{
  font-size: 25px;
  font-weight: 600;
  margin-bottom: 35px;
  color: rgb(247, 233, 233);
}

.content .field{
  height: 50px;
  width: 100%;
  display: flex;
  position: relative;
}

.field input{
  height: 100%;
  width: 100%;
  padding-left: 45px;
  font-size: 18px;
  outline: none;
  border: none;
  color: #e0d2d2;
  border: 1px solid rgba(255, 255, 255, 0.438);
  border-radius: 8px;
  background: rgba(105, 105, 105, 0);
}

.field input::placeholder{
  color: #e0d2d2a6;
}

.field:nth-child(2){
  margin-top: 20px;
}

.field span{
  position: absolute;
  width: 50px;
  line-height: 50px;
  color: #ffffff;
}

button{
  margin: 25px 0 0 0;
  width: 100%;
  height: 50px;
  color: rgb(238, 226, 226);
  font-size: 18px;
  font-weight: 600;
  border: 2px solid rgba(255, 255, 255, 0.438);
  border-radius: 8px;
  background: rgba(105, 105, 105, 0);
 margin-top: 40px;
  outline: none;
  cursor: pointer;
  border-radius: 8px;
}
 
.content .or{
  color: rgba(255, 255, 255, 0.733);
  margin-top: 9px;
}
 
.icon-button{
  margin-top: 15px;
}

.icon-button span{
  padding-left: 17px;
  padding-right: 17px;
  padding-top: 6px;
  padding-bottom: 6px;
   color: rgba(244, 247, 250, 0.795);
 border-radius: 5px;
  line-height: 30px;
  background: rgba(255, 255, 255, 0.164);
    backdrop-filter: blur(10px);
}

.icon-button span.facebook{
  margin-right: 17px;
}

button:hover,
.icon-button span:hover{
  background-color: #babecc8c;
}
@media only screen and (max-width: 300px) {
    /* Adjustments for smaller screens */
    .content {
      width: 100%; /* Further adjusted width for smaller screens */
      padding: 30px 15px; /* Further adjusted padding for smaller screens */
    }
    .field input {
      font-size: 14px; /* Further adjusted font size for smaller screens */
    }
    form{
      width: 90%;
    }
  }
  @media only screen and (max-width: 1024px)  {
  
    .content {
      width: 100%; 
      padding: 40px 30px;
      height: 100%;
    }
    button {
      font-size: 18px; 
    }

    form {
      width: 90%; 
    }
  }
</style>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data" autocomplete="off">
        <div class="content" style="margin-top: 150px;">
            <div class="text">Reset Password</div>
            <!-- Display error and success messages -->
            <?php if (isset($_GET['error'])) { ?>
                <p class="error"><?php echo htmlspecialchars($_GET['error']); ?></p>
            <?php } ?>
            <?php if (isset($_GET['success'])) { ?>
                <p class="success"><?php echo htmlspecialchars($_GET['success']); ?></p>
            <?php } ?>
            <div class="field"><span class="fa fa-user"></span>
                <input type="number" name="otp" placeholder="OTP Code" required>
            </div>
            <button type="submit" name="btn_reset">Submit</button>
            <button type="submit" name="btn_login">Cancel</button>
        </div>
    </form>
</body>
</html>
