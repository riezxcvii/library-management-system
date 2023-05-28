<?php
include('navigation-bar.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM `books` WHERE book_ID=$id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
}
?>

<div class="flex justify-center items-center mt-[-2rem]">
    <div class="bg-gray-50 rounded-md m-12 my-8 w-[55rem]">
        <div class="px-6 py-6 lg:px-8">
            <h3 class="mb-4 text-xl font-medium text-gray-900 text-center">Edit Book Details</h3>
            <form class="space-y-6" action="" autocomplete="off" method="POST">
                <div class="grid grid-cols-2 gap-8">
                    <div>
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900">Book Title</label>
                            <input type="text" name="book_title" value="<?php echo $row['title']; ?>" class="mb-4 bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" maxlength="70" required>
                        </div>

                        <label class="mb-6 block text-sm font-medium text-gray-900">Publication Details</label>

                        <div class="grid grid-cols-2 gap-4 mb-4 ">
                            <div>
                                <input type="text" name="publisher" value="<?php echo $row['publisher']; ?>" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mt-[-1rem]" placeholder="Publisher" maxlength="20" required>
                            </div>
                            <div>
                                <input type="text" name="year_of_publication" value="<?php echo $row['year_published']; ?>" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mt-[-1rem]" placeholder="Year of publication" maxlength="25" required>
                            </div>
                            <div>
                                <input type="text" name="place_of_publication" value="<?php echo $row['publication_place']; ?>" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Place of publication" maxlength="25" required>
                            </div>
                            <div>
                                <input type="text" name="copyright" value="<?php echo $row['copyright_year']; ?>" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Copyright" maxlength="25" required>
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-900">Book ISBN</label>
                                <input type="number" name="isbn" value="<?php echo $row['isbn']; ?>" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" onKeyPress="if(this.value.length==13) return false;" required>
                            </div>
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-900">Scan Barcode</label>
                                <div class="w-full border-gray-900 border-2">

                                </div>
                            </div>
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-900">Edition</label>
                                <input type="text" name="edition" value="<?php echo $row['edition']; ?>" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" maxlength="10" required>
                            </div>
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-900">Volume</label>
                                <input type="text" name="volume" value="<?php echo $row['volume']; ?>" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" maxlength="15" required>
                            </div>
                        </div>
                    </div>

                    <div>

                        <div class="grid grid-cols-2 gap-4 mb-4 ">
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-900">Date Received</label>
                                <input type="date" name="received" value="<?php echo $row['date_receive']; ?>" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" maxlength="20" required>
                            </div>
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-900">Number of copies</label>
                                <input type="number" name="number_of_copies" value="<?php echo $row['copies']; ?>" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" maxlength="25" required>
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-4 mb-4 ">
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-900">Author's Number</label>
                                <input type="number" name="author_number" value="<?php echo $row['author_number']; ?>" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" maxlength="20" required>
                            </div>
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-900">Author's First Name</label>
                                <input type="text" name="author_first" value="<?php echo $row['author_firstname']; ?>" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" maxlength="20" required>
                            </div>
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-900">Author's Last Name</label>
                                <input type="text" name="author_last" value="<?php echo $row['author_lastname']; ?>" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" maxlength="20" required>
                            </div>
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-900">Accession Number</label>
                                <input type="number" name="accession_number" value="<?php echo $row['accession_number']; ?>" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" maxlength="25" required>
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-4 mb-4 ">
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-900">Source of Fund</label>
                                <input type="text" name="source_of_fund" value="<?php echo $row['source_fund']; ?>" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" maxlength="30" required>
                            </div>
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-900">Cost</label>
                                <input type="number" name="cost" value="<?php echo $row['cost']; ?>" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                            </div>
                        </div>

                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900">Tracing</label>
                            <input type="text" name="tracing" value="<?php echo $row['tracing']; ?>" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" maxlength="70" required>
                        </div>
                    </div>
                </div>

                <button type="submit" name="submit" class="w-full text-white bg-blue-700 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update
                    Book</button>
            </form>
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

                $sql = "UPDATE `books` SET isbn='$isbn',
            accession_number='$accession_number',
            date_receive='$received',
            author_number='$author_number',
            author_lastname='$author_last',
            author_firstname='$author_first',
            title='$book_title',
            copies=$number_of_copies,
            edition='$edition',
            volume='$volume',
            source_fund='$source_of_fund',
            cost=$cost,
            publisher='$publisher',
            publication_place='$place_of_publication',
            copyright_year='$copyright',
            year_published='$year_of_publication',
            tracing='$tracing'
            WHERE book_ID=$id";

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