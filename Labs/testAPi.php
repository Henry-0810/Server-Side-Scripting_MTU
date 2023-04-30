<?php
// Set your API key and base currency
$api_key = 'dp8pygHkkmyMXn56d1zUxF7WHZ1wbixw';
$base_currency = 'USD';

// Set the currency you want to convert and the amount
$convert_currency = 'EUR';
$amount = 100;

// Make a request to the API to get the exchange rate
$url = "https://openexchangerates.org/api/latest.json?app_id={$api_key}&base={$base_currency}&symbols={$convert_currency}";
$response = json_decode(file_get_contents($url), true);

// Extract the exchange rate from the API response
$exchange_rate = $response['rates'][$convert_currency];

// Calculate the converted amount
$converted_amount = $amount * $exchange_rate;

// Display the result
echo "{$amount} {$base_currency} = {$converted_amount} {$convert_currency}";
