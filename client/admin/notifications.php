<?php
include('navigation-bar.php');
?>

<div class="mb-4 flex justify-center items-center mt-[-1rem]">
    <div class="bg-gray-50 rounded-md m-12 my-8 w-[33rem]">
        <div class="px-4 py-6 lg:px-8">
            <div class="flex justify-between">
                <h3 class="mb-4 text-xl font-medium text-gray-900">Notifications</h3>
            </div>
            <form class="space-y-6" action="#" autocomplete="off" method="POST">
                <ul>
                    <?php
                    $sql1 = "SELECT * FROM borrowers WHERE status = 0"; // Remove "AND borrower_ID" from the condition
                    $result1 = mysqli_query($conn, $sql1);

                    if ($result1 && mysqli_num_rows($result1) > 0) {
                        while ($row1 = mysqli_fetch_assoc($result1)) {
                            $borrowerID = $row1['borrower_ID'];
                            $last = $row1['last_name'];
                            $first = $row1['first_name'];
                    ?>
                            <li>
                                <!--notif for book availability-->
                                <a href="./account-registration.php">
                                    <div class="bg-blue-100 p-4 text-sm rounded-md mb-1">
                                        <h2 class="font-semibold">Pending Registration</h2>
                                        <h3><?php echo $first; ?> <?php echo $last; ?>wants to be registered in the system.</h3>
                                    </div>
                                </a>
                        <?php
                        }
                    } else {
                        echo "No notifications.";
                    }
                        ?>
                            </li>

                            <?php
                            $sql = "SELECT * FROM borrowers WHERE status = 1"; // Remove "AND borrower_ID" from the condition
                            $result = mysqli_query($conn, $sql);

                            if ($result && mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $borrowerID = $row['borrower_ID'];
                                    $last_name = $row['last_name'];
                                    $first_name = $row['first_name'];

                                    // Check if the user has a penalty
                                    $query = "SELECT * FROM `borrowed_books` WHERE `borrower_ID` = '$borrowerID'";
                                    $qbook = mysqli_query($conn, $query);
                                    $fbook = mysqli_fetch_assoc($qbook);

                                    if ($fbook && $fbook['penalty'] > 0) {
                                        $penalty = $fbook['penalty'];
                            ?>

                                        <li>
                                            <!--notif for book due-->
                                            <a href="./log-history.php">
                                                <div class="bg-blue-100 py-3 px-6 text-sm rounded-md mb-1">
                                                    <h2 class="font-semibold mb-1">Pending fines</h2>
                                                    <h3><?php echo $first_name; ?> <?php echo $last_name; ?> who just logged in has a pending fine of <?php echo $penalty . '.00'; ?> for not returning the book on time.</h3>

                                        <?php
                                    }
                                }
                            } else {
                                echo "No notifications.";
                            }
                                        ?>
                                                </div>
                                            </a>
                                        </li>
                </ul>
            </form>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
</body>

</html>