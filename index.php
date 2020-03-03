<!doctype html>
<html>
<head>
    <title>Autókatalógus</title>
    <link href="style.css" rel="stylesheet" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="jquery-1.12.0.min.js" type="text/javascript"></script>


    <script type="text/javascript">
        $(document).ready(function(){

            $("#gyártó").change(function(){
                var deptid = $(this).val();

                $.ajax({
                    url: 'getUsers.php',
                    type: 'post',
                    data: {depart:deptid},
                    dataType: 'json',
                    success:function(response){

                        var len = response.length;

                        $("#modell").empty();
                        for( var i = 0; i<len; i++){
                            var id = response[i]['id'];
                            var code = response[i]['code'];

                            $("#modell").append("<option value='"+id+"'>"+code+"</option>");

                        }
                    }
                });
            });

        });
    </script>
</head>
<body>
<div class="container">
    <h1>Lista</h1>
    <div id="div_content">

        <div>Márkák: </div>
        <select id="gyártó">
            <option value="0">- Választ -</option>
            <option value="1">ACURA</option>
            <option value="2">ALFA</option>
            <option value="3">AMC</option>
            <option value="4">ASTON</option>
            <option value="5">AUDI</option>
            <option value="6">AVANTI</option>
        </select>
        <div class="clear"></div>

        <div>Típusok: </div>
        <select id="modell">
            <option value="0">- Select -</option>
        </select>

    </div>
</div>
</body>
</html>

