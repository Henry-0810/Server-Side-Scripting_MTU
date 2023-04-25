<?php
declare(strict_types=1);
function getWages(int $hours,float $rate)
{
    $rate = number_format($rate,2);
    $wages = number_format($hours*$rate,2);
    echo("<p>Hours: $hours, Rate: €$rate, Wages: €$wages");
}
function getVolume(float $radius, float $height)
{
    $volume = number_format(M_1_PI*$radius*$radius*$height,2);
    echo("<p>Radius: $radius, Height: $height </p>");
    echo("<p>Volume is $volume</p>");
}