<?php include "../../server/db/conDB.php"; ?>

<table id="table" class="w-full text-sm text-left text-gray-500">
    <thead class="sticky top-0 text-xs text-white uppercase bg-black">
        <tr>
            <th scope="col" class="px-6 py-3">
                <div class="flex items-center">
                    Last Name
                    <a href="#" onclick="sortTable(0)"><svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512">
                            <path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z" />
                        </svg></a>
                </div>
            </th>
            <th scope="col" class="px-6 py-3">
                <div class="flex items-center">
                    First Name
                    <a href="#" onclick="sortTable(1)"><svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512">
                            <path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z" />
                        </svg></a>
                </div>
            </th>
            <th scope="col" class="px-6 py-3">
                <div class="flex items-center">
                    Role
                    <a href="#" onclick="sortTable(2)"><svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512">
                            <path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z" />
                        </svg></a>
                </div>
            </th>
            <th scope="col" class="px-6 py-3 flex justify-center">
                Action
            </th>
    </thead>
    <tbody>

        <?php
        $borrower = $conn->query("SELECT * FROM `borrowers` WHERE status=0 ORDER BY registered_date ASC") or die(mysqli_error($conn));
        while ($name = $borrower->fetch_array()) {
            $id = $name['borrower_ID'];
            $idNumber = $name['id_number'];
            $last = $name['last_name'];
            $first = $name['first_name'];
            $middle = $name['middle_initial'];
            $extension = $name['name_extension'];
            $idNumber = $name['id_number'];
            $sex = $name['sex'];
            $role = $name['role'];
        ?>

        <tr class="bg-white border-b text-black font-semibold">
            <td scope="row" class="px-6 py-2 font-semibold text-black whitespace-nowrap">
                <?php echo $name['last_name'] ?>
            </td>
            <td class="px-6 py-2">
                <?php echo $name['first_name'] ?>
            </td>
            <td class="px-6 py-2">
                <?php echo $name['role'] ?>
            </td>
            <td class="px-6 py-2 justify-center flex">
                <?php
                if ($role === 'Student') {
                ?>
                    <a href="./approve-decline-student.php?id=<?php echo $id ?>">
                        <svg class="w-6 text-black items-center align-middle my-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                    </a>
                <?php
                } else {
                ?>
                    <a href="./approve-decline-teacher.php?id=<?php echo $id ?>">
                        <svg class="w-6 text-black items-center align-middle my-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                    </a>
                <?php
                }
                ?>
            </td>
        </tr>
    </tbody>
    <?php
            if (isset($_POST['decline'])) {
                $sql = "UPDATE `borrowers` SET status=2 WHERE borrower_ID = '$id'";
                $res = mysqli_query($conn, $sql);
            }
            if (isset($_POST['approve'])) {
                $sql = "UPDATE `borrowers` SET status=1 WHERE borrower_ID = $id";
                $res = mysqli_query($conn, $sql);
            }
    ?>
    <?php
        }
    ?>
</table>