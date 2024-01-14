<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ANS LMS - Librarian</title>
    <link href="../assets/logo.png" type="image/x-icon" rel="shortcut icon">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
    <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <script type="text/javascript">
        $(function() {
            $(".delbutton").click(function() {
                //Save the link in a variable called element
                var element = $(this);
                //Find the id of the link that was clicked
                var del_id = element.attr("id");
                //Built a url to send
                var info = 'id=' + del_id;
                if (confirm("Are you sure you want to archive this book? You can't undo this action.")) {
                    $.ajax({
                        type: "GET",
                        url: "../../server/librarian/archive.php",
                        data: info,
                        success: function(data) {
                            alert(data);
                        }
                    });
                    $(this).parents(".record").animate({
                            backgroundColor: "#fbc7c7"
                        }, "fast")
                        .animate({
                            opacity: "hide"
                        }, "slow");
                    $.ajax({
                        type: "GET",
                        url: "../../server/librarian/archive.php",
                        data: info,
                        success: function(data) {
                            // Handle the response if needed
                            window.location = "all-books.php";
                        }
                    });
                }
                return false;
            });
        });
    </script>
</head>

<body>
    <div class="h-screen flex flex-col bg-gradient-to-b from-blue-400 to-white">
        <!-- Navigation Bar -->
        <nav class="z-10 sticky top-0 bg-black border-gray-200 dark:border-black">
            <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-2">
                <a href="dashboard.php" class="flex items-center">
                    <img src="../assets/logo.png" class="md:h-12 h-9 mr-3" alt="ANS Logo" />
                    <span class="self-center font-semibold whitespace-nowrap text-white md:text-2xl text-base">ANS Library
                        Management System</span>
                </a>
                <!-- Humberger Menu -->
                <button data-collapse-toggle="navbar-dropdown" type="button" class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100" aria-controls="navbar-dropdown" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                    </svg>
                </button>
                <!-- SQL Query for login validation -->
                <?php
                session_start();
                include "../../server/db/conDB.php";
                $admin_ID = $_SESSION['admin_ID'];

                $res = mysqli_query($conn, "SELECT * FROM library_admin where username='" . $_SESSION['username'] . "'");
                while ($row = mysqli_fetch_array($res)) {
                    $first  =  $row["first_name"];
                    $last  =  $row["last_name"];
                }
                ?>
                <!-- SQL Query for notification -->
                <?php
                $currentDate = date("Y-m-d");
                $qreturn = $conn->query("SELECT b.*, u.*, br.* 
                   FROM borrowed_books AS br
                   INNER JOIN books AS b ON br.book_ID = b.book_ID
                   INNER JOIN borrowers AS u ON br.borrower_ID = u.borrower_ID
                   ORDER BY borrow_ID DESC") or die(mysqli_error($con));
                while ($freturn = $qreturn->fetch_array()) {
                    $id = $freturn['borrow_ID'];
                    $dueDate = $freturn['due_date'];
                    $dateReturned = $freturn['returned_date'];
                    $bookId = $freturn['book_ID'];
                    $firstname = $freturn['first_name'];
                    $lastname = $freturn['last_name'];
                    $fine = $freturn['penalty'];
                    $penalty = 0;

                    $book = mysqli_query($conn, "SELECT * FROM books WHERE book_ID = $bookId");
                    $rowBook = mysqli_fetch_assoc($book);
                    $bookName = $rowBook['title'];

                    if (strtotime($dueDate) < time() && $freturn['status'] == 'Borrowed') {
                        $checkQuery = "SELECT * FROM notification WHERE borrow_ID = '$id' AND date = '$currentDate'";
                        $checkResult = $conn->query($checkQuery);

                        // If no notification exists for today, insert the notification
                        if ($checkResult->num_rows == 0) {
                            $dueDateTime = strtotime($dueDate);
                            $currentDateTime = time();
                            $overdueDays = floor(($currentDateTime - $dueDateTime) / (60 * 60 * 24));

                            $notificationText = "The book \"" . $bookName . "\" borrowed by " . $firstname . "  "  . $lastname .  " is overdue by " . $overdueDays . " day(s).";

                            // Insert the notification into the notifications table
                            $insertQuery = "INSERT INTO notification (borrow_id,notification_text,type,date) VALUES ($id,'$notificationText', 'librarian','$currentDate')";
                            $conn->query($insertQuery);
                        }
                    }
                }

                $q_book = $conn->query("SELECT * FROM `books` WHERE archive = 0") or die(mysqli_error($conn));
                while ($f_book = mysqli_fetch_assoc($q_book)) {
                    $q_borrow = $conn->query("SELECT SUM(copies) as total FROM `borrowed_books` WHERE `book_ID` = '$f_book[book_ID]'") or die(mysqli_error($conn));
                    $new_qty = $q_borrow->fetch_array();
                    $total = $f_book['copies'] - $new_qty['total'];


                    if ($total <= 5) {
                        $checkQuery = "SELECT * FROM notification WHERE book_ID = '$f_book[book_ID]' AND date = '$currentDate'";
                        $checkResult = $conn->query($checkQuery);

                        // If no notification exists for today, insert the notification
                        if ($checkResult->num_rows == 0) {

                            $notificationText = "Low stock for \"" . $f_book['title'] . "\" book.";

                            // Insert the notification into the notifications table
                            $insertQuery = "INSERT INTO notification (book_ID,notification_text,type,date) VALUES ($f_book[book_ID],'$notificationText', 'librarian','$currentDate')";
                            $conn->query($insertQuery);
                        }
                    }
                }

                $notifQuery = mysqli_query($conn, "SELECT COUNT(*) AS total FROM notification WHERE notif_status = 0 and type = 'librarian'");
                $p = mysqli_fetch_assoc($notifQuery);
                $Count = $p['total'];
                ?>

                <!-- Navigation Links -->
                <div class="hidden w-full md:block md:w-auto flex justify-end" id="navbar-dropdown">
                    <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-black md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-transparent dark:border-gray-700 md:w-auto w-fit">
                        <li>
                            <a href="dashboard.php" class="block py-2 pl-3 pr-4 rounded md:bg-transparent text-white md:p-0">
                                <svg class="w-6 h-auto hidden md:block" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"></path>
                                </svg>
                                <span class="self-center font-semibold whitespace-nowrap text-white text-sm md:hidden block">Home</span>
                            </a>
                        </li>
                        <!-- Notifications -->
                        <li>
                            <a href="./notifications.php" class="relative">
                                <button id="dropdownNavbarLink1" class="flex items-center justify-between w-full py-2 pl-3 pr-4 text-white rounded md:border-0 hover:text-blue-400 md:p-0 md:w-auto">
                                    <svg class="w-[1.6rem] h-auto hidden md:block" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0M3.124 7.5A8.969 8.969 0 015.292 3m13.416 0a8.969 8.969 0 012.168 4.5"></path>
                                    </svg>
                                    <span class="absolute invisible md:visible inline-flex items-center justify-center w-6 h-6 text-xs font-bold text-white bg-red-500 border-2 border-white rounded-full -top-3 -right-5 dark:border-gray-900 px-3"><?php echo $Count; ?></span>
                                    <span class="self-center font-semibold whitespace-nowrap text-white text-sm md:hidden block">Notifications</span>
                                </button>
                            </a>
                        </li>
                        <!-- User name and dropdown button -->
                        <li>
                            <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar" class="flex items-center justify-between w-full py-2 pl-3 pr-4 text-white rounded md:border-0 hover:text-blue-400 md:p-0 md:w-auto"><span class="md:text-base text-sm"><?php echo $first; ?> <?php echo $last; ?></span>
                                <svg class="w-5 h-5 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                            </button>
                            <!-- Dropdown Menu -->
                            <div id="dropdownNavbar" class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:divide-gray-600">
                                <ul class="text-sm text-black" aria-labelledby="dropdownLargeButton">
                                    <div class="py-1" data-modal-target="popup-modal" data-modal-toggle="popup-modal">
                                        <a href="#" class="block px-4 py-2 text-sm text-black hover:bg-blue-100 hover:text-black">Sign
                                            out</a>
                                    </div>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Modal for sign out link -->
        <div id="popup-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-8 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-md max-h-full">
                <div class="relative bg-white rounded-lg shadow">
                    <!-- Close button (x) -->
                    <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="popup-modal">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="p-6 text-center">
                        <svg aria-hidden="true" class="mx-auto md:mb-4 mb-1 text-gray-700 md:w-14 w-11 h-14" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <h3 class="mb-5 md:text-lg text-base font-normal text-gray-900">Are you sure you want to
                            sign out?</h3>
                        <a href="../../server/admin/logout.php?id=<?php echo $admin_ID; ?>">
                            <button type="button" class="text-white bg-red-600 hover:bg-red-700 focus:ring-2 focus:outline-none focus:ring-red-400 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                Yes, I'm sure
                            </button>
                        </a>
                        <button data-modal-hide="popup-modal" type="button" class="text-white bg-gray-500 hover:bg-gray-600 focus:ring-2 focus:outline-none focus:ring-gray-400 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-white focus:z-10">No,
                            cancel</button>
                    </div>
                </div>
            </div>
        </div>