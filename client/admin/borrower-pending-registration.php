<?php
include('navigation-bar.php');
?>

<!-- Button and search bar -->
<div class="p-4 pt-6 flex justify-end">
    <!-- Button -->
    <a href="./borrower-add-account.php">
        <button type="button" class="h-[2.55rem] mr-4 inline-flex items-center md:px-5 px-4 py-2.5 md:text-base text-sm font-medium text-center text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-2 focus:outline-none focus:ring-blue-400">
        Register Borrower
        </button>
    </a>

    <!-- Search bar -->
    <form autocomplete="off">
        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only text-white">Search</label>
        <div class="relative md:w-96 w-40">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </div>
            <input onkeyup="mySearch()" type="search" id="default-search" class="h-10 border-0 block md:w-full w-full p-4 pl-10 text-sm text-black rounded-lg bg-white focus:border-gray-500 focus:ring-2 focus:ring-blue-500" placeholder="Search">
        </div>
    </form>
</div>

<!-- Table -->
<div class="px-4 pt-2 pb-20 h-screen overflow-y-auto">
    <div id="myTable" class="relative overflow-y-auto h-full bg-white shadow-md rounded-lg">

    </div>
</div>

<!-- Back button -->
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

    $(document).ready(function() {
        $("#myTable").load("borrower-pending-list.php");
        setInterval(function() {
            $("#myTable").load("borrower-pending-list.php");
            refresh();
        }, 5000);
    });
</script>
</body>

</html>