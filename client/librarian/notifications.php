<?php
include('navigation-bar.php');
?>

<div class="flex justify-center items-center h-full">
    <div class="bg-gray-50 rounded-md m-8 md:mt-1 mt-[-1.5rem] md:my-4 w-full md:mx-28 overflow-y-auto">
        <!-- Form -->
        <div class="px-4 py-6 lg:px-8 h-[80vh]">
            <div class="flex justify-between">
                <h3 class="mb-4 text-xl font-medium text-gray-900">Notifications</h3>
                <form action="" method="POST">
                    <input type="submit" name="mark_all" class="text-xs text-blue-600 underline mt-[0.3rem]" value="Mark all as read">
                </form>
            </div>
            <!-- Notification lists -->
            <form class="space-y-6" action="#" autocomplete="off" method="POST">
                <ul>
                    <li>
                        <!-- SQL Query to select all notifications for admin -->
                        <?php
                        $getNotif = mysqli_query($conn, "SELECT * FROM notification 
                         WHERE type = 'librarian' ORDER BY notif_status ASC");
                        $count = mysqli_num_rows($getNotif);
                        if ($count != 0) {
                            while ($row = mysqli_fetch_assoc($getNotif)) {

                        ?>
                    <li>
                        <!-- Notification for pending fines -->
                        <a href="<?php echo $row['book_ID'] == 0 ? './return-book.php' : './inventory-reports.php' ?>">
                            <div class="<?php echo $row['notif_status'] == 0 ? 'bg-blue-300' : 'bg-blue-100'  ?> py-3 px-6 text-sm rounded-md mb-1">
                                <h2 class="font-semibold mb-1"><?php echo $row['book_ID'] == 0 ? 'Borrowed book overdue' : 'Book Availability' ?></h2>
                                <h3><?php echo $row['notification_text']; ?></h3>
                                <form action="" method="POST">
                                    <input type="hidden" name="id" value="<?php echo $row['notification_ID']; ?>">
                                </form>
                            </div>
                        </a>
                    </li>
                        <?php
                            }
                        } else {
                            echo "No nofications this time";
                        }
                        if (isset($_POST['read'])) {
                            $update = mysqli_query($conn, "UPDATE notification SET notif_status = 1 WHERE id=$_POST[id]");
                            if ($update) {
                                echo "<script>
                                window.location.href='notifications.php'
                                </script>";
                            }
                        }
                        if (isset($_POST['mark_all'])) {
                            $update = mysqli_query($conn, "UPDATE notification SET notif_status = 1 WHERE type= 'librarian'");
                            if ($update) {
                                echo "<script>
                                window.location.href='notifications.php'
                                </script>";
                            }
                        }
                        if (isset($_POST['remove'])) {
                            $update = mysqli_query($conn, "DELETE FROM notification WHERE id = $_POST[id]");
                            if ($update) {
                                echo "<script>
                            window.location.href='notifications.php'
                            </script>";
                            }
                        }
                        ?>
                    </li>
                </ul>
            </form>
        </div>
    </div>
</div>

<!-- Back button -->
<div class="flex justify-end pr-4 pb-4 fixed bottom-0 right-0">
    <a onclick="history.back()">
        <button type="button" class="inline-flex items-center px-5 py-2 text-sm font-medium text-center text-white bg-black rounded-lg hover:bg-red-700 focus:ring-2 focus:outline-none focus:ring-red-400">
            Back
        </button>
    </a>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
</body>

</html>