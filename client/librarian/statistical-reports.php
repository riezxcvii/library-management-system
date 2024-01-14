<?php
include('navigation-bar.php');
?>

<div class="flex md:flex-row flex-col mx-auto">
    <!-- Table for top borrwers -->
    <div class="md:h-[88vh] h-[55vh] md:px-8 px-6 md:py-10 py-7">
        <div class="flex-shrink-0 md:w-[35rem] min-w-screen relative overflow-y-auto h-full bg-white shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="sticky top-0 text-xs text-white uppercase bg-black">
                    <tr>
                        <th scope="col" class="px-6 py- text-center">
                            No.
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Top Borrowers
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT borrower_ID, COUNT(*) AS count
                        FROM borrowed_books
                        GROUP BY borrower_ID
                        ORDER BY count DESC, borrower_ID DESC
                        LIMIT 10";
                    $res = mysqli_query($conn, $sql);
                    $sn = 1;
                    while ($row = mysqli_fetch_assoc($res)) {
                    ?>
                        <tr class="bg-white border-b text-black font-semibold">
                            <th scope="row" class="px-6 py-2 font-semibold text-black whitespace-nowrap text-center">
                                <?php echo $sn++; ?>
                            </th>
                            <td class="px-6 py-2">
                                <?php $id = $row['borrower_ID'];
                                $sql1 = "SELECT * FROM `borrowers` WHERE borrower_ID = $id";
                                $res1 = mysqli_query($conn, $sql1);
                                $row1 = mysqli_fetch_assoc($res1);

                                $last = $row1['last_name'];
                                $first = $row1['first_name'];
                                echo $first . ' ' . $last . ' ';
                                ?>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Table for most borrowed books -->
    <div class="md:h-[88vh] h-[55vh] md:px-8 px-6 md:py-10 py-7">
        <div class=" flex-shrink-0 md:w-[35rem] min-w-screen relative overflow-y-auto h-full bg-white shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="sticky top-0 text-xs text-white uppercase bg-black">
                    <tr>
                        <th scope="col" class="px-6 py- text-center">
                            No.
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Top Borrowed Books
                        </th>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT book_ID, COUNT(*) AS count
                    FROM borrowed_books
                    GROUP BY book_ID
                    ORDER BY count DESC, book_ID DESC
                    LIMIT 10";
                    $res = mysqli_query($conn, $sql);
                    $sn = 1;
                    while ($row = mysqli_fetch_assoc($res)) {
                    ?>
                        <tr class="bg-white border-b text-black font-semibold">
                            <th scope="row" class="px-6 py-2 font-semibold text-black whitespace-nowrap text-center">
                                <?php echo $sn++; ?>
                            </th>
                            <td onclick="openModal(<?php echo $row['book_ID']; ?>)" class="px-6 py-2 select-none hover:bg-blue-200" data-modal-target="card-modal" data-modal-toggle="card-modal">
                                <?php $id = $row['book_ID'];
                                $sql1 = "SELECT * FROM `books` WHERE book_ID = $id";
                                $res1 = mysqli_query($conn, $sql1);
                                $row1 = mysqli_fetch_assoc($res1);
                                $title = $row1['title'];
                                echo $title;
                                ?>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Card catalog modal -->
<div id="card-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative max-h-full mx-auto flex items-center justify-center w-[40rem]">
        <!-- Card catalog modal content -->
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

<!-- Back and print button -->
<div class="flex justify-end pr-4 pb-4 fixed bottom-0 right-0">
    <a href="../../server/print/statistical-reports.php" target="_blank">
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
                document.getElementById('authorNumber').textContent = data.classification_number
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