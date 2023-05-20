<!DOCTYPE html>
<?php
require '../db/conDB.php';
?>
<html lang="en">

<head>
    <title>Print: Books Available</title>
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
        size: auto;
        /* auto is the initial value */
        margin: 0.5in;
        /* this affects the margin in the printer settings */
        title: none;
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
        <h4 style="text-align:center; font-weight:500; margin-top:-1.5%">BOOKS AVAILABLE FOR BORROWING</h4>
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
                <td id="colDateB6" style="font-weight:bold; text-align:center; width:20%; border:1px solid black; padding:6px">ISBN</td>
                <td id="colTitle6" style="font-weight:bold; text-align:center; width:30%; border:1px solid black; padding:6px">TITLE</td>
                <td id="colEdition6" style="font-weight:bold; text-align:center; width:20%; border:1px solid black; padding:6px">AUTHOR</td>
                <td id="colAuthor6" style="font-weight:bold; text-align:center; width:15%; border:1px solid black; padding:6px">CATEGORY</td>
                <td id="colStat6" style="font-weight:bold; text-align:center; width:13%; border:1px solid black; padding:6px">COPIES</td>
            </tr>

            <?php
            require '../db/conDB.php';
            $query = $conn->query("SELECT * FROM `books` WHERE copies >= 1");
            while ($fetch = $query->fetch_array()) {
            ?>

                <tr>
                    <td id="dateB6" style="border:1px solid black; padding:1.5px; padding-left:10px; padding-top:3px"><?php echo $fetch['isbn'] ?></td>
                    <td id="title6" style="border:1px solid black; padding:1.5px; padding-left:10px; padding-top:3px"><?php echo $fetch['title'] ?></td>
                    <td id="edition6" style="border:1px solid black; padding:1.5px; padding-left:10px; padding-top:3px"><?php echo $fetch['author_firstname'] ?> <?php echo $fetch['author_lastname'] ?></td>
                    <td id="author6" style="border:1px solid black; padding:10px; padding-top:3px"><?php echo $fetch['category'] ?></td>
                    <td id="status6" style="border:1px solid black; padding:1.5px; text-align:center; padding-top:3px"><?php echo $fetch['copies'] ?></td>
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