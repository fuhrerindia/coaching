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
                if ($col['payr'] === "1" || $prior === "0"){
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
                    <?php
                        import('form.php')
                    ?>
</head>
<body>
<main>
<?php import('main.php'); ?>
<?php include('header.php');?>
<h1 id="h1">New Payment Record</h1>  
<div class="form">
    <form action="" method="post"  enctype="multipart/form-data">
    <input type="number" name="roll" value="<?php
        if (isset($_GET['roll'])){
            echo $_GET['roll'];
            $jqs = "get";
        }
    ?>" placeholder="Enrollment Number" min="0" id="rollbox"><br>
    <?php 
    if (isset($jqs)){
        include('cal.php');
    }
    ?>
        <input type="text" name="sname" id="names" placeholder="Student Name" required><br>
        <input type="text" name="payee" placeholder="Payee Name" id="payeename" required><br>
        <input type="number" name="rec" id="recnum" placeholder="Reciept Number" min="1" required><br>
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
        </select><br>
        <input type="text" name="amount" placeholder="Amount (₹)*" required><br>
        <select name="course" id="course" required>
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
        <input type="text" name="staff" placeholder="Staff Name (Who is adding record)" value="<?php echo $_COOKIE['Name']; ?>" class="disabled" required readonly><br>
        <textarea name="for" placeholder="Payment on Account of" required></textarea><br>
        <label class="fllbl" onclick="document.getElementById('srec').click()">Image of student reciept: </label><input type="file" id="srec" name="srec" required><br>
        <label class="fllbl" onclick="document.getElementById('irec').click()">Image of institute reciept: </label><input type="file" id="irec" name="irec" required><br>
        <progress style="display:none;">Uploading Images</progress>
        <input type="submit" id="sbtbtn" value="SUBMIT" name="save" onclick="showprog()">
        <script>
            function showprog(){
                document.getElementsByTagName("progress")[0].style.display="unset";
                button = document.getElementById("sbtbtn");
                button.style.display="block";
                button.value = "Uploading Images...";
                button.setAttribute("class", "disabled");
            }
        </script>
    </form>
    </div>
    </main>
</body>
<script>
    $(document).ready(function(){
                                    //GET REC
                                    $.post("gtrec.php",
        {data: this.value},
        function(result){
                   $("#recnum").val(result);
                   
        });
            //
        $("#rollbox").change(function(){
            //GET COURSE
            $.post("gtcrs.php",
        {data: this.value},
        function(result){
                   $("#course").replaceWith("<input type='text' name='course' id='coursedis' class='disabled' readonly>");
                   $("#coursedis").val(result);
        });
            //NEXTLINE

                //GET NAME
                $.post("gtnme.php",
        {data: this.value},
        function(result){
                   $("#names").attr("class", "disabled");
                   $("#names").attr("readonly", "");
                   $("#names").val(result);
        });
            //NEXT

                            //GET NAME
                            $.post("gtpaye.php",
        {data: this.value},
        function(result){
                   $("#payeename").val(result);
                   
        });
            //
        });
    });
</script>
</html>
<?php
    if (isset($_POST['save'])){
        date_default_timezone_set('Asia/Kolkata');
        $srec =  upload($_FILES['srec']);
        $irec = upload($_FILES['irec']);
        $sname = filter($_POST['sname']);
        $payee = filter($_POST['payee']);
        $rec = filter($_POST['rec']);
        $roll = filter($_POST['roll']);
        $mode = filter($_POST['mode']);
        $amount = filter($_POST['amount']);
        $course = filter($_POST['course']);
        $staff = filter($_POST['staff']);
        $for = filter($_POST['for']);
        $time = date("h:i:sa");
        $date = date("d/m/Y");
        $sql = "INSERT INTO `admission`(`id`, `roll`, `rec`, `name`, `payee`, `amount`, `admin`, `mode`, `course`, `account`, `time`, `date`, `s_rec`, `i_rec`) VALUES (NULL,'$roll','$rec','$sname','$payee','$amount','$staff','$mode','$course','$for','$time','$date','$srec','$irec')";
        if ($con = mysqli_connect($server, $user, $pass, $db)){
            if ($run = mysqli_query($con, $sql)){
                alert('Data Saved');
                open("");
            }else{
                // alert('Record not inserted! Contact Administrator');
                // open("");
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