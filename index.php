<?php
    include('string.php');
    include('fun.php');
    if (isset($_COOKIE['User'])){
        open('dash.php');
    }
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $oname; ?> &bull; Login</title>
<?php import('default.php'); ?>
</head>
<body>
<div class="box">
        <img src="<?php echo $oimg; ?>" class="logo"><br>
        <h2>Sign in</h2>
        <span>to continue to <?php echo $oname; ?></span>
        <form action="" method="POST">
            <input type="email" name="email" placeholder="Username" required><br>
            <input type="password" name="pass" placeholder="Password" required><br>
            <?php
                if (isset($_GET['mw'])){
                    echo "<article class='err'>You have entered wrong E-Mail, please try again.</article>";
                }
                if (isset($_GET['pw'])){
                    echo "<article class='err'>You have entered wrong Password, please try again.</article>";
                }
            ?>
            <p>Sign in to <?php echo $oname; ?> for further actions.</p>
        <div><input type="submit" value="Next" name="signin"> </form>
        </div>
    </div>
</body>
</html>
<?php
    if (isset($_POST['signin'])){
        $sql = "SELECT * FROM `admin` WHERE `user` LIKE '".$_POST['email']."' AND `password` LIKE '".$_POST['pass']."'";
        $con = mysqli_connect($server, $user, $pass, $db);
        if ($con){
            if ($result = mysqli_query($con, $sql)){
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_array($result)){
                        ?><script>function setCookie(cname, cvalue, exdays) {
                            var d = new Date();
                            d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
                            var expires = "expires="+d.toUTCString();
                            document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
                          }
                          setCookie("User", "<?php echo $row['user'];?>", 30);
                          setCookie("Pass", "<?php echo $row['password'];?>", 30);
                          setCookie("Name", "<?php echo $row['name'];?>", 30);
                          window.location="dash.php";
                          </script><?php
                    }
                }else{
                    alert('Wrong Username or Password');
                    open("");
                }
            }
    }else{
            error("Error while server connection");
        }
    }
?>