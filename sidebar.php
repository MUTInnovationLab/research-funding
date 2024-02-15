<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Responsive Sidebar Overlay</title>
<style>
    body {
        margin: 0;
        font-family: Arial, sans-serif;
    }
    
    .container {
        position: relative;
        display: flex;
    }

    .main-content {
        flex: 1;
        transition: margin-left 0.3s;
        overflow-x: hidden;
    }

    .sidebar {
        height: 100%;
        width: 0;
        /* position: fixed; */
        z-index: 1;
        top: 0;
        left: 0;
        background-color: #111;
        overflow-x: hidden;
        transition: 0.5s;
        padding-top: 60px;
    }

    .sidebar a {
        padding: 10px 15px;
        text-decoration: none;
        font-size: 25px;
        color: #818181;
        display: block;
        transition: 0.3s;
    }

    .sidebar a:hover {
        color: #f1f1f1;
    }

    .sidebar .close-btn {
        position: absolute;
        top: 0;
        right: 25px;
        font-size: 36px;
        margin-left: 50px;
    }

    @media screen and (max-width: 768px) {
        .sidebar {
            width: 250px;
        }

        .container.overlay-active .sidebar {
            width: 0;
        }

        .container.overlay-active .main-content {
            margin-left: 0;
        }
    }
</style>
</head>
<body>

<div class="container">
    <div class="sidebar">
        <a href="javascript:void(0)" class="close-btn" onclick="closeNav()">&times;</a>
        <a href="#">Link 1</a>
        <a href="#">Link 2</a>
        <a href="#">Link 3</a>
    </div><!-- Close .sidebar -->
    <div class="main-content">
        <header>
            <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
            <h2>Main Content</h2>
        </header>
        <p>This is the main content.</p>
    </div>
</div>

<script>
    function openNav() {
        document.querySelector('.container').classList.add('overlay-active');
    }

    function closeNav() {
        document.querySelector('.container').classList.remove('overlay-active');
    }
</script>

</body>
</html>
