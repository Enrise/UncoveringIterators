<?php

require_once dirname(__DIR__) . '/bootstrap.php';

$values = array(
    'Cameron Diaz',
    'Alizée Jacotey',
    'Britney Spears',
    'Penélope Cruz',
);

$iterator = new WomenIterator($values);
$iterator = new WomenFilterIterator($iterator);

foreach ($iterator as $key => $value)
{
    var_dump($key . ': ' . $value);
}