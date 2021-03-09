<?php
    $data = $_POST['data'];
    include('string.php');
    if ($con = mysqli_connect($server, $user, $pass, $db)){
        $sql = "SELECT * FROM `student` WHERE `id` LIKE '$data'";
        if ($run = mysqli_query($con, $sql)){
            while ($row = mysqli_fetch_array($run)){
                echo $row['name'];
            }
        }else{
            echo "error";
        }
    }else{
        echo "error";
    }

?>