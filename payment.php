<?php
    session_start();
    $uname=$_SESSION['uname'];
    $photo = $_SESSION['uname'];
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
</head> 
<body>
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
        <video autoplay loop muted plays-inline class="bgvideo">
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
        <div class="payment">
            <div class="pay-header">
                <center>
                    <span>Confirm your payment</span>
                </center>
                <br>
            </div>
            <input type="text" value="Total : $100 USD" readonly>
            <br><br>
            <div class="pay-info">
                <input type="text" placeholder="First Name">
                <input type="text" placeholder="Last Name">
            </div>
            <br><br>

            <div class="pay-add-info">
                <span>Card No:</span>
                <input type="text" placeholder="0000-0000-0000-0000" maxlength="16">
            </div>
            <br>
            <span>Expiry Date:</span>
            <div class="pay-d-c">
                <div class="pay-date">
                    <input type="text" placeholder="MM" maxlength="2">
                    <input type="text" placeholder="YY" maxlength="2"> 
                </div>
                <div class="pay-cvv">
                    <input type="text" placeholder="CVV">
                </div>
            </div>
            <br>
            <div class="pay-image">
                <img src="Image/MasterCard.jpg">
                <img src="Image/VISA.jpg">
                <img src="Image/PayPal.jpg">
            </div>
            <br>
            <div class="pay-now">
                <button>Pay now</button>
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
</body>
</html>