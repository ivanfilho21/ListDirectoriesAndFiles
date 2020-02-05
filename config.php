<?php

error_reporting(E_ALL);
ini_set('display_errors', true);

define('ROOT', '/Users/Public');

function get_type(string $path)
{
    preg_match('/^.+(\..+)$/', $path, $matches);
    if (! isset($matches[1])) return '';
    
    $extension = strtolower($matches[1]);
    $video = array('.webm', '.mp4', '.mov', '.wmv');
    $img = array('.jpg', '.jpeg', '.png', '.gif');
    $txt = array('.txt', '.json');

    if (in_array($extension, $video)) {
        return 'video';
    } elseif (in_array($extension, $img)) {
        return 'img';
    } elseif (in_array($extension, $txt)) {
        return 'text';
    }
    return '';
}