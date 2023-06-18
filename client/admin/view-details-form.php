<?php
include('navigation-bar.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM `borrowers` WHERE borrower_ID = $id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
}
?>

<div class="flex justify-center items-center mt-[-0.6rem]">
    <div class="bg-gray-50 rounded-md m-12 my-8 w-[30rem]">
        <div class="px-2 py-1">
            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="view-modal_<?php echo $id; ?>">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>

            <?php
            // Check if the form is submitted
            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                // Generate the QR code URL
                $qrCodeUrl = 'https://api.qrserver.com/v1/create-qr-code/?data=' . urlencode($row['id_number']) . '&size=150x150';

                // Print the QR code on the page
                echo '<h1 id="qr_code" class="hidden" style="font-size:18px; text-align:center; margin-top:10%; margin-bottom:20%; font-family:Arial,sans-serif; font-weight:900;">ANS Library Management System</h1><img class="hidden" src="' . $qrCodeUrl . '" alt="QR Code" id="qr_code">';
            }
            ?>

            <div class="px-6 py-6 lg:px-8">
                <form class="space-y-6" action="" autocomplete="off" method="POST">
                    <h3 class="mb-4 text-xl font-medium text-gray-900 text-center">Registration Details</h3>
                    <div class="grid grid-cols-3 gap-4 mb-[-1.4rem]">
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900">ID Number</label>
                            <input type="text" id="employeeID" name="employeeID" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" onKeyPress="if(this.value.length==15) return false;" disabled value="<?php echo $row['id_number'] ?>">
                        </div>

                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900">Role</label>
                            <select id="nameExtension" class="bg-gray-50 border border-gray-400 text-gray-900 mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 text-center" disabled>
                                <option value="<?php echo $row['role'] ?>" selected><?php echo $row['role'] ?></option>
                                <option value="Student">Student</option>
                                <option value="Teacher">Teacher</option>
                            </select>
                        </div>

                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900">Registration Date</label>
                            <input id="registrationaDate" class="bg-gray-50 border border-gray-400 text-gray-900 mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 text-center" disabled value="<?php echo $row['registered_date'] ?>">
                        </div>
                    </div>

                    <div class="grid grid-cols-3 gap-4 mt-[1.5rem]">
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900">Last Name</label>
                            <input type="text" name="lastName" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" maxlength="20" disabled value="<?php echo $row['last_name'] ?>">
                        </div>
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900">First
                                Name</label>
                            <input type="text" name="firstName" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" maxlength="25" disabled value="<?php echo $row['first_name'] ?>">
                        </div>
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900">Middle
                                Initial</label>
                            <input type="text" name="middleInitial" class="text-center bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" maxlength="1" disabled value="<?php echo $row['middle_initial'] ?>">
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900">Name Extension</label>
                            <select id="nameExtension" class="bg-gray-50 border border-gray-400 text-gray-900 mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 text-center" disabled>
                                <option value="<?php echo $row['name_extension'] ?>" selected><?php echo $row['name_extension'] ?></option>
                            </select>
                        </div>

                        <div class="flex">
                            <label class="block text-sm font-medium text-gray-900">Sex</label>
                            <div class="flex items-center mb-4 mr-4">
                                <input id="female" <?php if ($row['sex'] == 'Female') {
                                                        echo 'checked';
                                                    } ?> type="radio" value="Female" name="sex" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 mt-5 ml-[-1rem]" disabled>
                                <label for="default-radio-1" class="ml-2 text-sm font-medium text-gray-900 mt-5">Female</label>
                            </div>
                            <div class="flex items-center mb-4">
                                <input id="male" <?php if ($row['sex'] == 'Male') {
                                                        echo 'checked';
                                                    } ?> type="radio" value="Male" name="sex" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 mt-5" disabled>
                                <label for="default-radio-1" class="ml-2 text-sm font-medium text-gray-900 mt-5">Male</label>
                            </div>
                        </div>
                    </div>
                    <div class="flex gap-4">
                        <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center decline-btn">Generate QR Code</button>
                        <button onclick="printQRCode()" class="w-full text-white bg-green-700 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Print QR Code</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="flex justify-end pr-4 pb-2 mt-[-1.2rem]">
    <a href="./account-reports.php">
        <button type="button" class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-black rounded-lg hover:bg-red-700 focus:ring-2 focus:outline-none focus:ring-red-300">
            Back
        </button>
    </a>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
<!-- JavaScript to trigger print functionality -->
<script>
    // Function to trigger print functionality
    function printQRCode() {
        window.print();
    }
</script>
</body>

</html>