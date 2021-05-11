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
    include "db.php";
    include "function.php";

    $ab_book_sql = "SELECT * FROM book";
    $ab_book_result = mysqli_query($link, $ab_book_sql);
    $authors = [];
    while ($ab_book = mysqli_fetch_assoc($ab_book_result)) {
        $book_id = $ab_book['id'];
        $book_title = $ab_book['title'];

        ?>
        <tr>
            <td><?php echo $book_title; ?></td>
            <td>
                <?php
                $book_author_sql = "SELECT * FROM book_authors WHERE book_id = $book_id";
                $book_author_result = mysqli_query($link, $book_author_sql);
                $book_author_row_count = mysqli_num_rows($book_author_result);
                $last_author_count = $book_author_row_count - 1;

                while ($book_author_row = mysqli_fetch_assoc($book_author_result)) {

                    $author_id = $book_author_row['author_id'];
                    $author_sql = "SELECT `name` FROM author WHERE id = $author_id";
                    $author_result = mysqli_query($link, $author_sql);
                    $author_row = mysqli_fetch_assoc($author_result);
                    $author_name = $author_row['name'];
                    $authors[]=$author_name;
                    echo "<pre>";
                    var_dump($authors);
                    echo $author_name;
//                    $FormatString = implode(' , ', $author_row);
//
//                    if (count($author_row) >= 2) {
//                        $FormatString = str_lreplace(',', ' and ', $FormatString);
//                    }
//
//                    echo $FormatString;


                }
                ?>

            </td>
        </tr>
        <?php
    }

    ?>

    </tbody>
</table>
</body>
</html>