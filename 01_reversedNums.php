<?php
if (isset($_GET['numbers'])) {
    $input = $_GET['numbers'];
    $nums = extractsNums($input);

    rsort($nums);

    foreach ($nums as $num) {
        echo $num . '<br>';
    }
}

function extractsNums(string $str) : array
{
    return preg_split('/\D+/', $str);
}