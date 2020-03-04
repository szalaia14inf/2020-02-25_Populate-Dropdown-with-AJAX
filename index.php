<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Autókatalógus</title>
    <link href="style.css" rel="stylesheet" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
</head>

<body>
    <script type="text/javascript">
        $(document).ready(function () {

            $("#gyártó").change(function () {
                var deptid = $(this).val();

                $.ajax({
                    url: 'getUsers.php',
                    type: 'post',
                    data: {
                        depart: deptid
                    },
                    dataType: 'json',
                    success: function (response) {

                        var len = response.length;

                        $("#modell").empty();
                        for (var i = 0; i < len; i++) {
                            var id = response[i]['id'];
                            var code = response[i]['code'];

                            $("#modell").append("<option value='" + id + "'>" + code +
                                "</option>");

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