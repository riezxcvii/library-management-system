<!-- Get borrower id to view their registration form -->
<?php
include('navigation-bar.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM `borrowers` WHERE borrower_ID = $id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $role = $row['role'];
}
?>

<div class="flex justify-center items-center h-full md:mt-[0rem] mb-0 mt-[-3.2rem]">
    <div class="bg-gray-50 rounded-md md:mx-12 mx-4 mb-0 w-[30rem]">
        <!-- Form -->
        <div class="md:px-2 md:py-1">

            <?php
            // Check if the form is submitted
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Generate the QR code URL
                $qrCodeUrl = 'https://api.qrserver.com/v1/create-qr-code/?data=' . urlencode($row['id_number']) . '&size=80x80';
                // Print the QR code on the page
                echo '<h1 id="qr_code" class="hidden" style="font-size:15px; text-align:center; margin-top:80%; margin-bottom:20%; font-family:Arial,sans-serif; font-weight:900;">ANS Library Management System</h1><img class="hidden" style="width:70%;" src="' . $qrCodeUrl . '" alt="QR Code" id="qr_code">';
            }
            ?>

            <div class="px-6 py-6 lg:px-8">
                <?php
                if ($role === 'Student') {
                ?>
                    <form action="" autocomplete="off" method="POST">
                        <h3 class="mb-6 text-xl font-medium text-gray-900 text-center">Registration Details</h3>
                        <!-- ID number, role, and date registered -->
                        <div class="grid grid-cols-3 gap-4 mb-6">
                            <div>
                                <label for="employeeID" class="block mb-2 text-sm font-medium text-gray-900">ID Number</label>
                                <input type="text" id="employeeID" name="employeeID" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:border-blue-500 block w-full p-2.5" onKeyPress="if(this.value.length==15) return false;" disabled value="<?php echo $row['id_number'] ?>">
                            </div>
                            <div>
                                <label for="role" class="block mb-2 text-sm font-medium text-gray-900">Role</label>
                                <select id="role" class="bg-gray-50 border border-gray-400 text-gray-900 mb-6 text-sm rounded-lg focus:border-blue-500 block w-full p-2.5 text-center" disabled>
                                    <option value="<?php echo $row['role'] ?>" selected><?php echo $row['role'] ?></option>
                                    <option value="Student">Student</option>
                                    <option value="Teacher">Teacher</option>
                                </select>
                            </div>
                            <div>
                                <label for="registrationaDate" class="block mb-2 text-sm font-medium text-gray-900">Registered</label>
                                <input id="registrationaDate" class="bg-gray-50 border border-gray-400 text-gray-900 mb-6 text-sm rounded-lg focus:border-blue-500 block w-full p-2.5 text-center" disabled value="<?php echo $row['registered_date'] ?>">
                            </div>
                        </div>
                        <!-- Last name, first name, and middle initial -->
                        <div class="grid grid-cols-3 gap-4 mb-6">
                            <div class="mt-[-1.7rem]">
                                <label for="lastName" class="block mb-2 text-sm font-medium text-gray-900">Last Name</label>
                                <input type="text" id="lastName" name="lastName" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:border-blue-500 block w-full p-2.5" maxlength="20" disabled value="<?php echo $row['last_name'] ?>">
                            </div>
                            <div class="mt-[-1.7rem]">
                                <label for="firstName" class="block mb-2 text-sm font-medium text-gray-900">First
                                    Name</label>
                                <input type="text" id="firstName" name="firstName" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:border-blue-500 block w-full p-2.5" maxlength="25" disabled value="<?php echo $row['first_name'] ?>">
                            </div>
                            <div class="mt-[-1.7rem]">
                                <label for="middleInitial" class="block mb-2 text-sm font-medium text-gray-900">Middle
                                    Initial</label>
                                <input type="text" id="middleInitial" name="middleInitial" class="text-center bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:border-blue-500 block w-full p-2.5" maxlength="1" disabled value="<?php echo $row['middle_initial'] ?>">
                            </div>
                        </div>
                        <!-- Grade level and section -->
                        <div class="grid grid-cols-2 gap-4 mb-6">
                            <div class="mt-[-0.2rem]">
                                <label for="grade_level" class="block mb-2 text-sm font-medium text-gray-900">Grade Level</label>
                                <select id="grade_level" name="grade_level" class="bg-gray-50 border border-gray-400 text-gray-900 mb-6 text-sm rounded-lg focus:border-blue-500 block w-full p-2.5" disabled>
                                    <option value="<?php echo $row['grade_level'] ?>" selected><?php echo $row['grade_level'] ?></option>
                                </select>
                            </div>
                            <div class="mt-[-0.2rem]">
                                <label for="section" class="block mb-2 text-sm font-medium text-gray-900">Section</label>
                                <input type="text" id="section" name="section" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:border-blue-500 block w-full p-2.5" minlength="4" maxlength="20" value="<?php echo $row['section'] ?>" disabled>
                            </div>
                        </div>
                        <!-- Name extension and sex -->
                        <div class="grid grid-cols-2 gap-4 mb-1">
                            <div class="mt-[-1.7rem]">
                                <label for="nameExtension" class="block mb-2 text-sm font-medium text-gray-900">Name Extension</label>
                                <select id="nameExtension" class="bg-gray-50 border border-gray-400 text-gray-900 mb-6 text-sm rounded-lg focus:border-blue-500 block w-full p-2.5 text-center" disabled>
                                    <option value="<?php echo $row['name_extension'] ?>" selected><?php echo $row['name_extension'] ?></option>
                                </select>
                            </div>
                            <div class="flex mt-[-1.7rem]">
                                <label class="block text-sm font-medium text-gray-900">Sex</label>
                                <div class="flex items-center mb-4 md:mr-4 mr-2">
                                    <input id="female" <?php if ($row['sex'] == 'Female') {
                                                            echo 'checked';
                                                        } ?> type="radio" value="Female" name="sex" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 mt-5 ml-[-1rem]" disabled>
                                    <label for="female" class="md:ml-2 ml-1 text-sm font-medium text-gray-900 mt-5">Female</label>
                                </div>
                                <div class="flex items-center mb-4">
                                    <input id="male" <?php if ($row['sex'] == 'Male') {
                                                            echo 'checked';
                                                        } ?> type="radio" value="Male" name="sex" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 mt-5" disabled>
                                    <label for="male" class="md:ml-2 ml-1 text-sm font-medium text-gray-900 mt-5">Male</label>
                                </div>
                            </div>
                        </div>
                        <!-- Generate qr code button and print qr code button -->
                        <div class="flex gap-4">
                            <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-600 focus:ring-2 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm md:px-5 px-1 py-2.5 text-center decline-btn">Generate QR Code</button>
                            <button onclick="printQRCode()" class="w-full text-white bg-green-700 hover:bg-green-600 focus:ring-2 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm md:px-5 py-2.5 text-center">Print QR Code</button>
                        </div>
                    </form>
                <?php
                } else {
                ?>
                    <form action="" autocomplete="off" method="POST">
                        <h3 class="mb-6 text-xl font-medium text-gray-900 text-center">Registration Details</h3>
                        <!-- ID number, role, and date registered -->
                        <div class="grid grid-cols-3 gap-4 mb-6">
                            <div>
                                <label for="employeeID" class="block mb-2 text-sm font-medium text-gray-900">ID Number</label>
                                <input type="text" id="employeeID" name="employeeID" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:border-blue-500 block w-full p-2.5" onKeyPress="if(this.value.length==15) return false;" disabled value="<?php echo $row['id_number'] ?>">
                            </div>
                            <div>
                                <label for="role" class="block mb-2 text-sm font-medium text-gray-900">Role</label>
                                <select id="role" class="bg-gray-50 border border-gray-400 text-gray-900 mb-6 text-sm rounded-lg focus:border-blue-500 block w-full p-2.5 text-center" disabled>
                                    <option value="<?php echo $row['role'] ?>" selected><?php echo $row['role'] ?></option>
                                    <option value="Student">Student</option>
                                    <option value="Teacher">Teacher</option>
                                </select>
                            </div>
                            <div>
                                <label for="registrationaDate" class="block mb-2 text-sm font-medium text-gray-900">Registered</label>
                                <input id="registrationaDate" class="bg-gray-50 border border-gray-400 text-gray-900 mb-6 text-sm rounded-lg focus:border-blue-500 block w-full p-2.5 text-center" disabled value="<?php echo $row['registered_date'] ?>">
                            </div>
                        </div>
                        <!-- Last name, first name, and middle initial -->
                        <div class="grid grid-cols-3 gap-4 mb-6">
                            <div class="mt-[-1.4rem]">
                                <label for="lastName" class="block mb-2 text-sm font-medium text-gray-900">Last Name</label>
                                <input type="text" id="lastName" name="lastName" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:border-blue-500 block w-full p-2.5" maxlength="20" disabled value="<?php echo $row['last_name'] ?>">
                            </div>
                            <div class="mt-[-1.4rem]">
                                <label for="firstName" class="block mb-2 text-sm font-medium text-gray-900">First
                                    Name</label>
                                <input type="text" id="firstName" name="firstName" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:border-blue-500 block w-full p-2.5" maxlength="25" disabled value="<?php echo $row['first_name'] ?>">
                            </div>
                            <div class="mt-[-1.4rem]">
                                <label for="middleName" class="block mb-2 text-sm font-medium text-gray-900">Middle
                                    Initial</label>
                                <input type="text" id="middleName" name="middleInitial" class="text-center bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:border-blue-500 block w-full p-2.5" maxlength="1" disabled value="<?php echo $row['middle_initial'] ?>">
                            </div>
                        </div>
                        <!-- Name extension and sex -->
                        <div class="grid grid-cols-2 gap-4 mb-1">
                            <div>
                                <label for="nameExtension" class="block mb-2 text-sm font-medium text-gray-900">Name Extension</label>
                                <select id="nameExtension" class="bg-gray-50 border border-gray-400 text-gray-900 mb-6 text-sm rounded-lg focus:border-blue-500 block w-full p-2.5 text-center" disabled>
                                    <option value="<?php echo $row['name_extension'] ?>" selected><?php echo $row['name_extension'] ?></option>
                                </select>
                            </div>
                            <div class="flex">
                                <label class="block text-sm font-medium text-gray-900">Sex</label>
                                <div class="flex items-center mb-4 md:mr-4 mr-2">
                                    <input id="female" <?php if ($row['sex'] == 'Female') {
                                                            echo 'checked';
                                                        } ?> type="radio" value="Female" name="sex" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 mt-5 ml-[-1rem]" disabled>
                                    <label for="female" class="md:ml-2 ml-1 text-sm font-medium text-gray-900 mt-5">Female</label>
                                </div>
                                <div class="flex items-center mb-4">
                                    <input id="male" <?php if ($row['sex'] == 'Male') {
                                                            echo 'checked';
                                                        } ?> type="radio" value="Male" name="sex" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 mt-5" disabled>
                                    <label for="male" class="md:ml-2 ml-1 text-sm font-medium text-gray-900 mt-5">Male</label>
                                </div>
                            </div>
                        </div>
                        <!-- Generate qr code and print qr code button -->
                        <div class="flex gap-4">
                            <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-600 focus:ring-2 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm md:px-5 px-1 py-2.5 text-center decline-btn">Generate QR Code</button>
                            <button onclick="printQRCode()" class="w-full text-white bg-green-700 hover:bg-green-600 focus:ring-2 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm md:px-5 px-1 py-2.5 text-center">Print QR Code</button>
                        </div>
                    </form>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>

<!-- Back button -->
<div class="flex justify-end pr-4 pb-4 fixed bottom-0 right-0">
    <a href="./borrower-accounts.php">
        <button type="button" class="inline-flex items-center px-5 py-2 text-sm font-medium text-center text-white bg-black rounded-lg hover:bg-red-700 focus:ring-2 focus:outline-none focus:ring-red-400">
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