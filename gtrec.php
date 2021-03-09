<?php
    include('string.php');
    if ($con = mysqli_connect($server, $user, $pass, $db)){
        $sql = "SELECT * FROM `admission` WHERE 1 order by `id` desc LIMIT 1";
        if ($run = mysqli_query($con, $sql)){
            while ($row = mysqli_fetch_array($run)){
                $cal =  $row['rec'] + 1;
                echo $cal;
            }
        }else{
            echo "error";
        }
    }else{
        echo "error";
    }

?>