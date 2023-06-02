<?php
include("../db/conDB.php");

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // Retrieve data from the database based on the given id
    $query = $conn->prepare("SELECT * FROM books WHERE book_ID = ?");
    $query->bind_param("i", $id);
    $query->execute();
    $result = $query->get_result();

    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
        echo json_encode($data);
    } else {
        echo "No data found.";
    }
} else {
    echo "Invalid request.";
}
