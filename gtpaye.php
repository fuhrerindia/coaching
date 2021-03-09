<?php
    $data = $_POST['data'];
    include('string.php');
    if ($con = mysqli_connect($server, $user, $pass, $db)){
        $sql = "SELECT * FROM `admission` WHERE `roll` LIKE '$data' LIMIT 1";
        if ($run = mysqli_query($con, $sql)){
            while ($row = mysqli_fetch_array($run)){
                echo $row['payee'];
            }
        }else{
            echo "error";
        }
    }else{
        echo "error";
    }

?>