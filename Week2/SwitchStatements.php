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
  <h1>Computer gadget store</h1>
    <?php
    $product_name = "Processor";

    switch ($product_name)
    {
        case 'Video cards':
            echo "Video cards range from €50 to €500";
            break;
        case 'LCD Monitors':
            echo "LCD monitors range €200 to €400";
            break;
        case 'Processor':
            echo "Intel processors range from €100 to €1000";
            break;
        default:
            echo "Sorry, we don't carry this product";
    }
    ?>
  </body>
</html>