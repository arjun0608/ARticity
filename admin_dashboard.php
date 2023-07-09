<?php
    // $dis = "none";
    // $dis = $_COOKIE['setD'];
    // echo $dis;
    if (isset($_POST['s_sbtn'])) {
        
        switch($cnt){
            case 0:
                $dis = "none";
                $cnt = 1;
                break;
            case 1:
                $dis = "block";
                $cnt = 0;
                break;
        }
    }
    echo $cnt;
?>
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
.full-page {
    display: flex;
}

.left-tab-bar {
    position: relative;
    background-color: rgb(31, 37, 51);
    height: 60vw;
    width: 25%;
}

.top-l img {
    height: 4vw;
    width: 10vw;
    margin: 2vw;
    border-radius: 50px;
    margin-bottom: 7vw;
}

.tabs {
    /* margin-left:2vw; */
}

.tabs ul li {
    list-style-type: none;
    border: none;
}

.tabs ul li input {
    border: none;
    background-color: rgb(31, 37, 51);
    color: white;
    font-size: 1.6vw;
    margin-bottom: 3vw;
    font-family: var(--font7);
    font-weight: 100;
    height: 6vw;
    width: 100%;
    text-align: left;
    padding-left: 1.5vw;
    margin-bottom: 0;
}

.tabs ul li input:hover {
    background-color: white;
    color: black;
    cursor: pointer;
    transition: 0.3s;
}

.right-tab-bar {
    background-color: aliceblue;
    width: 100%;
}

.top-r {
    display: flex;
    justify-content: space-evenly;
    margin: 3vw;
}

.users {
    height: 10vw;
    width: 20vw;
    background-color: white;
    border-radius: 10px;
    display: flex;
    padding-left: 2vw;
    align-items: center;
    font-family: var(--font9);
    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
}
.users:hover {
    background-color: rgb(31, 37, 51);
    color: white;
    cursor: pointer;
    transition: 0.3s;
}
.users:hover h1,
.users:hover span,
.users:hover ion-icon {
    color:white
}
.users span {
    color: rgba(67, 67, 67, 0.87);
    font-weight: bolder;
    font-size: 2vw;

}
.users h1 {
    color: rgb(67, 67, 67);
    font-size: 3vw;
    font-family: var(--font7);
}
.users ion-icon {
    padding-left: 9vw;
    margin-bottom: -4vw;
    font-size: 3vw;
    color: rgb(67, 67, 67);
}

.a-content {
    height: 10vw;
    width: 20vw;
    background-color: white;
    border-radius: 10px;
    display: flex;
    padding-left: 2vw;
    align-items: center;
    font-family: var(--font9);
    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
}
.a-content:hover {
    background-color: rgb(31, 37, 51);
    color: white;
    cursor: pointer;
    transition: 0.3s;
}
.a-content:hover h1,
.a-content:hover span,
.a-content:hover ion-icon {
    color:white
}
.a-content span {
    /* position: absolute; */
    color: rgba(67, 67, 67, 0.87);
    font-weight: bolder;
    font-size: 2vw;
    /* margin-top: 20vw; */
}

.a-content h1 {
    /* margin-top: 1vw; */
    color: rgb(67, 67, 67);
    font-size: 2.5vw;
    font-family: var(--font7);
    font-weight: bold;
}
.a-content ion-icon {
    position: absolute;
    padding-left: 15.5vw;
    padding-top: 4vw;
    font-size: 3vw;
    color: rgb(67, 67, 67);
}

.category {
    height: 10vw;
    width: 20vw;
    background-color: white;
    border-radius: 10px;
    display: flex;
    padding-left: 2vw;
    align-items: center;
    font-family: var(--font9);
    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
}
.category:hover {
    background-color: rgb(31, 37, 51);
    color: white;
    cursor: pointer;
    transition: 0.3s;
}
.category:hover h1,
.category:hover span,
.category:hover ion-icon {
    color:white
}
.category span {
    color: rgba(67, 67, 67, 0.87);
    font-weight: bolder;
    font-size: 2vw;

}

.category h1 {
    color: rgb(67, 67, 67);
    font-size: 2.5vw;
    font-family: var(--font7);
}
.category ion-icon {
    position: absolute;
    padding-left: 15.5vw;
    padding-top: 4vw;
    font-size: 3vw;
    color: rgb(67, 67, 67);
}

.a-name-tag {
    height: 3vw;
    width: 100%;
    font-size: 4vw;
    color: rgb(67, 67, 67);
    font-family: var(--font12);
    margin-top: 5vw;
}

.a-info {
    margin-left: 5vw;
    padding: 1vw;
    padding-top: 2vw;
    margin-top:4vw;
    height: 15vw;
    width: 90%;
    /* background-color:whitesmoke; */
    border-radius: 10px;
    /* box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2); */
    display: flex;
    justify-content: space-between;
    margin-left: 2vw;
}

.a-id {
    height:10vw;
    width:20vw;
    background-color: white;
    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
    border-radius: 10px;
}
.a-id:hover {
    background-color: rgb(31, 37, 51);
    color: white;
    cursor: pointer;
    transition: 0.3s;
}
.a-id:hover h1,
.a-id:hover span,
.a-id:hover ion-icon {
    color:white
}
.a-id h1 {
    color: rgb(67, 67, 67);
    font-size: 2.5vw;
    font-family: var(--font7);
    margin-top: 2vw;
    margin-left: -5vw;
}

.a-id span {
    color: rgba(67, 67, 67, 0.87);  
    font-size: 2vw;
    position: absolute;
    padding-top: 1vw;
    margin-left: -7vw;
    font-family: var(--font7);

}

.a-name {
    height:10vw;
    width:25vw;
    background-color: white;
    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
    border-radius: 10px;
}
.a-name:hover {
    background-color: rgb(31, 37, 51);
    color: white;
    cursor: pointer;
    transition: 0.3s;
}
.a-name:hover h1,
.a-name:hover span,
.a-name:hover ion-icon {
    color:white
}
.a-name h1 {
    color: rgb(67, 67, 67);
    font-size: 2.5vw;
    font-family: var(--font7);
    margin-top: 2vw;
    margin-left:-5vw;
}

.a-name span {
    color: rgba(67, 67, 67, 0.87);  
    font-size: 2vw;
    position: absolute;
    padding-top: 1vw;
    margin-left: -10vw;
    font-family: var(--font7);
}

.a-gmail {
    height:10vw;
    width:25vw;
    background-color: white;
    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
    border-radius: 10px;
}
.a-gmail:hover {
    background-color: rgb(31, 37, 51);
    color: white;
    cursor: pointer;
    transition: 0.3s;
}
.a-gmail:hover h1,
.a-gmail:hover span,
.a-gmail:hover ion-icon {
    color:white
}
.a-gmail h1 {
    color: rgb(67, 67, 67);
    font-size: 2.5vw;
    font-family: var(--font7);
    margin-top: 2vw;
    margin-left: -4vw;
}

.a-gmail span {
    color: rgba(67, 67, 67, 0.87);  
    font-size: 2vw;
    position: absolute;
    padding-top: 1vw;
    margin-left: -10vw;
    font-family: var(--font7);
}



.a-u-drp-dn a input {
    margin-left: 4vw;
    width: 2vw;
}
.a-u-drp-dn {
    display: <?php echo $dis ?>;
    width: 16vw;
}
</style>
<body>
    <form action="" method="post">
    <div class="full-page">
        <div class="left-tab-bar">
            <div class="top-l">
                <img src="Image/Logo.png">
            </div>
            <div class="tabs">
                <ul>
                    <li><a href="#"><input type="submit" value="Dashboard"></a></li>
                    <li>
                        <input type="submit" name="s_sbtn" value="Manage User" class="m-u">
                        <div class="a-u-drp-dn">
                            <a href="#"><input type="submit" value="-- Artist"></a>
                            <a href="#"><input type="submit" value="-- Buyer"></a>
                            <a href="#"><input type="submit" value="-- Seller"></a>
                        </div>
                    </li>
                    <li><a href="#"><input type="submit" value="Manage Content"></a></li>
                </ul>
            </div>
    
        </div>
        <div class="right-tab-bar">
            <div class="top-r">
                <div class="users">
                    <div class="o_box">
                        <h1>User</h1><br>
                        <span>100</span>
                    </div>
                    <ion-icon name="people-sharp"></ion-icon>
                </div>
                <div class="a-content">
                    <div class="o_box">
                        <h1>Total Content</h1> <br>
                        <span>100</span>
                    </div>
                    <ion-icon name="cloud-upload-sharp"></ion-icon>
                </div>
                <div class="category">
                    <div class="o_box">
                        <h1>Categories</h1> <br>
                        <span>100</span>
                    </div>
                    <ion-icon name="duplicate-sharp"></ion-icon>
                </div>
            </div>
            <div class="mid-r">
                <center>
                    <div class="a-name-tag">
                        <span>Hello Admin !</span>
                    </div>
                    <div class="a-info">
                        <div class="a-id">
                            <h1>Admin Id</h1>
                            <span>1</span>
                        </div>
                        <div class="a-name">
                            <h1>Admin Name</h1>
                            <span>Arjun Raju</span>
                        </div>
                        <div class="a-gmail">
                            <h1>Admin Mail Id</h1>
                            <span>arjun@gmail.com</span>
                        </div>
                    </div>
                </center>
            </div>
        </div>
    </div>
</form>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <!-- drp.addEventListener('mouseover',()=>{
        document.getElementById("userType").style.display = "block";
        
    })
    drp.addEventListener('mouseout',()=>{
        document.getElementById("userType").style.display = "none";
        
    }) -->
</body>
</html>
