<?php

require_once dirname(__DIR__) . '/bootstrap.php';

$file = 'http://www.imdb.com/boxoffice/alltimegross';
$boxOfficeUsaIterator = new ImdbBoxOfficeMoviesIterator($file);
$boxOfficeUsaIterator = new LimitIterator($boxOfficeUsaIterator, 1, 10);

foreach ($boxOfficeUsaIterator as $movie)
{
    printf("%2d. %'.-55s %14s\n", $movie->rank, $movie->title, $movie->revenue);
}