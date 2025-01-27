<?php
include 'contact.php'; // Ensure this file connects to the database and initializes $conn

?>

<?php
if(isset($_GET['mob'])){
    $id=$_GET['mob'];

$query="delete  from `contact` where `Mobile`='$id'";
$res=mysqli_query($con,$query);
if(!$res){
    die("Query Failed....!");
}
else{
   
    header('location:index.php?delete_msg=You have Deleted Contact Successfully');
}
}
    

?>
