<?php
if (isset($_GET['delimiter']) && isset($_GET['commands'])) {
    $delimiter = $_GET['delimiter'];
    $commandPairs = array_map('trim', explode("\n", $_GET['commands']));
    $resArray = [];
    foreach ($commandPairs as $commandPair) {
        $keyValue = explode($delimiter, $commandPair);
        $type = $keyValue[0];
        $item = $keyValue[1];
        if ($type == 'add') {
            addItem($item, $resArray);
        } else {
            $index = intval($keyValue[1]);
            removeItemAtIndex($index, $resArray);
        }
    }

    printResult($resArray);
}

function addItem(string $item, array &$resArray)
{
    array_push($resArray, $item);
}

function removeItemAtIndex(int $index, array &$resArray)
{
    array_splice($resArray, $index, 1);
}

function printResult(array $resArr) {
    foreach ($resArr as $item) {
        echo $item, '<br>';
    }
}