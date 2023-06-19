<?php
include('navigation-bar.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
?>

<div class="flex justify-center items-center mt-[-0.9rem]">
    <div class="bg-gray-50 rounded-md m-12 my-8 w-[30rem]">
        <?php
        $sql = "SELECT * FROM borrowers WHERE borrower_ID = $id";
        $res = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($res);
        ?>
        <div class="px-6 py-6 lg:px-8">
            <h3 class="mb-4 text-xl font-medium text-gray-900 text-center">Registration Form</h3>

            <div class="grid grid-cols-3 gap-4 mb-[-0.2rem]">
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900">ID Number</label>
                    <input type="number" name="employeeID" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" onKeyPress="if(this.value.length==15) return false;" disabled value="<?php echo $row['id_number'] ?>">
                </div>

                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900">Role</label>
                    <select id="nameExtension" class="bg-gray-50 border border-gray-400 text-gray-900 mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 text-center" disabled>
                        <option value="" selected><?php echo $row['role'] ?></option>
                    </select>
                </div>

                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900">Date Registered</label>
                    <select id="registrationaDate" class="bg-gray-50 border border-gray-400 text-gray-900 mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 text-center" disabled value="">
                        <option value="" selected><?php echo $row['registered_date'] ?></option>
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-3 gap-4 mb-[1.5rem]">
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
                <div class="mt-[-0.2rem]">
                    <label class="block mb-2 text-sm font-medium text-gray-900">Grade Level</label>
                    <select id="grade_level" name="grade_level" class="bg-gray-50 border border-gray-400 text-gray-900 mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" disabled>
                        <option value="<?php echo $row['grade_level'] ?>" selected><?php echo $row['grade_level'] ?></option>
                    </select>
                </div>
                <div class="mt-[-0.2rem]">
                    <label class="block mb-2 text-sm font-medium text-gray-900">Section</label>
                    <input type="text" name="section" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" minlength="4" maxlength="20" value="<?php echo $row['section'] ?>" disabled>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900">Name Extension</label>
                    <select id="nameExtension" class="bg-gray-50 border border-gray-400 text-gray-900 mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 text-center" disabled value="">
                        <option value="" selected><?php echo $row['name_extension'] ?></option>
                    </select>
                </div>

                <div class="flex">
                    <label class="block text-sm font-medium text-gray-900">Sex</label>
                    <div class="flex items-center mb-4 mr-4">
                        <input id="female" type="radio" <?php if ($row['sex'] == 'Female') {
                                                            echo 'checked';
                                                        } ?> value="Female" name="sex" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 mt-5 ml-[-1rem]" disabled>
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
            <form class="space-y-6" action="" autocomplete="off" method="POST">
                <div class="flex gap-4">
                    <button name="decline" class="w-full text-white bg-red-700 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center decline-btn" data-borrower-id="<?php echo $id; ?>">Decline
                        Request</button>
                    <button name="approve" class="w-full text-white bg-green-700 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Approve
                        Request</button>
                </div>
            </form>
            <?php
            if (isset($_POST['decline'])) {
                $sql = "UPDATE borrowers set status = 2 where borrower_ID = $id";
                $res = mysqli_query($conn, $sql);
                if ($res) {

                    echo "<script>
                        alert('Registration declined successfully.');
                        window.location.href='account-registration.php'
                        </script>";
                }
            }
            if (isset($_POST['approve'])) {
                $sql = "UPDATE borrowers set status = 1 where borrower_ID = $id";
                $res = mysqli_query($conn, $sql);
                if ($res) {

                    echo "<script>
                        alert('Registration approved successfully.');
                        window.location.href='account-registration.php'
                        </script>";
                }
            }
            ?>
        </div>
    </div>
</div>

<div class="flex justify-end pr-4 pb-2 mt-[-2.4rem]">
    <a href="account-registration.php">
        <button type="button" class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-black rounded-lg hover:bg-red-700 focus:ring-2 focus:outline-none focus:ring-red-300">
            Back
        </button>
    </a>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
</body>

</html>