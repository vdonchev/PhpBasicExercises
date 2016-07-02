<?php
if (isset($_GET['commands']) &&
    isset($_GET['date']) &&
    isset($_GET['format'])
) {
    date_default_timezone_set('Europe/Sofia');

    $commands = $_GET['commands'];
    $date = $_GET['date'];
    $format = $_GET['format'];

    $myDate =  DateTime::createFromFormat('d/m/Y', $date);

    $commandSplit = explode(PHP_EOL, $commands);

    foreach ($commandSplit as $command) {
        $commandTokens = explode(' ', $command);
        if ($commandTokens[0] == 'subtract') {
            $myDate->modify('-' . intval($commandTokens[1]) . ' day');
        } else {
            $myDate->modify('+' . intval($commandTokens[1]) . ' day');
        }
    }

    echo $myDate->format($format);
}