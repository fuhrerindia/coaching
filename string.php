<?php
    //IMPORTANT
    $server = "localhost";
    $user = "root";
    $pass = "";
    $db = "tminc";
    //IMPORTANT

    //ADD CUSTOM STRINGS BELOW
    $oname = "Student Management";
    $sname = "sri";
    $oimg = "data:image/png;base64,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";
    $tcolor = "black";
    $tcolorhover = "red";
    $txtcolor = "#ffffff";
?>