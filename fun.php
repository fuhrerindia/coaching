<?php
    function error($msg){
        echo $msg;
    }
    function alert($msg){
        ?>
            <script>
                alert('<?php echo $msg; ?>');
            </script>   
        <?php
    }
    function open($dest){
        ?>
            <script>
                window.location="<?php echo $dest; ?>";
            </script>
        <?php
    }
    function import($name){
        $link = "design/".$name;
        echo "<style>";
        include($link);
        echo "</style>";
    }
    function filter($data){
        return str_replace("'", "", $data);
    }
    function upload($files){
        $size = $files['size'];
        $filename = $files['name'];
        $namear = explode(".", $filename);
        $fname = date("Ymd") ."". time()."".$namear[0].".".$namear[1];
        $tempname = $files['tmp_name'];
        $folder = "rec/".$fname;
        move_uploaded_file($tempname, $folder);
        return $folder;
    }
    function custom_upload($files, $directory){
        $size = $files['size'];
        $filename = $files['name'];
        $namear = explode(".", $filename);
        $fname = date("Ymd") ."". time()."".$namear[0].".".$namear[1];
        $tempname = $files['tmp_name'];
        $folder = $directory."/".$fname;
        move_uploaded_file($tempname, $folder);
        return $folder;
    }
    function success($msg){
        echo $msg;
    }
    function logout(){
        ?>
            <script>
    document.cookie = "Name=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
        document.cookie = "Pass=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
        document.cookie = "User=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
        window.location="index.php";
            </script>
        <?php
    }
?>