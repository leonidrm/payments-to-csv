<?php

require 'vendor/autoload.php';

use \PaymentDay\{ Salary, Bonus, OutputFormat };

function readTerminalInput($prompt = '') {
    $prompt && print $prompt;
    $terminal_device = '/dev/tty';
    $h = fopen($terminal_device, 'r');
    if ($h === false) {
        throw new RuntimeException("Failed to open terminal device $terminal_device");
    }
    $line = rtrim(fgets($h),"\r\n");
    fclose($h);
    return $line;
}

$pass = readTerminalInput('Provide path to CSV file (ex: payments.csv): ');

$output = new OutputFormat(new Salary, new Bonus);

$output->createCSV($pass);