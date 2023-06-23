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

<div class="flex justify-center items-center mt-[-1.2rem]">
    <div class="bg-gray-50 rounded-md m-12 my-8 w-[30rem]">
        <div class="px-6 py-6 lg:px-8">
            <h3 class="mb-4 text-xl font-medium text-gray-900 text-center">Update Registration Details</h3>
            <?php
            if ($role === 'Student') {
            ?>
                <form class="space-y-4" action="#" autocomplete="off" method="POST">
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900">ID Number</label>
                            <input type="number" name="employeeID" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" onKeyPress="if(this.value.length==15) return false;" required value="<?php echo $row['id_number'] ?>">
                        </div>
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900">Role</label>
                            <select name="role" class="bg-gray-50 border border-gray-400 text-gray-900 mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                <option value=""></option>
                                <option value="Student" <?php echo $row['role'] == 'Student' ? 'selected' : '' ?>>Student</option>
                                <option value="Teacher" <?php echo $row['role'] == 'Teacher' ? 'selected' : '' ?>>Teacher</option>
                            </select>
                        </div>
                    </div>

                    <div class="grid grid-cols-3 gap-4">
                        <div class="mt-[-1.7rem]">
                            <label class="block mb-2 text-sm font-medium text-gray-900">Last Name</label>
                            <input type="text" name="lastName" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" maxlength="20" required value="<?php echo $row['last_name'] ?>">
                        </div>
                        <div class="mt-[-1.7rem]">
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900">First
                                Name</label>
                            <input type="text" name="firstName" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" maxlength="25" required value="<?php echo $row['first_name'] ?>">
                        </div>
                        <div class="mt-[-1.7rem]">
                            <label class="block mb-2 text-sm font-medium text-gray-900">Middle
                                Initial</label>
                            <input type="text" name="middleInitial" class="text-center bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" maxlength="1" value="<?php echo $row['middle_initial'] ?>">
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div class="mt-[-0.2rem]">
                            <label class="block mb-2 text-sm font-medium text-gray-900">Grade Level</label>
                            <select id="grade_level" name="grade_level" class="bg-gray-50 border border-gray-400 text-gray-900 mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                <option value=""></option>
                                <option value="Grade 7" <?php echo $row['grade_level'] == 'Grade 7' ? 'selected' : '' ?>>Grade 7</option>
                                <option value="Grade 8" <?php echo $row['grade_level'] == 'Grade 8' ? 'selected' : '' ?>>Grade 8</option>
                                <option value="Grade 9" <?php echo $row['grade_level'] == 'Grade 9' ? 'selected' : '' ?>>Grade 9</option>
                                <option value="Grade 10" <?php echo $row['grade_level'] == 'Grade 10' ? 'selected' : '' ?>>Grade 10</option>
                                <option value="Grade 11" <?php echo $row['grade_level'] == 'Grade 11' ? 'selected' : '' ?>>Grade 11</option>
                                <option value="Grade 12" <?php echo $row['grade_level'] == 'Grade 12' ? 'selected' : '' ?>>Grade 12</option>
                            </select>
                        </div>
                        <div class="mt-[-0.2rem]">
                            <label class="block mb-2 text-sm font-medium text-gray-900">Section</label>
                            <input type="text" name="section" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" minlength="1" maxlength="15" value="<?php echo $row['section'] ?>">
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div class="mt-[-1.7rem]">
                            <label class="block mb-2 text-sm font-medium text-gray-900">Name Extension</label>
                            <select id="nameExtension" name="extension" class="bg-gray-50 border border-gray-400 text-gray-900 mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 text-center">
                                <option value="<?php if ($row['name_extension'] == "") {
                                                    echo "";
                                                } else {
                                                    echo $row['name_extension'];
                                                } ?>" selected><?php if ($row['name_extension'] == "") {
                                                                    echo "Select Extension";
                                                                } else {
                                                                    echo $row['name_extension'];
                                                                } ?></option>
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
                            <div class="flex items-center mb-4 mr-4">
                                <input id="female" type="radio" <?php if ($row['sex'] == 'Female') {
                                                                    echo 'checked';
                                                                } ?> value="Female" name="sex" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-400 focus:ring-blue-500 dark:focus:ring-blue-600 mt-5 ml-[-1rem]" required>
                                <label for="default-radio-1" class="ml-2 text-sm font-medium text-gray-900 mt-5">Female</label>
                            </div>
                            <div class="flex items-center mb-4">
                                <input id="male" type="radio" <?php if ($row['sex'] == 'Male') {
                                                                    echo 'checked';
                                                                } ?> value="Male" name="sex" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-400 focus:ring-blue-500 dark:focus:ring-blue-600 mt-5" required>
                                <label for="default-radio-1" class="ml-2 text-sm font-medium text-gray-900 mt-5">Male</label>
                            </div>
                        </div>
                    </div>
                    <button type="submit" name="submit" class="w-full text-white bg-blue-700 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update
                        Details</button>
                </form>
            <?php
            } else {
            ?>
                <form class="space-y-4" action="#" autocomplete="off" method="POST">
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900">ID Number</label>
                            <input type="text" name="employeeID" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" onKeyPress="if(this.value.length==15) return false;" required value="<?php echo $row['id_number'] ?>">
                        </div>
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900">Role</label>
                            <select name="role" class="bg-gray-50 border border-gray-400 text-gray-900 mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                <option value=""></option>
                                <option value="Student" <?php echo $row['role'] == 'Student' ? 'selected' : '' ?>>Student</option>
                                <option value="Teacher" <?php echo $row['role'] == 'Teacher' ? 'selected' : '' ?>>Teacher</option>
                            </select>
                        </div>
                    </div>

                    <div class="grid grid-cols-3 gap-4">
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900">Last Name</label>
                            <input type="text" name="lastName" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" maxlength="20" required value="<?php echo $row['last_name'] ?>">
                        </div>
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900">First
                                Name</label>
                            <input type="text" name="firstName" class="bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" maxlength="25" required value="<?php echo $row['first_name'] ?>">
                        </div>
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900">Middle
                                Initial</label>
                            <input type="text" name="middleInitial" class="text-center bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" maxlength="1" value="<?php echo $row['middle_initial'] ?>">
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div class="mt-8">
                            <label class="block mb-2 text-sm font-medium text-gray-900">Name Extension</label>
                            <select id="nameExtension" name="extension" class="bg-gray-50 border border-gray-400 text-gray-900 mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 text-center">
                                <option value="<?php if ($row['name_extension'] == "") {
                                                    echo "";
                                                } else {
                                                    echo $row['name_extension'];
                                                } ?>" selected><?php if ($row['name_extension'] == "") {
                                                                    echo "Select Extension";
                                                                } else {
                                                                    echo $row['name_extension'];
                                                                } ?></option>
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
                        <div class="flex mt-8 mb-[2.65rem]">
                            <label class="block text-sm font-medium text-gray-900">Sex</label>
                            <div class="flex items-center mb-4 mr-4 mt-4">
                                <input id="female" type="radio" <?php if ($row['sex'] == 'Female') {
                                                                    echo 'checked';
                                                                } ?> value="Female" name="sex" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-400 focus:ring-blue-500 dark:focus:ring-blue-600 mt-5 ml-[-1rem]" required>
                                <label for="default-radio-1" class="ml-2 text-sm font-medium text-gray-900 mt-5">Female</label>
                            </div>
                            <div class="flex items-center mb-4 mt-4">
                                <input id="male" type="radio" <?php if ($row['sex'] == 'Male') {
                                                                    echo 'checked';
                                                                } ?> value="Male" name="sex" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-400 focus:ring-blue-500 dark:focus:ring-blue-600 mt-5" required>
                                <label for="default-radio-1" class="ml-2 text-sm font-medium text-gray-900 mt-5">Male</label>
                            </div>
                        </div>
                    </div>
                    <button type="submit" name="submit" class="w-full text-white bg-blue-700 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update
                        Details</button>
                </form>
            <?php
            }
            ?>
            <?php
            if (isset($_POST['submit'])) {
                $empId = $_POST['employeeID'];
                $role = $_POST['role'];
                $last_name = $_POST['lastName'];
                $first_name = $_POST['firstName'];
                $middle_initial = $_POST['middleInitial'];
                $grade_level = $_POST['grade_level'];
                $section = $_POST['section'];
                $extension = $_POST['extension'];
                $sex = $_POST['sex'];

                $sql = "UPDATE `borrowers` SET id_number='$empId', first_name = '$first_name',last_name='$last_name', middle_initial='$middle_initial',grade_level='$grade_level',section='$section',name_extension='$extension',sex='$sex',role='$role' WHERE borrower_ID ='$id'";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    echo "<script>
                        alert('Account updated successfully.');
                        window.location.href='account-reports.php'
                        </script>";
                }
            }
            ?>
        </div>
    </div>
</div>

<div class="flex justify-end pr-4 pb-2 mt-[-1.4rem]">
    <a href="./account-reports.php">
        <button type="button" class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-black rounded-lg hover:bg-red-700 focus:ring-2 focus:outline-none focus:ring-red-300">
            Back
        </button>
    </a>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
</body>

</html>