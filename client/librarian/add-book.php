<?php
include('navigation-bar.php');
?>

<div class="flex justify-center items-center mt-[-0.3rem]">
    <div class="w-80 bg-gray-50 rounded-md m-12 my-8 w-[65rem]">
        <div class="px-6 py-6 lg:px-8">
            <h3 class="mb-4 text-xl font-medium text-gray-900 text-center">Add Book</h3>
            <form class="space-y-6" action="#" autocomplete="off">
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900">Book Title</label>
                    <input type="text" name="employeeID" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" maxlength="70" required>
                </div>

                <label class="block text-sm font-medium text-gray-900">Publication Details</label>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <input type="text" name="lastName" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mt-[-1rem]" placeholder="Publisher" maxlength="20" required>
                    </div>
                    <div>
                        <input type="text" name="firstName" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mt-[-1rem]" placeholder="Year of publication" maxlength="25" required>
                    </div>
                    <div>
                        <input type="text" name="firstName" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Place of publication" maxlength="25" required>
                    </div>
                    <div>
                        <input type="text" name="firstName" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Copyright" maxlength="25" required>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Book ISBN</label>
                        <input type="number" name="employeeID" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" onKeyPress="if(this.value.length==13) return false;" required>
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Scan Barcode</label>
                        <div class="w-full border-gray-900 border-2">

                        </div>
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Edition</label>
                        <input type="text" name="lastName" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" maxlength="10" required>
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Volume</label>
                        <input type="text" name="firstName" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" maxlength="15" required>
                    </div>
                </div>

                <label class="block text-sm font-medium text-gray-900">Book Details</label>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Date Received</label>
                        <input type="date" name="lastName" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" maxlength="20" required>
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Number of copies</label>
                        <input type="number" name="firstName" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" maxlength="25" required>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Author's Number</label>
                        <input type="number" name="lastName" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" maxlength="20" required>
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Accession Number</label>
                        <input type="number" name="firstName" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" maxlength="25" required>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Source of Fund</label>
                        <input type="text" name="lastName" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" maxlength="30" required>
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Cost</label>
                        <input type="number" name="firstName" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                    </div>
                </div>

                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900">Tracing</label>
                    <input type="text" name="employeeID" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" maxlength="70" required>
                </div>

                <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add
                    Book</button>
            </form>
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