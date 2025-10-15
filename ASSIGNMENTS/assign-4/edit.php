<?php include 'header.php'; ?>
<?php include 'db.php'; ?>

<main>
    <div class="form-container">
        <h2>Edit Student</h2>

        <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $result = $conn->query("SELECT * FROM students WHERE id=$id");
            $row = $result->fetch_assoc();
        }
        ?>

        <form method="POST">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" value="<?php echo $row['name']; ?>" required>
            </div>

            <div class="form-group">
                <label for="roll_no">Roll No:</label>
                <input type="text" name="roll_no" id="roll_no" value="<?php echo $row['roll_no']; ?>" required>
            </div>

            <div class="form-group">
                <label for="class">Class:</label>
                <input type="text" name="class" id="class" value="<?php echo $row['class']; ?>" required>
            </div>

            <div class="form-group">
                <label for="marks">Marks:</label>
                <input type="number" name="marks" id="marks" value="<?php echo $row['marks']; ?>" required>
            </div>

            <button type="submit" name="update">Update Student</button>
        </form>

        <?php
        if (isset($_POST['update'])) {
            $name = $_POST['name'];
            $roll = $_POST['roll_no'];
            $class = $_POST['class'];
            $marks = $_POST['marks'];

            $sql = "UPDATE students SET 
                  name='$name', roll_no='$roll', class='$class', marks=$marks 
                WHERE id=$id";

            if ($conn->query($sql)) {
                echo "<script>alert('✅ Record updated successfully!'); window.location='view.php';</script>";
            } else {
                echo "<script>alert('❌ Error: " . $conn->error . "');</script>";
            }
        }
        ?>
    </div>
</main>

<?php include 'footer.php'; ?>