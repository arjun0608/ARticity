<?php

    include "connect.php";
    $cnt=0;

    if(isset($_POST['r_sbtn'])) 
    {
        $name=$_POST['nm'];
        $email=$_POST['em'];
        $uname=$_POST['un'];
        $psd=$_POST['pass'];
        $bio=$_POST['bio'];

        if ($name && $email && $uname && $psd && $bio != NULL)
        {
            $nanum = preg_match('/[0-9]/',$name);
            $naspcl = preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/',$name);
            $nan = preg_match('/[A-Za-z]/',$name);
            
            if($nan==1)
            {
                if ($nanum!=1) 
                {
                    if ($naspcl!=1)
                    {   
                        if (strlen($uname)<=8)
                        { 
                            $uname_c = preg_match('/\s/',$uname); 

                            if ($uname_c!=1)
                            {                               
                                $u_sql = "SELECT * FROM Login WHERE u_uname='$uname'";
                                $u_result=mysqli_query($con,$u_sql);
                                $u_row=mysqli_fetch_array($u_result);
                                
                                if($u_row==NULL)
                                {
                                    if(strlen($psd)<8)
                                    {
                                        $cnt=3;
                                    }
                                    else
                                    {
                                        $cap = preg_match('/[A-Z]/',$psd);
                                        $small = preg_match('/[a-z]/',$psd);
                                        $num = preg_match('/[0-9]/',$psd);
                                        $spcl = preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/',$psd);

                                        if($cap!=1)
                                        {
                                            $cnt=4;
                                        }
                                        else 
                                        {
                                            if($small!=1)
                                            {
                                                $cnt=5;
                                            }
                                            else
                                            {
                                                if($num!=1)
                                                {
                                                    $cnt=6;
                                                }
                                                else
                                                {
                                                    if ($spcl!=1)
                                                    {
                                                        $cnt=7;
                                                    }
                                                    else
                                                    { 
                                                        $img_name = $_FILES['u_img']['name'];
                                                        $img_tmp_name = $_FILES['u_img']['tmp_name'];
                                                        $folder = "uploads/";
                                                        move_uploaded_file($img_tmp_name,$folder.$img_name);
                                            
                                                        $sql1="INSERT INTO user VALUES (NULL,'$name','$email','$uname','$psd','$bio','$img_name')";
                                                        mysqli_query($con,$sql1);
                                                        
                                                        $sql2="SELECT * FROM user WHERE u_uname='$uname' && u_pass='$psd'";
                                                        $result=mysqli_query($con,$sql2);
                                                        $row=mysqli_fetch_array($result);
                                                        $uid=$row['u_id'];
                                            
                                                        $sql3="INSERT INTO Login VALUES ('$uid','$uname','$psd')";
                                                        mysqli_query($con,$sql3);   
                                                            
                                                        echo  
                                                        "
                                                            <script> alert('Data Inserted Successfully...'); window.location.href='login.php'; </script>
                                                        ";
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                                else
                                {
                                    $cnt=8;
                                }
                            }
                            else
                            {
                                $cnt=10;
                            }
                        }
                        else 
                        {
                            $cnt=11;
                        }
                    }
                    else
                    {
                        $cnt=9;
                    }
                }
                else
                {
                    $cnt=2;
                }
            }
            else 
            {
                $cnt=12;
            }
        }
        else {
            $cnt=1;
        }
    }

    if(isset($_POST['lbtn']))
    {
        header("Location:login.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <script type="text/javascript">window.history.forward();</script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="utilities/utility.css">
    <link rel="stylesheet" href="css/style.css">
    <title>ARticity</title>
    <style>

    .invalid-box-1 {
        margin-top: -1vw;
        margin-bottom: -2vw;
        border: 1px solid darkred;
        background-color: rgba(249, 164, 164, 0.91);
        height: 3vw;
        width: 53.5vw;
        font-family: var(--font7);
        border-radius: 5px;
        color: darkred;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .reg {
        background-color: rgba(255, 255, 255, 0.5);
        height: 36.4vw;
        max-width: 50vw;
        margin: auto;
        border-radius: 10px;
        padding: 2vw;
        box-shadow: 0 6px 25px rgba(0 0 0 /15%);
        margin-top:3vw;
    }
    .content-3 {
        height: 48vw;
        /* background-color: rgb(29, 26, 37);
        background-image: linear-gradient(20deg, rgb(5, 13, 28), rgb(209, 214, 252)); */
        background-image: url("VISA.jpg");
    }
    .reg-btn {
        display: flex;
        justify-content: center;
        margin-left: -5vw;
        margin-bottom: 0.1vw;
        margin-top: 1vw;
    }
    .reg-btn input {
        background-color: black;
        color: white;
        font-size: 1vw;
        height: 2.5vw;
        width: 8vw;
        margin-left: 5vw;
        border-radius: 2px;
        font-family: var(--font7);
        border: none;
    }

    .reg-btn input:hover {
        cursor: pointer;
        background-color: white;
        color: black;
        transition: 0.5s;
    }
    .r-bottom {
        height: 6vw;
        width: 6vw;
        border-radius: 50%;
        /* margin: 45% 45%; */
    }
    .r-bottom label ion-icon {
        margin-top: 0.5vw;
        height:2vw;
        width:2vw;
    }
    #photo {
        height: 10vw;
        width: 10vw;
        border-radius:50%; 
        margin-left:-2vw; 
    }
    #file {
        display:none;
    }
    #uploadbtn {
        position: absolute;
        height:40px;
        width:40px;
        padding: 6px 6px;
        border-radius: 50%;
        cursor: pointer;
        color: #FFF;
        transform:translateX(-130%);
        margin-top:-3vw;
        background-color: rgba(110, 110, 110, 0.9);
        box-shadow: 2px 4px 4px #000;
    }
    .r-top span {
        /* margin-left:2vw; */
    }
    </style>
</head> 
<body>
    <form action="" method="post" enctype="multipart/form-data">
    <!-- header -->
    <div class="header">
        <div class="left-header">
            <!-- <span>ARticity</span> -->
            <img src="Image/Logo.png">
        </div>
        <div class="right-header">
            <!-- <span>Profile</span> -->
        </div>
    </div>
    
    <!-- content -->
    <div class="content-3">
        <video autoplay loop muted plays-inline class="bgvideo-2">
            <source src="Image/Starlight.mov">
        </video>
        <div class="header-content">
            <!-- <div class="left-header-content">
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Service</a></li>
                    <li><a href="#">Upload</a></li>
                    <li><a href="#">About Us</a></li>
                </ul>
            </div> 
            <div class="right-header-content">
                <span>Choose the type of service:</span>
                <select>
                    <option value="Music" selected>Music</option>
                    <option value="Modelling">Modelling</option>
                    <option value="Data Entry">Data Entry</option>
                    <option value="Photography">Photography</option>
                    <option value="Video Editing">Video Editing</option>
                    <option value="Photo Editing">Photo Editing</option>
                </select>   
            </div>  -->
        </div>
        <div class="space">

        </div>
        <center>
            <div>
                <?php
                    if($cnt==1){
                        echo "<div class='invalid-box-1'>";
                        echo "<span>Fill all the fields...</span>";
                        echo "</div>";
                        $cnt=0;
                    }
                    if($cnt==2){
                        echo "<div class='invalid-box-1'>";
                        echo "<span>Username should not contain numbers...</span>";
                        echo "</div>";
                        $cnt=0;
                    }
                    if($cnt==3){
                        echo "<div class='invalid-box-1'>";
                        echo "<span>Password should contain atleast 8 characters...</span>";
                        echo "</div>";
                        $cnt=0;
                    }
                    if($cnt==4){
                        echo "<div class='invalid-box-1'>";
                        echo "<span>Password should contain atleast 1 Capital letter</span>";
                        echo "</div>";
                        $cnt=0;
                    }
                    if($cnt==5){
                        echo "<div class='invalid-box-1'>";
                        echo "<span>Password should contain atleast 1 small letter...</span>";
                        echo "</div>";
                        $cnt=0;
                    }
                    if($cnt==6){
                        echo "<div class='invalid-box-1'>";
                        echo "<span>Password should contain atleast 1 number</span>";
                        echo "</div>";
                        $cnt=0;
                    }
                    if($cnt==7){
                        echo "<div class='invalid-box-1'>";
                        echo "<span>Password should contain atleast 1 special character...</span>";
                        echo "</div>";
                        $cnt=0;
                    }
                    if($cnt==8){
                        echo "<div class='invalid-box-1'>";
                        echo "<span>Username already exists...</span>";
                        echo "</div>";
                        $cnt=0;
                    }
                    if($cnt==9){
                        echo "<div class='invalid-box-1'>";
                        echo "<span>Name should not contain special characters...</span>";
                        echo "</div>";
                        $cnt=0;
                    }
                    if($cnt==10){
                        echo "<div class='invalid-box-1'>";
                        echo "<span>Username should not contain space...</span>";
                        echo "</div>";
                        $cnt=0;
                    }
                    if($cnt==11){
                        echo "<div class='invalid-box-1'>";
                        echo "<span>Username should not be more than 8 characters...</span>";
                        echo "</div>";
                        $cnt=0;
                    }
                    if($cnt==12){
                        echo "<div class='invalid-box-1'>";
                        echo "<span>Name should contain atleast 1 character...</span>";
                        echo "</div>";
                        $cnt=0;
                    }
                ?>
            </div>
        </center>
        <div class="reg">
            <div class="reg-header">
                <center>
                    <span>Registration</span>
                </center>
            </div>
            <div class="reg-e-info">
                <div class="reg-box">
                    <div class="left-reg">
                        <div class="reg-info">
                            <!-- <span>Name: </span><br> -->
                            <input type="text" name="nm" placeholder="Name" value="<?php echo $name ?>">
                            <br><br>
                            <!-- <span>Email: </span><br> -->
                            <input type="email" name="em" placeholder="Email" value="<?php echo $email ?>">
                            <br><br>
                            <!-- <span>Username: </span><br> -->
                            <input type="text" name="un" placeholder="Username" value="<?php echo $uname ?>">
                            <br><br>
                            <!-- <span>Password: </span><br> -->
                            <input type="password" name="pass" placeholder="Password" value="<?php echo $psd ?>">
                            <br><br>
                            <!-- <span>Bio:</span><br> -->
                            <textarea name="bio" placeholder="Bio"><?php echo $bio ?></textarea>
                            <br><br>        
                        </div>
                    </div>
                    <div class="right-reg">
                        <center>
                            <div class="r-top">
                                <span>Upload Profile Photo</span>
                            </div>
                        </center>
                        <center>
                            <div class="r-bottom">
                                <img src="Image/Profile.jpg" id="photo">
                                <input type="file" id="file" name="u_img">
                                <label for="file" id="uploadbtn" name="u_img"><ion-icon name="camera"></ion-icon></label>
                            </div>
                        </center>
                    </div>
                </div>
            </div>
            <!-- <center> -->
            <div class="reg-btn">
                    <input type="submit" name="r_sbtn" value="Submit">
                    <input type="reset" name="r_rbtn" value="Reset">
                </div>
            <!-- </center> -->
            <div class="a-l-a">
                <br>
                <center>
                    <span>Already have an account?</span>
                    <br>
                    <a href="login.html"><button name="lbtn">Login</button></a>
                </center>  
            </div>
        </div>
    </div>

    <!-- footer -->
    <div class="footer">
        <div class="social-media">
            <div class="f-box-1">
                <h1>Contact Us:</h1><br>
                <span>ph: 9859687047</span><br>
                <span>gmail: articity@gmail.com</span>
            </div>
            <div class="f-box-2">
                <div class="s-1">
                    <a href="https://www.instagram.com">
                        <ion-icon name="logo-instagram"></ion-icon>
                    </a>
                </div>
                <div class="s-2">
                    <a href="https://www.facebook.com">
                        <ion-icon name="logo-facebook"></ion-icon>
                    </a>
                </div>
                <div class="s-3">
                    <a href="https://www.whatsapp.com">
                        <ion-icon name="logo-whatsapp"></ion-icon>  
                    </a>
                </div>
            </div>
        </div>
        <br>
        <hr>
        <div class="end-line">
            <span>The thing that you love in yourself becomes adorable to others...!!!</span>
        </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="registration.js"></script>
    </form>
</body>
</html>