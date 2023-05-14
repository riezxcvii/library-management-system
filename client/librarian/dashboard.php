<?php
include('navigation-bar.php');
?>

<!--cards-->
<div class="flex justify-center items-center flex-1">
    <div class="inline-flex flex-wrap gap-4 sm:gap-12">
        <!--book management card-->
        <div class="w-full sm:w-72 p-4 bg-black border border-gray-200 rounded-lg shadow sm:p-8 dark:border-gray-700">
            <h5 class="mb-4 text-xl text-center font-semibold text-white">Book Management</h5>
            <div class="mb-8 w-full flex items-baseline justify-center text-gray-900 dark:text-white text-center">
                <span class="text-md text-gray-400 font-semiabold">View and add books.</span>
            </div>
            <a href="all-books.php">
                <button type="button" class="text-white bg-blue-500 hover:bg-blue-500 focus:ring-1 focus:outline-none focus:ring-blue-200 font-medium rounded-lg text-sm px-5 py-2.5 inline-flex justify-center w-full sm:text-center">Open</button>
            </a>
        </div>
        <!--book transaction card-->
        <div class="w-full sm:w-72 p-4 bg-black border border-gray-200 rounded-lg shadow sm:p-8 dark:border-gray-700">
            <h5 class="mb-4 text-xl text-center font-semibold text-white">Book Transaction</h5>
            <div class="mb-8 w-full flex items-baseline justify-center text-gray-900 dark:text-white text-center">
                <span class="text-md text-gray-400 font-semiabold">Borrow and return books.</span>
            </div>
            <div class="flex gap-4 justify-center">
                <a href="borrow-book.php">
                    <button type="button" class="text-white bg-blue-500 hover:bg-blue-500 focus:ring-1 focus:outline-none focus:ring-blue-200 font-medium rounded-lg text-sm px-5 py-2.5 inline-flex justify-center w-full sm:text-center">Borrow</button>
                </a>
                <a href="return-book.php">
                    <button type="button" class="text-white bg-blue-500 hover:bg-blue-500 focus:ring-1 focus:outline-none focus:ring-blue-200 font-medium rounded-lg text-sm px-5 py-2.5 inline-flex justify-center w-full sm:text-center">Return</button>
                </a>
            </div>
        </div>
        <!--boook reports card-->
        <div class="w-full sm:w-72 p-4 bg-black border border-gray-200 rounded-lg shadow sm:p-8 dark:border-gray-700">
            <h5 class="mb-4 text-xl text-center font-semibold text-white">Reports</h5>
            <div class="mb-8 w-full flex items-baseline justify-center text-gray-900 dark:text-white text-center">
                <span class="text-md text-gray-400 font-semiabold">View reports.</span>
            </div>
            <div class="flex gap-4 justify-center">
                <a href="inventory-reports.php">
                    <button type="button" class="text-white bg-blue-500 hover:bg-blue-500 focus:ring-1 focus:outline-none focus:ring-blue-200 font-medium rounded-lg text-sm px-5 py-2.5 inline-flex justify-center w-full sm:text-center">Inventory</button>
                </a>
                <a href="statistical-reports.php">
                    <button type="button" class="text-white bg-blue-500 hover:bg-blue-500 focus:ring-1 focus:outline-none focus:ring-blue-200 font-medium rounded-lg text-sm px-5 py-2.5 inline-flex justify-center w-full sm:text-center">Statistical</button>
                </a>
            </div>
        </div>
    </div>
</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
</body>

</html>