<?php
if (isset($_GET['key-value-pairs']) &&
    isset($_GET['delimiter']) &&
    isset($_GET['target-key'])
) {
    $pairsInput = $_GET['key-value-pairs'];
    $delimiter = $_GET['delimiter'];
    $target = $_GET['target-key'];

    $pairs = explode(PHP_EOL, $pairsInput);

    $result = [];
    foreach ($pairs as $pair) {
        $tokens = explode($delimiter, $pair);
        $result[$tokens[0]][] = $tokens[1];
    }

    if (isset($result[$target])){
        echo implode('<br>', $result[$target]);
    } else {
        echo 'None';
    }
}

