<?php
include('navigation-bar.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
?>

<div class="flex justify-center items-center h-full md:mt-[0rem] mb-0 mt-[-3.2rem]">
    <div class="bg-gray-50 rounded-md md:mx-12 mx-4 mb-0 w-[30rem]">
        <!-- SQL Query to get the user id -->
        <?php
        $sql = "SELECT * FROM borrowers WHERE borrower_ID = $id";
        $res = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($res);
        ?>
        <!-- Form -->
        <div class="md:p-8 p-6 md:px-8">
            <h3 class="md:text-xl text-lg font-medium text-gray-900 text-center mb-6">Registration Form</h3>
            <!-- ID number, role, and date registered -->
            <div class="grid grid-cols-3 gap-4">
                <div>
                    <label for="employeeID" class="block mb-2 text-sm font-medium text-gray-900">ID Number</label>
                    <input type="text" id="employeeID" name="employeeID" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" onKeyPress="if(this.value.length==15) return false;" disabled value="<?php echo $row['id_number'] ?>">
                </div>
                <div>
                    <label for="role" class="block mb-2 text-sm font-medium text-gray-900">Role</label>
                    <select id="role" class="bg-gray-50 border border-gray-400 text-gray-900 mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 text-center" disabled>
                        <option value="" selected><?php echo $row['role'] ?></option>
                    </select>
                </div>
                <div>
                    <label for="registrationaDate" class="block mb-2 text-sm font-medium text-gray-900">Registered</label>
                    <select id="registrationaDate" class="bg-gray-50 border border-gray-400 text-gray-900 mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 text-center" disabled value="">
                        <option value="" selected><?php echo $row['registered_date'] ?></option>
                    </select>
                </div>
            </div>
            <!-- Last name, first name, and middle initial -->
            <div class="grid grid-cols-3 gap-4 mb-6">
                <div>
                    <label for="lastName" class="block mb-2 text-sm font-medium text-gray-900">Last Name</label>
                    <input type="text" id="lastName" name="lastName" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" maxlength="20" disabled value="<?php echo $row['last_name'] ?>">
                </div>
                <div>
                    <label for="firstName" class="block mb-2 text-sm font-medium text-gray-900">First
                        Name</label>
                    <input type="text" id="firstName" name="firstName" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" maxlength="25" disabled value="<?php echo $row['first_name'] ?>">
                </div>
                <div>
                    <label for="middleInitial" class="block mb-2 text-sm font-medium text-gray-900">Middle
                        Initial</label>
                    <input type="text" id="middleInitial" name="middleInitial" class="text-center bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" maxlength="1" disabled value="<?php echo $row['middle_initial'] ?>">
                </div>
            </div>
            <!-- Name extension and sex -->
            <div class="grid grid-cols-2 gap-4 mb-1">
                <div>
                    <label for="nameExtension" class="block mb-2 text-sm font-medium text-gray-900">Name Extension</label>
                    <select id="nameExtension" class="bg-gray-50 border border-gray-400 text-gray-900 mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 text-center" disabled value="">
                        <option value="" selected><?php echo $row['name_extension'] ?></option>
                    </select>
                </div>
                <div class="flex">
                    <label class="block text-sm font-medium text-gray-900">Sex</label>
                    <div class="flex items-center mb-4 md:mr-4 mr-2">
                        <input id="female" type="radio" <?php if ($row['sex'] == 'Female') {
                                                            echo 'checked';
                                                        } ?> value="Female" name="sex" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-400 mt-5 ml-[-1rem]" disabled>
                        <label for="female" class="md:ml-2 ml-1 text-sm font-medium text-gray-900 mt-5">Female</label>
                    </div>
                    <div class="flex items-center mb-4">
                        <input id="male" <?php if ($row['sex'] == 'Male') {
                                                echo 'checked';
                                            } ?> type="radio" value="Male" name="sex" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-400 mt-5" disabled>
                        <label for="male" class="md:ml-2 ml-1 text-sm font-medium text-gray-900 mt-5">Male</label>
                    </div>
                </div>
            </div>

            <!-- Approve and decline buttons -->
            <form class="space-y-6" action="" autocomplete="off" method="POST">
                <div class="flex gap-4">
                    <button name="decline" class="w-full text-white bg-red-700 hover:bg-red-600 focus:ring-2 focus:outline-none focus:ring-red-400 font-medium rounded-lg text-sm px-5 py-2.5 text-center decline-btn" data-borrower-id="<?php echo $id; ?>"><span class="md:block hidden">Decline Request</span>
                    <span class="md:hidden block">Decline</span></button>
                    <button name="approve" class="w-full text-white bg-green-700 hover:bg-green-600 focus:ring-2 focus:outline-none focus:ring-green-400 font-medium rounded-lg text-sm px-5 py-2.5 text-center"><span class="md:block hidden">Approve Request</span>
                    <span class="md:hidden block">Approve</span></button>
                </div>
            </form>
            
            <!-- SQL Query for approve and decline button -->
            <?php
            if (isset($_POST['decline'])) {
                $sql = "UPDATE borrowers set status = 2 where borrower_ID = $id";
                $res = mysqli_query($conn, $sql);
                if ($res) {

                    echo "<script>
                        alert('Registration declined successfully.');
                        window.location.href='borrower-pending-registration.php'
                        </script>";
                }
            }
            if (isset($_POST['approve'])) {
                $sql = "UPDATE borrowers set status = 1 where borrower_ID = $id";
                $res = mysqli_query($conn, $sql);
                if ($res) {

                    echo "<script>
                        alert('Registration approved successfully.');
                        window.location.href='borrower-pending-registration.php'
                        </script>";
                }
            }
            ?>
        </div>
    </div>
</div>

<!-- Back button -->
<div class="flex justify-end pr-4 pb-4 fixed bottom-0 right-0">
    <a href="./borrower-pending-registration.php">
        <button type="button" class="inline-flex items-center px-5 py-2 text-sm font-medium text-center text-white bg-black rounded-lg hover:bg-red-700 focus:ring-2 focus:outline-none focus:ring-red-400">
            Back
        </button>
    </a>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
</body>

</html>