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
  <h1>Housing allowance calculator</h1>
    <?php
      $cost = 56;
      switch($cost)
      {
          case $cost < 33.64:
              echo "No allowance";
              break;
          case $cost > 252:
              echo "Max allowance of 201.60 is paid";
              break;
          default:
              echo "The cost is ".$cost. " and your allowance is ".($cost*0.8);
              break;
      }
    ?>
  </body>
</html>