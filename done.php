<?php

$filename = $_POST['filename'];

$files = array_filter(scandir('chunks'), function ($file) use ($filename) {
    $parts = explode('__', $file);
    return $parts[0] == $filename;
});

usort($files, function ($a, $b) {
    $partsA = explode('__', $a);
    $partsB = explode('__', $b);
    return (int) $partsA[1] - (int) $partsB[1];
});

$fp = fopen('files/' . $filename, 'w+');
foreach ($files as $file) {
    $chunk = file_get_contents("chunks/$file");
    fwrite($fp, $chunk);
    unlink("chunks/$file");
}

fclose($fp);
