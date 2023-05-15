<?php
include('navigation-bar.php');
?>
<div class="flex flex-row mx-auto">
    <!--table for top borrwers-->
    <div class="h-[32rem] px-8 py-8">
        <div class=" flex-shrink-0 w-[35rem] relative overflow-y-auto h-full bg-white shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="sticky top-0 text-xs text-white uppercase bg-black">
                    <tr>
                        <th scope="col" class="px-6 py- text-center">
                            No.
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Top Borrowers
                        </th>
                </thead>
                <tbody>
                    <tr class="bg-white border-b text-black font-semibold">
                        <th scope="row" class="px-6 py-2 font-semibold text-black whitespace-nowrap text-center">
                            1
                        </th>
                        <td class="px-6 py-2">
                            Rieza Marie Banquillo
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!--table for most borrowed books-->
    <div class="h-[32rem] px-8 py-8">
        <div class=" flex-shrink-0 w-[35rem] relative overflow-y-auto h-full bg-white shadow-md sm:rounded-lg">
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
                    <tr class="bg-white border-b text-black font-semibold">
                        <th scope="row" class="px-6 py-2 font-semibold text-black whitespace-nowrap text-center">
                            1
                        </th>
                        <td class="px-6 py-2">
                            Alice in the Wonderland
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="flex justify-end pr-4 pb-2">
    <a href="#">
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
</body>

</html>