<?php
$euro = number_format($_GET['euro'],2);
$sterling = "£".number_format($euro*0.88,2);

echo $sterling;
