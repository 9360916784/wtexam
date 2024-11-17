<?php
session_start();
include('db.php');

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$sql = "SELECT * FROM questions";
$result = $conn->query($sql);
?>

<form method="POST" action="submit.php">
    <?php while ($row = $result->fetch_assoc()) { ?>
        <div>
            <p><?php echo $row['question']; ?></p>
            <input type="radio" name="question_<?php echo $row['id']; ?>" value="option1"> <?php echo $row['option1']; ?><br>
            <input type="radio" name="question_<?php echo $row['id']; ?>" value="option2"> <?php echo $row['option2']; ?><br>
            <input type="radio" name="question_<?php echo $row['id']; ?>" value="option3"> <?php echo $row['option3']; ?><br>
            <input type="radio" name="question_<?php echo $row['id']; ?>" value="option4"> <?php echo $row['option4']; ?><br>
        </div>
    <?php } ?>
    <button type="submit">Submit</button>
</form>
