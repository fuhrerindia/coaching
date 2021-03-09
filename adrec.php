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
                if ($col['accadmit'] === "1" || $prior === "0"){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $oname; ?> - Payement Record</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <?php import('main.php');?>
    <?php import('filter.php'); ?>
</head>
<body>
<main>
<?php
    if (isset($_GET['name'])){
        $cond = "`name` LIKE '%".$_GET['name']."%'";
    }else if(isset($_GET['en'])){
        $cond = "`roll` LIKE '".$_GET['en']."'";
    }
    else if(isset($_GET['rec'])){
        $cond = "`rec` LIKE '".$_GET['rec']."'";
    }
    else if(isset($_GET['paid'])){
        $cond = "`account` LIKE '%".$_GET['paid']."%'";
    }
    else if(isset($_GET['mode'])){
        $cond = "`mode` LIKE '%".$_GET['mode']."%'";
    }else{
        $cond = "1"
        ?>
        <style> 
        .prnt{display:unset;}
        </style>
        <?php
    }
?>
<?php import('main.php'); ?>
<?php include('header.php');?>
<h1><button class="material-icons fltbtn" onclick="document.getElementsByClassName('prnt')[0].style.display='unset'">filter_alt</button>&nbsp;Filter Payment Record</h1>  
<div class="prnt">
<i class="material-icons cancelbtn" onclick="document.getElementsByClassName('prnt')[0].style.display='none'">clear</i>
<div class="dialog">
            <h3>Sort By </h3>
            <form action="" method="get">
                <span>Name</span><br>
                <input type="text" name="name" placeholder="Student Name"><input type="submit" value="Filter">
            </form>
            <br>or<br>
            <form action="" method="get">
                <span>Enrollment Number</span><br>
                <input type="text" name="en" placeholder="Enrollment Number"><input type="submit" value="Filter">
            </form>
            <br>or<br>
            <form action="" method="get">
                <span>Reciept Number</span><br>
                <input type="text" name="rec" placeholder="Reciept Number"><input type="submit" value="Filter">
            </form>
            <br>or<br>
            <form action="" method="get">
                <span>Paid for</span><br>
                <input type="text" name="paid" placeholder="Enter Keyword"><input type="submit" value="Filter">
            </form>
            <br>or<br> <form action="" method="get">
                <span>Mode of Payment </span><br>
                <select name="mode" required>
            <option value="">Mode of Payment</option>
            <option value="Cash">Cash</option>
            <option value="Cheque">Cheque</option>
            <option value="Online From Website">Online From Website</option>
            <option value="Debit Card">Debit Card</option>
            <option value="Credit Card">Credit Card</option>
            <option value="Card">Card</option>
            <option value="UPI">UPI</option>
            <option value="PayTM">PayTM</option>
            <option value="Google Pay">Google Pay</option>
        </select><input type="submit" value="Filter">
            </form>
</div>
</div>
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
                        Parent
                    </td>
                    <td>
                        Image
                    </td>
                    <td>
                        Course
                    </td>
                    <td>
                        Total Fees
                    </td>
                    <td>
                        Date
                    </td>
                    <td>
                        Time
                    </td>
                    <?php 
                                if ($col['form'] === "1" || $prior === "0"){
                            ?>
                    <td>
                        Form
                    </td>
                    <?php
                                }
                    ?>
                    <td>
                        Comment
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
            $sum = 0;
            if ($cond === "1"){
                $qend = " LIMIT 10";
            }else{
                $qend = "";
            }
                $sql = "SELECT * FROM `student` WHERE ".$cond." order by `id` desc".$qend;
                if ($con = mysqli_connect($server, $user, $pass, $db)){
                    if ($run = mysqli_query($con, $sql)){
                        while($row = mysqli_fetch_array($run)){
                            ?>
                        <tr>
                            <td>
                            <?php echo $row['name']?>
                            </td>
                            <td>
                            <?php echo $row['id']?>
                            </td>
                            <td>
                            <?php echo $row['par']?>
                            </td>
                            <td>
                            <a href="<?php echo $row['img']?>" target=_blank><img src="<?php echo $row['img']?>" style="width:100px;height:100px;cursor:pointer;"></a>
                            </td>
                            <td>
                            <?php echo $row['course']?>
                            </td>
                            <td>
                            <?php echo $row['fee']?>
                            </td>
                            <td>
                            <?php echo $row['date']?>
                            </td>
                            <td>
                            <?php echo $row['time']?>
                            </td>
                            <?php 
                                if ($col['form'] === "1" || $prior === "0"){
                            ?>
                            <td>
                            <a href="<?php echo $row['form']?>" target=_blank>Click Here</a>
                            </td>
                            <?php
                                }
                            ?>
                            <td>
                            <?php echo $row['comm'];
                            ?>
                            </td>
                            <td>
                            <?php echo $row['staff']?>
                            </td>
                        </tr>
                            <?php
                        }?>
                            <tr>
                            <td>
                            </td>
                            <td>
                            </td>
                            <td>
                            </td>
                            <td>
                            </td>
                            <td>
                            </td>
                            <td>
                            </td>
                            <td>
                            </td>
                            <td>
                            </td>
                            <td>
                            Total Amount in Data
                            </td>
                            <td>
                            <?php echo $sum;
                            ?>
                            </td>
                            <td>
                            <?php echo $row['admin']?>
                            </td>
                        </tr>
                        <?php
                    }else{
                        error("Query Broke");
                    }
                }else{
                    error("Error While Connection");
                }
            ?>
            </tbody>
            </table>
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