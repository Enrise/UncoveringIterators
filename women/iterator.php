<?php

require_once dirname(__DIR__) . '/bootstrap.php';

$values = array(
    'Cameron Diaz',
    'Alizée Jacotey',
    'Britney Spears',
    'Penélope Cruz',
);

$iterator = new WomenIterator($values);
foreach ($iterator as $key => $value)
{
    var_dump($key . ': ' . $value);
}