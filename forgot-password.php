<!--Design by foolishdeveloper.com-->
<!DOCTYPE html>
<html lang="en">
<head>
  
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<title>Forgot Password</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">












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
  background: url("img/register-background.jpg");
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
  width: 330px;
 
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

.field input {
  height: 100%;
  width: 100%;
  padding-left: 45px;
  font-size: 18px;
  outline: none;
  border: none;
  color: #e0d2d2; /* Text color */
  background-color: rgba(0, 0, 0, 1); /* Semi-transparent black */
  border: 1px solid rgba(255, 255, 255, 0.438); /* Border color */
  border-radius: 8px;
}

.field input:hover {
  background-color: rgba(0, 0, 0, 0.3); /* Darker semi-transparent black on hover */
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

button {
  margin-top: 25px;
  width: 100%;
  height: 50px;
  color: #eee; /* Text color */
  font-size: 18px;
  font-weight: 600;
  border: none;
  border-radius: 8px;
  background-color: rgba(0, 0, 0, 0.4); /* Semi-transparent black background */
  outline: none;
  cursor: pointer;
  transition: background-color 0.3s ease; /* Smooth hover transition */
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
  <form action="check-login.php" method="post" enctype="multipart/form-data" autocomplete="off">
  <div class="content">
  <div class="text">Reset Password</div>
      <!-- --------------------------------DISPLAY ERROR AND SUCCESS MESSAGE-------------------------------- -->
      <?php if (isset($_GET['error'])) { ?>
          <p class="error"><?php echo $_GET['error']; ?></p>
      <?php } ?>
      <?php if (isset($_GET['success'])) { ?>
          <p class="success"><?php echo $_GET['success']; ?></p>
      <?php } ?>
   
      <div class="field"><span class="fa fa-user"></span>
        <input type="email" style="margin-top:10px;" name="email" placeholder="Email Id" required>
      </div></br>
      <div class="field"><span class="fa fa-lock"></span>
        <input type="password" style="margin-top:0px;" name="password" placeholder="New Password" required>
      </div>
      <div class="field"><span class="fa fa-lock"></span>
        <input type="password" style="margin-top:10px;" name="confirm" placeholder="confirm Password" required>
      </div> <br><hr>
      <button type="submit" style="margin-top:10px;">Log in</button>
      <!-- <div class="or">Or</div>
      <div class="icon-button">    
        <i href="check-login.php">Forgot Password</i >
        <span><i></i formaction="#">Sign Up</span>
      </div> -->
      </div>
    </form>
  </div>
</body>
</html>
