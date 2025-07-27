<?php
// Start session and include database connection
session_start();
include('database.php');

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $consumption = $_POST['consumption'];

    // Define rates
    $firstRate = 10; // First 90 kWh
    $secondRate = 20; // Next 100 kWh
    $thirdRate = 30; // Above 190 kWh

    // Calculate the bill
    if ($consumption <= 90) {
        $bill = $consumption * $firstRate;
    } elseif ($consumption <= 190) {
        $bill = (90 * $firstRate) + (($consumption - 90) * $secondRate);
    } else {
        $bill = (90 * $firstRate) + (100 * $secondRate) + (($consumption - 190) * $thirdRate);
    }

    // Insert bill into the database
    $user_id = $_SESSION['user_id'];
    $stmt = $conn->prepare("INSERT INTO bills (user_id, consumption, bill_amount,date) VALUES (?, ?, ?, NOW())");
    $stmt->bind_param("iid", $user_id, $consumption, $bill);
    $stmt->execute();

    $message = "Bill calculated successfully! Total: LKR " . number_format($bill, 2);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculate Bill</title>
    <link rel="stylesheet" href="style.css"> <!-- Include the CSS -->
</head>
<body>
    <div class="container">
        <h1>Calculate Your Electricity Bill</h1>

        <?php if (!empty($message)): ?>
            <p style="color: #ff6f61; font-weight: bold;"><?php echo $message; ?></p>
        <?php endif; ?>

        <form method="post" class="bill-form">
            <div class="input-group">
                <label for="consumption"><span style="margin-right:8px;">🔌</span>Enter Consumption (kWh):</label>
                <input type="number" id="consumption" name="consumption" required placeholder="e.g., 150" min="0" step="1">
                <small style="color:#bbb;">Enter your total electricity usage for the month.</small>
            </div>
            <button type="submit" class="btn-primary"><span style="margin-right:6px;">⚡</span>Calculate Bill</button>
        </form>

        <a href="dashboard.php" class="form-footer">Back to Dashboard</a>
    </div>
</body>
</html>
