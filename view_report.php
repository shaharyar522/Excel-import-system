<?php
session_start();
require 'conn.php';

// Redirect to login if user not logged in
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit();
}

// Get record_id from URL
$recordId = isset($_GET['record_id']) ? intval($_GET['record_id']) : 0;

if ($recordId <= 0) {
    echo "Invalid record ID.";
    exit();
}

// Fetch title of the report
$title = '';
$stmt = $conn->prepare("SELECT title FROM weekly_record WHERE id = ?");
$stmt->bind_param("i", $recordId);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0) {
    $title = $result->fetch_assoc()['title'];
} else {
    echo "Report not found.";
    exit();
}

// Fetch data from union_overall
$data = [];
$stmt = $conn->prepare("SELECT * FROM union_overall WHERE weekly_record_id = ?");
$stmt->bind_param("i", $recordId);
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>View Report - <?= htmlspecialchars($title) ?></title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
  <h2 class="text-center mb-4">Report: <?= htmlspecialchars($title) ?></h2>
<div class="text-center mt-4">
  <a href="report1.php" class="btn btn-primary">buton 1</a>
  <a href="report2.php" class="btn btn-success">button  2</a>
  <a href="report3.php" class="btn btn-warning">buttun 3</a>
  <br>
</div>
  <?php if (count($data) > 0): ?>
    <div class="table-responsive">
      <table class="table table-bordered table-striped table-hover">
        <thead class="table-dark">
          <tr>
           <th>ID</th>
        <th>Weekly Record ID</th>
        <th>Club Name</th>
        <th>Club ID</th>
        <th>Hands</th>
        <th>Player Overall</th>
        <th>Ring Game</th>
        <th>MTT/SNG</th>
        <th>SPINUP</th>
        <th>COLOR GAME</th>
        <th>LUCKY DRAW</th>
        <th>Jackpot</th>
        <th>Player EV Chop</th>
        <th>Ticket Value Won</th>
        <th>Player Ticket Buy-in</th>
        <th>Customized Prize Value</th>
        <th>Club Earnings</th>
        <th>Fee</th>
        <th>Fee PPST Games</th>
        <th>Fee Non-PPST Games</th>
        <th>Fee PPSR Games</th>
        <th>Fee Non-PPSR Games</th>
        <th>SPINUP Buy-in</th>
        <th>SPINUP Prize</th>
        <th>COLOR GAME Bets</th>
        <th>COLOR GAME Payouts</th>
        <th>LUCKY DRAW Bets</th>
        <th>LUCKY DRAW Payouts</th>
        <th>Jackpot Fee</th>
        <th>Jackpot Prize</th>
        <th>Club EV Chop</th>
        <th>Ticket Value Given Out</th>
        <th>Club Ticket Buy-in</th>
        <th>Gtd Gap</th>
        <th>Ticket Value Won (Again?)</th>
            <th>Club Earnings</th>
            <!-- Add more headers as needed -->
          </tr>
        </thead>
        <tbody>
          <?php foreach ($data as $row): ?>
            <tr>
               <td><?= $row['id'] ?></td>
          <td><?= $row['weekly_record_id'] ?></td>
          <td><?= htmlspecialchars($row['Club_Name']) ?></td>
          <td><?= htmlspecialchars($row['Club_ID']) ?></td>
          <td><?= $row['Hands_Missions'] ?></td>
          <td><?= number_format($row['Player_Overall'], 2) ?></td>
          <td><?= number_format($row['Ring_Game'], 2) ?></td>
          <td><?= number_format($row['MTT_SNG'], 2) ?></td>
          <td><?= number_format($row['SPINUP'], 2) ?></td>
          <td><?= number_format($row['COLOR_GAME'], 2) ?></td>
          <td><?= number_format($row['LUCKY_DRAW'], 2) ?></td>
          <td><?= number_format($row['Jackpot'], 2) ?></td>
          <td><?= number_format($row['Player_EV_Chop'], 2) ?></td>
          <td><?= number_format($row['Ticket_Value_Won'], 2) ?></td>
          <td><?= number_format($row['Player_Ticket_Buy_in'], 2) ?></td>
          <td><?= number_format($row['Customized_Prize_Value'], 2) ?></td>
          <td><?= number_format($row['Club_earning_Overall'], 2) ?></td>
          <td><?= number_format($row['Fee'], 2) ?></td>
          <td><?= number_format($row['Fee_PPST_Games'], 2) ?></td>
          <td><?= number_format($row['Fee_Non_PPST_Games'], 2) ?></td>
          <td><?= number_format($row['Fee_PPSR_Games'], 2) ?></td>
          <td><?= number_format($row['Fee_Non_PPSR_Games'], 2) ?></td>
          <td><?= number_format($row['SPINUP_Buy_in'], 2) ?></td>
          <td><?= number_format($row['SPINUP_Prize'], 2) ?></td>
          <td><?= number_format($row['COLOR_GAME_Bets'], 2) ?></td>
          <td><?= number_format($row['COLOR_GAME_Payouts'], 2) ?></td>
          <td><?= number_format($row['LUCKY_DRAW_Bets'], 2) ?></td>
          <td><?= number_format($row['LUCKY_DRAW_Payouts'], 2) ?></td>
          <td><?= number_format($row['JackpotFee'], 2) ?></td>
          <td><?= number_format($row['Jackpot_Prize'], 2) ?></td>
          <td><?= number_format($row['Club_EV_Chop'], 2) ?></td>
          <td><?= number_format($row['Ticket_Value_Given_Out'], 2) ?></td>
          <td><?= number_format($row['Club_Ticket_Buy_in'], 2) ?></td>
          <td><?= number_format($row['Gtd_Gap'], 2) ?></td>
          <td><?= number_format($row['Ticket_Value_Won'], 2) ?></td>
              <!-- Add more cells as needed -->
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  <?php else: ?>
    <div class="alert alert-info text-center">No data found for this report.</div>
  <?php endif; ?>

  <div class="text-center mt-4">
    <a href="dashboard.php" class="btn btn-secondary">Back to Dashboard</a>
  </div>
</div>
</body>
</html>
