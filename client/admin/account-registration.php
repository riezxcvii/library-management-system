<?php
include('navigation-bar.php');
?>

<!--button and search bar-->
<div class="p-4 flex justify-end">
    <!--button-->
    <a href="./add-borrower-account.php">
        <button type="button" class="h-full mr-8 inline-flex items-center px-5 py-2.5 text-m font-medium text-center text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-2 focus:outline-none focus:ring-blue-300" data-modal-target="register-modal" data-modal-toggle="register-modal">
            Register a borrower
        </button>
    </a>
    <a href="account-reports.php" class="flex mr-8">
        <button type="button" class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-2 focus:outline-none focus:ring-blue-300">
            Approved Registration
        </button>
    </a>
    <!--search bar-->
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
    <div id="myTable" class="relative overflow-y-auto h-full bg-white shadow-md sm:rounded-lg">
      
    </div>
</div>

<div class="flex justify-end pr-4 pb-2">
    <a href="dashboard.php">
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
      $("#myTable").load("pending.php");
      setInterval(function() {
        $("#myTable").load("pending.php");
        refresh();
      }, 10000);
    });
</script>
</body>

</html>