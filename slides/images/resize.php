#!/usr/bin/env php
<?php

foreach (new GlobIterator(__DIR__ . '/*.jpg') as $file) {
    $filename = $file->getBaseName();
    $dest = realpath(__DIR__ . '/../') . '/' . $filename;
    if (!file_exists($dest)) {
        $cmd = sprintf("convert %s -resize 1280x1024\> %s", escapeshellarg($file->getPathname()), escapeshellarg($dest));
        echo $cmd . "\n";
        system($cmd);
    }
}
