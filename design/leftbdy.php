<?php include('./string.php'); ?>
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
    input[type="submit"]{    margin-left: 10px;
    width: 200px;
    height: 35px;
    border: 0;
    background: <?php echo $tcolor;?>;
    color: <?php echo $txtcolor; ?>;
    border-radius: 10px;
    cursor: pointer;}
    @media screen and (max-width:480px){
        .l-i{width:100%;margin:0;border-radius:0;box-shadow:none;border-bottom:1px solid #ddd}
    }