<?php

require_once dirname(__DIR__) . '/bootstrap.php';

$file = 'http://www.gutenberg.org/files/4363/4363-h/4363-h.htm';
$contents = loadFile($file);

$iterator = new CharacterIterator($contents);
$iterator = new WordIterator($iterator);
$iterator = new BigWordsFilterIterator($iterator, 10);
$iterator = new WordFrequencyIterator($iterator);
$iterator = new LimitIterator($iterator, 0, 10);

function render(Iterator $iterator)
{
    printf("%25s %d\n", $iterator->key(), $iterator->current());
    return true;
}

$iterator->arsort();
iterator_apply($iterator, 'render', array($iterator));