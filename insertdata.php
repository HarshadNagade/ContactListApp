<?php
// Include your database connection file
include 'contact.php'; // Ensure this file connects to the database and initializes $con

if (isset($_POST['add'])) {
    // Retrieve and sanitize form data
    $f_name = trim($_POST['fname']); // Trim to remove unnecessary spaces
    $l_name = trim($_POST['lname']);
    $mob_no = trim($_POST['mob']);
    $email = trim($_POST['email']);

    // Validate input
    if (empty($f_name)) {
        header('location:index.php?message=You need to fill in the First Name!');
        exit();
    } elseif (empty($mob_no)) {
        header('location:index.php?message=You need to fill in the Mobile Number!');
        exit();
    }elseif (empty($email)) {
        header('location:index.php?message=You need to fill in the E-Mail !');
        exit();
    } else {
        // Prepare the SQL query to prevent SQL injection
        $query = "INSERT INTO contact (FirstName, LastName, Mobile,Email) VALUES (?, ?, ,?,?)";
        
        // Use prepared statements to safely bind user input
        if ($stmt = $con->prepare($query)) {
            $stmt->bind_param("sss", $f_name, $l_name, $mob_no, $email); // "sss" means three string parameters
            $res = $stmt->execute();

            if (!$res) {
                die("Query Failed: " . $stmt->error);
            } else {
                header('location:index.php?insert_msg=Added Successfully..!');
            }

            // Close the statement
            $stmt->close();
        } else {
            die("Query preparation failed: " . $con->error);
        }
    }
}

// Close the database connection
$con->close();
?>
