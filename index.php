<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Demo</title>
</head>
<body>
    <h1>
        Recommended Books
    </h1>

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

    function filterByAuthor($books, $author) {
        $filteredBooks = [];

        foreach ($books as $book) {
            if ($book['author'] === $author) {
                $filteredBooks[] = $book;
            }
        }

        return $filteredBooks;
    }
    ?>

    <ul>
        <?php foreach (filterByAuthor($books, 'Stephen King') as $book) : ?>
            <li>
                <a href="<?= $book['purchaseUrl'] ?>">
                    <?= $book['name'] ?> (<?= $book['releaseYear'] ?>) - By <?= $book['author'] ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
