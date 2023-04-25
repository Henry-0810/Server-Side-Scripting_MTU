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
<h1>Get Month</h1>
<?php
$getMonth = date('F');

switch($getMonth)
{
    case "August":
        echo "It's August, so it's really hot.";
        break;
    default:
        echo "Not August, it's ". date('F'). " so at least not in the peak of the heat.";
        break;
}
?>
  </body>
</html>