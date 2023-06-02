<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the ID number from the input field
    $idNumber = $_POST["id_number"];

    // Set the QR code content (in this example, it's the ID number)
    $content = $idNumber;

    // Generate the QR code URL
    $qrCodeUrl = 'https://api.qrserver.com/v1/create-qr-code/?data=' . urlencode($content) . '&size=150x150';

    // Print the QR code on the page
    echo '<h1 id="qr_code" class="hidden" style="font-size:20px; text-align:center; margin-top:15%; margin-bottom:15%; font-family:Arial,sans-serif; font-weight:900;">ANS Library Management System</h1>
    <img class="hidden" src="' . $qrCodeUrl . '" alt="QR Code" id="qr_code">';
}
?>

<!-- HTML form -->
<form method="post" action="">
    <label for="id_number">Enter ID number:</label>
    <input type="text" name="id_number" id="id_number" required>
    <button type="submit">Generate QR Code</button>
    <button onclick="printQRCode()">Print QR Code</button>
</form>

<!-- CSS for print styles -->
<style>
    /* Styles for printing */
    @media print {
        body {
            margin: 1;
            padding: 5;
        }

        @page {
            margin: 0;
            /* Set margin to 0 to remove header and footer */
            size: 2.125in 3.375in;
        }

        #qr_code {
            width: 70%;
            height: auto;
            display: block;
            margin: auto;
        }

        /* Hide unnecessary elements in print */
        body>*:not(#qr_code) {
            display: none;
        }   
    }

    /* Hide the image with the "hidden" class */
    .hidden {
        display: none;
    }
</style>


<!-- JavaScript to trigger print functionality -->
<script>
    // Function to trigger print functionality
    function printQRCode() {
        window.print();
    }
</script>

<script>
    window.history.replaceState({}, document.title, window.location.href.split('?')[0]);
</script>