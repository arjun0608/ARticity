<?php
    include "connect.php";
    session_start();
    $uname=$_SESSION['uname'];
    $uid=$_SESSION['u_id'];
    $cnt=0;
    $photo = $_SESSION['photo'];


    $sql = "SELECT * FROM user WHERE u_id=$uid";
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_assoc($result);

    $name = $row['uname'];
    $u_uname = $row['u_uname'];
    $email = $row['u_email'];
    $bi = $row['u_bio'];

    if(isset($_POST['e_sbtn']))
    {
        $up_name = $_POST['up_name'];
        $up_uname = $_POST['up_uname'];
        $up_email = $_POST['up_email'];
        $up_pass = $_POST['up_pass'];
        $up_bio = $_POST['up_bio'];
        
        // echo $up_name, $up_uname, $up_email, $up_pass, $up_bio; 
        $sql1 = "UPDATE user SET uname = '$up_name', u_uname = '$up_uname', u_email = '$up_email', u_pass = '$up_pass', u_bio = '$up_bio' WHERE u_id = '$uid'";
        $result1 = mysqli_query($con,$sql1);

        $sql2 = "UPDATE Login SET u_uname = '$up_uname', u_pass = '$up_pass' WHERE u_id = '$uid'";
        $result2 = mysqli_query($con,$sql2);

        if($result2)
        {
            $cnt=1;
        }
        else
        {
            $cnt=2;
        }
    }
    
    if(isset($_POST['de-btn'])) {

        // echo $uid;
        $sql3 = "DELETE FROM Login WHERE u_id='$uid'";
        $result3 = mysqli_query($con,$sql3);

        $sql4 = "DELETE FROM user WHERE u_id='$uid'";
        $result4 = mysqli_query($con,$sql4);

        $sql5 = "DELETE FROM sell WHERE u_id='$uid'";
        $result5 = mysqli_query($con,$sql5);

        $sql6 = "DELETE FROM u_music WHERE u_id='$uid'";
        $result6 = mysqli_query($con,$sql6);

        $sql7 = "DELETE FROM modelling WHERE u_id='$uid'";
        $result7 = mysqli_query($con,$sql7);

        $sql8 = "DELETE FROM wishlist WHERE u_id='$uid'";
        $result8 = mysqli_query($con,$sql8);

        echo  
        "
            <script> alert('Account Deleted Successfully...'); window.location.href='registration.php';</script>
        ";    
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
</head> 
<style>
    * {
    padding: 0vw;
    margin: 0vw;
}

.header {
    height: 4vw;
    background-color: #0f0f0f;
    display: flex;
    justify-content: space-between;
    align-items: center;
    color: white;
}

.left-header span {
    padding-left: 1.4vw;
    font-family: var(--font5);
    font-size: 1.7vw;
}

.left-header img {
    width: 9vw;
    height: 3vw;
    margin-left: 1vw;
    margin-top: 0.8vw;
}

.right-header {
    font-family: var(--font1);
    font-size: 1.4vw;
    padding-right: 1vw;
    display: flex;
    position:relative;
}

.right-header span {
    margin-top: 0.1vw;
}

.right-header img {
    height: 2vw;
    width: 2vw;
    margin-left: 0.5vw;
    border-radius: 20px;
    margin-top: 0.5vw;
}

.right-header img:hover {
    cursor: pointer;
}

.header-content {
    display: flex;
    background-color: rgba(190, 189, 189, 0.639);
    align-items: center;
    justify-content: space-between;
}

.left-header-content {
    height: 2vw;
    display: flex;
}

.left-header-content ul {
    display: flex;
    list-style-type: none;
    align-items: center;
}

.left-header-content ul li a {
    /* padding: 1vw 2Vw; */
    text-decoration: none;
    color: rgba(0, 0, 0, 0.731);
    margin: 1.4vw;
    font-family: var(--font1);
}

.left-header-content ul li a:hover { 
    /* background-color:white; */
    color: rgb(255, 255, 255);
    transition: 0.3s;
}

.dropbtn {
    background-color: transparent;
    color: rgba(0, 0, 0, 0.731);
    padding: 16px;
    font-size: 1.2vw;
    height: 2vw;
    border: none;
    cursor: pointer;
    display: flex;
    justify-content: center;
    align-items: center;
    font-family: var(--font1);
    /* margin-left:-2vw; */
}

.dropbtn:hover {
    color: black;
    transition: 0.3s;
}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: whitesmoke;
    /* background-color: rgba(223, 220, 220, 0.99); */
    min-width: 10vw;
    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
    z-index: 1;
    margin-top: -0.1vw;
    margin-left: -0.8vw;
}

.dropdown-content a {
    color: black;
    padding: 12px 30px;
    text-decoration: none;
    display: block;
}

.dropdown-content a:hover {
    background-color: black;
    color: white;
    transition: 0.5s;
}

.dropdown:hover .dropdown-content {
    display: block;
    transition: 0.5s;
}

.dropdown:hover .dropbtn {
    background-color: whitesmoke;
    /* color: rgba(0, 0, 0, 0.731); */
    transition: 0.5s;
}

.dropbtn1 {
    background-color: transparent;
    color: rgba(0, 0, 0, 0.731);
    padding: 16px;
    font-size: 1.2vw;
    height: 2vw;
    border: none;
    cursor: pointer;
    display: flex;
    justify-content: center;
    align-items: center;
    font-family: var(--font1);
}

.dropbtn1:hover {
    color: black;
    transition: 0.3s;
}

.dropdown1 {
    position: relative;
    display: inline-block;
}

.dropdown-content1 {
    display: none;
    position: absolute;
    background-color: rgba(245, 245, 245, 0.99);
    /* background-color: rgba(223, 220, 220, 0.99); */
    min-width: 98vw;
    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
    z-index: 1;
    margin-top: -0.1vw;
    margin-left: -12vw;
    height: 20vw;
}

.dropdown-content1 a {
    color: black;
    padding: 12px 30px;
    text-decoration: none;
    display: block;
}

.dropdown-content1 a:hover {
    background-color: black;
    color: white;
    transition: 0.5s;
}

.dropdown1:hover .dropdown-content1 {
    display: flex;
    flex-wrap: wrap;
    transition: 0.5s;
}

.dropdown1:hover .dropbtn1 {
    background-color: whitesmoke;
    /* color: rgba(0, 0, 0, 0.731); */
    transition: 0.5s;
}
/* // */
.dropbtn3 {
    background-color: transparent;
    color: white;
    padding: 16px;
    font-size: 1.2vw;
    height: 2vw;
    border: none;
    cursor: pointer;
    display: flex;
    justify-content: center;
    align-items: center;
    font-family: var(--font1);
}

.dropbtn3:hover {
    color: black;
    transition: 0.3s;
}

.dropdown3 {
    position: relative;
    display: inline-block;
}

.dropdown-content3 {
    display: none;
    position: absolute;
    background-color: whitesmoke;
    /* background-color: rgba(223, 220, 220, 0.99); */
    min-width: 10vw;
    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
    z-index: 1;
    margin-top: -0.1vw;
    margin-left: -0.8vw;
}

.dropdown-content3 a {
    color: black;
    padding: 12px 30px;
    text-decoration: none;
    display: block;
}

.dropdown-content3 a:hover {
    background-color: black;
    color: white;
    transition: 0.5s;
}

.dropdown3:hover .dropdown-content3 {
    display: block;
    transition: 0.5s;
}

.dropdown3:hover .dropbtn3 {
    background-color: whitesmoke;
    /* color: rgba(0, 0, 0, 0.731); */
    transition: 0.5s;
}
.right-header-content {
    padding-right: 1.4vw;
    font-family: var(--font1);
}

.right-header-content select option {
    font-family: var(--font1);
}

.right-header-content span {
    padding-right: 0.4vw;
    color: rgba(0, 0, 0, 0.731);
}

.content-1 {
    height: 70vw;
    background-color: rgba(143, 188, 143, 0.745);
}

.content-2 {
    height: 90vw;
    /* background-color: rgba(143, 188, 143, 0.745); */
}

.content-3 {
    height: 45vw;
    /* background-color: rgb(29, 26, 37);
    background-image: linear-gradient(20deg, rgb(5, 13, 28), rgb(209, 214, 252)); */
    /* background-image: url("VISA.jpg"); */
}



.bgvideo {
    position: absolute;
    right: 0;
    bottom: -1;
    z-index: -1;
    width: 100%;
    height: 100%;
    filter: blur(8px);
}

.bgvideo-1 {
    position: absolute;
    right: 0;
    bottom: -850px;
    z-index: -1;
    width: 100%;
    height: 100%;
    /* filter: blur(1px); */
}

.bgvideo-2 {
    position: absolute;
    right: 0;
    bottom: -80px;
    z-index: -1;
    width: 100%;
    height: 100%;
    /* filter: blur(1px); */
}

.image {
    /* margin-left: 1vw; */
    margin-top: 2vw;
}

.image img {
    width: 90%;
    height: 38vw;
    /* box-shadow: 0 6px 7px rgba(0 0 0 /10%); */
}

.content-name {
    display: flex;
    justify-content: center;
    font-family: var(--font2);
    font-size: 3vw;
    padding-top: 2vw;
    /* color: rgba(0, 0, 0, 0.764); */
    color: white;
}

.search-1 {
    display: flex;
    justify-content: center;
    font-family: var(--font1);
    padding-top: 2vw;
    padding-bottom: 2vw;
}

.search-2 {
    display: flex;
    justify-content: center;
    font-family: var(--font1);
    /* padding-top: 10vw; */
    padding-bottom: 2vw;
}

.search-1 input {
    font-family: var(--font1);
    width: 50vw;
    height: 2vw;
}

.search-2 input {
    font-family: var(--font1);
    width: 50vw;
    height: 2vw;
    box-shadow: 0 6px 25px rgba(0 0 0 /30%);
    border: whitesmoke;
    border-radius: 1px;
}

.search-button {
    padding-left: 1vw;
    margin-top: -0.4vw;
}

.search-button button {
    padding: 0.8vw 2vw;
    font-family: var(--font1);
    background-color: rgba(0, 0, 0, 0.79);
    cursor: pointer;
    border-radius: 4px;
    color: white;
}

.search-button button:hover {
    background-color: whitesmoke;
    color: black;
    transition: 0.3s;
}

.service {
    background-color: whitesmoke;
    height: 50vw;
    max-width: 90vw;
    margin: auto;
    border-radius: 10px;
    padding: 2vw;
    box-shadow: 0 6px 25px rgba(0 0 0 /15%);
}

/* .reg {
    background-color: rgba(255, 255, 255, 0.5);
    height: 40.4vw;
    max-width: 50vw;
    margin: auto;
    border-radius: 10px;
    padding: 2vw;
    box-shadow: 0 6px 25px rgba(0 0 0 /15%);
} */

.login {
    background-color: rgba(255, 255, 255, 0.5);
    height: 25vw;
    max-width: 30vw;
    margin: auto;
    border-radius: 10px;
    padding: 2vw;
    box-shadow: 0 6px 25px rgba(0 0 0 /15%);
    margin-top: 3vw;
}

.payment {
    background-color: rgba(255, 255, 255, 0.5);
    height: 31vw;
    max-width: 30vw;
    margin: auto;
    border-radius: 10px;
    padding: 2vw;
    box-shadow: 0 6px 25px rgba(0 0 0 /15%);
    margin-top: 1vw;
    font-family: var(--font9);
}

.pay-header center span {
    font-family: var(--font10);
    font-size: 2vw;
    color: black;
}

.payment span {
    color: rgba(0, 0, 0, 0.548);
    font-size: 1.4vw;
}

.payment input {
    color: rgba(0, 0, 0, 0.479);
    font-family: var(--font7);
    height: 2vw;
    width: 100%;
    font-size: 1.4vw;
    font-family: var(--font9);
}

.pay-info {
    display: flex;
    justify-content: space-between;
}

.pay-info input {
    width: 45%;
    font-size: 1.1vw;
}

.pay-add-info {
    margin-top: -1vw;
}

.pay-date {
    display: flex;
    height: 2vw;
    width: 8vw;
}

.pay-add-info input {
    height: 1.8vw;
    width: 100%;
}

.pay-d-c {
    display: flex;
}

.pay-cvv {
    width: 20%;
    margin-left: 4vw;
}

.pay-image {
    display: flex;
    justify-content: center;
    margin-left: -0.4vw;
}

.pay-image img {
    height: 5vw;
    width: 30%;
    margin-left: 0.4vw;
}

.pay-now button {
    height: 3vw;
    width: 100%;
    background-color: blueviolet;
    color: white;
    font-size: 1vw;
    font-family: var(--font9);
    border: none;
    border-radius: 2px;
}

.pay-now button:hover {
    background-color: white;
    color: black;
    cursor: pointer;
    transition: 0.5s;
}

.log-reg {
    font-family: var(--font7);
    color: rgba(0, 0, 0, 0.764);
}

.log-reg input {
    background-color: blue;
    color: white;
    height: 2.5vw;
    width: 6.5vw;
    font-size: 0.9vw;
    font-family: var(--font7);
    margin-top: 0.7vw;
    border-radius: 2px;
    border: none;
}

.log-reg input:hover {
    background-color: white;
    color: black;
    cursor: pointer;
    transition: 0.5s;
}

.left-reg {
    width: 75%;
}

.left-reg textarea {
    height: 5vw;
    width: 80%;
    resize: none;
    border: solid whitesmoke;
}

.reg-info {
    font-family: var(--font7);
}

.reg-info textarea {
    font-size: 1.2vw;
    font-family: var(--font7);
    background-color: transparent;
    border-top: none;
    border-left: none;
    border-right: none;
    border-color: rgba(0, 0, 0, 0.304);
}

.reg-info textarea::placeholder {
    color: rgba(0, 0, 0, 0.319);
}

.a-l-a span {
    padding-bottom: 3vw;
    font-size: 1.4vw;
    color: rgba(0, 0, 0, 0.700);
    font-family: var(--font7);
}

.a-l-a button {
    margin-top: 0.8vw;
    background-color: blue;
    color: white;
    height: 2.5vw;
    width: 8.5vw;
    font-size: 1.1vw;
    font-family: var(--font7);
    border-radius: 6px;
    border: none;
}

.a-l-a button:hover {
    cursor: pointer;
    background-color: white;
    color: black;
    transition: 0.5s;
}

.reg-info input {
    height: 2vw;
    width: 80%;
    font-size: 1vw;
    background-color: transparent;
    border-top: none;
    border-left: none;
    border-right: none;
    border-color: rgba(0, 0, 0, 0.764);
}

.reg-info input::placeholder {
    color: rgba(0, 0, 0, 0.319);
}

.reg-box {
    display: flex;
}

.reg-header {
    padding-bottom: 2vw;
}

.reg-header span {
    font-family: var(--font1);
    font-size: 2vw;
    color: rgba(0, 0, 0, 0.764);
}

.right-reg span {
    font-family: var(--font7);
}

.right-reg img {
    height: 10vw;
    width: 10vw;
}

.login-header {
    padding-bottom: 2vw;
}

.login-header span {
    font-family: var(--font7);
    font-size: 2vw;
}

.login-info input {
    font-family: var(--font7);
    font-size: 1vw;
    height: 2vw;
    width: 90%;
}

.login-btn input {
    background-color: black;
    color: white;
    font-size: 1vw;
    height: 2.5vw;
    width: 8vw;
    margin: 1vw;
    border-radius: 2px;
    font-family: var(--font7);
    border: none;
}

.login-btn input:hover {
    cursor: pointer;
    background-color: white;
    color: black;
    transition: 0.5s;
}

.reg-btn input {
    background-color: black;
    color: white;
    font-size: 1vw;
    height: 2.5vw;
    width: 8vw;
    margin: 1vw;
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

.s1 table tr td h1 {
    font-size: 1.5vw;
    font-family: var(--font4);
    color: rgba(0, 0, 0, 0.533);
}

.space {
    padding-top: 2vw;
}

.service-info {
    background-color: whitesmoke;
    height: 70vw;
    max-width: 90vw;
    margin: auto;
    border-radius: 10px;
    padding: 2vw;
    box-shadow: 0 6px 25px rgba(0 0 0 /15%);
}

.showcase {
    font-family: var(--font6);
    font-size: 4vw;
    color: rgba(0, 0, 0, 0.75);
    padding-bottom: 1vw;
}

.service-charges {
    display: flex;
    font-family: var(--font8);
    font-size: 1vw;
    background-color: white;
    height: auto;
    width: 85vw;
    border-radius: 10px;
    max-width: 85vw;
    margin: auto;
    box-shadow: 0 6px 25px rgba(0 0 0 /15%);
}

.sell-form-box {
    background-color: whitesmoke;
    height: 70vw;
    max-width: 90vw;
    margin: auto;
    border-radius: 10px;
    padding: 2vw;
    box-shadow: 0 6px 25px rgba(0 0 0 /15%);
    font-family: var(--font8);
    color: rgba(0, 0, 0, 0.764);
}

.sell-form {
    padding: 4vw;
    font-size: 2vw;
}

.sell-form input {
    font-size: 1.5vw;
}

.sell-form select {
    font-size: 1.5vw;
    margin-left: 1vw;
}

.sell-form textarea {
    height: 10vw;
    width: 85vw;
    resize: none;
    font-family: var(--font8);
    font-size: 1.7vw;
    margin-top: 2vw;
}

.form-btn-box {
    margin-top: 2vw;
}

.form-btn-box input {
    font-family: var(--font8);
    font-size: 1vw;
    background-color: black;
    color: white;
    height: 4vw;
    width: 10vw;
    margin: 5vw;
    border-radius: 5px;
}

.form-btn-box input:hover {
    cursor: pointer;
    color: black;
    background-color: white;
    transition: 0.3s;

}

.ser h1 {
    font-size: 2vw;
}

.ser {
    padding: 3vw;
}

.s1:hover {
    cursor: pointer;
}

.m1 {
    padding: 2vw;
    font-size: 2vw;
    background-color: rgba(255, 255, 255, 0.4);
    border-radius: 10px;
}


.m1 table {
    /* background-color: darkgrey; */
    height: 5vw;
    width: 85vw;
}

.m1 table tr td {
    /* height: 5vw;
    width: 85vw;  */
}

.ch-d {
    font-family: var(--font4);
    font-size: 2vw;
    padding: 2vw;
    margin-bottom: -3.5vw;
    margin-left: -1.6vw;
    color: rgba(0, 0, 0, 0.764);
}

.s1 {
    padding: 2vw;
    font-size: 2vw;
    background-color: white;
    border-radius: 10px;
}

.si-image img {
    height: 20vw;
    width: 20vw;
    box-shadow: 0 6px 25px rgba(0 0 0 /10%);
}

.si-info {
    padding: 2vw;
    font-family: var(--font4);
    font-size: 2vw;
    color: rgba(0, 0, 0, 0.764);
}

.si-box {
    display: flex;
}

.si-content {
    margin-top: 2vw;
    padding: 2vw;
    background-color: white;
    height: 10vw;
    width: 85vw;
    border-radius: 4px;
    box-shadow: 0 6px 25px rgba(0 0 0 /7%);
}

.sic-1 img {
    height: 9vw;
    width: 9vw;
    padding-left: 1vw;
}

.sic-1 img:hover {
    cursor: pointer;
    transition: 0.3s;
}

.si-self {
    padding: 1vw;
    font-family: var(--font4);
    font-size: 1.8vw;
    color: rgba(0, 0, 0, 0.764);

}

.si-self table {
    font-size: 1.9vw;
    color: rgba(0, 0, 0, 0.764);
    font-family: var(--font4);
}

.si-self table tr td {
    height: 5vw;
    width: 8vw;
}

.si-self table tr td h1 {
    font-family: var(--font1);
    font-size: 2vw;
    color: rgba(0, 0, 0, 0.545);
}

.si-self table tr td button {
    height: 3vw;
    width: 8vw;
    font-family: var(--font3);
    font-size: 1.5vw;
    color: white;
    background-color: forestgreen;
    border-radius: 2px;
}

.si-self table tr td button:hover {
    cursor: pointer;
    background-color: black;
    transition: 0.5s;
}

.s1 table {
    /* background-color: darkgrey; */
    height: 5vw;
    width: 85vw;
}

.s1 table tr td {
    /* height: 5vw;
    width: 85vw;  */
}

.td1 {
    height: 6vw;
    width: 6vw;
}

.td2 {
    height: 6vw;
    width: 50vw;
    font-family: var(--font3);
    color: rgba(0, 0, 0, 0.764);
}

.td3 { 
    height: 6vw;
    width: 5vw;
}

.td3 button {
    width:5vw;
    height:5vw;
    font-size:2vw;
    background-color:transparent;
    border:none;
}

.td3 ion-icon {
    padding-top: 0.4vw;
    color: rgba(0, 0, 0, 0.764);

}

.td3:hover {
    cursor: pointer;
}

.td4 {
    height: 6vw;
    width: 8vw;
    font-family: var(--font4);
    color: rgba(0, 0, 0, 0.764);
}

.td4 span:hover {
    cursor: pointer;
    text-decoration: underline;
    transition: 0.3s;
}

.tds1 {
    height: 6vw;
    width: 6vw;
}



.tds2 {
    height: 6vw;
    width: 30vw;
    font-family: var(--font3);
    color: rgba(0, 0, 0, 0.764);
}

.tds3 {
    height: 6vw;
    width: 10vw;
}

.tds3 span {
    font-family: var(--font4);
    color: rgba(0, 0, 0, 0.764);
    font-size: 2vw;
}

.wishlist {
    display: flex;
}

.icon ion-icon {
    padding-bottom: -5vw;
    color: rgba(0, 0, 0, 0.764);
    padding-left: 0.4vw;
}

.tds4 {
    height: 6vw;
    width: 10vw;
    font-family: var(--font4);
    color: rgba(0, 0, 0, 0.764);
}

.tds4:hover {
    cursor: pointer;
    color: rgba(255, 0, 0, 0.864);
    transition: 0.2s;
}

.m2 {
    display: flex;
    justify-content: center;
    align-items: center;
}

.m2 table tr td {
    height: 24vw;
    width: 20vw;
    /* background-color: antiquewhite; */
}

.m2 img {
    height: 24vw;
    width: 20vw;
    padding-right: 2vw;
}

.m2:hover {
    cursor: pointer;
}

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

.footer {
    height: 12vw;
    background-color: black;
    color: white;
    font-family: var(--font4);
    padding: 2vw;
}

.social-media {
    display: flex;
    justify-content: space-between;
}

hr {
    border-color: rgba(0, 0, 0, 0.769);
}

.f-box-1 h1 {
    color: white;
}

.f-box-2 {
    padding-top: 1vw;
    height: 2vw;
    width: 10vw;
    font-size: 2vw;
    display: flex;
}

.s-1 {
    padding-left: 1vw;
}

.s-2 {
    padding-left: 1vw;
}

.s-3 {
    padding-left: 1vw;
}

.s-1:hover {
    cursor: pointer;
    color: aliceblue;
    transition: 0.3s;
}

.s-2:hover {
    cursor: pointer;
    color: aliceblue;
    transition: 0.3s;
}

.s-3:hover {
    cursor: pointer;
    color: aliceblue;
    transition: 0.3s;
}

.end-line {
    margin-top: 0.7vw;
}

.end-line span {
    color: white;
    font-family: var(--font7);
}


/* CSS end */
.td1 img {
    height: 4vw;
    width: 4vw;
    display: flex;
    justify-content: center;
    align-items: center;
    margin-left:1vw;
}
.m1:hover {
/* background-color: rgba(0, 0, 0, 0.10); */
background-color:rgba(255, 255, 255, 0.6);
}
.m1 table {
    border-collapse:collapse;
}
.m1 table tr:hover {
    background-color: rgba(0, 0, 0, 0.142);
    cursor:pointer;
    border:rgba(0, 0, 0, 0.142);
}
.pauseMusic {
    display:none;
}
.content {
    height: 116.6vw;
    /* background-color: rgba(245, 245, 245, 0.746); */
}
.music-box {
    position: sticky;
    bottom:0;
    height: 8vw;
    background-color: #0f0f0f;  
    /* margin-top: 31vw;   */
    /* border-radius:10px; */
    width:100%;
    margin:auto;
    /* background-image: url("Image/Music Box.png");
    background-color: #cccccc; */
    background-color: red; /* For browsers that do not support gradients */
    background-image: linear-gradient(to bottom, coral, black);
}
.music-box img {
    height:3vw;
    width:3vw;
    color:white;
    /* background-color:white; */
    cursor:pointer;
}
.music {
    background-color: rgba(245, 245, 245, 0.41);
    height: 50vw;
    max-width: 90vw;
    margin: auto;
    border-radius: 6px;
    padding: 2vw;
    box-shadow: 0 6px 25px rgba(0 0 0 /15%);
    overflow:hidden;
    overflow-y:scroll;
}
.button-box {
    display:flex;
    align-items:center;
    justify-content:space-evenly;
    background-color:rgba(210, 210, 210, 0.57);
    width:20%;  
    height:4vw;
    border-radius:10px;
    /* margin-left:21.2vw; */
    position:absolute;
    right:40%;

}
.u-m-box {
    display:flex;
    margin-left:4.5vw;
}
.s-n-name {
    margin-left:1vw;
}
.s-n-name span {
    margin-left: -4vw;
    position: absolute;
    left: 13.3vw;
}
.name-box {
    display:flex;
    color:white;
    font-family:var(--font3);
    /* background-color:aliceblue; */
}
.name-box img {
    height:4vw;
    width:4vw;
}
.range {
    cursor: pointer;
}
input[type=range] {
    /* height: 26px; */
    -webkit-appearance: none;
    margin: 10px 0;
    width: 90%;
    background-color: #0f0f0f; 
}
input[type=range]:focus {
    outline: none;
}
input[type=range]::-webkit-slider-runnable-track {
    width: 100%;
    height: 9px;
    cursor: pointer;
    animate: 0.2s;
    box-shadow: 1px 1px 3px #000000;
    background: #F7F5F5; 
    border-radius: 10px;
    border: 1px solid #878787;
}
input[type=range]::-webkit-slider-thumb {
    box-shadow: 1px 1px 4px #000000;
    border: 1px solid #000000;
    height: 23px;
    width: 12px;
    border-radius: 5px;
    background: #FFFFFF;
    cursor: pointer;
    -webkit-appearance: none;
    margin-top: -7.5px;
}
input[type=range]:focus::-webkit-slider-runnable-track {
    background: #F7F5F5;
}
input[type=range]::-moz-range-track {
    width: 100%;
    height: 13px;
    cursor: pointer;
    animate: 0.2s;
    box-shadow: 1px 1px 3px #000000;
    background: #F7F5F5;
    border-radius: 10px;
    border: 1px solid #878787;
}
input[type=range]::-moz-range-thumb {
    box-shadow: 1px 1px 4px #000000;
    border: 1px solid #000000;
    height: 18px;
    width: 32px;
    border-radius: 8px;
    background: #FFFFFF;
    cursor: pointer;
}
input[type=range]::-ms-track {
    width: 100%;
    height: 13px;
    cursor: pointer;
    animate: 0.2s;
    background: transparent;
    border-color: transparent;
    color: transparent;
}
input[type=range]::-ms-fill-lower {
    background: #F7F5F5;
    border: 1px solid #878787;
    border-radius: 20px;
    box-shadow: 1px 1px 3px #000000;
}
input[type=range]::-ms-fill-upper {
    background: #F7F5F5;
    border: 1px solid #878787;
    border-radius: 20px;
    box-shadow: 1px 1px 3px #000000;
}
input[type=range]::-ms-thumb {
    margin-top: 1px;
    box-shadow: 1px 1px 4px #000000;
    border: 1px solid #000000;
    height: 18px;
    width: 32px;
    border-radius: 8px;
    background: #FFFFFF;
    cursor: pointer;
}
input[type=range]:focus::-ms-fill-lower {
    background: #F7F5F5;
}
input[type=range]:focus::-ms-fill-upper {
    background: #F7F5F5;
}
.p-drp {
    position:relative;
    display:inline-block;
}
.p-drpbtn {
    border:thin;
    background-color:#0f0f0f;
    color:white;
    font-family:var(--font1);
    font-size:1.2vw;
    width:8vw;
    height:3vw;
}
.p-drpbtn:hover {
    background-color:white;
    color:black;
    transition:0.3s;
    cursor:pointer;
    width:9vw;
}
.d-c {
    display:none;
}
.p-drp-c{
    height:23vw;
    width:16.99vw;
    position:absolute;
    top:2.7vw;
    right:-0.1px;
    background-color:whitesmoke;
    display:flex;
    justify-content:center;
    align-items:center;
    flex-direction:column;
    z-index: 1;
    /* display:block; */
}
.p-drp-c a{
    display:flex;
    align-items:center;
    justify-content:center;
    padding:18px 50px;
    width:50%;
    color:rgba(0, 0, 0, 0.68);
    font-family:var(--font3);
    text-decoration:none;
    /* margin-bottom:1vw; */
}
.p-drp-c a:hover{
    background-color:black;
    color:rgba(254, 170, 66, 0.921);
    transition:0.3s;
}
.p-drp:hover .d-c {
    display: block;
    transition: 0.5s;
    color:rgba(0, 0, 0, 0.68);
}

.p-drp:hover .p-drpbtn {
    background-color: whitesmoke;
    color: black;
    transition: 0.6s;
    width:17vw;
}
.a_name {
    font-size:1.3vw;
    margin-bottom:-0.5vw;
    font-family:var(--font9);
}
.m1 table tr td span {
    font-family:var(--font9);
    color: rgba(0, 0, 0, 0.700);
}
.right-header-content button {
    position:relative;
    top: -2.5px;
    height:1.1vw;
    width:2vw;
    color:white; 
    background-color:#007FFF;
    /* background-color:black; */
    font-family:var(--font3);
    /* border: solid 0.1px white; */
    border:thin;
    border-radius:2px;
    margin-bottom:0.2vw;
    margin-left:-0.2vw;
    font-size:0.7vw;
    box-shadow: 0 6px 25px rgba(0 0 0 /55%); 
}
.right-header-content button:hover {
    cursor:pointer;
    background-color:white;
    color:black;
    transition:0.5s;
}
/* Aove contents were pasted in the end for linking */
    
    .content-5 {
        height: 70vw;
        /* background-color: rgba(143, 188, 143, 0.745); */
    }
    .content-name {
        display: flex;
        justify-content: center;
        font-family: var(--font7);
        font-size: 3vw;
        padding-top: 2vw;
        /* color: rgba(0, 0, 0, 0.764); */
        color: white;
        margin-top:-1.5vw;
        font-size:4vw;
        /* text-decoration:underline; */
    }
    .bgvideo-3 {
        position: absolute;
        right: 0;
        bottom: -650px;
        z-index: -1;
        width: 100%;
        height: 100%;
        /* filter: blur(1px); */
    }
    .invalid-box-1 {
        margin-top: -5vw;
        margin-bottom: -2vw;
        border: 1px solid white;
        background-color: rgba(255, 134, 134, 0.66);
        height: 3vw;
        width: 93.5%;
        font-family: var(--font7);
        border-radius: 5px;
        color: white;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .invalid-box-2 {
        margin-top: -5vw;
        margin-bottom: -2vw;
        border: 1px solid white;
        background-color: rgba(0, 128, 0, 0.8);
        height: 3vw;
        width: 93.5%;
        font-family: var(--font7);
        border-radius: 5px;
        color: white;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .bgvideo-2 {
        position: absolute;
        right: 0;
        bottom: 20px;
        z-index: -1;
        width: 100%;
        height: 100%;
        /* filter: blur(1px); */
    }
    .image {
        /* margin-left: 1vw; */
        margin-top: 2vw;
    }

    .image img {
        width: 90%;
        height: 38vw;
        /* box-shadow: 0 6px 7px rgba(0 0 0 /10%); */
    }
    .edit-profile {
        height:55vw;
        max-width:90%;
        margin:auto;
        background-color:rgba(245, 245, 245, 0.36);
        padding:2vw;  
        border-radius:6px;
    }
    .e2 {
        display:flex;
        justify-content:space-between;
        /* align-items:center; */
        max-width:90%;
        margin:auto;
        margin-top:4vw;
    }

    .u-photo {
        /* width:20%; */
    }

    .e2 img {
        margin-left:3vw;
        height: 21vw;
        width: 21vw;
        margin-top:1vw;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2); 
        padding-right:0;
        border-radius:3000px;
    }

    .img-info-con span {
        position:relative;
        z-index:10;
        /* margin-left:2vw; */
    }
    .img-info-con h1 {
        font-size:1vw;
        font-family:var(--font13);
        margin-left:1vw;
        margin-top:0.3vw;
        color:black;
    }
    .img-info {
        position:relative;
    }
    .img-info-con {
        height:3vw;
        width:17vw;
        background-color:white;
        position:absolute;
        z-index:10;
        right:18px;
        top:125px;
        border-radius:10px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.5); 
    }
    .img-info-con button {
        /* display:none; */
        position:absolute;
        left:145px; 
        top:-25px;
        height:1.4vw;
        width:6vw;
        background-color:lightcoral;
        border:thin;
        border-radius:4px;
        font-family:var(--font3);
        /* border-radius:10px; */
        color:rgba(0, 0, 0, 0.72);
        /* box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);  */
    }
    .e2 img:hover {
        filter:grayscale(100%);
        -webkit-filter:grayscale(100%);
        transition: filter 0.5s ease-in-out;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
    }

    .img-info-con span button:hover {
        cursor:pointer;
        background-color:rgba(240, 128, 128, 0.68);
    }

    .u-info {
        margin-left:-4vw;
        width:70%;
    }

    .u-info span {
        font-family:var(--font14);
        color:white;
        font-size:2vw;
    }

    .u-info input {
        height:2vw;
        width:40%;
        background-color:transparent;
        border-color:white;
        border-left:none;
        border-right:none;
        border-top:none;
        font-size:1.4vw;
        color:white;
        margin-left:1vw;
        font-family:var(--font14);
        /* margin-bottom:10vw; */
        font-size:1.5vw;
    }
    .u-info textarea {
        height:10vw;
        width:60%;
        resize:none;
        background-color:transparent;
        border-color:white;
        font-size:1.4vw;
        color:white;
        font-family:var(--font14);
    }
    .e-s-btn button {
        width:20vw;
        height:3vw;
        margin-top:6vw;
        font-family:var(--font3);
        font-size:1.2vw;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.4);
        color:white;
        background-color:coral;
        border:thin;
    }
    .e-s-btn button:hover {
        color:black;
        background-color:white;
        transition:0.3s;
        cursor:pointer;
    }
    .deactivate {
        position:absolute;
        background-color:white; 
        max-width:80%;
        height:15vw;
        margin:auto; 
        top: 77vw;
        right: 15vw;
        /* margin-top:10vw;  */
        font-family:var(--font14); 
        border-radius:2px;
    }
    .deactivate button {
        width:25vw;
        height:4vw;
        margin-top:3vw; 
        font-family:var(--font7); 
        font-size:1.2vw;
        background-color:black;
        color:white;
        border:thin;
    }
    .deactivate button:hover {
        /* color:black; */
        background-color:red;
        transition:0.5s; 
        cursor:pointer;
        width:25.9vw;
    }
    .d-box {
        height:4vw;
        width:70vw;
        margin-top:2vw;
        font-size:1.3vw;
        color: rgba(0, 0, 0, 0.731);
    }
    .space-e {
        padding-top:20vw;
    }
</style>
<body>
    <form action="" method="post">
    <!-- header -->
    <div class="header">
        <div class="left-header">
            <!-- <span>ARticity</span> -->
            <img src="Image/Logo.png">
        </div>
        <div class="right-header">
            <div class="p-drp">
                <button class="p-drpbtn"><?php echo $uname ?></button>
                <div class="d-c">
                    <div class="p-drp-c">
                        <a href="edit_profile.php">Profile</a>
                        <a href="my_purchases.php">My Purchases</a>
                        <a href="my_sales.php">My Sales</a>
                        <a href="wishlist.php">My Wishlist</a>
                        <a href="logout.php">LogOut</a>
                    </div>
                </div>
            </div>
            <!-- <span><?php echo $uname ?></span> -->
            <img src="uploads/<?php echo $photo; ?>">
            <!-- <img src="Image/Martin Garrix.jpg" alt=""> -->
        </div>  
    </div>
    
    <!-- content -->
    <div class="content-5">
        <div class="header-content">
        <div class="left-header-content">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li>
                        <div class="dropdown">
                            <button class="dropbtn">Service</button> 
                            <div class="dropdown-content">
                                <a href="buy.php">Buy</a>
                                <a href="sell.php">Sell</a>
                            </div>
                        </div>
                    </li>
                    <li> 
                        <div class="dropdown1">
                            <button class="dropbtn1">Upload</button> 
                            <div class="dropdown-content1">
                                <a href="u_music.php">Music</a>
                                <a href="u_m_photo.php">Modelling</a>
                                <a href="#">Dance</a>
                                <a href="#">Photography</a>
                                <a href="#">Singing</a>
                                <a href="#">Gaming</a>
                                <a href="#">Coding</a>
                                <a href="#">News</a>
                                <a href="#">Makeup</a>
                                <a href="#">Fashion Designing</a>
                                <a href="#">Vlogging</a>
                                <a href="#">Blogging</a>
                                <a href="#">Comedy</a>
                                <a href="#">Painting</a>
                                <a href="#">Sketching</a>
                                <a href="#">Calligraphy</a>
                            </div>
                        </div>
                    </li>
                    <li><a href="about_us.php">About Us</a></li>
                </ul>
            </div> 
            <!-- <div class="right-header-content">
                <span>Choose the type of content:</span>
                <select>
                    <option value="Music">Music</option>
                    <option value="Modelling" selected>Modelling</option>
                </select>   
            </div>  -->
        </div>
        <video autoplay loop muted plays-inline class="bgvideo-2">
            <source src="Image/ed_bg.mp4">
        </video>
        <video autoplay loop muted plays-inline class="bgvideo-3">
            <source src="Image/ed_bg.mp4">
        </video>
        <div class="space">

        </div>
        <div class="space">

        </div>
        <div class="space">

        </div>
        <br>
        <center>
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
            <br><br>
        </center>
        <div class="edit-profile">
            <div class="content-name">
                <span>Edit Profile</span>
            </div>
            <div class="e2">
                <br>
                <div class="u-info">
                    <span>Name:</span>
                    <input type="text" name="up_name" value="<?php echo $row['uname']; ?>">
                    <br><br><br>
                    <span>Username:</span>
                    <input type="text" name="up_uname" value="<?php echo $row['u_uname']; ?>">
                    <br><br><br>
                    <span>Email:</span>
                    <input type="text" name="up_email" value="<?php echo $row['u_email']; ?>">
                    <br><br><br>
                    <span>Password:</span>
                    <input type="text" name="up_pass" value="<?php echo $row['u_pass']; ?>">
                    <br><br><br>
                    <span>Bio:</span><br>
                    <textarea name="up_bio"><?php echo $row['u_bio']; ?></textarea>
                </div>
                <div class="u-photo">
                    <img src="uploads/<?php echo $photo; ?>">
                </div>
            </div>
            <br>
            <center>
                <div class="e-s-btn">
                    <button name="e_sbtn">Submit</button>
                </div>
            </center>
        </div>
    </div>
    <div class="deactivate">
        <center>
            <button name="de-btn">Deactivate my account</button>
        </center>
        <center>
            <div class="d-box">
                <p>If you deactivate your account then, you will loose your profile and all the information on the website</p>
            </div>
        </center>
    </div>
    <div class="space-e">

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
