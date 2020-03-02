<?php
include_once 'data-controller.php';

//$data               =           new DataController();
$markak         =           $data->getMarkak();
?>

<!DOCTYPE html>
<html lang="hu">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <title>Autókatalógus</title>
</head>

<body>
  <div class="container mt-5">
    <div class="row">
      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 m-auto d-block shadow p-5">
        <form id="filterForm">
          <label for="selectMarka">Márkák: </label>
          <div class="form-group">
            <select class="form-control form-control-md" id="selectMarka">
              <option selected disabled>Választ </option>
              <?php foreach ($markak as $markak) : ?>
                <option value="<?php echo $markak['id']; ?> ">
                  <?php echo $markak['markak_name']; ?> </option>
              <?php endforeach; ?>
            </select>
          </div>

          <label for="selectFrame">Típusok: </label>
          <div class="form-group">
            <select class="form-control form-control-md" id="selectTipus">
              <option>Választ </option>
            </select>
          </div>
      </div>
      </form>
    </div>
  </div>
  </div>

  <script>

    $(document).ready(function() {


      $("#selectMarka").change(function() {
        var markId = $(this).val();
        $("#selectTipus").fadeIn('slow');

        $.ajax({
          url: 'process-controller.php',
          type: 'POST',
          data: {
            markId: markId
          },
          dataType: "JSON",

          success: function(result) {
            var items = "";
            $("#selectMarka").empty();
            $("#selectTipus").empty();

            $("#selectMarka").append(
              "<option selected disabled> Választ </option>");
            $("#selectTipus").append(
              "<option selected disabled> Választ </option>");

            $.each(result, function(i, item) {
              $("#selectTipus").append("<option value='" + item
                .id + "'>" + item.CODE +
                "</option>");
            });
          }
        });
      });




      $("#selectTipus").change(function() {
        var tipusId = $(this).val();
        $(this).fadeIn();

        $.ajax({
          url: 'process-controller.php',
          type: 'POST',
          data: {
            tipId: tipusId
          },
          dataType: 'JSON',

          success: function(result) {
            var version = "";
            $("#selectMarka").empty();

            $.each(result, function(i, version) {
              $("#selectMarka").append("<option>" + version.version +
                "</option>");
            });
          }
        });
      });
    });
  </script>

</body>

</html>