<?php

require_once dirname(__DIR__) . '/bootstrap.php';

// Path to your MP3's here
$path = '/';

$iterator = new Mp3RecursiveDirectoryIterator($path);
$iterator = new SongsIterator($iterator);

foreach ($iterator as $song)
{
	foreach ($song as $property)
	{
		var_dump($property);
	}
	echo "\n";
}