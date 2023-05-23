<?php
include('navigation-bar.php');
?>

<!--search bar-->
<div class="p-4 flex justify-end">
    <form autocomplete="off">
        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
        <div class="relative w-96">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </div>
            <input onkeyup="mySearch()" type="search" id="default-search" class="border-0 block w-full p-4 pl-10 text-sm text-black rounded-lg bg-white focus:border-gray-500" placeholder="Search">
        </div>
    </form>
</div>

<!--table-->
<div class="p-4 h-screen overflow-y-auto ">
    <div class="relative overflow-y-auto h-full bg-white shadow-md sm:rounded-lg">
        <table id="table" class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="sticky top-0 text-xs text-white uppercase bg-black">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            Last Name
                            <a href="#" onclick="sortTable(0)"><svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512">
                                    <path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z" />
                                </svg></a>
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            First Name
                            <a href="#" onclick="sortTable(1)"><svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512">
                                    <path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z" />
                                </svg></a>
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            Role
                            <a href="#" onclick="sortTable(2)"><svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512">
                                    <path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z" />
                                </svg></a>
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3 flex justify-center">
                        Action
                    </th>
            </thead>
            <tbody>

                <?php
                $borrower = $conn->query("SELECT * FROM `borrowers` WHERE status=1 and deactivate = 0") or die(mysqli_error($conn));
                while ($name = $borrower->fetch_array()) {
                    $id = $name['borrower_ID'];
                    $idNumber = $name['id_number'];
                    $last = $name['last_name'];
                    $first = $name['first_name'];
                    $middle = $name['middle_initial'];
                    $extension = $name['name_extension'];
                    $idNumber = $name['id_number'];
                    $sex = $name['sex'];
                    $role = $name['role'];
                ?>

                    <tr class="bg-white border-b text-black font-semibold">
                        <th scope="row" class="px-6 py-2 font-semibold text-black whitespace-nowrap">
                            <?php echo $name['last_name'] ?>
                        </th>
                        <td class="px-6 py-2">
                            <?php echo $name['first_name'] ?>
                        </td>
                        <td class="px-6 py-2">
                            <?php echo $name['role'] ?>
                        </td>
                        <td class="px-6 py-2 justify-center flex">
                            <button type="button" class="mr-2 inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-2 focus:outline-none focus:ring-blue-300"  data-modal-target="view-modal_<?php echo $id; ?>" data-modal-toggle="view-modal_<?php echo $id; ?>">
                                Details
                            </button>
                            <button id="<?php echo $id; ?>" type="button" class="delbutton inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-2 focus:outline-none focus:ring-red-300">
                                Deactivate
                            </button>
                        </td>
                    </tr>
            </tbody>

        <?php
                }
        ?>

        </table>
    </div>
</div>

<!--view form modal-->
<div id="view-modal_<?php echo $id; ?>" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">
        <!--view form modal content-->
        <div class="relative bg-gray-200 rounded-lg shadow">
            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="view-modal_<?php echo $id; ?>">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="px-6 py-6 lg:px-8">
                <h3 class="mb-4 text-xl font-medium text-gray-900 text-center">Registration Details</h3>
                <form class="space-y-6" action="#" autocomplete="off">

                    <div class="grid grid-cols-2 gap-4 mb-[-1.4rem]">
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900">ID Number</label>
                            <input type="number" name="employeeID" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" onKeyPress="if(this.value.length==15) return false;" disabled value="<?php echo $idNumber ?>">
                        </div>

                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900">Role</label>
                            <select id="nameExtension" class="bg-gray-50 border border-gray-400 text-gray-900 mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" disabled>
                                <option value="" selected><?php echo $role ?></option>
                                <option value="Admin">Admin</option>
                                <option value="Librarian">Librarian</option>
                                <option value="Student">Student</option>
                                <option value="Teacher">Teacher</option>
                            </select>
                        </div>
                    </div>

                    <div class="grid grid-cols-3 gap-4 mt-[1.5rem]">
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900">Last Name</label>
                            <input type="text" name="lastName" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" maxlength="20" disabled value="<?php echo $last ?>">
                        </div>
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900">First
                                Name</label>
                            <input type="text" name="firstName" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" maxlength="25" disabled value="<?php echo $first ?>">
                        </div>
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900">Middle
                                Initial</label>
                            <input type="text" name="middleInitial" class="text-center bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" maxlength="1" disabled value="<?php echo $middle ?>">
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900">Name Extension</label>
                            <select id="nameExtension" class="bg-gray-50 border border-gray-400 text-gray-900 mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 text-center" disabled value="<?php echo $extension ?>">
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
                                <input id="female" <?php if ($sex == 'Female') {
                                                        echo 'checked';
                                                    } ?> type="radio" value="Female" name="sex" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 mt-5 ml-[-1rem]" disabled>
                                <label for="default-radio-1" class="ml-2 text-sm font-medium text-gray-900 mt-5">Female</label>
                            </div>
                            <div class="flex items-center mb-4">
                                <input id="male" <?php if ($sex == 'Male') {
                                                        echo 'checked';
                                                    } ?> type="radio" value="Male" name="sex" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 mt-5" disabled>
                                <label for="default-radio-1" class="ml-2 text-sm font-medium text-gray-900 mt-5">Male</label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="flex justify-end pr-4 pb-2">
    <a href="account-registration.php">
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
            if (column1 && column2 && column3) {
                column1 = column1.textContent || column1.innerText;
                column2 = column2.textContent || column2.innerText;
                column3 = column3.textContent || column3.innerText;
                if (column1.toUpperCase().indexOf(filter) > -1 || column2.toUpperCase().indexOf(filter) > -1 || column3.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>
</body>

</html>