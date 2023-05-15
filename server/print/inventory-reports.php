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
        <h4 style="text-align:center; font-weight:500; margin-top:-1.5%">BOOK INVENTORY</h4>
    </div>

    <br>
    <b style="text-align:right">DATE PREPARED:</b>
    <?php
    $date = date("m.d.Y", strtotime("+6 HOURS"));
    echo $date;
    ?>
    <br><br>

    <table class="sum12" id="table" style="border:1px solid black; border-collapse:collapse; width:100%">
        <tr>
            <td id="noC14" style="font-weight:bold; text-align:center; width:4%; border:1px solid black">ID</td>
            <td id="tdbC14" style="font-weight:bold; text-align:center; width:15%; border:1px solid black">TITLE</td>
            <td id="tdbD14" style="font-weight:bold; text-align:center; width:5%; border:1px solid black">DATE RECEIVED</td>
            <td id="lbC14" style="font-weight:bold; text-align:center; width:4%; border:1px solid black">STATUS</td>
            <td id="tabC14" style="font-weight:bold; text-align:center; width:4%; border:1px solid black">ACQUIRED BOOKS []</td>
            <td id="CA14" style="font-weight:bold; text-align:center; width:4%; border:1px solid black">COPIES BORROWED</td>
        </tr>

        <?php
        $i = 0;
        $q_book = $conn->query("SELECT * FROM `books`") or die(mysqli_error($conn));
        while ($f_book = $q_book->fetch_array()) {
            $q_borrow = $conn->query("SELECT SUM(copies) as total FROM `borrowed_books` WHERE `book_ID` = '$f_book[book_ID]' && `status` = 'Borrowed'") or die(mysqli_error($conn));
            $new_qty = $q_borrow->fetch_array();
            $total = $f_book['copies'] - $new_qty['total'];
        ?>

            <tr>
                <td id="no14" style="border:1px solid black; padding:1.5px; padding-top:3px; text-align:center"><?php echo $f_book['book_ID'] ?></td>
                <td id="tdb14" style="border:1px solid black; padding:1.5px; padding-left:10px; padding-top:3px"><?php echo $f_book['bk_title'] ?></td>
                <td id="Dtdb14" style="border:1px solid black; padding:1.5px; padding-top:3px; text-align:center"><?php echo $f_book['bk_dateReceived'] ?> </td>
                <td id="author6" style="border:1px solid black; padding:1.5px; padding-top:3px; text-align:center"><?php echo $f_book['bk_status'] ?></td>
                <td id="tab14" style="border:1px solid black; padding:1.5px; padding-top:3px; text-align:center"><?php echo $f_book['bk_copies'] ?></td>
                <td id="lb14" style="border:1px solid black; padding:1.5px; padding-top:3px; text-align:center"><?php echo $total ?></td>
            </tr>

        <?php
            $i++;
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