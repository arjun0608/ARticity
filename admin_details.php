<?php
    include "connect.php";
    $uid=1;
    session_start();
    $a_uid = $_SESSION['a_id'];
    $a_uname = $_SESSION['a_u_name'];
    $a_photo = $_SESSION['a_photo']; 
 
    $sql = "SELECT * FROM admin WHERE a_id='$uid'";
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($result);

    if(isset($_POST['u_btn']))
    {
        $a_name = $_POST['a_name'];
        $a_u_name = $_POST['a_u_name'];
        $a_email = $_POST['a_email'];
        $a_pass = $_POST['a_pass'];

        $sql1 = "UPDATE admin SET a_name = '$a_name', a_u_name = '$a_u_name', a_email = '$a_email', a_pass = '$a_pass' WHERE a_id = '$uid'";
        $result1 = mysqli_query($con,$sql1);

        if($result1)
        {
            $cnt=1;
        }
        else
        {
            $cnt=2;
        }
    }
    if(isset($_POST['logout']))
    {
        header("Location:logout.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="adm.css">
    <link rel="stylesheet" href="utilities/utility.css">

    <style>
        *{
            list-style: none;
            text-decoration: none;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family:'open sans',sans-serif;
        }

        .body{
            background: #f5f6fa;
        }

        .full-page .left-sidebar{
            background:rgb(22, 23, 26);
            position: fixed;
            top:0;
            left: 0;
            width: 250px;
            height: 100%;
            transition: all 0.5s ease;
            overflow: auto;
        }

        .full-page .left-sidebar .logo{
            margin-bottom: 30px;
            text-align: center;
            background-color: black;
        }

        .full-page .left-sidebar .logo img{
            display: block;
            height: 3vw;
            width: 10vw;
            border-radius:100px;
            margin-left:3.5vw;
            align-items: center;
        }
        .profile {
          margin-top:2vw;
        }
        .profile input {
          font-family: var(--font3);
          font-size:1vw;
          text-align: center;
          background-color: white;
        }
        .full-page .left-sidebar .profile{
            margin-bottom: 30px;
            text-align: center;
        }

        .full-page .left-sidebar .profile img{
            display: block;
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin: 0 auto;
            margin-bottom: 2vw;
            margin-top: 6vw;
        }

        .full-page .left-sidebar .list ul li a{
            display: block;
            padding: 13px 30px;
            border-bottom: 1px solid #383b3f;
            /* border-bottom: 1px solid rgba(255, 166, 0, 0.465); */
            color: rgb(241,237,237);
            font-size: 1.2vw;
            position: relative;
        }
        .list ul li a span{
            font-family: var(--font10);
        }

        .full-page .left-sidebar .list ul li a .icon{
            color: #dee4ec;
            width: 30px;
            display: inline-block;
        }

        .full-page .left-sidebar .list ul li a:hover
        {
            color:rgb(31, 37, 51);
            background:rgb(241,237,237);
            border-right: 2px solid rgb(5,68,104);
        }

        .full-page .left-sidebar .list ul li a:hover .icon
        {
            color:rgb(31, 37, 51);
        }

        .full-page .left-sidebar .list ul li a:hover::before
        {
          display: block;
        }

        .full-page .left-sidebar .dropdown .dropbtn{
            display: block;
            background:rgb(22, 23, 26);
            padding: 13px 30px;
            border-bottom: 1px solid #383b3f;
            /* border-bottom: 1px solid rgba(255, 166, 0, 0.465); */
            color: rgb(241,237,237);
            font-size: 1vw;
            position: relative;
            text-align :left;
            width:250px;
        }


        .full-page .left-sidebar .dropdown .dropbtn .icon{
            color: #dee4ec;
            width: 30px;
            display: inline-block;
        }

        .full-page .left-sidebar .dropdown .dropbtn:hover{
            color:rgb(31, 37, 51);
            background:rgb(241,237,237);
            border-right: 2px solid rgb(5,68,104);
        }

        .full-page .left-sidebar .dropdown .dropbtn:hover .icon{
            color:rgb(31, 37, 51);
        }

        .full-page .left-sidebar .dropdown .dropbtn:hover::before{
            display: block;
        }

        .full-page .left-sidebar ul li a{
            display: block;
            padding: 13px 30px;
            /* border-bottom: 1px solid #10558d; */
            color: rgb(241,237,237);
            font-size: 1vw;
            position: relative;
        }

        .full-page .right-bar{
            width: calc(100% - 250px);
            margin-left: 250px;
            transition: all 0.5s ease;
        }



        .full-page .right-bar .top-navbar .hamburger a{
          font-size: 25px;
          color: #f4fbff;
        }

        .full-page .right-bar .top-navbar .hamburger a:hover{
            color: #b5c4cd;
        }

        body.active .full-page .left-sidebar{
            left: -250px;
        }

        body.active .full-page .right-bar{
            margin-left: 0;
            width: 100%;
        }
        .right-bar .right_content .iframe{
            display: block;
            height: 100vw;
            width: 100vw;
            border: none;

        }
        .full-page .right-bar .top-navbar{
            /* background-image: linear-gradient(180deg, orange, yellow); */
            background-color: black;
            height: 10vw;
            display: flex;
            align-items: center;
            padding-left: 10px;
        }
        .dropbtn {
          background:rgb(31, 37, 51);
          color: white;
          font-size: 16px;
          border: none;
          cursor: pointer;
        } 
        
        .dropbtn:hover, .dropbtn:focus {
          background-color: black;
        }
        
        .dropdown {
          position: relative;
          display: inline-block;
        }
        
        .dropdown button span {
          font-family: var(--font10);
          font-size:1.2vw;
        }
        
        .dropdown-content {
          text-align: left;
          padding-left: 2vw;
          padding-right: 2vw;
          display: none;
          position: absolute;
          background:rgb(31, 37, 51);
          min-width: 250px;
          box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
          z-index: 1;
          text-align: left;

        }
        
        .dropdown-content a {
          color: black;
          padding: 13px 30px;
          text-decoration: none;
          display: block;
          font-size: 1vw;
          position: relative;
        }
        
        .dropdown a:hover {background-color: black;}
        
        .show {display: block;}
        .box-container {
          /* background-color: green; */
          height: 30vw;
          width: 81vw;
          margin-bottom:-60vw;
          display: flex;
          flex-wrap: wrap;
          padding:2vw;
        }
        .box-1 {
          margin:1.6vw;
          height:18vw;
          width:22vw;
          background-color: white;
          box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.3);
        }
        .box-1 img {
          height:8vw;
          width:8vw;
          position:relative;
          bottom:-2vw;

        }
        .box-1-info {
          position: relative;
          height:10vw;
          width:10vw;
          bottom:-3.5vw;
        }

        .box-1-info h1 {
          font-family: var(--font10);
          font-size: 2.5vw;
          color: rgba(0, 0, 0, 0.531);
        }
        .box-1 span {
          font-family: var(--font9);
          font-size: 1.8vw;
          color: rgba(0, 0, 0, 0.531);
        }
        .top-info-bar {
          position: absolute;
          background-color: rgb(22, 23, 26);
          /* background-image: linear-gradient(to right, rgb(22, 23, 26),rgb(22, 23, 26), #383b3f ,rgb(22, 23, 26),rgb(22, 23, 26)); */
          height: 5vw;
          width:100vw;
          margin-top:-3.5vw;
          /* border-radius: 5px; */
          display: flex;
          justify-content: space-between;
          align-items: center;
          left:0;
          top:3.5vw;
          box-shadow: 0 10px 25px rgba(0 0 0 /95%);
        }
        .logo-box img {
          height: 4vw;
          width: 10vw;
          margin-left:1vw;
        }
        .profile-box button {
          height: 3vw;
          width: 8vw;
          margin-right: 2vw;
          border-radius: 10px;
          color:black;
          font-family: var(--font14);
          font-size:1.2vw;
          background-color:white;
          border:none;
          box-shadow: 0 6px 25px rgba(0 0 0 /35%);
        }
        .profile-box button:hover {
          background-color:beige;
          cursor:pointer;
          transition: 0.5s;
        }
        .a_detail_box {
            padding:4vw;
        }
        .a_detail_box span {
            font-family:var(--font11);
            font-size:1.9vw;
            font-weight:800;
        }
        .a_detail_box input {
            font-family:var(--font11);
            font-size:1.9vw;
            border:none;
        }
        .a_detail_box button {
            position: absolute;
            left:50vw;
            top:47vw;
            font-family:var(--font3);
            font-size:1.5vw;
            width:15vw;
            height:3vw;
            background-color: cadetblue;
            color:white;
            border:thin;
            border-radius:5px;
            padding:0;
            box-shadow: 0 6px 25px rgba(0 0 0 /25%);
        }

        .a_detail_box button:hover {
            cursor:pointer;
            transition:0.5s;
            width:15.4vw;
            height:3.4vw;
            box-shadow: 0 6px 25px rgba(0 0 0 /45%);
        }
        .a_photo img {
            height:13vw;
            width:13vw;
            border-radius:9vw;
            margin-bottom:-21.2vw;
            margin-left:2vw;
        }
        .right_content {
            display:flex;
            margin-left:10vw;
        }
        .invalid-box-1 {
            position: absolute;
            top: 11vw;
            margin-top: -5vw;
            margin-bottom: -2vw;
            border: 1px solid white;
            background-color: rgba(255, 134, 134, 0.66);
            height: 3vw;
            width: 52vw;
            font-family: var(--font7);
            border-radius: 5px;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .invalid-box-2 {
            position: absolute;
            top: 11vw;
            margin-top: -5vw;
            margin-bottom: -2vw;
            border: 1px solid white;
            background-color: rgba(0, 128, 0, 0.8);
            height: 3vw;
            width: 52vw;
            font-family: var(--font7);
            border-radius: 5px;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .heading {
            padding-bottom:2vw;
            margin-top:-2vw;
            margin-left:19vw;
        }
        .heading h1 {
            font-family: var(--font3); 
        }
        </style>
</head>
<body>
    <div class="full-page">
        <div class="left-sidebar">
            <!-- <div class="logo">
                <img src="Image\Logo.png" >
            </div> -->
            <div class="profile">
                <img src="adminPhoto/<?php echo $a_photo; ?>" >
                <input type="text" value="<?php echo $a_uname; ?>" readonly>
            </div>
            <ul>
                <div class="list">
                   <ul>
                    <li><a href="admin_panel.php">
                        <span class="icon"><ion-icon name="grid-outline"></ion-icon></span>
                        <span class="item">My Dashboard</span>
                    </a></li>
                    <li><a href="#">
                        <span class="icon"><ion-icon name="eye-outline"></ion-icon></span>
                        <span class="item">View Details</span>
                    </a></li>
                    <!-- <li><a href="#">
                        <span class="icon"><ion-icon name="add-outline"></ion-icon></span>
                        <span>Add Category</span>
                    </a></li> -->
                   </ul>
                </div>
                <li>
                    <div class="dropdown">
                        <button onclick="myFunction()" class="dropbtn">
                            <span class="icon"><ion-icon name="people-outline"></ion-icon></span>
                            <span>Manage</span> 
                            <span class="down"><ion-icon name="chevron-down-outline"></ion-icon></span>
                        </button>
                        <div id="myDropdown" class="dropdown-content">
                          <a href="a_manage_user.php">User</a>
                          <a href="a_manage_content.php">Content</a>
                          <a href="a_service.php">Service</a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <div class="right-bar">
            <div class="top-navbar">
              <div class="top-info-bar">
                <div class="logo-box">
                    <img src="Image/Logo.png">
                </div>
                <form action="" method="post">
                <div class="profile-box">
                    <button name="logout">Logout</button>
                </div>  
              </div>
                <div class="hamburger">
                    <!-- <a href=""><span><ion-icon name="menu-outline"></ion-icon></span></a> -->
                    
                </div>
            </div>
            <div class="right_content">
                <div class="a_detail_box">
                    <?php
                    if($cnt==1){
                        echo "<div class='invalid-box-2'>";
                        echo "<span>Profile updated successfully</span>";
                        echo "</div>";
                        $cnt=0;
                    }
                    if($cnt==2){
                        echo "<div class='invalid-box-1'>";
                        echo "<span>Profile not updated</span>";
                        echo "</div>";
                        $cnt=0;
                    }
                    ?>
                    <br>
                        <div class="heading">
                            <h1>Admin Details</h1>
                            <br><br>
                        </div>
                        <span>ID:</span>
                        <input type="text" value="0<?php echo $row['a_id'];?>">
                        <br><br><br>
                        <span>Name:</span>
                        <input type="text" name="a_name" value="<?php echo $row['a_name'];?>" >
                        <br><br><br>
                        <span>Email:</span>
                        <input type="text" name="a_email" value="<?php echo $row['a_email'];?>" >
                        <br><br><br>
                        <span>Username:</span>
                        <input type="text" name="a_u_name" value="<?php echo $row['a_u_name'];?>" >
                        <br><br><br>
                        <span>Password:</span>
                        <input type="text" name="a_pass" value="<?php echo $row['a_pass'];?>" >
                        <br><br><br>
                        <center><button name="u_btn">Update Details</button></center>
                    </form>
                </div>
                <div class="a_photo">
                    <img src="Image/cat pop 1.svg">
                </div>
            </div>
        </div>
    </div>
    <script>
        function myFunction() {
          document.getElementById("myDropdown").classList.toggle("show");
        }
        
        // Close the dropdown if the user clicks outside of it
        window.onclick = function(event) {
          if (!event.target.matches('.dropbtn || .down')) {
            var dropdowns = document.getElementsByClassName("dropdown-content");
            var i;
            for (i = 0; i < dropdowns.length; i++) {
              var openDropdown = dropdowns[i];
              if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
              }
            }
          }
        }
    </script>
    <script>
        var hamburger = document.querySelector(".hamburger");
        hamburger.addEventListener("click",function(){
            document.querySelector("body").classList.toggle("active");
        });
    </script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>