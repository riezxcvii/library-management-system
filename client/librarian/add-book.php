<?php
include('navigation-bar.php');
?>

<div class="flex justify-center items-center mt-[-0.3rem]">
    <div class="w-80 bg-gray-50 rounded-md m-12 my-8 w-[65rem]">
        <div class="px-6 py-6 lg:px-8">
            <h3 class="mb-4 text-xl font-medium text-gray-900 text-center">Add Book</h3>
            <form class="space-y-6" action="" autocomplete="off" method="POST">
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900">Book Title</label>
                    <input type="text" name="book_title" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" maxlength="70" required>
                </div>

                <label class="block text-sm font-medium text-gray-900">Publication Details</label>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <input type="text" name="publisher" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mt-[-1rem]" placeholder="Publisher" maxlength="20" required>
                    </div>
                    <div>
                        <input type="text" name="year_of_publication" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mt-[-1rem]" placeholder="Year of publication" maxlength="25" required>
                    </div>
                    <div>
                        <input type="text" name="place_of_publication" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Place of publication" maxlength="25" required>
                    </div>
                    <div>
                        <input type="text" name="copyright" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Copyright" maxlength="25" required>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Book ISBN</label>
                        <input type="number" name="isbn" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" onKeyPress="if(this.value.length==13) return false;" required>
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Scan Barcode</label>
                        <div class="w-full border-gray-900 border-2">

                        </div>
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Edition</label>
                        <input type="text" name="edition" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" maxlength="10" required>
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Volume</label>
                        <input type="text" name="volume" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" maxlength="15" required>
                    </div>
                </div>

                <label class="block text-sm font-medium text-gray-900">Book Details</label>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Date Received</label>
                        <input type="date" name="received" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" maxlength="20" required>
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Number of copies</label>
                        <input type="number" name="number_of_copies" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" maxlength="25" required>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Author's Number</label>
                        <input type="number" name="author_number" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" maxlength="20" required>
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Author's First Name</label>
                        <input type="text" name="author_first" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" maxlength="20" required>
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Author's Last Name</label>
                        <input type="text" name="author_last" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" maxlength="20" required>
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Accession Number</label>
                        <input type="number" name="accession_number" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" maxlength="25" required>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Source of Fund</label>
                        <input type="text" name="source_of_fund" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" maxlength="30" required>
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Cost</label>
                        <input type="number" name="cost" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                    </div>
                </div>

                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900">Tracing</label>
                    <input type="text" name="tracing" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" maxlength="70" required>
                </div>

                <button type="submit" name="submit" class="w-full text-white bg-blue-700 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add
                    Book</button>
            </form>
        </div>
        <?php
        include("../../server/db/conDB.php");
        if (isset($_POST['submit'])) {
            $book_title = $_POST['book_title'];
            $publisher = $_POST['publisher'];
            $year_of_publication = $_POST['year_of_publication'];
            $place_of_publication = $_POST['place_of_publication'];
            $copyright = $_POST['copyright'];
            $isbn = $_POST['isbn'];
            $edition = $_POST['edition'];
            $volume = $_POST['volume'];
            $received = $_POST['received'];
            $number_of_copies = $_POST['number_of_copies'];
            $author_number = $_POST['author_number'];
            $author_first = $_POST['author_first'];
            $author_last = $_POST['author_last'];
            $accession_number = $_POST['accession_number'];
            $source_of_fund = $_POST['source_of_fund'];
            $cost = $_POST['cost'];
            $tracing = $_POST['tracing'];

            $sql = "INSERT INTO `books` (isbn, accession_number,date_receive,author_number,author_lastname,author_firstname,title,copies,edition,volume,source_fund,cost,publisher,publication_place,copyright_year,year_published,tracing)
            VALUES('$isbn',
            '$accession_number',
            '$received',
            '$author_number',
            '$author_last',
            '$author_first',
            '$book_title',
            $number_of_copies,
            '$edition',
            '$volume',
            '$source_of_fund',
            $cost,
            '$publisher',
            '$place_of_publication',
            '$copyright',
            '$year_of_publication',
            '$tracing'
            )";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo "<script>
                window.location.href='all-books.php'
                </script>";
            } else {
                echo "haaysssss liwata";
            }
        }
        ?>
    </div>
</div>

<div class="flex justify-end pr-4 pb-2 mt-[-0.5rem]">
    <a href="./all-books.php">
        <button type="button" class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-black rounded-lg hover:bg-red-700 focus:ring-2 focus:outline-none focus:ring-red-300">
            Back
        </button>
    </a>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
</body>

</html>