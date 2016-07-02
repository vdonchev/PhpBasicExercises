<?php
define('END', 'Stop');

if (isset($_GET['lines'])) {
    $tokens = array_filter(
                array_map('trim',
                    explode("\n", $_GET['lines'])));

    foreach ($tokens as $line) {
        if ($line == END) {
            break;
        }

        echo $line, '<br>';
    }
}
