<?php
include 'database.php';
session_start();
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM bills WHERE user_id = '$user_id'";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Bill History</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container bill-history-container" style="max-width:900px; min-width:320px;">
        <h1>Bill History</h1>
        <div class="table-scroll big-table-scroll">
            <table class="bill-history-table">
                <tr><th>Date</th><th>Consumption (kWh)</th><th>Bill Amount (LKR)</th></tr>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['date']; ?></td>
                        <td><?php echo $row['consumption']; ?></td>
                        <td><?php echo number_format($row['bill_amount'], 2); ?></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
        <a href="dashboard.php" class="btn-primary" style="margin-top: 20px; text-align: center;">Back to Dashboard</a>
    </div>
</body>
</html>