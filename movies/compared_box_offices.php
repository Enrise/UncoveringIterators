<?php

require_once dirname(__DIR__) . '/bootstrap.php';

$file = 'http://www.imdb.com/boxoffice/alltimegross';
$boxOfficeUsaIterator = new ImdbBoxOfficeMoviesIterator($file);
$boxOfficeUsaIterator = new LimitIterator($boxOfficeUsaIterator, 1, 10);

$file = 'http://www.imdb.com/boxoffice/alltimegross?region=non-us';
$boxOfficeNonUsaIterator = new ImdbBoxOfficeMoviesIterator($file);
$boxOfficeNonUsaIterator = new LimitIterator($boxOfficeNonUsaIterator, 1, 10);

$iterator = new MultipleIterator();
$iterator->attachIterator($boxOfficeUsaIterator);
$iterator->attachIterator($boxOfficeNonUsaIterator);

foreach ($iterator as $movie)
{
	printf("%2d. %'.-55s %14s | %'.-55s %14s\n",
	   $movie[0]->rank,
	   $movie[0]->title,
	   $movie[0]->revenue,
	   $movie[1]->title,
	   $movie[1]->revenue
    );
}