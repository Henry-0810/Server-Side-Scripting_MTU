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
  <body>
  <h1>Power of 2</h1>
    <?php
    $counter = 0;
    while(++$counter){
        $power = pow(2,$counter);
        echo "<p>2<sup>".$counter."</sup> = ".$power."</p>";
        if($power > 1000){
            break;
        }
    }
    ?>
  </body>
</html>