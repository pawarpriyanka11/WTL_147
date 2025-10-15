<?php include 'header.php'; ?>
<div class="container my-5">
    <h2 class="mb-4">Student Records</h2>
    <?php
    include 'db.php';
    $sql = "SELECT * FROM students";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table class='table table-bordered table-striped'>";
        echo "<thead class='table-dark'>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Roll No</th>
                <th>Class</th>
                <th>Marks</th>
                <th>Actions</th>
              </tr>
            </thead><tbody>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['name']}</td>
                <td>{$row['roll_no']}</td>
                <td>{$row['class']}</td>
                <td>{$row['marks']}</td>
                <td>
                  <a href='edit.php?id={$row['id']}' class='btn btn-warning btn-sm'>Edit</a>
                  <a href='delete.php?id={$row['id']}' class='btn btn-danger btn-sm'>Delete</a>
                </td>
              </tr>";
        }
        echo "</tbody></table>";
    } else {
        echo "<div class='alert alert-info'>No students found.</div>";
    }
    $conn->close();
    ?>
</div>
<?php include 'footer.php'; ?>