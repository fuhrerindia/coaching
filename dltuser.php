<?php
    include('string.php');
    if ($conn = mysqli_connect($server, $user, $pass, $db)){
        $sql = "SELECT * FROM `admin` WHERE `user` LIKE '".$_COOKIE['User']."'";
        if($run = mysqli_query($conn, $sql)){
            $p = mysqli_fetch_array($run);
            if ($p['prio'] === "0"){
    $data = $_POST['data'];
    $sql = "DELETE FROM `admin` WHERE `id` LIKE '$data'";
    if ($run = mysqli_query($conn, $sql)){
        echo "suc";
    }
    }
}
    }
?>