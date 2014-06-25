#!/usr/bin/env php
<?php

$orig = "/home/squale/temp/photos-stormtroopers/";

foreach (new GlobIterator($orig . '/*.jpg') as $file) {
    $filename = $file->getBaseName();
    $dest = __DIR__ . '/' . $filename;
    if (!file_exists($dest)) {
        $cmd = sprintf("convert %s -resize 1280x1024\> %s", escapeshellarg($file->getPathname()), escapeshellarg($dest));
        echo $cmd . "\n";
        system($cmd);
    }
}
