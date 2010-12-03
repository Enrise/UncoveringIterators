<?php

require_once dirname(__DIR__) . '/bootstrap.php';

$iterator = new FibonacciIterator();

foreach ($iterator as $key => $value)
{
	printf("%3s: %'.25s\n", $key, $value);
}