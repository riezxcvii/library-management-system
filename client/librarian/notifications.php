<?php
include('navigation-bar.php');
?>

<div class="mb-4 flex justify-center items-center mt-[-1rem]">
    <div class="bg-gray-50 rounded-md m-12 my-8 w-[33rem] min-h-screen sm:min-h-[75.5vh]">
        <div class="px-4 py-6 lg:px-8">
            <div class="flex justify-between">
                <h3 class="mb-4 text-xl font-medium text-gray-900">Notifications</h3>
                <a href="" class="text-xs text-blue-600 underline mt-[0.3rem]">Mark all as read</a>
            </div>
            <form class="space-y-6" action="#" autocomplete="off" method="POST">
                <ul>
                    <li>
                        <?php
                        $sql = "SELECT * FROM borrowers WHERE status = 1";
                        $result = mysqli_query($conn, $sql);

                        $notifications = []; // Initialize an empty array to store notifications

                        if ($result && mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $borrowerID = $row['borrower_ID'];
                                $last_name = $row['last_name'];
                                $first_name = $row['first_name'];

                                // Retrieve penalties for the user
                                $currentDate = date('Y-m-d'); // Get the current date
                                $query = "SELECT b.title, b.due_date
                                FROM borrowed_books AS b
                                JOIN books AS bk ON b.book_ID = bk.book_ID
                                WHERE b.borrower_ID = '$borrowerID' AND b.due_date < '$currentDate' AND b.status = 'Borrowed'"; // Compare with the current date using '<'
                                $qbook = mysqli_query($conn, $query);

                                if (mysqli_num_rows($qbook) > 0) {
                                    while ($fbook = mysqli_fetch_assoc($qbook)) {
                                        $title = $fbook['title'];
                                        $due_date = $fbook['due_date'];

                                        // Calculate the number of days overdue
                                        $days_overdue = floor((strtotime($currentDate) - strtotime($due_date)) / (60 * 60 * 24));

                                        // Add notification to the array
                                        $notification = [
                                            'first_name' => $first_name,
                                            'last_name' => $last_name,
                                            'title' => $title,
                                            'due_date' => $due_date,
                                            'days_overdue' => $days_overdue
                                        ];
                                        $notifications[] = $notification;
                                    }
                                }
                            }

                            if (!empty($notifications)) {
                                foreach ($notifications as $notification) {
                                    // Check if the due date has passed
                                    if ($notification['due_date'] < $currentDate) {
                        ?>
                    <li>
                        <!-- Notification for pending fines -->
                        <a href="./return-book.php">
                            <div class="bg-blue-100 py-3 px-6 text-sm rounded-md mb-1">
                                <h2 class="font-semibold mb-1">Borrowed book overdue</h2>
                                <h3><?php echo $notification['first_name'] . ' ' . $notification['last_name']; ?> borrowed the book "<?php echo $notification['title']; ?>", which was due on <?php echo $notification['due_date']; ?>. It is now <?php echo $notification['days_overdue']; ?> days overdue.</h3>
                            </div>
                        </a>
                    </li>

    <?php
                                    }
                                }
                            } else {
                                echo "No notifications.";
                            }
                        } else {
                            echo "No notifications.";
                        }
    ?>

    <!--notif for book availability-->
    <div class="bg-blue-100 p-4 text-sm rounded-md mb-1">
        <h2 class="font-semibold">Book Availability</h2>
        <h3>Low stock for Romeo and Juliet book.</h3>
    </div>
    </li>
                </ul>
            </form>
        </div>
    </div>
</div>

<div class="flex justify-end pr-4 pb-2 mt-[-1.5rem]">
    <button onclick="history.back()" type="button" class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-black rounded-lg hover:bg-red-700 focus:ring-2 focus:outline-none focus:ring-red-300">
        Back
    </button>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
</body>

</html>