<?php
require '../connection.php';

if (isset($_GET['record_id'])) {
    $record_id = (int) $_GET['record_id'];

    // Start transaction to ensure atomic delete
    $mysqli->begin_transaction();

    try {
        // Delete related records in club_overall
        $stmt1 = $mysqli->prepare("DELETE FROM club_overall WHERE weekly_record_id = ?");
        $stmt1->bind_param("i", $record_id);
        $stmt1->execute();
        $stmt1->close();

        // Delete from weekly_record
        $stmt2 = $mysqli->prepare("DELETE FROM weekly_record WHERE id = ?");
        $stmt2->bind_param("i", $record_id);
        $stmt2->execute();
        $stmt2->close();

        // Commit transaction
        $mysqli->commit();

        header("Location: clubdata.php?deleted=1");
        exit;
    } catch (Exception $e) {
        $mysqli->rollback();
        echo "Delete failed: " . $mysqli->error;
    }
} else {
    echo "No record ID specified.";
}
?>