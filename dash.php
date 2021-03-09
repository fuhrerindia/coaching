<?php include('string.php');?>
<?php include('fun.php');?>
<?php
    if ($conn = mysqli_connect($server, $user, $pass, $db)){
        $sql = "SELECT * FROM `admin` WHERE `user` LIKE '".$_COOKIE['User']."' AND `password` LIKE '".$_COOKIE['Pass']."'";
        if ($fetch = mysqli_query($conn, $sql)){
            if (0 < mysqli_num_rows($fetch)){
            while($row = mysqli_fetch_array($fetch)){
                $prior = $row['prio'];
            }
            $sql = "SELECT * FROM `setting` WHERE 1 order by `id` desc LIMIT 1";
            if ($ver = mysqli_query($conn, $sql)){
                while($col = mysqli_fetch_array($ver)){
                //PASTE BELOW
        

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $oname; ?> Dashboard</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
    *{font-family:sans-serif;}
        .l-i{width: 60%;transition:0.3s;
    display: inline-block;
    height: 60px;
    box-shadow: 0 0 10px #ddd;
    border-radius: 10px;
    padding: 10px;margin:10px;
    text-align: left;}
    main{text-align:center;}
    .l-i ul{    list-style: none;
    display: flex;
    margin: 19px;}
    .l-i ul li{margin-right:10px;}
    body a{color:#404040;text-decoration:none;}
    .l-i:hover{box-shadow:0 0 20px #000;}
    @media screen and (max-width:480px){
        .l-i{width:100%;margin:0;border-radius:0;box-shadow:none;border-bottom:1px solid #ddd}
    }
    </style>
</head>
<body>
<main>
<?php import('main.php'); ?>
<?php include('header.php');?>
<?php
    if($col['payr'] === "1" || $prior === "0"){
?>
        <a href="pay.php">
        <div class="l-i">
            <ul>
                <li class="material-icons">
                payment
                </li>
                <li>
                New Payment Record
                </li>
            </ul>
        </div>
        </a>
        <?php
    }
        ?>
        <?php
    if ($col['payment'] === "1" || $prior === "0"){
?>
        
        <a href="payrec.php">
        <div class="l-i">
            <ul>
                <li class="material-icons">
                dynamic_feed
                </li>
                <li>
                Payement Records
                </li>
            </ul>
        </div>
        </a>
        <?php
    }
        ?>
        <?php
    if ($col['filter'] === "1" || $prior === "0"){
?>
        <a href="filter.php">
        <div class="l-i">
            <ul>
                <li class="material-icons">
                filter_alt
                </li>
                <li>
                Filter Records
                </li>
            </ul>
        </div>
        </a>
<?php
    }
?>
<?php
    if ($col['admit'] === "1" || $prior === "0"){
?>
        <a href="admission.php">
        <div class="l-i">
            <ul>
                <li class="material-icons">
                face
                </li>
                <li>
                New Admission
                </li>
            </ul>
        </div>
        </a> 
<?php
    }
?>
<?php
    if ($col['accadmit'] === "1" || $prior === "0"){
?>
        <a href="adrec.php">
        <div class="l-i">
            <ul>
                <li class="material-icons">
                menu
                </li>
                <li>
                All Students
                </li>
            </ul>
        </div>
        </a> 
        <?php
    }
        ?>
        <?php
    if ($prior === "0"){
?>
        <a href="staff.php">
        <div class="l-i">
            <ul>
                <li class="material-icons">
                supervisor_account
                </li>
                <li>
                New Staff Account
                </li>
            </ul>
        </div>
        </a> 
        <?php
    }
        ?>
        <?php
            if ($prior === "0"){
        ?>
                <a href="setting.php">
        <div class="l-i">
            <ul>
                <li class="material-icons">
                settings
                </li>
                <li>
                Settings
                </li>
            </ul>
        </div>
        </a>     
        <?php
            }
        ?>
    </main>
</body>
</html>
<?php
                }
            }
        }else{
            alert('Logged Out');
            logout();
        }
    }else{
        alert('Logged Out');
        logout();
    }
    }else{
        alert('Logged Out');
        logout();
    }
?>