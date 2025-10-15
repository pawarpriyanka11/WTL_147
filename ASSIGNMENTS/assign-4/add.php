<?php include 'header.php'; ?>
<?php include 'db.php'; ?>

<main>
  <div class="form-container">
    <h2>Add Student</h2>
    <form method="POST">
      <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required>
      </div>

      <div class="form-group">
        <label for="roll_no">Roll No:</label>
        <input type="text" name="roll_no" id="roll_no" required>
      </div>

      <div class="form-group">
        <label for="class">Class:</label>
        <input type="text" name="class" id="class" required>
      </div>

      <div class="form-group">
        <label for="marks">Marks:</label>
        <input type="number" name="marks" id="marks" required>
      </div>

      <button type="submit" name="submit">Add Student</button>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $roll = $_POST['roll_no'];
        $class = $_POST['class'];
        $marks = $_POST['marks'];

        $sql = "INSERT INTO students (name, roll_no, class, marks) 
                VALUES ('$name', '$roll', '$class', $marks)";

        if ($conn->query($sql)) {
            echo "<script>alert('✅ Student added successfully!');</script>";
        } else {
            echo "<script>alert('❌ Error: " . $conn->error . "');</script>";
        }
    }
    ?>
  </div>
</main>

<?php include 'footer.php'; ?>
