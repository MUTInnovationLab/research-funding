<HTML>
<link rel="icon" href="research.png" type="image/png">
<!-- <meta name="description" content="Our platform facilitates research funding by providing an easy-to-use application process for individuals and organizations seeking financial support for their projects. We aim to streamline the funding application process, making it more accessible and efficient for researchers to obtain the necessary resources to advance their work."> -->

    <style>
        .btn{
            height: 35px; 
            width: 15%; 
            display: inline;
            margin-bottom: 10px;
            border: none; 
            border-radius: 10px;
            font-weight: bold;
            background-color: forestgreen;
        }
    </style>
    <?php
        session_start(); 
        include "conn.php";
        $msg1 = $_SESSION['msg1'];
        $msg2 = $_SESSION['msg2'];
        $msg3 = $_SESSION['msg3'];

        if(isset($_POST['btn_done'])){
            echo"$msg3";
        }
    ?>
    
<body>
<form action="#" method="post" enctype="multipart/form-data" autocomplete="off">
    <p style="text-align: center; margin-top: 100px;"><img src="https://cdn.jotfor.ms/img/check-icon.png" alt="" width="128" height="128" /></p>
    <div style="text-align: center;">
        <h1 style="text-align: center;"><?php echo "$msg1" ?></h1>
        <p>
        </p>
        <p style="text-align: center;"><?php echo "$msg2" ?></p>
        <button type='submit' name='btn_done' class='btn'>DONE</button>;
    </div>
</form>
</body>
</HTML>