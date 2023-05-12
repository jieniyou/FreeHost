<?php

function write_to_console($msg, $data) {
    $console = $data;
    if (is_array($console))
        $console = implode(',', $console);

    echo "<script>console.log('".$msg." -->> " . $console . "' );</script>";
}