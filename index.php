<?php
include_once('database.php');
//include_once('models/Author.php');
include_once('models/Book.php');
include_once('repository/bookRepo.php');

// DB Connection
$database = new Database();
$db = $database->getConnection();
//
//// Objects
//$book = new Book($db);
//
//// Query
//$stmt = $book->showAll();
//$num = $stmt->rowCount();
$repo = new bookRepo($db);
$books = $repo->getAll();

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Books</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
<?php
echo "<table class='table table-hover table-responsive table-bordered'>";
echo "<tr>";
echo "<th>Book Id</th>";
echo "<th>Author name</th>";
echo "<th>Title</th>";
echo "<th>Year</th>";
echo "<th>Actions</th>";
echo "</tr>";
foreach ($books as $book) {
    echo "<tr>";
    echo "<td>$book->bookId</td>";
    echo "<td>$book->authorId</td>";
    echo "<td>$book->title</td>";
    echo "<td>$book->year</td>";
    echo "<td>";
    echo "<a href='single.php?bookId=$book->bookId' class='btn btn-primary left-margin'>";
    echo "<span class='glyphicon glyphicon-list'></span> Details";
    echo "</a>";
    echo "</td>";
    echo "</tr>";
}
echo "</table>";
?>
</body>

</html>