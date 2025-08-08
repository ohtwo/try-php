<?php
$books = [
    [
        'name' => "Do Androids Dream of Electric Sheep",
        'author' => "Philip K. Dick",
        'purchaseUrl' => 'https://www.amazon.com/Androids-Dream-Electric-Sheep-inspiration/dp/1780220383/',
        'releaseYear' => 1968
    ],
    [
        'name' => 'The Langoliers',
        'author' => "Stephen King",
        'purchaseUrl' => 'https://www.amazon.com/Langoliers-Stephen-King/dp/1982136057',
        'releaseYear' => 1995
    ],
    [
        'name' => "Project Hail Mary",
        'author' => "Andy Weir",
        'purchaseUrl' => 'https://www.amazon.com/Project-Hail-Mary-Andy-Weir/dp/0593135202/',
        'releaseYear' => 2021
    ],
];

$filteredBooks = array_filter($books, function($book) {
    return $book['author'] === 'Andy Weir';
});

require "contact.view.php";
