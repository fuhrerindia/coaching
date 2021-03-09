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
            if ($prior === "0"){
            $sql = "SELECT * FROM `setting` WHERE 1 order by `id` desc LIMIT 1";
            if ($ver = mysqli_query($conn, $sql)){
                while($col = mysqli_fetch_array($ver)){
                //PASTE BELOW

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $oname; ?> Dashboard</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <?php
                        import('form.php');?>
<?php import('leftbdy.php'); ?>
</head>
<body>
<main>
<?php import('main.php'); ?>
<?php include('header.php');?>
<div class="div">
<h1>New Staff</h1>
<form action="" method="POST">
        <input type="text" name="aname" placeholder="Staff Name" required><br>
        <input type="password" name="apass" placeholder="Password for Account" required><br>
        <button type="submit" name="submit" style="width:100px;">Save</button>
</form>
<?php
    if (isset($_POST['submit'])){
        $username = strtolower(str_replace(" ", ".", filter($_POST['aname'])))."@".$sname;
        $pass = filter($_POST['apass']);
        $name = filter($_POST['aname']);
        $sql = "INSERT INTO `admin`(`id`, `user`, `name`, `password`, `prio`) 
        VALUES (NULL,'$username','$name','$pass','1')";
        if ($saved = mysqli_query($conn, $sql)){
            success("User Saved Successfully!");
            open("dash.php");
        }else{
            error("Error Saving this User");
        }
    }
?>
</div>
    </main>
</body>
</html>
<?php
                }
            }
        }else{
            alert("You are not permitted to visit this page.");
            open("dash.php");
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