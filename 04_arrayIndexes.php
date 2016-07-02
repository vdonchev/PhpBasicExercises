<?php
if (isset($_GET['key-value-pairs']) &&
    isset($_GET['delimiter']) &&
    isset($_GET['array-size'])
) {
    $pairs = $_GET['key-value-pairs'];
    $delimiter = $_GET['delimiter'];
    $arraySize = intval($_GET['array-size']);

    $result = [];
    for ($i = 0; $i < $arraySize; $i++) {
        $result[$i] = 0;
    }

    $lines = array_map('trim', explode("\n", $pairs));
    foreach ($lines as $line) {
        $pair = explode($delimiter, $line);

        $index = intval($pair[0]);
        $content = $pair[1];

        $result[$index] = $content;
    }

    for ($i = 0; $i < $arraySize; $i++) {
        echo $result[$i], '<br>';
    }
}