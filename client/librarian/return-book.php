<?php
include('navigation-bar.php');
?>

        <!--button and search bar-->
        <div class="p-4 flex justify-end">
            <!--button-->
            <a href="borrow-book.php" class="flex mr-8">
                <button type="button" class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-2 focus:outline-none focus:ring-blue-300">
                    Borrow a book
                </button>
            </a>
            <!--search bar-->
            <form autocomplete="off">
                <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                <div class="relative w-96">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <input type="search" id="default-search" class="border-0 block w-full p-4 pl-10 text-sm text-black rounded-lg bg-white focus:border-gray-500" placeholder="Search" required onkeyup="mySearch()">
                </div>
            </form>
        </div>

        <!--table-->
        <div class="p-4 h-screen overflow-y-auto">
            <div class="relative overflow-y-auto h-full bg-white shadow-md sm:rounded-lg">
                <table id="table" class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="sticky top-0 text-xs text-white uppercase bg-black">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                <div class="flex items-center">
                                    Borrower
                                    <a href="#" onclick="sortTable(0)"><svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512">
                                            <path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z" />
                                        </svg></a>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <div class="flex items-center">
                                    Title
                                    <a href="#" onclick="sortTable(1)"><svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512">
                                            <path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z" />
                                        </svg></a>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <div class="flex items-center">
                                    Status
                                    <a href="#" onclick="sortTable(2)"><svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512">
                                            <path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z" />
                                        </svg></a>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <div class="flex items-center">
                                    Date Borrowed
                                    <a href="#" onclick="sortTable(3)"><svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512">
                                            <path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z" />
                                        </svg></a>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <div class="flex items-center">
                                    Date Returned
                                    <a href="#" onclick="sortTable(4)"><svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512">
                                            <path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z" />
                                        </svg></a>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <div class="flex items-center">
                                    Due Date
                                    <a href="#" onclick="sortTable(5)"><svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512">
                                            <path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z" />
                                        </svg></a>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-5 flex justify-center">
                                Action
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <div class="flex items-center">
                                    Fine
                                    <a href="#" onclick="sortTable(7)"><svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512">
                                            <path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z" />
                                        </svg></a>
                                </div>
                            </th>
                    </thead>
                    <tbody>

                        <?php
                        $date = date("Y-m-d");
                        $qreturn = $conn->query("SELECT b.*, u.*, br.* 
                        FROM borrowed_books AS br
                        INNER JOIN books AS b ON br.book_ID = b.book_ID
                        INNER JOIN borrowers AS u ON br.borrower_ID = u.borrower_ID
                        ORDER BY borrow_ID DESC") or die(mysqli_error($con));
                        while ($freturn = $qreturn->fetch_array()) {
                            $id = $freturn['borrow_ID'];
                            $dueDate = $freturn['due_date'];
                            $dateReturned = $freturn['returned_date'];
                            $bookId=$freturn['book_ID'];
                            $fine = $freturn['penalty'];
                            $penalty = 0;

                            $book=mysqli_query($conn, "SELECT * FROM books WHERE book_ID = $bookId");
                            $rowBook=mysqli_fetch_assoc($book);
                          $bookName=$rowBook['title'];

                           
                            // Calculate the penalty based on the number of days overdue
                            $dueDateTimestamp = strtotime($dueDate);
                            $currentDateTimestamp = strtotime($date);
                            $daysOverdue = floor(($currentDateTimestamp - $dueDateTimestamp) / (60 * 60 * 24));
                            $penalty = $daysOverdue * 5;
                        ?>

                            <tr class="bg-white border-b text-black font-semibold">
                                <td scope="row" class="px-6 py-2 font-semibold text-black whitespace-nowrap">
                                    <?php echo $freturn['first_name'] . ' ' . $freturn['last_name']  ?>
                                </td>
                                <td onclick="openModal(<?php echo $freturn['book_ID']; ?>)" class="px-6 py-2 select-none hover:bg-blue-200" data-modal-target="card-modal" data-modal-toggle="card-modal">
                                    <?php
                                 
                                    echo $bookName;
                                    ?>
                                </td>
                                <td class="px-6 py-2">
                                    
                                    <?php echo $freturn['status'] ?>
                                </td>
                                <td class="px-6 py-2">
                                    <?php echo $freturn['date_issued'] ?>
                                </td>
                                <td class="px-6 py-2">
                                    <?php echo $freturn['returned_date'] ?>
                                </td>
                                <?php
                                if ($dueDate >= $date) {
                                ?>
                                    <td onselectstart="return false"><?php echo $freturn['due_date']; ?></td>

                                    <td>
                                    <?php

                                } else {
                                    ?>
                                    <td class="text-red-600">
                                        <?php echo $freturn['due_date'] ?>
                                    </td>

                                    <td class="px-6 py-2 flex justify-center">
                                    <?php
                                }
                                
                                    ?>

                                    <?php
                                    if ($freturn['status'] == 'Returned') {
                                        echo '<center><button disabled = "disabled" class = "btn btn-primary py-3 inline-flex" type = "button" href = "#" id="returned6" data-toggle = "modal" data-target = "#return"><span class = "glyphicon glyphicon-check"></span>
                                        <svg class="w-[1rem] mt-[0.1rem] mr-[0.1rem] h-auto" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.125 2.25h-4.5c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125v-9M10.125 2.25h.375a9 9 0 019 9v.375M10.125 2.25A3.375 3.375 0 0113.5 5.625v1.5c0 .621.504 1.125 1.125 1.125h1.5a3.375 3.375 0 013.375 3.375M9 15l2.25 2.25L15 12"></path>
                                      </svg>RETURNED</button></center>';
                                    } else {
                                    ?>
                                        <a href="../../server/librarian/return.php?id=<?php echo $id; ?>" class="flex items-center justify-center">
                                            <button class="flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-2 focus:outline-none focus:ring-blue-300 my-2">
                                                <svg class="w-[1rem] h-auto mr-[0.1rem] mt-[0.05rem]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 9.75h4.875a2.625 2.625 0 010 5.25H12M8.25 9.75L10.5 7.5M8.25 9.75L10.5 12m9-7.243V21.75l-3.75-1.5-3.75 1.5-3.75-1.5-3.75 1.5V4.757c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0111.186 0c1.1.128 1.907 1.077 1.907 2.185z"></path>
                                                </svg>RETURN</button>
                                        </a>
                                    <?php
                                    }
                                    ?>
                                    </td>

                                    <?php
                                    if ($dueDate < $date) {
                                    ?>
                                        <td class="px-6 py-2 select-none">
                                            <div class="flex items-center">
                                                <?php
                                                if ($freturn['paid'] == 1) {
                                                    echo '<center><button disabled = "disabled" class = "mr-1 btn btn-primary flex" type = "button" href = "#" id="returned6" data-toggle = "modal" data-target = "#return"><span class = "glyphicon glyphicon-check"></span>
                                                    <svg class="w-[1rem] h-auto mr-[0.2rem] mt-[0.15rem]" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z"></path>
                                                </svg>PAID</button></center>';
                                                } else {
                                                ?>
                                                    <?php
                                                    if ($freturn['paid'] != 1 && $freturn['status'] != 'Borrowed') {
                                                    ?>
                                                        <a href="../../server/librarian/pay.php?id=<?php echo $id; ?>" class="flex items-center justify-center">
                                                            <button class="flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-yellow-600 rounded-lg hover:bg-yellow-700 focus:ring-2 focus:outline-none focus:ring-blue-300 my-2 mr-1">
                                                                <svg class="w-[1rem] h-auto mr-[0.2rem] mt-[0.05rem]" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z"></path>
                                                                </svg>PAY</button>
                                                        </a>

                                                    <?php
                                                    } else
                                                    {
                        
                                                    }
                                             
                                                }
                     
                                                    $qbook = $conn->query("UPDATE `borrowed_books` SET `penalty` = '$penalty' WHERE `borrow_ID` = '$freturn[borrow_ID]' and status = 'Borrowed'") or die(mysqli_error($conn));
                                                    $qbook1 = $conn->query("SELECT penalty FROM `borrowed_books` WHERE `borrow_ID` = '$freturn[borrow_ID]'") or die(mysqli_error($conn));
                                                    $rows=mysqli_fetch_assoc($qbook1);
                                                    // Assuming `$penalty` holds the penalty amount to be updated
                                                    // Make sure to replace `borrowed_books` with the correct table name in your database

                                                    // Check if the query was successful
                                                    if ($qbook1) {
                                                        echo ' ' . $rows['penalty'] . '.00'; // Assuming `$penalty` is a valid variable
                                                    } else {
                                                        echo "Error updating penalty: " . mysqli_error($conn);
                                                    }
                                                    ?>
                                               
                                            </div>
                                        </td>
                                    <?php

                                    } else {
                                    ?>
                                        <td class="px-6 py-2 select-none">

                                        </td>
                                    <?php
                                    }
                                    ?>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!--card modal-->
        <div id="card-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative max-h-full mx-auto flex items-center justify-center w-[55rem]">
                <!--card modal content-->
                <div class="relative bg-gray-200 rounded-lg shadow">
                    <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="card-modal">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="px-6 py-6 lg:px-8">
                        <h3 class="mb-4 text-xl font-medium text-gray-900 text-center">Card Catalog</h3>
                        <form class="space-y-6" action="#" autocomplete="off">
                            <table>
                                <tr>
                                    <td id="category" class="text-center px-8 py-1"></td>
                                    <td></td>
                                </tr>

                                <tr>
                                    <td id="authorNumber" class="text-center px-8 py-1"></td>
                                    <td></td>
                                </tr>


                                <tr>
                                    <td></td>
                                    <td id="author" class="px-8 py-1"></td>
                                </tr>

                                <tr>
                                    <td></td>
                                    <td id="title" class="pl-16 px-8 py-1"></td>
                                </tr>

                                <tr>
                                    <td></td>
                                    <td id="publication" class="px-8 py-1"></td>
                                </tr>

                                <tr>
                                    <td></td>
                                    <td id="physical" class="px-8 py-1"></td>
                                </tr>

                                <tr>
                                    <td></td>
                                    <td id="isbn" class="px-8 py-1"></td>
                                </tr>

                                <tr>
                                    <td id="accessionNumber" class="px-8 py-1"></td>
                                    <td></td>
                                </tr>

                                <tr>
                                    <td></td>
                                    <td id="subject" class="px-8 py-1"></td>
                                </tr>

                                <tr>
                                    <td></td>
                                    <td id="tracing" class="px-8 py-1"></td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex justify-end pr-4 pb-2">
            <a href="../../server/print/returned-books.php" target="_blank">
                <button type="button" class="mr-2 inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-green-600 rounded-lg hover:bg-blue-700 focus:ring-2 focus:outline-none focus:ring-blue-500">
                    Print
                </button>
            </a>
            <a href="dashboard.php">
                <button type="button" class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-black rounded-lg hover:bg-red-700 focus:ring-2 focus:outline-none focus:ring-red-300">
                    Back
                </button>
            </a>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
    <script src="../js/sort.js"></script>
    <script>
        function mySearch() {
            // Declare variables
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("default-search");
            filter = input.value.toUpperCase();
            table = document.getElementById("table");
            tr = table.getElementsByTagName("tr");
            // Loop through all table rows, and hide those who don't match the search query
            for (i = 1; i < tr.length; i++) {
                column1 = tr[i].getElementsByTagName("td")[0];
                column2 = tr[i].getElementsByTagName("td")[1];
                column3 = tr[i].getElementsByTagName("td")[2];
                column4 = tr[i].getElementsByTagName("td")[3];
                column5 = tr[i].getElementsByTagName("td")[4];
                column6 = tr[i].getElementsByTagName("td")[5];
                if (column1 && column2 && column3 && column4 && column5) {
                    column1 = column1.textContent || column1.innerText;
                    column2 = column2.textContent || column2.innerText;
                    column3 = column3.textContent || column3.innerText;
                    column4 = column4.textContent || column4.innerText;
                    column5 = column5.textContent || column5.innerText;
                    column6 = column6.textContent || column6.innerText;
                    if (column1.toUpperCase().indexOf(filter) > -1 || column2.toUpperCase().indexOf(filter) > -1 || column3.toUpperCase().indexOf(filter) > -1 || column4.toUpperCase().indexOf(filter) > -1 || column5.toUpperCase().indexOf(filter) > -1 || column6.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
    <script>
        // Function to open the modal
        function openModal(id) {
            var xhr = new XMLHttpRequest();
            xhr.open('POST', '../../server/librarian/card-catalog.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            xhr.onload = function() {
                if (xhr.status === 200) {
                    var data = JSON.parse(xhr.responseText);

                    // Update the modal content with the retrieved data
                    document.getElementById('category').textContent = data.category;
                    document.getElementById('authorNumber').textContent = data.author_number
                    document.getElementById('author').textContent = data.author_lastname + ', ' + data.author_firstname;
                    document.getElementById('accessionNumber').textContent = data.accession_number;
                    document.getElementById('title').textContent = data.title + ' / ' + data.author_firstname + ' ' + data.author_lastname;
                    document.getElementById('publication').textContent = data.publisher + ' -- ' + data.publication_place + ', C ' + data.copyright_year;
                    document.getElementById('physical').textContent = data.physical_description;
                    document.getElementById('isbn').textContent = 'ISBN ' + data.isbn;
                    document.getElementById('subject').textContent = data.subject;
                    document.getElementById('tracing').textContent = data.tracing;
                } else {
                    console.error('Request failed. Status: ' + xhr.status);
                }
            };

            xhr.onerror = function() {
                console.error('Request failed. Network error.');
            };

            xhr.send('id=' + id);
        }
    </script>
</body>

</html>