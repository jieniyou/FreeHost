<?php

function write_to_console($data) {
    $console = $data;
    if (is_array($console))
        $console = implode(',', $console);

    echo "<script>console.log('XM-Print >> " . $console . "' );</script>";
}