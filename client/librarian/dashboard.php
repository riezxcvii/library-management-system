<?php
include('navigation-bar.php');
?>

<!-- Cards -->
<div class="flex justify-center items-center flex-1 px-9 md:pb-0 pb-6 md:pt-0 pt-9">
    <div class="inline-flex flex-wrap gap-3 sm:gap-12">
        <!-- Book management card -->
        <div class="w-full sm:w-72 p-4 bg-black border border-gray-200 rounded-lg shadow sm:p-8 dark:border-gray-700 mb-4 md:mb-0">
            <h5 class="mb-4 md:text-xl text-base text-center font-semibold text-white">Book Management</h5>
            <div class="md:mb-8 mb-6 w-full flex items-baseline justify-center text-gray-900 dark:text-white text-center">
                <span class="md:text-base text-sm text-gray-400 font-semiabold">View and add books.</span>
            </div>
            <a href="all-books.php">
                <button type="button" class="text-white bg-blue-500 hover:bg-blue-500 focus:ring-2 focus:outline-none focus:ring-blue-400 font-medium rounded-lg text-sm px-5 md:py-2.5 py-2 inline-flex justify-center w-full sm:text-center mb-1 md:mb-0">Open</button>
            </a>
        </div>
        <!-- Book transaction card -->
        <div class="w-full sm:w-72 p-4 bg-black border border-gray-200 rounded-lg shadow sm:p-8 dark:border-gray-700 mb-4 md:mb-0">
            <h5 class="mb-4 md:text-xl text-base text-center font-semibold text-white">Book Transaction</h5>
            <div class="md:mb-8 mb-6 w-full flex items-baseline justify-center text-gray-900 dark:text-white text-center">
                <span class="md:text-base text-sm text-gray-400 font-semiabold">Borrow and return books.</span>
            </div>
            <div class="flex gap-4 justify-center mb-1 md:mb-0">
                <a href="borrow-book.php" class="w-full">
                    <button type="button" class="text-white bg-blue-500 hover:bg-blue-500 focus:ring-2 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 md:py-2.5 py-2 inline-flex justify-center w-full sm:text-center">Borrow</button>
                </a>
                <a href="return-book.php" class="w-full">
                    <button type="button" class="text-white bg-blue-500 hover:bg-blue-500 focus:ring-2 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 md:py-2.5 py-2 inline-flex justify-center w-full sm:text-center">Return</button>
                </a>
            </div>
        </div>
        <!-- Boook reports card -->
        <div class="w-full sm:w-72 p-4 bg-black border border-gray-200 rounded-lg shadow sm:p-8 dark:border-gray-700 mb-4 md:mb-0">
            <h5 class="mb-4 md:text-xl text-base text-center font-semibold text-white">Reports</h5>
            <div class="md:mb-8 mb-6 w-full flex items-baseline justify-center text-gray-900 dark:text-white text-center">
                <span class="md:text-base text-sm text-gray-400 font-semiabold">View reports.</span>
            </div>
            <div class="flex gap-4 justify-center mb-1 md:mb-0">
                <a href="inventory-reports.php" class="w-full">
                    <button type="button" class="text-white bg-blue-500 hover:bg-blue-500 focus:ring-2 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 md:py-2.5 py-2 inline-flex justify-center w-full sm:text-center">Inventory</button>
                </a>
                <a href="statistical-reports.php" class="w-full">
                    <button type="button" class="text-white bg-blue-500 hover:bg-blue-500 focus:ring-2 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 md:py-2.5 py-2 inline-flex justify-center w-full sm:text-center">Statistical</button>
                </a>
            </div>
        </div>
    </div>
</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
</body>

</html>