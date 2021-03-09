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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $oname; ?> Dashboard</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <?php import('setting.php'); ?>
    <?php
                        import('form.php')
                    ?>
</head>
<body>
<main>
<?php import('main.php'); ?>
<?php include('header.php');?>
<div class="div">
<h1>Allow Staff To</h1>
<form action="" method="POST">
        <input type="checkbox" name="filter" id="filter" <?php 
            if ($col['filter'] === "1"){
                echo "checked";
            }
        ?>>
        <label for="filter">Access Payment Filter Fuctions</label><br><br>
        <input type="checkbox" name="payment" id="payment" <?php 
            if ($col['payment'] === "1"){
                echo "checked";
            }
        ?>>
        <label for="payment">Access Payment Records</label><br><br>
        <input type="checkbox" name="img" id="img" <?php 
            if ($col['img'] === "1"){
                echo "checked";
            }
        ?>>
        <label for="img">View Reciepts</label><br><br>
        <input type="checkbox" name="form" id="form" <?php 
            if ($col['form'] === "1"){
                echo "checked";
            }
        ?>>
        <label for="form">View Forms</label>
        <br><br>

        <input type="checkbox" name="admit" id="admit" <?php 
            if ($col['admit'] === "1"){
                echo "checked";
            }
        ?>>
        <label for="admit">Add Admission Records</label>
        <br><br>

        <input type="checkbox" name="payr" id="payr" <?php 
            if ($col['payr'] === "1"){
                echo "checked";
            }
        ?>>
        <label for="payr">Add Payment Record</label>
        <br><br>

        <input type="checkbox" name="accadmit" id="accadmit" <?php 
            if ($col['accadmit'] === "1"){
                echo "checked";
            }
        ?>>
        <label for="accadmit">Access Admission Record</label>
        <br><br>
        <button type="submit" name="submit"><i class="material-icons">save</i>&nbsp;Save</button>
</form>
<?php
    if (isset($_POST['submit'])){
        if (isset($_POST['filter'])){
            $filter = "1";
        }else{
            $filter = "";
        }
        if (isset($_POST['payment'])){
            $payment = "1";
        }else{
            $payment = "";
        }
        if (isset($_POST['img'])){
            $img = "1";
        }else{
            $img = "";
        }
        if (isset($_POST['form'])){
            $form = "1";
        }else{
            $form = "";
        }
        if (isset($_POST['admit'])){
            $admit = "1";
        }else{
            $admit = "";
        }
        if (isset($_POST['payr'])){
            $payr = "1";
        }else{
            $payr = "";
        }
        if (isset($_POST['accadmit'])){
            $accadmit = "1";
        }else{
            $accadmit = "";
        }
        $sql = "UPDATE `setting` SET `filter`='$filter',`payment`='$payment',`img`='$img',`form`='$form',`admit`='$admit',`payr`='$payr',`accadmit`='$accadmit' WHERE 1";
        if ($con = mysqli_connect($server, $user, $pass, $db)){
            if ($saved = mysqli_query($con, $sql)){
                success("Saved Settings");
                open("dash.php");
            }else{
                error("Can't Save Setting");
            }
        }else{
            error("Can't Connect to Database");
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