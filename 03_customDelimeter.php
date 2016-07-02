<?php
define('END', 'Stop');

if (isset($_GET['lines']) && isset($_GET['delimiter'])) {
    $lines = $_GET['lines'];
    $delimiter = $_GET['delimiter'];

    $result = array_map('trim',
                    explode($delimiter, $lines));

    foreach ($result as $item) {
        if ($item == END) {
            break;
        }

        echo $item, '<br>';
    }
}