<?php
session_start();
print("<html><p>");
$_SESSION['Hi'] = "Hi";
print("Hi is saved\n");
$_SESSION['World'] = "World";
print("World is saved\n");

print("Click <a href=nextPage.php>Next Page</a>"." to output Hi World");
print("</p></html>");