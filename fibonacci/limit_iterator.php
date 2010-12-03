<?php

require_once dirname(__DIR__) . '/bootstrap.php';

$iterator = new FibonacciIterator();
$iterator = new LimitIterator($iterator, 0, 50);

foreach ($iterator as $key => $value)
{
	printf("%3s: %'.25s\n", $key, $value);
}