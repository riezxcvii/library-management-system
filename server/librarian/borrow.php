<?php
require_once '../db/conDB.php';

if (!isset($_POST['borrower_ID'])) {
	echo '
			<script type = "text/javascript">
				alert("Select an account first!");
				window.location = "../../client/librarian/borrow-book.php";
			</script>
		';
} else {
	if (!isset($_POST['selector'])) {
		echo '
				<script type = "text/javascript">
					alert("Selet a book first!");
					window.location = "../../client/librarian/borrow-book.php";
				</script>
			';
	} else if (isset($_POST['save_borrow'])){
		$borrower_ID = $_POST['borrower_ID'];
		$due = $_POST['due'];
		foreach ($_POST['selector'] as $key => $value) {
            $copies = $value;
            $book_ID = $_POST['book_ID'][$key];
          
    
    
            mysqli_query($conn, "INSERT INTO borrowed_books (borrower_ID, date_issued, due_date, book_ID, copies, status) VALUES ('$borrower_ID',NOW(),'$due','$book_ID','$copies','Borrowed')") or die(mysqli_error($conn));
            $query = mysqli_query($conn, "SELECT * FROM borrowed_books ORDER BY borrow_ID DESC") or die(mysqli_error($conn));
            $row = mysqli_fetch_array($query);
            $borrow_ID  = $row['borrow_ID'];
			echo '
					<script type = "text/javascript">
						alert("Successfully borrowed.");
						window.location = "../../client/librarian/borrow-book.php";
					</script>
				';
		}
	}
}