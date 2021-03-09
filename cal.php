<script>
$(document).ready(function(){
            //GET COURSE
            roll = $("#rollbox").val();
            $.post("gtcrs.php",
        {data: roll
},
        function(result){
                   $("#course").replaceWith("<input type='text' name='course' id='coursedis' class='disabled' readonly>");
                   $("#coursedis").val(result);
        });
            //NEXTLINE

                //GET NAME
                $.post("gtnme.php",
        {data: roll
},
        function(result){
                   $("#names").attr("class", "disabled");
                   $("#names").attr("readonly", "");
                   $("#names").val(result);
        });
            //NEXT

                            //GET NAME
                            $.post("gtpaye.php",
        {data: roll
},
        function(result){
                   $("#payeename").val(result);
                   
        });
            //
    });
</script>