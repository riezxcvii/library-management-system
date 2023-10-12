<?php
include('navigation-bar.php');
?>

<div class="flex justify-center items-center md:py-0 py-16">
    <div class="bg-gray-50 rounded-md md:m-12 m-4 md:mb-0 md:mt-[1rem] w-[30rem]  md:my-0 my-auto">
        <!-- Form -->
        <div class="md:p-8 p-6 md:px-8">
            <h3 class="mb-4 md:text-xl text-lg font-medium text-gray-900 text-center">Registration Form</h3>
            <form class="space-y-4" action="#" autocomplete="off" method="POST">
            <!-- Username and password -->
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Username</label>
                        <input type="text" name="username" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" minlength="5" required>
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                        <input type="password" name="password" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" minlength="8" required>
                    </div>
                </div>
                <!-- Role -->
                <div class="mt-[-1rem]">
                    <label class="block mb-2 text-sm font-medium text-gray-900">Role</label>
                    <select id="role" name="role" class="bg-gray-50 border border-gray-400 text-gray-900 mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                        <option value="" selected>Select Role</option>
                        <option value="Admin">Admin</option>
                        <option value="Librarian">Librarian</option>
                    </select>
                </div>
                <!-- Last name, first name, and middle initial -->
                <div class="grid grid-cols-3 gap-4">
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Last Name</label>
                        <input type="text" name="lastName" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" maxlength="20" required maxlength="20" minlength="2">
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">First
                            Name</label>
                        <input type="text" name="firstName" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" maxlength="25" required maxlength="20" minlength="2">
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Middle
                            Initial</label>
                        <input type="text" name="middleInitial" class="text-center bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" maxlength="1">
                    </div>
                </div>
                <!-- Name extension and sex -->
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900">Name Extension</label>
                        <select id="nameExtension" name="extension" class="bg-gray-50 border border-gray-400 text-gray-900 mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 text-center">
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
                        <div class="flex items-center mb-4 md:mr-4 mr-2">
                            <input id="female" type="radio" value="Female" name="sex" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-400 focus:ring-blue-500 dark:focus:ring-blue-600 mt-5 ml-[-1rem]">
                            <label for="default-radio-1" class="md:ml-2 ml-1 text-sm font-medium text-gray-900 mt-5">Female</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="male" type="radio" value="Male" name="sex" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-400 focus:ring-blue-500 dark:focus:ring-blue-600 mt-5">
                            <label for="default-radio-1" class="md:ml-2 ml-1 text-sm font-medium text-gray-900 mt-5">Male</label>
                        </div>
                    </div>
                </div>
                <button type="submit" name="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Register
                    Account</button>
            </form>
            <!-- SQL Query for librarian registration -->
            <?php
            if (isset($_POST['submit'])) {
                $role = $_POST['role'];
                $last_name = $_POST['lastName'];
                $first_name = $_POST['firstName'];
                $middle_initial = $_POST['middleInitial'];
                $extension = $_POST['extension'];
                $sex = $_POST['sex'];
                $username = $_POST['username'];
                $password = $_POST['password'];

                $sql = "INSERT INTO `library_admin` (first_name,last_name, middle_initial,name_extension,sex,role,username,password,status)VALUES('$first_name','$last_name','$middle_initial','$extension','$sex','$role','$username','$password',1)";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    echo "<script>
                        alert('Account registered successfully.');
                        window.location.href='librarian-accounts.php'
                        </script>";
                }
            }
            ?>
        </div>
    </div>
</div>

<div class="flex justify-end pr-4 pb-4 fixed bottom-0 right-0">
    <a href="./librarian-registration.php">
        <button type="button" class="inline-flex items-center px-5 py-2 text-sm font-medium text-center text-white bg-black rounded-lg hover:bg-red-700 focus:ring-2 focus:outline-none focus:ring-red-300">
            Back
        </button>
    </a>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
</body>

</html>