<?php

require_once dirname(__DIR__) . '/bootstrap.php';

// Path to your MP3's here
$path = '/';

$iterator = new Mp3RecursiveDirectoryIterator($path);

foreach ($iterator as $file)
{
    var_dump($file->getBasename());
}