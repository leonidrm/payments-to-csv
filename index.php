<?php

require 'vendor/autoload.php';

use \PaymentDay\{ Salary, Bonus, OutputFormat };

function readTerminalInput($prompt = '')
{
    $prompt && print $prompt;

    $terminal_device = '/dev/tty';

    $h = fopen($terminal_device, 'r');

    if ($h === false)
    {
        throw new RuntimeException("Failed to open terminal device $terminal_device");
    }

    $line = rtrim(fgets($h),"\r\n");

    fclose($h);

    return $line;
}

$pathToFile = readTerminalInput('Provide path to CSV file (ex: payments.csv): ');

(new OutputFormat(new Salary, new Bonus))->createCSV($pathToFile);