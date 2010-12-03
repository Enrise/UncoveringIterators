<?php

require_once dirname(__DIR__) . '/bootstrap.php';

$topMoviesIterator = new ImdbTopMoviesIterator();
$topMoviesIterator = new LimitIterator($topMoviesIterator, 1, 10);

$file = 'http://www.imdb.com/boxoffice/alltimegross';
$boxOfficeUsaIterator = new ImdbBoxOfficeMoviesIterator($file);
$boxOfficeUsaIterator = new LimitIterator($boxOfficeUsaIterator, 1, 10);

$iterator = new MultipleIterator();
$iterator->attachIterator($topMoviesIterator);
$iterator->attachIterator($boxOfficeUsaIterator);

foreach ($iterator as $movie)
{
	printf("%2d. %'.-55s %.1f | %'.-55s %14s\n",
	   $movie[0]->rank,
	   $movie[0]->title,
	   $movie[0]->rating,
	   $movie[1]->title,
	   $movie[1]->revenue
    );
}