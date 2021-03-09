<?php include('./string.php'); ?>h1{font-weight:100;margin:20px;}
        .form{margin:20px;}
        input, textarea, select{margin-top:5px;margin-bottom:5px;}
        input[type="text"], input[type="number"], select, textarea{padding:5px}
        input[type="text"]{width:300px;}
        textarea{width:300px;height:100px;}
        input[type="number"], select{width:150px;}
        .fllbl{cursor:pointer;}
        table{border-collapse:collapse;}
        table tr, table td{border:1px solid #aeaeae;transition:0;}
        tbody tr:hover{background:#ededed;}
        tbody tr:nth-child(even){background: #ddd;}
        thead{background:<?php echo $tcolor; ?>;color:<?php echo $txtcolor;?>}
        table td{padding:10px;}
        input[type="submit"]{    margin-left: 10px;
    width: 200px;
    height: 35px;
    border: 0;
    background:<?php echo $tcolor; ?>;color:<?php echo $txtcolor; ?>;border-radius:10px;cursor:pointer;}
    input[type="submit"]:hover{background:<?php echo $tcolorhover;?>}