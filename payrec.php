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
                if ($col['payment'] === "1" || $prior === "0"){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $oname; ?> - Payement Record</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <?php import('main.php');?>
    <?php import('leftbdy.php'); ?>
    <?php import('table.php'); ?>
</head>
<body>
<main>
<?php import('main.php'); ?>
<?php include('header.php');?>
<h1>All Payment Record</h1>  
<div class="form">
            <table>
                <thead>
                    <td>
                        Name
                    </td>
                    <td>
                        Enrollment N.
                    </td>
                    <td>
                        Payee
                    </td>
                    <td>
                        Mode
                    </td>
                    <td>
                        Course
                    </td>
                    <td>
                        Paid For
                    </td>
                    <td>
                        Date
                    </td>
                    <td>
                        Time
                    </td>
                    <td>
                        Reciept
                    </td>
                    <?php 
                                if ($col['img'] === "1" || $prior === "0"){
                            ?>
                    <td>
                    Reciept Image (Institute)
                    </td>
                    <td>
                        Reciept Image (Student)
                    </td>
                    <?php
                                }
                    ?>
                    <td>
                        Amount
                    </td>
                    <td>
                        Staff Responsible
                    </td>
                </thead>
                <tbody>
                <?php
                if(isset($_GET['start'])){
                    $s = $_GET['start'];
                }else{
                    $s = "0";
                }
            ?>
            <?php
                $sql = "SELECT * FROM `admission` order by `id` desc LIMIT $s, 10";
                if ($con = mysqli_connect($server, $user, $pass, $db)){
                    if ($run = mysqli_query($con, $sql)){
                        while($row = mysqli_fetch_array($run)){
                            ?>
                        <tr>
                            <td>
                            <?php echo $row['name']?>
                            </td>
                            <td>
                            <?php echo $row['roll']?>
                            </td>
                            <td>
                            <?php echo $row['payee']?>
                            </td>
                            <td>
                            <?php echo $row['mode']?>
                            </td>
                            <td>
                            <?php echo $row['course']?>
                            </td>
                            <td>
                            <?php echo $row['account']?>
                            </td>
                            <td>
                            <?php echo $row['date']?>
                            </td>
                            <td>
                            <?php echo $row['time']?>
                            </td>
                            <td>
                            <?php echo $row['rec']?>
                            </td>
                            <?php 
                                if ($col['img'] === "1" || $prior === "0"){
                            ?>
                            <!--RECIEPTS-->
                            <td>
                            <a href="<?php echo $row['i_rec']; ?>" target=_blank><img src="<?php echo $row['i_rec'];?>" style="width:100px; height:100px;"></a>
                            </td>
                            <td>
                            <a href="<?php echo $row['s_rec']; ?>" target=_blank><img src="<?php echo $row['s_rec'];?>" style="width:100px; height:100px;"></a>
                            </td>
                            <!--/RECIPTS-->
<?php
                                }
?>
                            <td>
                            <?php echo $row['amount']?>
                            </td>
                            <td>
                            <?php echo $row['admin']?>
                            </td>
                        </tr>
                            <?php
                        }
                    }else{
                        error("Query Broke");
                    }
                }else{
                    error("Error While Connection");
                }
            ?>
            </tbody>
            </table>
            <a href="?start=<?php if ($s === "0"){
                echo "0";
                }else{
                    echo $s - 10;} ?>">Back</a>
                    <a href="?start=0">Home</a>
<a href="?start=<?php echo $s + 10; ?>">Next</a>
    </div>
    </main>
</body>
</html>
<?php
                }else{
                    alert('You are not permitted to visit this page');
                    open("dash.php");
                }
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