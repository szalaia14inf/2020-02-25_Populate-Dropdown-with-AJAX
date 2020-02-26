<?php
    
include_once "config.php";

?>

<!DOCTYPE html>
<html>

<head>
    <title></title>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
</head>

<body>

    <div>Autómárkák: </div>

    <select id='sel_gyarto'>
        <option value="0">-- Választ --</option>

        <?php
       
       $sql_gyarto = "SELECT * FROM gyártó";
       $gyarto_data = mysqli_query($con, $sql_gyarto);
      
       while($row = mysqli_fetch_assoc($sql_gyarto)) 
       {

         $gyarto_id = $row['id'];
         $gyarto_nev = $row['title'];

         echo "<option value= '" .$gyarto_id."' >" .$gyarto_nev."</option>";

       }

     ?>


    </select>

</body>

</html>