<?php

require_once dirname(__DIR__) . '/bootstrap.php';

$file = 'http://www.gutenberg.org/files/4363/4363-h/4363-h.htm';
$contents = loadFile($file);

$iterator = new NaiveWordIterator($contents);

foreach ($iterator as $word)
{
    var_dump($word);
}