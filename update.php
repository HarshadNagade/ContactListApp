<?php
include 'contact.php'; // Ensure this file connects to the database and initializes $con

// Check if 'mob' is set in the URL
if(isset($_GET['mob'])){
    $id = $_GET['mob']; // Set the ID from the URL parameter
} else {
    // If 'mob' is not set in the URL, you can either redirect or handle the error gracefully
    die("Mobile number not specified.");
}

$query = "SELECT * FROM `contact` WHERE `Mobile`='$id'";
$res = mysqli_query($con, $query);
if(!$res){
        die("Query Failed....!" );
} else {
    $row = mysqli_fetch_assoc($res);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Contact</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.rtl.min.css" integrity="sha384-DOXMLfHhQkvFFp+rWTZwVlPVqdIhpDVYT9csOnHSgWQWPX0v5MCGtjCJbY6ERspU" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1 id="main-title">Update Contact</h1>

    <div class="container">
        <?php
        if(isset($_POST['Update'])){
            $f_name = $_POST['fname'];
            $l_name = $_POST['lname'];
            $mobi = $_POST['mob'];
            $emaill = $_POST['email'];

            // Fix the query to properly update the email column
            $query = "UPDATE `contact` SET `FirstName`='$f_name', `LastName`='$l_name', `Mobile`='$mobi', `EMail`='$emaill' WHERE `Mobile`='$mobi'";

            $res = mysqli_query($con, $query);
            if(!$res){
                die("Query Failed....!");
            } else {
                header('Location: index.php?update_msg=Successfully Updated Data...!');
            }
        }
        ?>

        <form action="update.php?mob=<?php echo $id; ?>" method="post">
            <div class="form-group">
                <label for="fname">First Name</label>
                <input type="text" name="fname" class="form-control" value="<?php echo htmlspecialchars($row['FirstName']); ?>" required>
            </div>
            <div class="form-group">
                <label for="lname">Last Name</label>
                <input type="text" name="lname" class="form-control" value="<?php echo htmlspecialchars($row['LastName']); ?>" required>
            </div>
            <div class="form-group">
                <label for="mob">Mobile</label>
                <input type="tel" name="mob" class="form-control" value="<?php echo htmlspecialchars($row['Mobile']); ?>" required>
            </div>
            <div class="form-group">
                <label for="email">E-Mail</label>
                <input type="email" name="email" class="form-control" value="<?php echo htmlspecialchars($row['Email']); ?>" required>
            </div>
            <input type="submit" class="btn btn-success" name="Update" value="Update">
        </form>
    </div>
</body>
</html>
