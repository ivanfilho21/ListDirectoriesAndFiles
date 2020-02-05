<?php

$path = filter_input(INPUT_GET, 'path', FILTER_DEFAULT);
$scandir = array_diff(scandir(ROOT.$path), array('.', '..'));

$folders = array();
$files = array();

foreach ($scandir as $key => $value) {
    # Linux hidden folders not supported
    if (preg_match('/^\.(.*)$/', $value)) {
        continue;
    }
    # File
    elseif (preg_match('/.+\.[a-zA-Z0-9]+/', $value)) {
        $files[] = array('name' => $value, 'type' => get_type($value));
    }
    # Folder
    else {
        $folders[] = $value;
    }
}