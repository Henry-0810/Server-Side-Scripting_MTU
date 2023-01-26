<h1>
    Saving account:
</h1>
<?php
function savings(&$args1, $interest = 0.2){
    $args1 = $args1 + $args1*$interest;

    return $args1;
}
$amount = 10*mt_rand(1,10);
echo "<p>The amount is $amount</p>";
savings($amount);
echo "<p>The amount after interest is $amount</p>";
savings($amount,0.5);
echo "<p>The amount when interest changes to 50% is $amount</p>";