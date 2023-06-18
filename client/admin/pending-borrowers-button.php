<?php include "../../server/db/conDB.php";
$pending = mysqli_query($conn, "SELECT COUNT(status) AS total FROM borrowers WHERE status = '0'");
$p = mysqli_fetch_assoc($pending)
?>
<a href="account-registration.php" class="flex mr-8">
    <button type="button" class="inline-flex items-center px-5 py-2.5 text-m font-medium text-center text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-2 focus:outline-none focus:ring-blue-300">
        Pending Registration
        <span class="inline-flex items-center justify-center w-8 h-8 ml-2 text-xs font-semibold text-blue-800 bg-blue-200 rounded-full"><?php echo $p['total']; ?></span>
    </button>
</a>