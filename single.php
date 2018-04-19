<?php
// Get ID of book.
$bookId = isset($_GET['bookId']) ? $_GET['bookId'] : die('ERROR: missing Book ID.');

// include database and object files
include_once 'database.php';
//include_once 'models/Author.php';
include_once 'models/Book.php';
include_once('repository/bookRepo.php');

// DB Connection
$database = new Database();
$db = $database->getConnection();

//// Objects
//$book = new Book($db);

// Set ID property of book to be read.
//$book->bookId = $bookId;

// read the details of product to be read
//$book->readOne();

$repo = new bookRepo($db);
$book = $repo->getOne($bookId)
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
echo "<td>Book ID</td>";
echo "<td>{$book->bookId}</td>";
echo "</tr>";

echo "<tr>";
echo "<td>Authors name</td>";
echo "<td>{$book->author}</td>";
echo "</tr>";

echo "<tr>";
echo "<td>Title</td>";
echo "<td>{$book->title}</td>";
echo "</tr>";

echo "<tr>";
echo "<td>Year</td>";
echo "<td>{$book->year}</td>";
echo "</tr>";

echo "</table>";
?>
</body>
</html>