<?php
include('navigation-bar.php');
?>

<!-- Cards -->
<div class="flex justify-center items-center flex-1 px-9 md:pb-0 pb-6 md:pt-0 pt-9">
    <div class="inline-flex flex-wrap gap-3 sm:gap-12">
        <!-- Log history card -->
        <div class="w-full sm:w-72 p-4 bg-black border border-gray-200 rounded-lg shadow sm:p-8 dark:border-gray-700 mb-4 md:mb-0">
            <h5 class="mb-4 md:text-xl text-base text-center font-semibold text-white">Log History</h5>
            <div class="md:mb-8 mb-6 w-full flex items-baseline justify-center text-gray-900 dark:text-white text-center">
                <span class="md:text-base text-sm text-gray-400 font-semiabold">View users log in details.</span>
            </div>
            <a href="log-history.php">
                <button type="button" class="text-white bg-blue-500 hover:bg-blue-500 focus:ring-2 focus:outline-none focus:ring-blue-400 font-medium rounded-lg text-sm px-5 md:py-2.5 py-2 inline-flex justify-center w-full sm:text-center mb-1 md:mb-0">View</button>
            </a>
        </div>
        <!-- Account management card -->
        <div class="w-full sm:w-72 p-4 bg-black border border-gray-200 rounded-lg shadow sm:p-8 dark:border-gray-700 mb-4 md:mb-0">
            <h5 class="mb-4 md:text-xl text-base text-center font-semibold text-white">Account Management</h5>
            <div class="md:mb-8 mb-6 w-full flex items-baseline justify-center text-gray-900 dark:text-white text-center">
                <span class="md:text-base text-sm text-gray-400 font-semiabold">Manage registrations.</span>
            </div>
            <div class="flex gap-4 justify-center mb-1 md:mb-0">
                <a href="librarian-registration.php" class="w-full">
                    <button type="button" class="text-white bg-blue-500 hover:bg-blue-500 focus:ring-2 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 md:py-2.5 py-2 inline-flex justify-center w-full sm:text-center">Librarian</button>
                </a>
                <a href="borrower-pending-registration.php" class="w-full">
                    <button type="button" class="text-white bg-blue-500 hover:bg-blue-500 focus:ring-2 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 md:py-2.5 py-2 inline-flex justify-center w-full sm:text-center">Borrower</button>
                </a>
            </div>
        </div>
        <!-- Account reports card -->
        <div class="w-full sm:w-72 p-4 bg-black border border-gray-200 rounded-lg shadow sm:p-8 dark:border-gray-700 mb-4 md:mb-0">
            <h5 class="mb-4 md:text-xl text-base text-center font-semibold text-white">Account Reports</h5>
            <div class="md:mb-8 mb-6 w-full flex items-baseline justify-center text-gray-900 dark:text-white text-center">
                <span class="md:text-base text-sm text-gray-400 font-semiabold">Manage user accounts.</span>
            </div>
            <div class="flex gap-4 justify-center mb-1 md:mb-0">
                <a href="librarian-accounts.php" class="w-full">
                    <button type="button" class="text-white bg-blue-500 hover:bg-blue-500 focus:ring-2 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 md:py-2.5 py-2 inline-flex justify-center w-full sm:text-center">Librarian</button>
                </a>
                <a href="borrower-accounts.php" class="w-full">
                    <button type="button" class="text-white bg-blue-500 hover:bg-blue-500 focus:ring-2 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 md:py-2.5 py-2 inline-flex justify-center w-full sm:text-center">Borrower</button>
                </a>
            </div>
        </div>
    </div>
</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
</body>

</html>