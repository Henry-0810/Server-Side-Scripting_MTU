<!DOCTYPE html>
<html lang='cs'>
  <head>
    <title></title>
    <meta charset='utf-8'>
    <meta name='description' content=''>
    <meta name='keywords' content=''>
    <meta name='author' content=''>
    <meta name='robots' content='all'>
    <!-- <meta http-equiv='X-UA-Compatible' content='IE=edge'> -->
    <link href='/favicon.png' rel='shortcut icon' type='image/png'>
  </head>
  <style>
  .table{
    position: absolute;
    left: 10px;

  }
  </style>
  <body>
    <?php
    $counter = 1;
    echo ("<table border='1'><tr><th>n</th><th>n<sup>2</sup></th><th>n<sup>3</sup></th></tr>");
    while($counter <=100){
        echo "<tr><td>";
        echo $counter. "</td><td>";
        echo pow($counter,2)."</td><td>";
        echo pow($counter,3). "</td></tr>";
        $counter = $counter + 1;
    }
    echo("</table>");
    ?>
  </body>
</html>