<?php

require_once dirname(__DIR__) . '/bootstrap.php';

// Path to your MP3's here
$path = '/';

$iterator = new Mp3RecursiveDirectoryIterator($path);
$iterator = new Mp3ShortSongsFilterIterator($iterator, 5);
$iterator = new InfiniteIterator($iterator);

foreach ($iterator as $file)
{
    printf("Title: %s\n", $file->getBasename());
    //exec('/usr/bin/afplay ' . escapeshellarg($file->getPathname()));
}