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
                if ($col['admit'] === "1" || $prior === "0"){

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $oname; ?> - Payement Record</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <?php import('main.php');?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<?php import('form.php'); 
?>
</head>
<body>
<main>
<?php import('main.php'); ?>
<?php include('header.php');?>
<h1 id="h1">New Admission Record</h1>  
<div class="form">
    <form action="" method="post"  enctype="multipart/form-data">
        <input type="text" name="sname" id="names" placeholder="Student Name" required><br>
        <input type="text" name="fname" placeholder="Parent / Guardian Name" id="payeename" required><br>
        <input type="text" name="amount" placeholder="Amount to be paid" required><br>
        <select name="course" id="course" onchange="checkselection()" required>
            <option value="">Select Course</option>
            <option value="Complete Course">Complete Course</option>    
            <option value="Foundation">Foundation</option>   
            <option value="Prelim cum Main (GS) with CSAT">Prelim cum Main (GS) with CSAT</option> 
            <option value="Prelim cum Main (GS) with CSAT">Prelim cum Main (GS) without CSAT</option>
            <option value="Main (GS)">Main (GS)</option>    
            <option value="Special Weekend Batches">Special Weekend Batches</option>    
            <option value="2 Years program for under graduates">2 Years program for under graduates</option> 
            <option value="3 Years program for under graduates">3 Years program for under graduates</option> 
            <option value="custom">Custom</option>
        </select><br>
        <textarea placeholder="Custom Course" id="customcrs"></textarea><br>
        <input type="text" name="staff" placeholder="Staff Name (Who is adding record)" value="<?php echo $_COOKIE['Name']; ?>" class="disabled" required readonly><br>
        <textarea name="for" placeholder="Commment"></textarea><br>
        <label class="fllbl" onclick="document.getElementById('srec').click()">Image of Form: </label><input type="file" id="srec" name="srec" required><br>
        <label class="fllbl" onclick="document.getElementById('irec').click()">Image of Student: </label><input type="file" id="irec" name="irec" required><br>
        <input type="submit" value="SUBMIT" name="save">
    </form>
    </div>
    </main>
</body>
<script>
function checkselection(){
    val = document.getElementById("course");
    cc = document.getElementById("customcrs");
    if (val.value === "custom"){
        val.removeAttribute("required");
        val.removeAttribute("name");
        cc.style.display="unset";
        cc.setAttribute("name", "course");
        cc.setAttribute("required", "");
    }else{
        cc.removeAttribute("required");
        cc.removeAttribute("name");
        cc.style.display="none";
        val.setAttribute("name", "course");
        val.setAttribute("required", "");
    }
}
</script>
</html>
<?php
    if (isset($_POST['save'])){
        date_default_timezone_set('Asia/Kolkata');
        $srec =  custom_upload($_FILES['srec'], "form");
        $irec = custom_upload($_FILES['irec'], "img");
        $sname = filter($_POST['sname']);
        $payee = filter($_POST['payee']);
        $rec = filter($_POST['fname']);
        $roll = filter($_POST['roll']);
        $mode = filter($_POST['mode']);
        $amount = filter($_POST['amount']);
        $course = filter($_POST['course']);
        $staff = filter($_POST['staff']);
        $for = filter($_POST['for']);
        $time = date("h:i:sa");
        $date = date("d/m/Y");
        $sql = "INSERT INTO `student`(`id`, `name`, `course`, `par`, `staff`, `comm`, `date`, `time`, `form`, `img`, 'fee') 
        VALUES (NULL,'$sname','$course','$rec','$staff','$for','$date','$time','$srec','$irec', '$amount')";
        if ($con = mysqli_connect($server, $user, $pass, $db)){
            if ($run = mysqli_query($con, $sql)){


                $sqli = "SELECT * FROM `student` WHERE 1 order by `id` desc";
                if ($enr = mysqli_query($con, $sqli)){
                    while($arr = mysqli_fetch_array($enr)){
                        $enrn = $arr['id'];
                        alert('Enrollment Number of '.$arr['name'].' is '.$enrn);
                        open('pay.php?roll='.$enrn);
                                        }
                }else{
                    error('Error Encountered');
                }



                alert('Admission Saved');
                open("pay.php");
            }else{
                alert('Record not inserted! Contact Administrator');
                open("");
            }
        }else{
            error("Error in Connection");
        }
    }
?>
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