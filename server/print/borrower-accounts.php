<!DOCTYPE html>
<?php
require '../db/conDB.php';
?>
<html lang="en">

<head>
    <title>Print: Registered Borrowers</title>
    <link href="../../client/assets/logo.png" type="image/x-icon" rel="shortcut icon">
</head>

<style>
    body {
        font-family: Arial, sans-serif;
    }

    .table {
        width: 100%;
    }

    .table-striped tbody>tr:nth-child(odd)>td,
    .table-striped tbody>tr:nth-child(odd)>th {
        background-color: #f9f9f9;
    }

    @media print {
        #print {
            display: none;
        }
    }

    @media print {
        #PrintButton {
            display: none;
        }
    }

    @page {
        size: auto; /* Bondpaper size */
        margin: 10%; /* Bondpaper margin */
    }
</style>

<body>
    <!-- Bondpaper header -->
    <div>
        <img src="../../client/assets/logo.png" style="display:block; margin:0 auto 2% auto; width:11%; height:8.5vh;">
        <h4 style="text-align:center; font-weight:500; margin-top:1%">REPUBLIC OF THE PHILPPINES</h4>
        <h4 style="text-align:center; font-weight:500; margin-top:-2.7%">ANTIQUE NATIONAL SCHOOL</h4>
        <h4 style="text-align:center; font-weight:500; margin-top:-2.5%">T.A. FORNIER ST., SAN JOSE, ANTIQUE</h4>
        <br>
        <h4 style="text-align:center; margin-top:-2%">ANS LIBRARY REPORT</h4>
        <h4 style="text-align:center; font-weight:500; margin-top:-2.7%">LIST OF ALL LIBRARY USER</h4>
    </div>
    <!-- Date prepared -->
    <br>
    <b style="text-align:right">DATE PREPARED:</b>
    <?php
    $date = date("m.d.Y", strtotime("+6 HOURS"));
    echo $date;
    ?>
    <br><br>
    <!-- Table -->
    <table class="sum12" style="border:1px solid black; border-collapse:collapse; width:100%">
        <tbody>
            <tr>
                <td style="font-weight:bold; text-align:center; width:20%; border:1px solid black; padding:6px">ID Number</td>
                <td style="font-weight:bold; text-align:center; width:10%; border:1px solid black; padding:6px">ROLE</td>
                <td style="font-weight:bold; text-align:center; width:10%; border:1px solid black; padding:6px">LAST NAME</td>
                <td style="font-weight:bold; text-align:center; width:10%; border:1px solid black; padding:6px">FIRST NAME</td>
                <td style="font-weight:bold; text-align:center; width:10%; border:1px solid black; padding:6px">MIDDLE INITIAL</td>
                <td style="font-weight:bold; text-align:center; width:10%; border:1px solid black; padding:6px">NAME EXTENSION</td>
                <td style="font-weight:bold; text-align:center; width:10%; border:1px solid black; padding:6px">GENDER</td>
                <td style="font-weight:bold; text-align:center; width:10%; border:1px solid black; padding:6px">ACCOUNT STATUS</td>
            </tr>
            <!-- Display all library user with active accounts -->
            <?php
            require '../db/conDB.php';
            $query = $conn->query("SELECT * FROM `borrowers` WHERE status = 1");
            while ($fetch = $query->fetch_array()) {
                $deactivate = $fetch['deactivate'];
            ?>

            <tr>
                <td style="border:1px solid black; padding-left:10px; padding-right:10px; padding-top:3px"><?php echo $fetch['id_number'] ?></td>
                <td style="border:1px solid black; padding-left:10px; padding-right:10px; padding-top:3px"><?php echo $fetch['role'] ?></td>
                <td style="border:1px solid black; padding:1.5px; padding-left:10px; padding-right:10px; padding-top:3px"><?php echo $fetch['last_name'] ?></td>
                <td style="border:1px solid black; padding:1.5px; padding-left:10px; padding-right:10px; padding-top:3px"><?php echo $fetch['first_name'] ?></td>
                <td style="border:1px solid black; padding:1.5px; padding-top:3px; text-align:center"><?php echo $fetch['middle_initial'] ?></td>
                <td style="border:1px solid black; padding:1.5px; padding-top:3px; text-align:center"><?php echo $fetch['name_extension'] ?></td>
                <td style="border:1px solid black; padding-left:10px; padding-right:10px; padding-top:3px"><?php echo $fetch['sex'] ?></td>
                <?php
                if ($deactivate == 0) {
                ?>
                    <td style="border:1px solid black; padding-left:10px; padding-right:10px; padding-top:3px">Active</td>
                <?php
                } else {
                ?>
                    <td style="border:1px solid black; padding-left:10px; padding-right:10px; padding-top:3px; color:brown">Deactivated</td>
                <?php
                }
                ?>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</body>

<script type="text/javascript">
    function PrintPage() {
        window.print();
    }
    document.loaded = function() {}
    window.addEventListener('DOMContentLoaded', (event) => {
        PrintPage()
        setTimeout(function() {
            window.close()
        }, 750)
    });
</script>

</html>