<!DOCTYPE html>
<?php
require '../db/conDB.php';
?>
<html lang="en">

<head>
    <title>Print: Log History</title>
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
        <h4 style="text-align:center; font-weight:500; margin-top:-1.5%">LOG HISTORY</h4>
    </div>

    <br>
    <b style="text-align:right">DATE PREPARED:</b>
    <?php
    $date = date("m.d.Y", strtotime("+6 HOURS"));
    echo $date;
    ?>
    <br><br>

    <table id="table" class="result10" style="border:1px solid black; border-collapse:collapse; width:100%">
        <tr>
            <td id="ISBN10" id="colNo12" style="font-weight:bold; text-align:center; width:20%; border:1px solid black">NAME</td>
            <td id="title10" id="colNo12" style="font-weight:bold; text-align:center; width:15%; border:1px solid black">LOG DATE</td>
            <td id="author10" id="colNo12" style="font-weight:bold; text-align:center; width:12%; border:1px solid black">TIME IN</td>
            <td id="stat10" id="colNo12" style="font-weight:bold; text-align:center; width:3%; border:1px solid black">TIME OUT</td>
        </tr>

        <?php
        require '../db/conDB.php';
        $query = $conn->query("SELECT * FROM `log_history` JOIN `library_admin` ON log_history.admin_ID = library_admin.admin_ID ORDER BY `date` DESC");
        while ($fetch = $query->fetch_array()) {
        ?>

            <tr>
                <td style="border:1px solid black; padding:1.5px; padding-top:3px; padding-left:10px"><?php echo $fetch['first_name'] . " " . $fetch['last_name'] ?></td>
                <td style="border:1px solid black; padding:1.5px; text-align:center; padding-top:3px"><?php echo $fetch['date'] ?></td>
                <td style="border:1px solid black; padding:1.5px; text-align:center; padding-top:3px"><?php echo $fetch['time_in'] ?></td>
                <td style="border:1px solid black; padding:1.5px; padding-top:3px; text-align:center"><?php echo $fetch['time_out'] ?></td>
            </tr>

        <?php
        }
        ?>
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