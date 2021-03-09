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
    <style>
    *{font-family:sans-serif;}
    .div{    width: 60%;
    display: inline-block;
    text-align: left;}
        .l-i{width: 60%;transition:0.3s;
    display: inline-block;
    height: 60px;
    box-shadow: 0 0 10px #ddd;
    border-radius: 10px;
    padding: 10px;margin:10px;
    text-align: left;}
    main{text-align:center;}
    label{cursor:pointer}
    .l-i ul{    list-style: none;
    display: flex;
    margin: 19px;}
    .l-i ul li{margin-right:10px;}
    body a{color:#404040;text-decoration:none;}
    .l-i:hover{box-shadow:0 0 20px #000;}
    @media screen and (max-width:480px){
        .l-i{width:100%;margin:0;border-radius:0;box-shadow:none;border-bottom:1px solid #ddd}
    }
    </style>
</head>
<body>
<main>
<?php import('main.php'); ?>
<?php include('header.php');?>
<div class="dialog" style="display:none;" id="urd">
    <form action="" method="post">
        <input type="text" class="text" placeholder="New Username" name="nuser">
        <input type="hidden" name="nuid" id="nuid">
        <input type="submit" value="Save">
    </form>
</div>
<div class="div">
<h1>All Existing Staffs</h1>
<table>
    <thead>
        <tr>
            <td>
                Name
            </td>
            <td>
                Username
            </td>
            <td>
                Actions
            </td>
        </tr>
    </thead>
    <tbody>
        <?php
            $sqli = "SELECT * FROM `admin` WHERE 1 order by `id` desc";
            if ($call = mysqli_query($conn, $sqli)){
                if (0 < mysqli_num_rows($call)){
                    while($ad = mysqli_fetch_array($call)){
                        ?>
                        <tr>
                            <td>
                                <?php echo $ad['name']?>
                            </td>
                            <td>
                                <?php echo $ad['user']; ?>
                            </td>
                            <td>
                                <button class="material-icons" class="dlbtn" value="<?php echo $ad['id'];?>">delete</button>
                                <button class="material-icons" class="edbtn" value="<?php echo $ad['id'];?>">edit</button>
                                <button class="material-icons" class="rsbtn" value="<?php echo $ad['id'];?>">refresh</button>
                            </td>
                        </tr>
                        <?php
                    }
                }else{
                    echo "No User Found <a href='staff.php'>Consider creating one</a>";
                }
            }else{
                error("Error Fetching List, ERROR: 101");
            }
        ?>
    </tbody>
</table>
</div>
            <script>
                $(document).ready(function(){
                    $(".dlbtn").click(function(){
                        $.post("dltuser.php",
                        {data: this.value},
                        function(result){
                            if (result === "suc"){
                                alert('User Deleted')
                                window.location="";
                            }
                        }
                        )
                    });
                    $("#edbtn").click(function(){
                        $("#urd").css("display", "unset");
                        $("#nuid").val(this.value);

                    });
                });
            </script>
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