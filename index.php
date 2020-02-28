<?php
include_once 'data-controller.php';

$data               =           new DataController();
$languages          =           $data->getLanguages();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap-grid.min.css'>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.12/js/bootstrap-select.min.js'></script>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.12/css/bootstrap-select.min.css'>
  <title>Autókatalógus</title>
</head>

<body>
  <div class="container mt-5">
    <div class="row">
      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 m-auto d-block shadow p-5">
        <form id="filterForm">
          <label for="selectLang">Márkák: </label>
          <div class="form-group">
            <select class="form-control form-control-md" id="selectLang">
              <option selected disabled>Választ </option>
              <?php foreach ($languages as $language) : ?>
                <option value="<?php echo $language['language_id']; ?> ">
                  <?php echo $language['markak_name']; ?> </option>
              <?php endforeach; ?>
            </select>
          </div>

          <label for="selectFrame">Típusok: </label>
          <div class="form-group">
            <select class="form-control form-control-md" id="selectFrame">
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

      
      $("#selectLang").change(function() {
        var languageId = $(this).val();
        $("#selectFrame").fadeIn('slow');

        $.ajax({
          url: 'process-controller.php',
          type: 'POST',
          data: {
            langId: languageId
          },
          dataType: "JSON",

          success: function(result) {
            var items = "";
            $("#selectFrame").empty();
            $("#selectVersion").empty();

            $("#selectFrame").append(
              "<option selected disabled> Select Framework </option>");
            $("#selectVersion").append(
              "<option selected disabled> Select Version </option>");

            $.each(result, function(i, item) {
              $("#selectFrame").append("<option value='" + item
                .framework_id + "'>" + item.framework_name +
                "</option>");
            });
          }
        });
      });


      

      $("#selectFrame").change(function() {
        var frameworkId = $(this).val();
        $(this).fadeIn();

        $.ajax({
          url: 'process-controller.php',
          type: 'POST',
          data: {
            framId: frameworkId
          },
          dataType: 'JSON',

          success: function(result) {
            var version = "";
            $("#selectVersion").empty();

            $.each(result, function(i, version) {
              $("#selectVersion").append("<option>" + version.version +
                "</option>");
            });
          }
        });
      });
    });
  </script>

</body>

</html>