<?php
    include "connect.php";
    $cnt=0;

    if(isset($_POST['sbtn'])) 
    {
        $uname=$_POST['un'];
        $psd=$_POST['pass'];
        
        if($uname==NULL && $psd==NULL)
        {
            $cnt=2;
        }
        else {
            if($uname==NULL)
            {
                $cnt=3;
            }
            else {
                if ($psd==NULL)
                {
                    $cnt=4;
                }
            }
        } 
        if($uname && $psd != NULL)
        {

            if(!empty($_POST['sbtn'])) 
            {
                $sql = "SELECT * FROM Login WHERE u_uname='$uname' && u_pass='$psd'";
                $result=mysqli_query($con,$sql);
                $row=mysqli_fetch_array($result);
                $uid=$row['u_id'];

                $sql2 = "SELECT * FROM user WHERE u_id='$uid'";
                $result2=mysqli_query($con,$sql2);
                $row2=mysqli_fetch_array($result2);
                $photo = $row2['photo_doc'];

                $sql1 = "SELECT * FROM admin WHERE a_u_name='$uname' && a_pass='$psd'";
                $result1=mysqli_query($con,$sql1);
                $row1=mysqli_fetch_array($result1);
                $a_uid=$row1['a_id'];
                $a_name=$row1['a_u_name'];
                $a_photo=$row1['a_photo'];
                
                if($row1['a_u_name']==$uname && $row1['a_pass']==$psd){
                    
                    session_start();
                    $_SESSION['a_id'] = $a_uid;
                    $_SESSION['a_u_name'] = $a_name;
                    $_SESSION['a_photo'] = $a_photo;
                    
                    echo  
                    "
                         <script> alert('You have logged in successfully...'); window.location.href='admin_panel.php';</script>
                    ";  
                }
                else{
                    $cnt=1;
                }
                if($row['u_uname']==$uname && $row['u_pass']==$psd){

                    session_start();
                    $_SESSION['u_id'] = $uid;
                    $_SESSION['uname'] = $uname;
                    $_SESSION['photo'] = $photo;
                    echo "HWllo=",$photo;
                    
                    echo  
                    "
                         <script> alert('You have logged in successfully...'); window.location.href='index.php';</script>
                    ";  
                }
                else{
                    $cnt=1;
                }
            }
        }
    }
    if(isset($_POST['rbtn']))
    {
        header("Location:Registration.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="utilities/utility.css">
    <link rel="stylesheet" href="css/style.css">
    <title>ARticity</title>
    <style>
        .invalid-box {
            margin-top: 1vw;
            margin-bottom: -2vw;
            border: 1px solid darkred;
            background-color: rgba(249, 164, 164, 0.91);
            height: 3vw;
            width: 34vw;
            font-family: var(--font7);
            border-radius: 5px;
            color: darkred;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    .content-3 {
        height: 45vw;
    }
    </style>
</head> 
<body>
    <form action="" method="post">
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
        <div class="space">

        </div>
        <center>
            <div>
                <?php
                    if($cnt==1){
                        echo "<div class='invalid-box'>";
                        echo "<span>Username or password invalid...</span>";
                        echo "</div>";
                        $cnt=0;
                    }
                    if($cnt==2){
                        echo "<div class='invalid-box'>";
                        echo "<span>Enter the username and password...</span>";
                        echo "</div>";
                        $cnt=0;
                    }
                    if($cnt==3){
                        echo "<div class='invalid-box'>";
                        echo "<span>Please enter the username...</span>";
                        echo "</div>";
                        $cnt=0;
                    }
                    if($cnt==4){
                        echo "<div class='invalid-box'>";
                        echo "<span>Please enter the password...</span>";
                        echo "</div>";
                        $cnt=0;
                    }
                    
                ?>
            </div>
            
        </center>
        <div class="login">
            <video autoplay loop muted plays-inline class="bgvideo-2">
                <source src="Image/Starlight.mov">
            </video>
            <div class="login-header">
                <center>
                    <span>LOGIN</span>
                </center>
            </div>
            <center>
                <div class="login-info">
                    <input type="text" name="un" placeholder="Username" value="<?php echo $uname ?>" >
                    <br> <br>
                    <input type="password" name="pass" placeholder="Password" value="<?php echo $psd?>" >
                    <br> <br>
                </div>
                <br>
                <div class="login-btn">
                    <input type="submit" name="sbtn" value="Submit">
                    <input type="reset" name="rbtn" value="Reset">
                </div>
                <br>
                <hr>
                <br>
                <div class="log-reg">
                    <span>Don't have an account?</span> <br>
                    <a href="Registration.php"><input type="submit" value="Register" name="rbtn"></a>
                </div>
            </center>

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
    </form>
</body>
</html>