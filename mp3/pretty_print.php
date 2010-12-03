<?php

require_once dirname(__DIR__) . '/bootstrap.php';

// Path to your MP3's here
$path = '/';

$iterator = new Mp3RecursiveDirectoryIterator($path);

function render(Iterator $iterator)
{
	printf("%s%s\n", str_repeat('    ', $iterator->getDepth()), $iterator->getFilename());
    return true;
}

iterator_apply($iterator, 'render', array($iterator));