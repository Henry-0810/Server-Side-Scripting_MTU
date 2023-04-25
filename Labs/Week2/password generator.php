<?php
$password = "";
echo "<h1>Password</h1>";
for($i = 0; $i < 10;$i++){
    $password .= chr(mt_rand(0,25) + 97);
}
echo "<p>Your password is ".$password."</p>";
