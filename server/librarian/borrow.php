<?php
include('../db/conDB.php');

$id = $_POST['selector'];
$borrower_ID  = $_POST['borrower_ID'];
$currentDate = date('Y-m-d');
$due_date = date('Y-m-d', strtotime($currentDate . ' + 7 days'));

if ($id == '') {
    header("location: ../../client/librarian/borrow-book.php");
?>

	<?php } else {
    foreach ($_POST['selector'] as $key => $value) {
        $copies = $value;
        $book_ID = $_POST['book_ID'][$key];
        $status = $_POST['status'];


        mysqli_query($conn, "INSERT INTO borrowed_books (borrower_ID, date_issued, due_date, book_ID, copies, status) VALUES ('$borrower_ID',NOW(),'$due_date','$book_ID','$copies','Borrowed')") or die(mysqli_error($conn));
        $query = mysqli_query($conn, "SELECT * FROM borrowed_books ORDER BY borrow_ID DESC") or die(mysqli_error($conn));
        $row = mysqli_fetch_array($query);
        $borrow_ID  = $row['borrow_ID'];
        header("location: ../../client/librarian/return-book.php");
    }
}
    ?>
	