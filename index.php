<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AB-Book</title>
</head>
<body>
<table>
    <thead>
    <tr>
        <th>Book Title</th>
        <th>Authors</th>
    </tr>
    </thead>
    <tbody>
    <?php
    include 'db.php';
    include 'function.php';

    $ab_book_sql = 'SELECT * FROM book';
    $res = $pdo->query('select * from book order by title');
    $res->execute() ;
    $books = $res->fetchAll(PDO::FETCH_ASSOC);
    foreach ($books as $book):
    ?>
    <tr>
            <td><?php echo $book['title']; ?></td>
            <td>
            <?php

               $query = 'SELECT * FROM book_authors WHERE book_id = ?';
               $res = $pdo->prepare($query);
               $res->execute([$book['id']]);
               $book_author_relations = $res->fetchAll(PDO::FETCH_OBJ);
               $authorNames = [];
                foreach ($book_author_relations as $book_author_relation) {
                    $query = 'select name from author where id=? ';
                    $res = $pdo->prepare($query);
                    $res->execute([$book_author_relation->author_id]);
                    $authors = $res->fetchAll(PDO::FETCH_OBJ);
                    $authorNames[] = $authors[0]->name;
                }
                // sort name by alphabet
                sort($authorNames);

                $formatName = implode(' , ', $authorNames);
                if (count($authorNames) >= 2) {
                    $formatName = str_lreplace(',', ' and ', $formatName);
                }
                echo $formatName;
            ?>
            </td>
    </tr>
    <?php
       endforeach;
    ?>
    </tbody>
</table>
</body>
</html>