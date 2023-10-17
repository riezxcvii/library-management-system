<?php
include('navigation-bar.php');
?>

<div class="flex justify-center items-center h-full md:mt-[0rem] mb-0 mt-[-3.2rem]">
    <div class="bg-gray-50 rounded-md md:mx-12 mx-4 mb-0 w-[30rem]">
        <!-- Form -->
        <div class="md:p-8 p-6 md:px-8">
            <h3 class="md:text-xl text-lg font-medium text-gray-900 text-center md:mb-6 mb-4">Registration Form</h3>
            <form action="#" autocomplete="off" method="POST">
                <!-- ID number and role -->
                <div class="grid grid-cols-2 gap-4 md:mt-4 mt-6 mb-6">
                    <div>
                        <label for="employeeID" class="block mb-2 text-sm font-medium text-gray-900">ID Number</label>
                        <input type="text" id="employeeID" name="employeeID" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:border-blue-500 block w-full p-2.5" onkeypress="return validateEmployeeID(event);" required>
                    </div>
                    <div>
                        <label for="role" class="block mb-2 text-sm font-medium text-gray-900">Role</label>
                        <select id="role" name="role" class="bg-gray-50 border border-gray-400 text-gray-900 mb-6 text-sm rounded-lg  focus:border-blue-500 block w-full p-2.5" required>
                            <option value="" selected>Select Role</option>
                            <option value="Student">Student</option>
                            <option value="Teacher">Teacher</option>
                        </select>
                    </div>
                </div>
                <!-- Last name, first name, and middle initial -->
                <div class="grid grid-cols-3 gap-4 mb-6">
                    <div class="mt-[-1.7rem]">
                        <label for="lastName" class="block mb-2 text-sm font-medium text-gray-900">Last Name</label>
                        <input type="text" name="lastName" id="lastName" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:border-blue-500 block w-full p-2.5" maxlength="20" required maxlength="20" minlength="2">
                    </div>
                    <div class="mt-[-1.7rem]">
                        <label for="firstName" class="block mb-2 text-sm font-medium text-gray-900">First
                            Name</label>
                        <input type="text" name="firstName" id="firstName" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:border-blue-500 block w-full p-2.5" maxlength="25" required maxlength="20" minlength="2">
                    </div>
                    <div class="mt-[-1.7rem]">
                        <label for="middleInitial" class="block mb-2 text-sm font-medium text-gray-900">Middle
                            Initial</label>
                        <input type="text" name="middleInitial" id="middleInitial" class="text-center bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:border-blue-500 block w-full p-2.5" maxlength="1">
                    </div>
                </div>
                <!-- Grade level and section -->
                <div class="grid grid-cols-2 gap-4 mb-6">
                    <div class="mt-[-0.2rem]">
                        <label for="grade_level" class="block mb-2 text-sm font-medium text-gray-900">Grade Level (for students only)</label>
                        <select id="grade_level" name="grade_level" class="bg-gray-50 border border-gray-400 text-gray-900 mb-6 text-sm rounded-lg focus:border-blue-500 block w-full p-2.5">
                            <option value="" selected>Select Grade Level</option>
                            <option value="Grade 7">Grade 7</option>
                            <option value="Grade 8">Grade 8</option>
                            <option value="Grade 9">Grade 9</option>
                            <option value="Grade 10">Grade 10</option>
                            <option value="Grade 11">Grade 11</option>
                            <option value="Grade 12">Grade 12</option>
                        </select>
                    </div>
                    <div class="mt-[-0.2rem]">
                        <label for="section" class="block mb-2 text-sm font-medium text-gray-900">Section (for students only)</label>
                        <input type="text" name="section" id="section" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:border-blue-500 block w-full p-2.5" minlength="1" maxlength="15">
                    </div>
                </div>
                <!-- Name extension and sex -->
                <div class="grid grid-cols-2 gap-4 mb-1">
                    <div class="mt-[-1.7rem]">
                        <label for="nameExtension" class="block mb-2 text-sm font-medium text-gray-900">Name Extension</label>
                        <select id="nameExtension" name="extension" class="bg-gray-50 border border-gray-400 text-gray-900 mb-6 text-sm rounded-lg focus:border-blue-500 block w-full p-2.5 text-center">
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
                    <div class="flex mt-[-1.7rem]">
                        <label class="block text-sm font-medium text-gray-900">Sex</label>
                        <div class="flex items-center mb-4 md:mr-4 mr-2">
                            <input id="female" type="radio" value="Female" name="sex" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-400 mt-5 ml-[-1rem]">
                            <label for="female" class="md:ml-2 ml-1 text-sm font-medium text-gray-900 mt-5">Female</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="male" type="radio" value="Male" name="sex" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-400 mt-5">
                            <label for="male" class="md:ml-2 ml-1 text-sm font-medium text-gray-900 mt-5">Male</label>
                        </div>
                    </div>
                </div>
                <button type="submit" name="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-2 focus:outline-none focus:ring-blue-400 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Register
                    Borrower</button>
            </form>

            <!-- SQL Query for borrower registration -->
            <?php
            if (isset($_POST['submit'])) {
                $id = $_POST['employeeID'];
                $role = $_POST['role'];
                $last_name = $_POST['lastName'];
                $first_name = $_POST['firstName'];
                $middle_initial = $_POST['middleInitial'];
                $grade_level = $_POST['grade_level'];
                $section = $_POST['section'];
                $extension = $_POST['extension'];
                $sex = $_POST['sex'];
                $currentDate = date("Y-m-d");

                $sql = "INSERT INTO `borrowers` (id_number, first_name,last_name, middle_initial,grade_level,section,name_extension,sex,role,status)VALUES('$id', '$first_name','$last_name','$middle_initial','$grade_level','$section','$extension','$sex','$role',1)";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    echo "<script>
                        window.location.href='borrower-accounts.php'
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

<script>
    function validateEmployeeID(event) {
        var key = event.keyCode || event.which;
        var input = String.fromCharCode(key);

        if (key === 45 || (key >= 48 && key <= 57)) {

            if ((event.target.value + input).length > 20) {
                return false;
            }
            return true;
        }
        return false;
    }
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
</body>

</html>