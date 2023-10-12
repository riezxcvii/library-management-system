<?php
include('navigation-bar.php');
?>

<!-- Button and search bar -->
<div class="p-4 pt-6 flex justify-end">
    <!-- Add button -->
    <a href="./add-librarian-account.php">
        <button type="button" class="h-[2.55rem] md:mr-8b mr-7 inline-flex items-center md:px-5 px-3 md:py-2.5 py-1 md:text-base text-sm font-medium text-center text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-2 focus:outline-none focus:ring-blue-300">
            Add Account
        </button>
    </a>
    <!-- Search bar -->
    <form autocomplete="off">
        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
        <div class="relative md:w-96">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </div>
            <input onkeyup="mySearch()" type="search" id="default-search" class="h-10 border-0 block md:w-full w-48 p-4 pl-10 text-sm text-black rounded-lg bg-white focus:border-gray-500" placeholder="Search">
        </div>
    </form>
</div>
<!-- Table -->
<div class="px-4 pt-2 pb-20 h-screen overflow-y-auto ">
    <div class="relative overflow-y-auto h-full bg-white shadow-md rounded-lg">
        <table id="table" class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="sticky top-0 text-xs text-white uppercase bg-black">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            Last Name
                            <a href="#" onclick="sortTable(0)"><svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512">
                                    <path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z" />
                                </svg>
                            </a>
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            First Name
                            <a href="#" onclick="sortTable(1)"><svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512">
                                    <path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z" />
                                </svg>
                            </a>
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center">
                            Role
                            <a href="#" onclick="sortTable(2)"><svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512">
                                    <path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z" />
                                </svg>
                            </a>
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3 flex justify-center">
                        Action
                    </th>
            </thead>
            <tbody>
                <!-- SQL Query for dispalying data in the table -->
                <?php
                $borrower = $conn->query("SELECT * FROM `library_admin` WHERE deactivate=0 ORDER BY last_name ASC") or die(mysqli_error($conn));
                while ($name = $borrower->fetch_array()) {
                    $id = $name['admin_ID'];
                    $last = $name['last_name'];
                    $first = $name['first_name'];
                    $middle = $name['middle_initial'];
                    $extension = $name['name_extension'];
                    $sex = $name['sex'];
                    $role = $name['role'];
                ?>
                <tr class="bg-white border-b text-black font-semibold">
                    <td scope="row" class="px-6 py-2 font-semibold text-black whitespace-nowrap">
                        <?php echo $name['last_name'] ?>
                    </td>
                    <td class="px-6 py-2">
                        <?php echo $name['first_name'] ?>
                    </td>
                    <td class="px-6 py-2">
                        <?php echo $name['role'] ?>
                    </td>
                    <td class="px-6 py-2 justify-center flex">
                        <a href="./update-librarian-account.php?id=<?php echo $id ?>">
                            <svg class="w-6 text-black items-center align-middle my-2 mr-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"></path>
                            </svg>
                        </a>
                        <a href="./view-librarian-account.php?id=<?php echo $id ?>">
                            <svg class="w-6 text-black items-center align-middle my-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </a>
                    </td>
                </tr>
            </tbody>
        <?php
            }
        ?>
        </table>
    </div>
</div>

<div class="flex justify-end pr-4 pb-4 fixed bottom-0 right-0">
    <a href="dashboard.php">
        <button type="button" class="inline-flex items-center px-5 py-2 text-sm font-medium text-center text-white bg-black rounded-lg hover:bg-red-700 focus:ring-2 focus:outline-none focus:ring-red-300">
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
    // AJAX request when "Decline" button is clicked
    $('.decline-btn').click(function() {
        var borrowerId = $(this).data('borrower-id');
        $.ajax({
            url: '../../server/admin/decline.php',
            type: 'POST',
            data: {
                borrowerId: borrowerId,
                status: 2
            },
            success: function(response) {
                // Handle success response if needed
            },
            error: function(xhr, status, error) {
                // Handle error if needed
            }
        });
    });
</script>
</body>

</html>