<?php
session_start();
print("<html><p>");

$sid = session_id();
print("Session ID returned by session_id() is".$sid."\n");

$hi = $_SESSION['Hi'];
$World = $_SESSION['World'];

print($hi.' '.$World."\n</p></html>");