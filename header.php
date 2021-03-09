<?php include('string.php');?>
<div class="header"><a onclick="dash()">Dashboard</a>&nbsp;&bull;&nbsp;<a onclick="logout()">Logout</a></div>
<script>
    function dash(){
        window.location="dash.php";
    }
    function logout(){
        document.cookie = "Name=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
        document.cookie = "Pass=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
        document.cookie = "User=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
        window.location="";

    }
</script>