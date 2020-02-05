<?php

include 'config.php';
include 'VideoStream.php';

$content = filter_input(INPUT_GET, 'content', FILTER_DEFAULT);
$path = ROOT .$content;

if (! file_exists($path)) {
    header('Location: index.php');
    exit;
}

$type = get_type($path);

switch ($type) {
    case 'video':
        return (new VideoStream($path))->start();
    case 'img':
        $type = getimagesize($path)['mime'];
        break;
    case 'text':
        $type = 'text/Plain';
        break;
}

# Never Cache
$ts = gmdate("D, d M Y H:i:s") . " GMT";
header("Expires: $ts");
header("Last-Modified: $ts");
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Cache-Control: no-cache, must-revalidate");
header("Content-Disposition: inline; filename=$content");

header("Content-Type: $type");
readfile($path);