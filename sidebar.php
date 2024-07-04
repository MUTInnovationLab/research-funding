<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar with Transition</title>
    <link rel="icon" href="/research.png" type="image/png">
    <meta name="description" content="Our platform facilitates research funding by providing an easy-to-use application process for individuals and organizations seeking financial support for their projects. We aim to streamline the funding application process, making it more accessible and efficient for researchers to obtain the necessary resources to advance their work.">

    <style>
        body {
            margin: 0;
            padding: 0;
        }

        .sidebar {
            height: 100%;
            width: 250px;
            position: fixed;
            top: 0;
            left: -250px;
            background-color: #333;
            overflow-x: hidden;
            transition: 0.5s;
            z-index: 1; 
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
        }

        .sidebar ul li {
            padding: 10px;
        }

        .sidebar ul li a {
            color: white;
            text-decoration: none;
        }

        .content {
         
            margin-left: 0; /* Changed the initial margin-left to 0 */
            padding: 20px;
            transition: margin-left 0.5s;
            z-index: 0; 
        }

        .toggle-btn {
            background-color: #333;
            color: white;
            border: none;
            cursor: pointer;
            padding: 10px 20px;
            position: absolute;
            top: 20px;
            left: 10px;
            z-index: 2;
        }

        .toggle-btn:focus {
            outline: none;
        }

        .open {
            left: 0;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <button class="toggle-btn" onclick="hideSidebar()">Hide Sidebar</button>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
    </div>
    <div class="content">
        <button class="toggle-btn" onclick="openSidebar()">Open Sidebar</button> <!-- New button to open the sidebar -->
        <h1>Main Content</h1>
        <p>This is the main content area.</p>
    </div>
    <script>
        function hideSidebar() {
            document.querySelector('.sidebar').style.left = "-250px";
            document.querySelector('.content').style.marginLeft = "0";
        }

        function openSidebar() {
            document.querySelector('.sidebar').style.left = "0";
            document.querySelector('.content').style.marginLeft = "250px";
        }
    </script>
</body>
</html>
