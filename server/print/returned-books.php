<!DOCTYPE html>
<?php
require '../db/conDB.php';
?>
<html lang="en">

<head>
    <title>Print: Borrowed Books</title>
    <link href="../../client/assets/logo.png" type="image/x-icon" rel="shortcut icon">
    <link href="../../client/global.css" rel="stylesheet">
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
        size: auto;
        /* auto is the initial value */
        margin: 0.5in;
        /* this affects the margin in the printer settings */
    }
</style>

<body>
    <div>
        <img src="../../client/assets/logo.png" style="display:block; margin:0 auto 0 auto; width:9%;">
        <h4 style="text-align:center; font-weight:500; margin-top:1%">REPUBLIC OF THE PHILPPINES</h4>
        <h4 style="text-align:center; font-weight:500; margin-top:-1.5%">ANTIQUE NATIONAL SCHOOL</h4>
        <h4 style="text-align:center; font-weight:500; margin-top:-1.5%">T.A. FORNIER ST., SAN JOSE, ANTIQUE</h4>
        <br>
        <h4 style="text-align:center; margin-top:-1.5%">ANS LIBRARY REPORT</h4>
        <h4 style="text-align:center; font-weight:500; margin-top:-1.5%">LIST OF BORROWED BOOKS</h4>
    </div>

    <br>
    <b style="text-align:right">DATE PREPARED:</b>
    <?php
    $date = date("m.d.Y", strtotime("+6 HOURS"));
    echo $date;
    ?>
    <br><br>

    <table id="table" class="tableHeader6" style="border:1px solid black; border-collapse:collapse; width:100%">
        <tbody class="alert-success">
            <tr>
                <td onselectstart="return false" scope="col" style="font-weight:bold; text-align:center; width:20%; border:1px solid black; padding:6px">BORROWER</td>
                <td style="font-weight:bold; text-align:center; width:23%; border:1px solid black; padding:6px">TITLE</td>
                <td style="font-weight:bold; text-align:center; width:15%; border:1px solid black; padding:6px">AUTHOR</td>
                <td style="font-weight:bold; text-align:center; width:12%; border:1px solid black; padding:6px">STATUS</td>
                <td style="font-weight:bold; text-align:center; width:16%; border:1px solid black; padding:6px">DATE BORROWED</td>
                <td style="font-weight:bold; text-align:center; width:16%; border:1px solid black; padding:6px"></a>DUE DATE</td>
                <td style="font-weight:bold; text-align:center; width:16%; border:1px solid black; padding:6px"></a>DATE RETURNED</td>
            </tr>

            <?php
            $qreturn = $conn->query("SELECT * FROM `borrowed_books`") or die(mysqli_error($conn));
            while ($freturn = $qreturn->fetch_array()) {
            ?>
                <tr>
                    <td id="title6" style="border:1px solid black; padding:1.5px; padding-left:10px; padding-top:3px">
                        <?php
                        $qstudent = $conn->query("SELECT * FROM `borrowers` WHERE `borrower_ID` = '$freturn[borrower_ID]'") or die(mysqli_error($conn));
                        $fstudent = $qstudent->fetch_array();
                        echo $fstudent['first_name'] . " " . $fstudent['last_name'];
                        ?>
                    </td>
                    <td id="title6" style="border:1px solid black; padding:1.5px; padding-left:10px; padding-top:3px">
                        <?php
                        $qbook = $conn->query("SELECT * FROM `books` WHERE `book_ID` = '$freturn[book_ID]'") or die(mysqli_error($conn));
                        $fbook = $qbook->fetch_array();
                        echo $fbook['title'];
                        ?>
                    </td>
                    <td id="title6" style="border:1px solid black; padding:1.5px; padding-left:10px; padding-top:3px">
                        <?php
                        $qbook = $conn->query("SELECT * FROM `books` WHERE `book_ID` = '$freturn[book_ID]'") or die(mysqli_error($conn));
                        $fbook = $qbook->fetch_array();
                        echo $fbook['author_firstname'] . " " . $fbook['author_lastname'];
                        ?>
                    </td>
                    <td style="border:1px solid black; padding:1.5px; padding-left:10px; padding-top:3px"><?php echo $freturn['status'] ?></td>
                    <td style="border:1px solid black; padding:1.5px; text-align:center; padding-top:3px"><?php echo date("m-d-Y", strtotime($freturn['date_issued'])) ?></td>
                    <td style="border:1px solid black; padding:1.5px; text-align:center; padding-top:3px"><?php echo date("m-d-Y", strtotime($freturn['due_date'])) ?></td>
                    <td style="border:1px solid black; padding:1.5px; text-align:center; padding-top:3px"><?php echo date("m-d-Y", strtotime($freturn['returned_date'])) ?></td>
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