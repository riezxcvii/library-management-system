<!DOCTYPE html>
<?php
require '../db/conDB.php';
?>
<html lang="en">

<head>
    <title>ALMS: Print Report</title>
    <link href="../../client/assets/logo.png" type="image/x-icon" rel="shortcut icon">
</head>

<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0.5in;
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
        size: auto;
        /* auto is the initial value */
        margin: 0;
        /* this affects the margin in the printer settings */
    }
</style>

<body>
    <div>
        <img src="../../client/assets/logo.png" style="display:block; margin:0 auto 0 auto; width:6%;">
        <h4 style="text-align:center; font-weight:500; margin-top:1%">REPUBLIC OF THE PHILPPINES</h4>
        <h4 style="text-align:center; font-weight:500; margin-top:-1.5%">ANTIQUE NATIONAL SCHOOL</h4>
        <h4 style="text-align:center; font-weight:500; margin-top:-1.5%">T.A. FORNIER ST., SAN JOSE, ANTIQUE</h4>
        <br>
        <h4 style="text-align:center; margin-top:-1.5%">ANS LIBRARY REPORT</h4>
        <h4 style="text-align:center; font-weight:500; margin-top:-1.5%">LIST OF ALL BORROWERS</h4>
    </div>

    <br>
    <b style="text-align:right">DATE PREPARED:</b>
    <?php
    $date = date("m.d.Y", strtotime("+6 HOURS"));
    echo $date;
    ?>
    <br><br>

    <table class="sum12" style="border:1px solid black; border-collapse:collapse; width:100%">
        <tbody>
            <tr>
                <td id="colNo13" style="font-weight:bold; text-align:center; width:5%; border:1px solid black">ID</td>
                <td id="colLRN13" style="font-weight:bold; text-align:center; width:7%; border:1px solid black">LRN</td>
                <td id="colSur13" style="font-weight:bold; text-align:center; width:6%; border:1px solid black">LAST NAME</td>
                <td id="colFirst13" style="font-weight:bold; text-align:center; width:6%; border:1px solid black">FIRST NAME</td>
                <td id="colMid13" style="font-weight:bold; text-align:center; width:5%; border:1px solid black">MIDDLE INITIAL</td>
                <td id="colExt13" style="font-weight:bold; text-align:center; width:6%; border:1px solid black">NAME EXTENSION</td>
                <td id="colGender13" style="font-weight:bold; text-align:center; width:5%; border:1px solid black">GENDER</td>
            </tr>

            <?php
            require '../db/conDB.php';
            $query = $conn->query("SELECT * FROM `borrowers`");
            while ($fetch = $query->fetch_array()) {
            ?>

                <tr>
                    <td id="lrn13" style="border:1px solid black; padding:1.5px; padding-top:3px; text-align:center"><?php echo $fetch['borrower_ID'] ?></td>
                    <td id="sur13" style="border:1px solid black; padding:1.5px; padding-top:3px; text-align:center"><?php echo $fetch['id_number'] ?></td>
                    <td id="first13" style="border:1px solid black; padding:1.5px; padding-left:10px; padding-top:3px"><?php echo $fetch['last_name'] ?></td>
                    <td id="mid13" style="border:1px solid black; padding:1.5px; padding-left:10px; padding-top:3px"><?php echo $fetch['first_name'] ?></td>
                    <td id="ext13" style="border:1px solid black; padding:1.5px; padding-top:3px; text-align:center"><?php echo $fetch['middle_initial'] ?></td>
                    <td id="gender13" style="border:1px solid black; padding:1.5px; padding-top:3px; text-align:center"><?php echo $fetch['name_extension'] ?></td>
                    <td id="gender13" style="border:1px solid black; padding:1.5px; padding-top:3px; text-align:center"><?php echo $fetch['sex'] ?></td>
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