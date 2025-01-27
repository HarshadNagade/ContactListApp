<?php
include('contact.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.rtl.min.css" integrity="sha384-DOXMLfHhQkvFFp+rWTZwVlPVqdIhpDVYT9csOnHSgWQWPX0v5MCGtjCJbY6ERspU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="style.css">
</head>
<style>

.box1 {
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 20px;
    margin: 20px auto;
    max-width: 500px;
    border: 1px solid #ddd;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.box1 button {
    font-size: 1rem;
    padding: 10px 20px;
    background-color: #007bff;
    border: none;
    color: #fff;
    border-radius: 5px;
    transition: background-color 0.3s ease, transform 0.2s ease;
}

.box1 button:hover {
    background-color: #0056b3;
    transform: scale(1.05);
}

.box1 button:focus {
    outline: none;
    box-shadow: 0 0 0 4px rgba(0, 123, 255, 0.25);
}
table th, table td {
            text-align: center;
            vertical-align: middle;
        }

        table th {
            background-color: #007bff;
            color: black;
        }

        table td {
            background-color: #f9f9f9;
        }

        .btn {
             padding: 5px 10px;
            border-radius: 5px;
        }
        .btn-success:hover, .btn-danger:hover {
            transform: scale(1.05);
            transition: all 0.3s ease;
        }

        .modal-dialog {
            margin: auto;
            max-width: 500px;
        }

        .modal-content {
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .form-group label {
            font-weight: bold;
        }

        .form-control {
            border-radius: 5px;
        }

        .modal-header {
            background-color: #007bff;
            color: white;
            border-radius: 10px 10px 0 0;
        }

        .modal-footer button, .modal-footer input {
            border-radius: 5px;
        }

</style>
<body>
    
   

<h1  id="main-title" >Contact List</h1>
    <div class="box1">
   
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style="margin-right: 10%;">Add</button>
    <input type="text" id="searchInput" class="form-control" placeholder="Search Contacts (by name or mobile)" style="flex: 1; margin-right: 10px;">
    <button id="searchButton" class="btn btn-primary">Search</button>
</div>
<div class="mb-3 d-flex align-items-center">
    
</div>

    
    <div class="container">



    <div style="overflow-y: auto; max-height: 400px; border: 1px solid #ddd; padding: 10px; border-radius: 5px;">

    <table class="table table-hover table-bordered table-striped" >
        <thead>
           

        
    <TR>
    <th style="width: 25%;">First Name</th>
            <th style="width: 25%;">Last Name</th>
            <th style="width: 25%;">Mobile Number</th>
            <th style="width: 13%;">E-Mail</th>
            <th style="width: 12%;">Update</th>
            <th style="width: 13%;">Delete</th>
           
        </TR>
</thead>
    
<tbody id="contactTable">

    <?php
                $query="select * from `contact`  ORDER BY `FirstName` ASC ";
                $res=mysqli_query($con,$query);
                if(!$res){
                    die("Query Failed....!");
                }
                else{
                  
                    while($row=mysqli_fetch_assoc($res))
                    {
                        ?>  
                    
                    <tr>
            <td><?php echo $row['FirstName'];?></td>
            <td><?php echo $row['LastName'];?></td>
            <td><?php echo $row['Mobile'];?></td>
            <td><?php echo $row['Email'];?></td>

            <td style="width: 10%;"><a href="update.php?mob=<?php echo $row['Mobile'];?>" class="btn btn-success" > Update</a></td>
            <td style="width: 10%;"><a href="delete.php?mob=<?php echo $row['Mobile'];?>" class="btn btn-danger" > Delete</a></td>
        </tr>



                    <?php
                    }
                   
                }

            ?>
    
    
    </tboby>
    


    </table>
    </div>


                <?php
                if(isset($_GET['message'])){
                    echo "<h6>".$_GET['message']."</h6>";
                }
                ?>


                    
                <?php
                if(isset($_GET['insert_msg'])){
                    echo "<h6>".$_GET['insert_msg']."</h6>";
                }
                ?>


              <?php
                if(isset($_GET['delete_msg'])){
                    echo "<h6>".$_GET['delete_msg']."</h6>";
                }
                ?>



    <form action="insertdata.php" method="post" >
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add-Contact</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form>
        <div class="form-group">
        
        <label for="fname"> FirstName</label>
        <input type="text" name="fname" class="form-control">
      </div>
      <div class="form-group">
        <label for="lname"> LastName</label>
        <input type="text" name="lname" class="form-control">
      </div>
      <div class="form-group">
        <label for="mob"> Mobile</label>
        <input type="tel" name="mob" class="form-control">
      </div>
      <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
    
    
    
   
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" name="add" value="ADD">
      </div>
    </div>
  </div>
</div>
</form>

    </div>
    <script>
     
    document.getElementById('searchButton').addEventListener('click', function () {
        const filter = document.getElementById('searchInput').value.toUpperCase();
        const table = document.getElementById('contactTable');
        const rows = table.getElementsByTagName('tr');

        for (let i = 0; i < rows.length; i++) {
            const firstName = rows[i].getElementsByTagName('td')[0];
            const lastName = rows[i].getElementsByTagName('td')[1];
            const mobile = rows[i].getElementsByTagName('td')[2];
            const email = rows[i].getElementsByTagName('td')[3];

            if (firstName || lastName || mobile || email) {
                const firstNameText = firstName.textContent || firstName.innerText;
                const lastNameText = lastName.textContent || lastName.innerText;
                const mobileText = mobile.textContent || mobile.innerText;
                const emailText = email.textContent || email.innerText;

                if (
                    firstNameText.toUpperCase().indexOf(filter) > -1 ||
                    lastNameText.toUpperCase().indexOf(filter) > -1 ||
                    mobileText.toUpperCase().indexOf(filter) > -1 ||
                    emailText.toUpperCase().indexOf(filter) > -1
                ) {
                    rows[i].style.display = '';
                } else {
                    rows[i].style.display = 'none';
                }
            }
        }
    });

    document.getElementById('clearButton').addEventListener('click', function () {
        const rows = document.getElementById('contactTable').getElementsByTagName('tr');
        document.getElementById('searchInput').value = '';
        for (let i = 0; i < rows.length; i++) {
            rows[i].style.display = '';
        }
    });
</script>
    <?php
    include('footer.php');
    ?>