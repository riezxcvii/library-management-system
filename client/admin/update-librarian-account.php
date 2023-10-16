<?php
include('navigation-bar.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM `library_admin` WHERE admin_ID = $id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
}
?>

<div class="flex justify-center items-center h-full">
    <div class="bg-gray-50 rounded-md md:my-0 my-[4rem] md:mx-12 mx-3 md:mb-8 md:mt-[1rem] mt-[1rem] w-[30rem]">
        <!-- Form -->
        <div class="md:p-8 p-7 md:px-8">
            <h3 class="mb-4 md:text-xl text-lg font-medium text-gray-900 text-center">Update Account Details</h3>
            <form action="#" autocomplete="off" method="POST">
                <!-- Username and role -->
                <div class="grid grid-cols-2 gap-4 md:my-0 my-4">
                    <div>
                        <label for="username" class="block mb-2 text-sm font-medium text-gray-900">Username</label>
                        <input type="text" id="username" name="username" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" onKeyPress="if(this.value.length==15) return false;" required value="<?php echo $row['username'] ?>">
                    </div>
                    <div>
                        <label for="nameExtension" class="block mb-2 text-sm font-medium text-gray-900">Role</label>
                        <select id="role" name="role" class="bg-gray-50 border border-gray-400 text-gray-900 mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                            <option value="<?php echo $row['role'] ?>" selected><?php echo $row['role'] ?></option>
                            <option value="Admin">Admin</option>
                            <option value="Librarian">Librarian</option>
                        </select>
                    </div>
                </div>
                <!-- Last name, first name, and middle name -->
                <div class="grid grid-cols-3 gap-4 md:mb-0 mb-4">
                    <div>
                        <label for="lastName" class="md:mt-0 mt-[-0.7rem] block mb-2 text-sm font-medium text-gray-900">Last Name</label>
                        <input type="text" id="lastName" name="lastName" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" maxlength="20" required value="<?php echo $row['last_name'] ?>">
                    </div>
                    <div>
                        <label for="firstName" class="md:mt-0 mt-[-0.7rem] block mb-2 text-sm font-medium text-gray-900">First
                            Name</label>
                        <input type="text" id="firstName" name="firstName" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" maxlength="25" required value="<?php echo $row['first_name'] ?>">
                    </div>
                    <div>
                        <label for="middleName" class="md:mt-0 mt-[-0.7rem] block mb-2 text-sm font-medium text-gray-900">Middle
                            Initial</label>
                        <input type="text" id="middleName" name="middleInitial" class="text-center bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" maxlength="1" value="<?php echo $row['middle_initial'] ?>">
                    </div>
                </div>
                <!-- Name extension and sex -->
                <div class="grid grid-cols-2 gap-4 md:mb-2 mb-3">
                    <div>
                        <label for="nameExtension" class="mt-[0.8rem] block mb-2 text-sm font-medium text-gray-900 md:mt-6">Name Extension</label>
                        <select id="nameExtension" name="extension" class="bg-gray-50 border border-gray-400 text-gray-900 mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 text-center">
                            <option value="<?php if ($row['name_extension'] == "") {
                                                echo "";
                                            } else {
                                                echo $row['name_extension'];
                                            } ?>" selected>
                                <?php if ($row['name_extension'] == "") {
                                    echo "Select Extension";
                                } else {
                                    echo $row['name_extension'];
                                } ?>
                            </option>
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
                        <label class="mt-[0.8rem] block text-sm font-medium text-gray-900 md:mt-6">Sex</label>
                        <div class="flex items-center mb-4 md:mr-4 mr-2 md:mt-6 mt-2">
                            <input id="female" type="radio" <?php if ($row['sex'] == 'Female') {
                                                                echo 'checked';
                                                            } ?> value="Female" name="sex" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-400 focus:ring-blue-500 dark:focus:ring-blue-600 mt-5 ml-[-1rem]" required>
                            <label for="female" class="md:ml-2 ml-1 text-sm font-medium text-gray-900 mt-5">Female</label>
                        </div>
                        <div class="flex items-center mb-4 md:mt-6 mt-2">
                            <input id="male" type="radio" <?php if ($row['sex'] == 'Male') {
                                                                echo 'checked';
                                                            } ?> value="Male" name="sex" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-400 focus:ring-blue-500 dark:focus:ring-blue-600 mt-5" required>
                            <label for="male" class="md:ml-2 ml-1 text-sm font-medium text-gray-900 mt-5">Male</label>
                        </div>
                    </div>
                </div>
                <button type="submit" name="submit" class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-2 focus:outline-none focus:ring-blue-400 font-medium rounded-lg text-sm px-5 py-2.5 md:mb-1 text-center">Update
                    Account</button>
            </form>
            <!-- SQL Query for upodating librarian account -->
            <?php
            if (isset($_POST['submit'])) {
                $username = $_POST['username'];
                $role = $_POST['role'];
                $last_name = $_POST['lastName'];
                $first_name = $_POST['firstName'];
                $middle_initial = $_POST['middleInitial'];
                $extension = $_POST['extension'];
                $sex = $_POST['sex'];

                $sql = "UPDATE `library_admin` SET username='$username', first_name = '$first_name',last_name='$last_name', middle_initial='$middle_initial',name_extension='$extension',sex='$sex',role='$role' WHERE admin_ID ='$id'";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    echo "<script>
                        alert('Account updated successfully.');
                        window.location.href='librarian-registration.php'
                        </script>";
                }
            }
            ?>
        </div>
    </div>
</div>
<!-- Back button -->
<div class="flex justify-end pr-4 pb-4 fixed bottom-0 right-0">
    <a href="./librarian-registration.php">
        <button type="button" class="inline-flex items-center px-5 py-2 text-sm font-medium text-center text-white bg-black rounded-lg hover:bg-red-700 focus:ring-2 focus:outline-none focus:ring-red-400">
            Back
        </button>
    </a>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
</body>

</html>