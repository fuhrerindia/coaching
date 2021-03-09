<?php include('./string.php'); ?>
h1{font-weight:100;margin:20px;}
        .form{margin:20px;}
        input, textarea, select{margin-top:5px;margin-bottom:5px;}
        input[type="text"], input[type="number"], select, textarea{padding:5px}
        input[type="text"]{width:300px;}
        textarea{width:300px;height:100px;}
        input[type="number"], select{width:150px;}
        .fllbl{cursor:pointer;}
        table{border-collapse:collapse;}
        .prnt{    position: fixed;
    background: #000000b8;
    width: 100%;
    height: 100vh;
    display:none;
    backdrop-filter: saturate(180%) blur(20px);
    top: 0;}
    .cancelbtn{color:#fff;cursor:pointer;margin:10px;}
        table tr, table td{border:1px solid #aeaeae;transition:0;}
        tbody tr:hover{background:#ededed;}
        tbody tr:nth-child(even){background: #ddd;}
        thead{background:<?php echo $tcolor; ?>;color:<?php echo $txtcolor;?>}
        table td{padding:10px;}
        .fltbtn{background:transparent;color:#242424;border:0;cursor:pointer;    font-size: 28px;
    background: #ededed;}
        .dialog{width: 60%;
    position: fixed;
    background: #ffffffde;
    backdrop-filter: saturate(180%) blur(20px);
    box-shadow: 0 0 27px #000;
    border-radius: 12px;
    padding: 20px;
    top: 7vh;
    left: 20%;
}
        input[type="submit"]{    margin-left: 10px;
    width: 200px;
    height: 35px;
    border: 0;
    background:<?php echo $tcolor; ?>;color:<?php echo $txtcolor; ?>;border-radius:10px;cursor:pointer;}
    input[type="submit"]:hover{background:<?php echo $tcolorhover;?>}