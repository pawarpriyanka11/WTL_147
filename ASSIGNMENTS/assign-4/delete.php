<?php include 'db.php'; ?>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM students WHERE id=$id";
    if ($conn->query($sql)) {
        echo "<script>alert('Student deleted successfully!');window.location.href='view.php';</script>";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}
?>
