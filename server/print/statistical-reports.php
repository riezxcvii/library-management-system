<!DOCTYPE html>
<?php
require '../db/conDB.php';
?>
<html lang="en">

<head>
    <title>Print: Statistical Reports</title>
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
        margin: 5%;
        /* this affects the margin in the printer settings */
    }
</style>

<body>
    <div>
        <img src="../../client/assets/logo.png" style="display:block; margin:0 auto 2% auto; width:10%;">
        <h4 style="text-align:center; font-weight:500; margin-top:1%">REPUBLIC OF THE PHILPPINES</h4>
        <h4 style="text-align:center; font-weight:500; margin-top:-1.5%">ANTIQUE NATIONAL SCHOOL</h4>
        <h4 style="text-align:center; font-weight:500; margin-top:-1.5%">T.A. FORNIER ST., SAN JOSE, ANTIQUE</h4>
        <br>
        <h4 style="text-align:center; margin-top:-1.5%">ANS LIBRARY REPORT</h4>
        <h4 style="text-align:center; font-weight:500; margin-top:-1.5%">STATISTICAL REPORTS</h4>
    </div>

    <br>
    <b style="text-align:right">DATE PREPARED:</b>
    <?php
    $date = date("m.d.Y", strtotime("+6 HOURS"));
    echo $date;
    ?>
    <br><br>

    <!--table for top borrowers-->
    <table id="table" class="tableHeader6" style="border:1px solid black; border-collapse:collapse; width:100%;">
        <tbody class="alert-success">
            <tr>
                <td onselectstart="return false" scope="col" style="font-weight:bold; text-align:center; width:5%; border:1px solid black; padding:6px">NO.</td>
                <td style="font-weight:bold; text-align:center; width:23%; border:1px solid black; padding:6px">TOP BORROWERS</td>
            </tr>

            <?php
            $sql = "SELECT borrower_ID, COUNT(*) AS count
            FROM borrowed_books
            GROUP BY borrower_ID
            ORDER BY count DESC, borrower_ID DESC
            LIMIT 10";
            $res = mysqli_query($conn, $sql);
            $sn = 1;
            while ($row = mysqli_fetch_assoc($res)) {
            ?>
                <tr>
                    <td id="title6" style="border:1px solid black; padding:1.5px; text-align:center; padding-top:3px"><?php echo $sn++; ?></td>
                    <td id="title6" style="border:1px solid black; padding:1.5px; padding-left:15px; padding-top:3px">
                        <?php $id = $row['borrower_ID'];
                        $sql1 = "SELECT * FROM `borrowers` WHERE borrower_ID = $id";
                        $res1 = mysqli_query($conn, $sql1);
                        $row1 = mysqli_fetch_assoc($res1);

                        $last = $row1['last_name'];
                        $first = $row1['first_name'];
                        echo $first . ', ' . $last . ' ';

                        ?>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>

    <!--table for top borrowed books-->
    <table id="table" class="tableHeader6" style="border:1px solid black; border-collapse:collapse; width:100%; margin-top:5%">
        <tbody class="alert-success">
            <tr>
                <td onselectstart="return false" scope="col" style="font-weight:bold; text-align:center; width:5%; border:1px solid black; padding:6px">NO.</td>
                <td style="font-weight:bold; text-align:center; width:23%; border:1px solid black; padding:6px">TOP BORROWED BOOKS</td>
            </tr>

            <?php
            $sql = "SELECT book_ID, COUNT(*) AS count
                    FROM borrowed_books
                    GROUP BY book_ID
                    ORDER BY count DESC, book_ID DESC
                    LIMIT 10";
            $res = mysqli_query($conn, $sql);
            $sn = 1;
            while ($row = mysqli_fetch_assoc($res)) {
            ?>
                <tr>
                    <td id="title6" style="border:1px solid black; padding:1.5px; text-align:center; padding-top:3px"><?php echo $sn++; ?></td>
                    <td id="title6" style="border:1px solid black; padding:1.5px; padding-left:15px; padding-top:3px">
                        <?php $id = $row['book_ID'];
                        $sql1 = "SELECT * FROM `books` WHERE book_ID = $id";
                        $res1 = mysqli_query($conn, $sql1);
                        $row1 = mysqli_fetch_assoc($res1);
                        $title = $row1['title'];
                        echo $title;
                        ?>
                    </td>
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