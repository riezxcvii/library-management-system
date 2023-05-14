<?php
include('navigation-bar.php');
?>

<!--button and search bar-->
<div class="p-4 flex justify-end">
    <!--button-->
    <button type="button" class="mr-8 inline-flex items-center px-5 py-2.5 text-m font-medium text-center text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-2 focus:outline-none focus:ring-blue-300" data-modal-target="register-modal" data-modal-toggle="register-modal">
        Register a borrower
    </button>
    <a href="account-registration.php" class="flex mr-8">
        <button type="button" class="inline-flex items-center px-5 py-2.5 text-m font-medium text-center text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-2 focus:outline-none focus:ring-blue-300">
            Pending Registration
            <span class="inline-flex items-center justify-center w-8 h-8 ml-2 text-xs font-semibold text-blue-800 bg-blue-200 rounded-full">
                99
            </span>
        </button>
    </a>
    <!--search bar-->
    <form>
        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
        <div class="relative w-96">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </div>
            <input type="search" id="default-search" class="border-0 block w-full p-4 pl-10 text-sm text-black rounded-lg bg-white focus:border-gray-500" placeholder="Search" required>
            <button type="submit" class="text-white absolute right-2.5 bottom-2 bg-blue-600 hover:bg-blue-500 focus:ring-2 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:focus:ring-blue-800">Search</button>
        </div>
    </form>
</div>

<!--table-->
<div class="p-4 h-screen overflow-y-auto ">
    <div class="relative overflow-y-auto h-full bg-white shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="sticky top-0 text-xs text-white uppercase bg-black">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            Role
                            <a href="#"><svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512">
                                    <path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z" />
                                </svg></a>
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            Last Name
                            <a href="#"><svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512">
                                    <path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z" />
                                </svg></a>
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            First Name
                            <a href="#"><svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512">
                                    <path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z" />
                                </svg></a>
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Middle Initial
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Name Extension
                    </th>
                    <th scope="col" class="px-6 py-3 flex justify-center">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr class="bg-white border-b text-black font-semibold">
                    <th scope="row" class="px-6 py-2 font-semibold text-black whitespace-nowrap">
                        Student
                    </th>
                    <td class="px-6 py-2">
                        Banquillo
                    </td>
                    <td class="px-6 py-2">
                        Rieza Marie
                    </td>
                    <td class="px-6 py-2">
                        J
                    </td>
                    <td class="px-6 py-2">

                    </td>
                    <td class="px-6 py-2 justify-center flex">
                        <button type="button" class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-green-600 rounded-lg hover:bg-green-700 focus:ring-2 focus:outline-none focus:ring-green-500" data-modal-target="edit-modal" data-modal-toggle="edit-modal">
                            Edit
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<!--register borrower modal-->
<div id="register-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">
        <!--register modal content-->
        <div class="relative bg-gray-200 rounded-lg shadow">
            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="register-modal">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="px-6 py-6 lg:px-8">
                <h3 class="mb-4 text-xl font-medium text-gray-900 text-center">Registration Form</h3>
                <form class="space-y-6" action="#" autocomplete="off">

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900">ID Number</label>
                            <input type="number" name="employeeID" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" onKeyPress="if(this.value.length==15) return false;" required>
                        </div>

                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900">Role</label>
                            <select id="nameExtension" class="bg-gray-50 border border-gray-400 text-gray-900 mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                                <option value="" selected>Select Role</option>
                                <option value="Student">Student</option>
                                <option value="Borrower">Borrower</option>
                            </select>
                        </div>
                    </div>

                    <div class="grid grid-cols-3 gap-4">
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900">Last Name</label>
                            <input type="text" name="lastName" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" maxlength="20" required>
                        </div>
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900">First
                                Name</label>
                            <input type="text" name="firstName" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" maxlength="25" required>
                        </div>
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900">Middle
                                Initial</label>
                            <input type="text" name="middleInitial" class="text-center bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" maxlength="1" required>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900">Name Extension</label>
                            <select id="nameExtension" class="bg-gray-50 border border-gray-400 text-gray-900 mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 text-center">
                                <option value="" selected>Select Extension</option>
                                <option value="Jr">Jr</option>
                                <option value="Sr">Sr</option>
                                <option value="I">I</option>
                                <option value="II">II</option>
                                <option value="III">III</option>
                                <option value="IV">IV</option>
                                <option value="V">V</option>
                                <option value="VI">VI</option>
                                <option value="VII">VII</option>
                                <option value="VIII">VIII</option>
                            </select>
                        </div>

                        <div class="flex">
                            <label class="block text-sm font-medium text-gray-900">Sex</label>
                            <div class="flex items-center mb-4 mr-4">
                                <input id="female" type="radio" value="Female" name="female" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 mt-5 ml-[-1rem]">
                                <label for="default-radio-1" class="ml-2 text-sm font-medium text-gray-900 mt-5">Female</label>
                            </div>
                            <div class="flex items-center mb-4">
                                <input id="male" type="radio" value="Male" name="male" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 mt-5">
                                <label for="default-radio-1" class="ml-2 text-sm font-medium text-gray-900 mt-5">Male</label>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Register
                        Borrower</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!--edit borrower form modal-->
<div id="edit-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">
        <!--edit form modal content-->
        <div class="relative bg-gray-200 rounded-lg shadow">
            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="edit-modal">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="px-6 py-6 lg:px-8">
                <h3 class="mb-4 text-xl font-medium text-gray-900 text-center">Edit Registration Details</h3>
                <form class="space-y-6" action="#" autocomplete="off">
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900">ID Number</label>
                            <input type="number" name="employeeID" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" onKeyPress="if(this.value.length==15) return false;" required>
                        </div>

                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900">Role</label>
                            <select id="nameExtension" class="bg-gray-50 border border-gray-400 text-gray-900 mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                                <option value="" selected>Select Role</option>
                                <option value="Student">Student</option>
                                <option value="Borrower">Borrower</option>
                            </select>
                        </div>
                    </div>

                    <div class="grid grid-cols-3 gap-4">
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900">Last Name</label>
                            <input type="text" name="lastName" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" maxlength="20" required>
                        </div>
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900">First
                                Name</label>
                            <input type="text" name="firstName" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" maxlength="25" required>
                        </div>
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900">Middle
                                Initial</label>
                            <input type="text" name="middleInitial" class="text-center bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" maxlength="1" required>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900">Name Extension</label>
                            <select id="nameExtension" class="bg-gray-50 border border-gray-400 text-gray-900 mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 text-center" required>
                                <option value="" selected>Select Extension</option>
                                <option value="Jr">Jr</option>
                                <option value="Sr">Sr</option>
                                <option value="I">I</option>
                                <option value="II">II</option>
                                <option value="III">III</option>
                                <option value="IV">IV</option>
                                <option value="V">V</option>
                                <option value="VI">VI</option>
                                <option value="VII">VII</option>
                                <option value="VIII">VIII</option>
                            </select>
                        </div>

                        <div class="flex">
                            <label class="block text-sm font-medium text-gray-900">Sex</label>
                            <div class="flex items-center mb-4 mr-4">
                                <input id="female" type="radio" value="Female" name="female" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 mt-5 ml-[-1rem]" required>
                                <label for="default-radio-1" class="ml-2 text-sm font-medium text-gray-900 mt-5">Female</label>
                            </div>
                            <div class="flex items-center mb-4">
                                <input id="male" type="radio" value="Male" name="male" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 mt-5" required>
                                <label for="default-radio-1" class="ml-2 text-sm font-medium text-gray-900 mt-5">Male</label>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update
                        Details</button>
                </form>
            </div>
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