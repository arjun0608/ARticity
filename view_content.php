<?php
  include "connect.php";
  session_start();
  $a_uid = $_SESSION['a_id'];
  $a_uname = $_SESSION['a_u_name'];
  $a_photo = $_SESSION['a_photo']; 
  $uuid = $_SESSION['a_mana_mu_u_id'];
  $cnt = $_SESSION['cnt'];

  if($cnt==1)
  {
    $sql1 = "SELECT * FROM u_music WHERE id='$uuid'";
    $result1 = mysqli_query($con,$sql1);
    $row1 = mysqli_fetch_array($result1); 
  }

  if($cnt==2)
  {
    $sql1 = "SELECT * FROM modelling WHERE id='$uuid'";
    $result1 = mysqli_query($con,$sql1);
    $row1 = mysqli_fetch_array($result1); 
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
        .right_content .view-user span{
            /* display: flex; */
            /* align-items:center; */
            /* justify-content:center; */
            height:10vw;
            width:40vw;
        }
        .cls1 {
          color: rgba(0, 0, 0, 0.831);
          font-family:var(--font9);
          font-size:2vw;
          font-weight:900;
        }
        .cls1 input {
          color: rgba(0, 0, 0, 0.831);
          border:none;
          font-family:var(--font9);
          font-size:1.8vw;
          margin-left:1vw;
        }
        .view-user {
          padding:7vw;
        }

        .cls2 {
          font-family:var(--font10);
          font-size:2vw;
          font-weight:900;
        }

        .cls3 {
          font-family:var(--font10);
          font-size:1.7vw;
        }
        .view-user table {
          width:50vw;
        }
        .view-user table tr {
            height:5vw;
        }
        .view-user table tr th span {
          font-family:var(--font9);
          font-size:1.4vw;
        }
        .view-user table tr td {
          background-color:whitesmoke;
        }
        .view-user table tr td span {
          font-family:var(--font9);
          font-size:1.4vw;
        }
        .v_btn {
          background-color:blue;
          color:white;
          border:thin;
          height:2.4vw;
          width:5vw;
          font-family:var(--font9);
          font-size:1.2vw;
          border-radius:5px;
        }
        .d_btn {
          background-color:red;
          color:white;
          border:thin;
          height:2.4vw;
          width:5vw;
          font-family:var(--font9);
          font-size:1.2vw;
          border-radius:5px;
        }
        .view-user table tr td button:hover {
          background-color:rgba(191, 189, 189, 0.635);
          color:black;
          transition:0.3s;
          cursor:pointer;
        }
        .view-user table tr th {
          min-width:5vw;
          background-color:black;
          color:white;
        }

        .cls4 {
          font-family:var(--font10);
          font-size:1.7vw;
        }

        .cls5 {
          font-family:var(--font10);
          font-size:1.7vw;
        }
        .right_content img {
          position:absolute;
          height:15vw;
          width:15vw;
          border-radius:10vw;
          top:15vw;
          right:10vw;
        }
        .heading {
          margin-left:20vw;
          padding-bottom:2vw;
        }
        .heading h1 {
          font-family:var(--font3);
          font-size:3vw;
          color: rgba(0, 0, 0, 0.631);
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
                    <li><a href="#">
                        <span class="icon"><ion-icon name="grid-outline"></ion-icon></span>
                        <span class="item">My Dashboard</span>
                    </a></li>
                    <li><a href="admin_details.php">
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
                  <?php
                  $user_id = $row1['u_id'];
                  $sql20 = "SELECT * FROM user WHERE u_id='$user_id'";
                  $result20 = mysqli_query($con,$sql20);
                  $row20 = mysqli_fetch_assoc($result20);
                    if($cnt==1)
                    {

                  ?>
                    <img src="uploads/<?php echo $row20['photo_doc']?>">
                    <div class="view-user">
                        <div class="heading">
                          <h1>Content Details</h1>
                        </div>
                        <span class="cls1">
                          Id:<input type="text" name="v_id" value="<?php echo $row1['id']?>" readonly>
                          <br><br>
                          Artist Name:<input type="text" name="v_name" value="<?php echo $row1['u_name']?>" readonly>
                          <br><br>
                          Title:<input type="text" name="v_title" value="<?php echo $row1['title']?>" readonly>
                          <br><br>
                          Description:<input type="text" name="v_desp" value="<?php echo $row1['desp']?>" readonly> 
                          <br><br>
                        </span>
                    </div>
                  <?php
                    $cnt=0;
                    }
                      
                  ?>

                  <?php
                    if($cnt==2)
                    {
                  ?>
                    <img src="uploads/<?php echo $row20['photo_doc']?>">
                    <div class="view-user">
                        <div class="heading">
                          <h1>Content Details</h1>
                        </div>
                        <span class="cls1">
                          Id:<input type="text" name="v_id" value="<?php echo $row1['id']?>" readonly>
                          <br><br>
                          Model Name:<input type="text" name="v_name" value="<?php echo $row1['u_name']?>" readonly>
                          <br><br>
                          Title:<input type="text" name="v_title" value="<?php echo $row1['title']?>" readonly>
                          <br><br>
                          Description:<input type="text" name="v_desp" value="<?php echo $row1['desp']?>" readonly> 
                          <br><br>
                        </span>
                    </div>
                  <?php
                  $cnt=0;
                    }
                  ?>
                  
                </form>
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