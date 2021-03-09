<?php
    include('./string.php');
?>
<style>
        h1{font-weight:100;margin:20px;}
        #h1{margin:20px;}
        .form{margin:20px;}
        input, textarea, select{margin-top:5px;margin-bottom:5px;}
        input[type="text"], input[type="number"], select, textarea, input[type="password"]{padding:5px}
        input[type="text"], input[type="password"]{width:300px;}
        textarea{width:300px;height:100px;}
        .disabled{outline: 0;
    background: #ddd !important;
    border: 1px solid #404040 !important;
    color: #000!important;
    cursor: text !important;}
        input[type="number"], select, input[type="password"]{width:150px;}
        .fllbl{cursor:pointer;}
        input[type="submit"],button{    margin-left: 10px;
    width: 200px;
    height: 35px;
    border: 0;
    background:<?php echo $tcolor; ?>;color:<?php echo $txtcolor; ?>;border-radius:10px;cursor:pointer;}
    input[type="submit"]:hover{background:<?php echo $tcolorhover;?>}
    </style>