<?php

require_once dirname(__DIR__) . '/bootstrap.php';

$topMoviesIterator = new ImdbTopMoviesIterator();
$topMoviesIterator = new LimitIterator($topMoviesIterator, 1, 10);

foreach ($topMoviesIterator as $movie)
{
	printf("%2d. %'.-55s %.1f\n", $movie->rank, $movie->title, $movie->rating);
}